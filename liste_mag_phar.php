<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-clinic-medical" style="color: silver"></i> Pharmacie</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">
                        <b>
                            <ul class="nav nav-pills"   style="float: right;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="etat_excel_pharmacie.php" target="blank" style="margin-right: 20px" ><i class="fas fa-download"></i>Exporter
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills"   style="float: right;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="etat_print_pharmacie.php" target="blank" style="margin-right: 20px" ><i class='fa fa-print'"></i> Imprimer
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
                                    <th>Code Produit</th>
                                    <th>Nom</th>
                                    <th>Quantités</th>
                                    <th>Categorie</th>
                                    <th>Date Péremption</th>
                                    <th>prix unitaire</th>
                                    <th>prix total</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * from pharmacie";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_medi = $row['id_medi'];
                                    $quantite = $row['quantite'];



                                    $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $id_medi = $table['id_medi'];
                                        $nom_medi = $table['nom_medi'];
                                        $ref_medi = $table['ref_medi'];
                                        $id_type_medi = $table['id_type_medi'];
                                        $prix_u_a = $table['prix_unitaire'];
                                        $date_medi = $table['date_medi'];
                                        $alert_prod = $table['alert_prod'];
                                        $date_fin = $table['date_fin'];
                                        $id_four = $table['id_four'];
                                    }

                                $sql = "SELECT DISTINCT * from type_medi where id_type_medi = '$id_type_medi'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                $type_medi= $table['nom'];
                                }
                                ?>

                                <tr>
                                    <td><a href="#"><?=$ref_medi?></a></td>
                                    <td><a href="#"><?=$nom_medi?></a></td>
                                    <td><a href="#"><?=$quantite?></a></td>
                                    <td><a href="#"><?=$type_medi?></a></td>
                                    <td><a href="#"><?=$date_medi?></a></td>
                                    <td><a href="#"><?=number_format($prix_u_a)?></a></td>
                                    <td><a href="#"><?=number_format($quantite*$prix_u_a)?></a></td>
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
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Stock Insuffisant',
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