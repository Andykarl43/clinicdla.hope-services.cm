<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-tasks" style="color: silver"></i> Liste  des dépenses de caisses : Echec</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">


                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouvelle_depense_caisse.php">
                                        <i class="fas fa-donate"></i>
                                        Nouvelle dépense
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_depense_succes.php"><i class="fas fa-donate"></i>

                                        <?php


                                        $query = "SELECT count(id_deps_caisse) as total from depense_caisse where etat=1 ";

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Dépense accepter ['.$row['total'].']';

                                        }

                                        ?>


                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_depense_echec.php"><i class="fas fa-donate"></i>

                                        <?php


                                        $query = "SELECT count(id_deps_caisse) as total from depense_caisse where etat=-1 ";

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Dépense refuser ['.$row['total'].']';

                                        }

                                        ?>


                                    </a>
                                </li>
                            </ul>


                        </b>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
                <!--                Main Body              -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th>ref</th>
                                    <th>Caisse</th>
                                    <th>Caissière</th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                    <th>Motif</th>
                                    <th class="text-center">Action</th>
                                    <!--                                    <th>PDF</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = "SELECT * from depense_caisse where etat=-1 and open_close!='1'  order by date_deps asc";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_deps_caisse = $row['id_deps_caisse'];
                                    $ref = $row['ref'];
                                    $id_caisse = $row['id_caisse'];
                                    $id_perso = $row['id_perso'];
                                    $date_deps = $row['date_deps'];
                                    $motif = $row['motif'];
                                    $montant = $row['montant'];
                                    $etat = $row['etat'];
                                    $date_valide = $row['date_valide'];
                                    $heure = $row['heure'];

                                    $sql = "SELECT * from caisse where id_caisse = '$id_caisse'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                    {
                                        $caisse=$table['caisse'];
                                    }

                                    $sql = "SELECT * from personnel where id_personnel = '$id_perso'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                    {
                                        $nom=$table['nom'].' '.$table['prenom'];
                                    }

                                    ?>

                                    <tr>
                                        <td><a href="#"><?=$ref?></a></td>
                                        <td><a href="#"><?=$caisse?></a></td>
                                        <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                             class="rounded-circle m-r-5"
                                                             alt=""><?=$nom?></a></td>
                                        <td><a href="#"><?= number_format($montant)?></a></td>
                                        <td> <a href="#"><?php if($date_valide==''){echo 'N/A';}else{echo date("d-m-Y",strtotime($date_valide)); echo ' ('.$heure.')';} ?></a></td>

                                        <td>
                                            <a href="#" class="btn btn-warning" style="background-color: transparent" data-toggle="modal" data-target="#ajouter<?=$id_deps_caisse?>"><i style="color: orange" class="far fa-comment-dots"></i></a>

                                            <div class="modal fade" id="ajouter<?=$id_deps_caisse?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="padding:20px 50px;">
                                                            <h3 align="center"><i class="fas fa-comment-dots"></i> <b>Motif: <?=$ref?></b></h3>
                                                            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                                                        </div>
                                                        <div class="modal-body" style="padding:40px 50px;">
                                                            <form class="form-horizontal" action="#" name="form" method="post">
                                                                <div class="form-group">
                                                                    <label>Montant Recue</label>
                                                                    <div class="col-sm-12">
                                                                        <textarea class="form-control" disabled><?=$motif?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <center>
                                                                            <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                                                                   class="btn btn-primary" value="Ok"/></center>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td align="center"><a href="#" target="_blank">
                                                <i class='fa fa-print'></i>
                                            </a></td>
                                        <!--                                        <td class="text-right">-->
                                        <!--                                            <div class="dropdown dropdown-action">-->
                                        <!--                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"-->
                                        <!--                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>-->
                                        <!--                                                <div class="dropdown-menu dropdown-menu-right">-->
                                        <!---->
                                        <!--                                                    <a class="dropdown-item" href="depense_caisse.php?id_caisse=--><?//=$id_deps_caisse?><!--"><i-->
                                        <!--                                                            class="fa fa-random"></i> Transfert</a>-->
                                        <!--                                                    <a class="dropdown-item" href="edit-patient.html"><i-->
                                        <!--                                                            class="fas fa-pen"></i> Edit</a>-->
                                        <!--                                                    <a class="dropdown-item" href="#" data-toggle="modal"-->
                                        <!--                                                       data-target="#delete_patient"><i class="fa fa-trash"></i>-->
                                        <!--                                                        Delete</a>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                        <!--                                        </td>-->

                                    </tr>
                                <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--                End Body              -->

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>
<?php
if (isset($_GET['witness'])) {
    $witness = $_GET['witness'];

    switch ($witness) {
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Solde Insuffisant !!!',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>