<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
$id_caisse=$_REQUEST['id'];
$query = "SELECT * from caisse where id_caisse='" . $id_caisse . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    // $id_materiel = $row['id_materiel'];
    // /*-------------------- DETAILS --------------------*/
    $caisse = $row['caisse'];
    $id_perso = $row['id_perso'];
?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-tasks" style="color: silver"></i> Details de la caisse: <?=$caisse?> </h1>
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
                            <ul class="nav nav-pills"   style="float: right;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="etat_print_tresorie.php?id_caisse=<?=$id_caisse?>" target="blank" style="margin-right: 20px" ><i class='fa fa-print'"></i> Imprimer
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
<!--                                    <th>Ref</th>-->
                                    <th>Entitée</th>
                                    <th>Entre</th>
                                    <th>Sortie</th>
                                    <th>Date</th>
                                    <th>type</th>
                                    <th>Motif</th>
                                    <th>services</th>
                                    <th class="text-right"><i class="fas fa-bars"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;

                                $query = "SELECT * from historique_caisse where id_caisse='$id_caisse'  order by id_hist_caisse desc";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_hist_caisse = $row['id_hist_caisse'];
                                    $ref_caisse = $row['ref_caisse'];
                                    $id_caisse = $row['id_caisse'];
                                    $id_beneficiaire = $row['id_beneficiaire'];
                                    $id_perso = $row['id_perso'];
                                    $statut = $row['statut'];
                                    $date_hist = $row['date_hist'];
                                    $type_beni = $row['type_beni'];
                                    $montant_entre = $row['montant_entre'];
                                    $montant_sortie = $row['montant_sortie'];
                                    $service = $row['service'];

                                    $sql = "SELECT * from service where id_service = '$service'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                    {
                                        // $nom_benificiaire=$table['nom_p'].' '.$table['prenom_p'];
                                        $nom_service=$table['nom'];
                                    }
                                    if(empty($service)){
                                        $nom_service='N/A';
                                    }

                                    $sql = "SELECT * from personnel where id_personnel = '$id_perso'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                    {
                                        $nom=$table['nom'].' '.$table['prenom'];
                                    }
                                    if(empty($nom)){
                                        $nom='N/A';
                                    }


                                  //  $n=SUBSTR($ref_caisse,0,3);

                                    switch ($type_beni) {
                                    case 'C';

                                        $sql = "SELECT * from caisse where id_caisse = '$id_beneficiaire'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($tables as $table)
                                        {
                                            $nom_benificiaire=$table['caisse'];
                                        }
                                        if(empty($nom_benificiaire)){
                                            $nom_benificiaire='N/A';
                                        }
                                        $statut_nom='Transfert_caisse';
                                    break;
                                    case 'P';
                                        $sql = "SELECT * from patient where id_patient = '$id_beneficiaire'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($tables as $table)
                                        {
                                           // $nom_benificiaire=$table['nom_p'].' '.$table['prenom_p'];
                                            $nom_benificiaire=$table['ref_patient'];
                                        }
                                        if(empty($nom_benificiaire)){
                                            $nom_benificiaire='N/A';
                                        }
                                        $statut_nom='Règlement_patient';
                                        break;
                                    case 'M';
                                        $sql = "SELECT * from medecin where id_medecin = '$id_beneficiaire'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($tables as $table)
                                        {
                                           $nom_benificiaire=$table['nom_m'].' '.$table['prenom_m'];
                                        }
                                        if(empty($nom_benificiaire)){
                                            $nom_benificiaire='N/A';
                                        }
                                        $statut_nom='Frais de commission';
                                        break;
                                    case 'CH';
                                            $sql = "SELECT * from chirugien where id_chirugien = '$id_beneficiaire'";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($tables as $table)
                                            {
                                                $nom_benificiaire=$table['nom_c'].' '.$table['prenom_c'];
                                            }
                                            if(empty($nom_benificiaire)){
                                                $nom_benificiaire='N/A';
                                            }
                                            $statut_nom='Frais de commission';
                                            break;
                                        case 'L';
                                            $sql = "SELECT * from laboratin where id_laboratin = '$id_beneficiaire'";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($tables as $table)
                                            {
                                                $nom_benificiaire=$table['nom_l'].' '.$table['prenom_l'];
                                            }
                                            if(empty($nom_benificiaire)){
                                                $nom_benificiaire='N/A';
                                            }
                                            $statut_nom='Frais de commission';
                                            break;

                                    }

                                    ?>

                                    <tr>
<!--                                        <td><a href="#">--><?php //echo $id_hist_caisse;?><!--</a></td>-->
                                        <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                             class="rounded-circle m-r-5"
                                                             alt=""><?=$nom_benificiaire?></a></td>
                                        <td><a href="#"><?= number_format($montant_entre)?></a></td>
                                        <td><a href="#"><?= number_format($montant_sortie)?></a></td>
                                        <td><a href="#"><?=$date_hist?></a></td>
                                        <td><a href="#"><?=$statut?></a></td>
                                        <td><a href="#"><?=$statut_nom?></a></td>
                                        <td><a href="#"><?=$nom_service?></a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">


                                                    <a class="dropdown-item" href="edit-patient.html"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                       data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i>
                                                        Delete</a>
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
    <?php }?>
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
                    title: 'Oops...', c
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