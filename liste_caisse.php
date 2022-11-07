<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-tasks" style="color: silver"></i> Liste  des caisses</h1>
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
<!--                            <ul class="nav nav-pills" style="float: right;">-->
<!--                                <li class="nav-item">-->
<!--                                    <a class="nav-link active" href="nouvelle_ask_caisse.php">-->
<!--                                        <i class="fas fa-random"></i>-->
<!--                                        Nouveau transfert-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="liste_transfert_caisse.php">

                                        <?php

                                        if($lvl == 2){
                                            $query = "SELECT count(id_trans_caisse) as total from transfert_caisse where id_perso_src='$id_perso_session' and etat=1 ";
                                        }else{
                                            $query = "SELECT count(id_trans_caisse) as total from transfert_caisse where etat=1 ";
                                        }

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Transfert succès ['.$row['total'].']';

                                        }

                                        ?>


                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="liste_transfert_caisse_suite.php">

                                        <?php

                                        if($lvl == 2){
                                            $query = "SELECT count(id_trans_caisse) as total from transfert_caisse where id_perso_src='$id_perso_session' and etat=0 ";
                                        }else{
                                            $query = "SELECT count(id_trans_caisse) as total from transfert_caisse where etat=0 ";
                                        }



                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Transfert en cours ['.$row['total'].']';

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
                                    <th>code</th>
                                    <th>Caisse</th> 
                                    <th>Caissière</th>
                                    <th>Solde</th>
                                    <th>Date</th>
                                    <th class="text-right">Action</th>
<!--                                    <th>PDF</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($lvl == 2){
                                    $query = "SELECT * from caisse where id_perso='$id_perso_session' and open_close!='1'  order by date_caisse asc";
                                }else{
                                    $query = "SELECT * from caisse where open_close!='1'  order by date_caisse asc";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_caisse = $row['id_caisse'];
                                    $code = $row['code'];
                                    $caisse = $row['caisse'];
                                    $id_perso = $row['id_perso'];
                                    $date_caisse = $row['date_caisse'];
                                    $solde = $row['solde'];

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
                                        <td><a href="details_tresorerie.php?id=<?=$id_caisse?>"><?=$code?></a></td>
                                        <td><a href="details_tresorerie.php?id=<?=$id_caisse?>"><?=$caisse?></a></td>
                                        <td><a href="details_tresorerie.php?id=<?=$id_caisse?>"><img width="28" height="28" src="assetss/img/user.jpg"
                                                                                                     class="rounded-circle m-r-5"
                                                                                                     alt=""><?=$nom?></a></td>
                                        <td><a href="details_tresorerie.php?id=<?=$id_caisse?>"><?= number_format($solde)?></a></td>
                                        <td><a href="details_tresorerie.php?id=<?=$id_caisse?>"><?=$date_caisse?></a></td>
<!--                                        <td align="center"><a href="#" target="_blank">-->
<!--                                                <i class='fa fa-print'></i>-->
<!--                                            </a></td>-->
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php if($id_perso == $id_perso_session){ ?>
                                                    <a class="dropdown-item" href="transfert_caisse.php?id_caisse=<?=$id_caisse?>"><i
                                                                class="fa fa-random"></i> Transfert</a>
                                                                <?php }?>
                                                    <!--<a class="dropdown-item" href="edit-patient.html"><i-->
                                                    <!--            class="fa fa-pencil m-r-5"></i> Edit</a>-->
                                                    <!--<a class="dropdown-item" href="#" data-toggle="modal"-->
                                                    <!--   data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i>-->
                                                    <!--    Delete</a>-->
                                                </div>
                                            </div>
                                        </td>
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