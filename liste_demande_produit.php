<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-random" style="color: silver"></i> Liste des demandes de produits</h1>
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
                            <?php if($lvl == 10){ ?>
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouvelle_demande_produit.php">
                                        <i class="fas fa-user"></i>
                                        Nouvelle demande
                                    </a>
                                </li>
                            </ul>
                            <?php } ?>
                            <?php if($lvl == 6){ ?>
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouvelle_sortie_medicament.php">
                                        <i class="fas fa-user"></i>
                                        Sortie médicmanent
                                    </a>
                                </li>
                            </ul>
                            <?php } ?>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_demande_echec.php">

                                        <?php

                                        if($lvl == 10)
                                            $query = "SELECT DISTINCT count(id_ask_medi) as total from demande_medicament WHERE id_perso = '$id_perso_session' and etat_dst=-1 ";
                                        else
                                            $query = "SELECT DISTINCT count(id_ask_medi) as total from demande_medicament where etat_dst=-1  order by id_ask_medi desc";

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Demande en echec ['.$row['total'].']';

                                        }

                                        ?>


                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_demande_traitement.php">

                                        <?php

                                        if($lvl == 3)
                                            $query = "SELECT DISTINCT count(id_ask_medi) as total from demande_medicament WHERE id_perso = '$id_perso_session' and etat_dst=0 and etat_src=1 ";
                                        else
                                            $query = "SELECT DISTINCT count(id_ask_medi) as total from demande_medicament where etat_dst=0 and etat_src=1  ";

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Demande en envoie['.$row['total'].']';

                                        }

                                        ?>


                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_demande_medi_suite.php">

                                        <?php

                                        if($lvl == 10)
                                            $query = "SELECT DISTINCT count(id_ask_medi) as total from demande_medicament WHERE id_perso = '$id_perso_session' and etat_src=0 and etat_dst=0 ";
                                        else
                                            $query = "SELECT DISTINCT count(id_ask_medi) as total from demande_medicament where etat_src=0 and etat_dst=0  ";

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Demande en cours ['.$row['total'].']';

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
<!--                                    <th>Reference</th>-->
                                    <th>Bloc</th>
                                    <th>Auteur</th>
                                    <th>Date demande</th>
                                    <th>Date Validation</th>
                                    <th>Produits</th>
                                     <th>PDF</th>
                                    <!--<th class="text-right">Action</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if($lvl == 10)
                                    $query = "SELECT * from demande_medicament WHERE id_perso = '$id_perso_session' and etat_dst=1 and etat_src=1 order by id_ask_medi desc";
                                else
                                $query = "SELECT * from demande_medicament where etat_dst=1 and etat_src=1 order by id_ask_medi desc";

                                $q = $db->query($query);
                                while($row = $q->fetch())
                                {
                                $id_ask_medi = $row['id_ask_medi'];
                                $nom_salle = $row['nom_salle'];
                                $date_debut = $row['date_debut'];
                                $heure_debut = $row['heure_debut'];
                                $date_valide = $row['date_valide'];
                                $heure = $row['heure'];
                                $emetteur = $row['emetteur'];
                                $responsable = $row['responsable'];

                                ?>

                                <tr>
<!--                                    <td><a href="#">Ref_--><?//=$id_ask_medi?><!--</a></td>-->
                                    <td><a href="#">Pharmacy</a></td>
                                    <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                         class="rounded-circle m-r-5" alt=""><?=$responsable?></a></td>
                                    <td align="center"><a href="#" style="color: black"> <?php echo date("d-m-Y",strtotime($date_debut)); echo ' ('.$heure_debut.')'; ?>  </a></td>
                                    <td align="center"><a href="#" style="color: black"> <?php if($date_valide=='N/A'){echo 'N/A';}else{echo date("d-m-Y",strtotime($date_valide)); echo ' ('.$heure.')';} ?>  </a></td>
                                    <td align="center"><a
                                            class="btn btn-primary"
                                            href="details_demande_medi.php?id=<?php echo $id_ask_medi; ?>"
                                            title="view"
                                            style="background-color: transparent">
                                            <i style="color: green" class="fas fa-eye"></i>
                                        </a></td>
                                    <td ><a href="facture_ask_medi.php?id_ask_medi=<?=$id_ask_medi?>&lvl=<?=$lvl?>&id_perso=<?=$id_perso_session?>" target="_blank">
                                                <i class="fa fa-print"></i>
                                            </a></td>
                                    <!--<td class="text-right">-->
                                    <!--    <div class="dropdown dropdown-action">-->
                                    <!--        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"-->
                                    <!--           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>-->
                                    <!--        <div class="dropdown-menu dropdown-menu-right">-->
                                    <!--            <a class="dropdown-item" href="edit-patient.html"><i-->
                                    <!--                    class="fa fa-pencil m-r-5"></i> Edit</a>-->
                                    <!--            <a class="dropdown-item" href="#" data-toggle="modal"-->
                                    <!--               data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i>-->
                                    <!--                Delete</a>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</td>-->
                                </tr>
                                <?php }?>

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

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>