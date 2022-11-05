<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
$id_etape = $_REQUEST['id'];
$idc = $_REQUEST['idc'];

$query = "SELECT * from etape where id_etape='" . $id_etape . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_etape = $row['id_etape'];
    // /*-------------------- DETAILS --------------------*/
    $id_chantier = $row['id_chantier'];
    $objet_chantier = $row['objet_chantier'];
    $date_begin_chantier = $row['date_begin_chantier'];
    $montant_ttc_chantier = $row['montant_ttc_chantier'];

    // /*------------------- ETAPE----------------------*/
    $nom_etape = $row['nom_etape'];
    $cout_etape = $row['cout_etape'];
    $date_debut_etape = $row['date_debut_etape'];
    $date_fin_etape = $row['date_fin_etape'];


    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des matériaux du chantier: <?php
                    $sql3 = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                    $stmt3 = $db->prepare($sql3);
                    $stmt3->execute();

                    $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($tables3 as $tables) {
                        $nom_chantier = $tables['nom_chantier'];
                        echo $nom_chantier;
                    }
                    ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form action="#" method="post">
                                <div class="card-header">
                                    <b>

                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills" style="float: right;">
                                            <li class="nav-item">

                                            </li>
                                        </ul>
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active"
                                                   href="details_etape.php?id=<?= $id_etape ?>&idc=<?= $idc ?>&idm=0">
                                                    &idm=0
                                                    Retour
                                                </a>
                                            </li>
                                        </ul>
                                    </b>
                                </div>
                                <div class="card-body">
                                    <div class="well bs-component">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <div class="table-responsive">
                                                    <form method="post" action="">
                                                        <table class="table table-bordered table-hover" id="dataTable"
                                                               width="100%" cellspacing="0">
                                                            <thead>
                                                            <tr class="bg-primary">
                                                                <!-- <th><p align="center">Matricule </p></th> -->
                                                                <th><p align="center" style="color: white">
                                                                        Réferences</p></th>
                                                                <th><p align="center" style="color: white">
                                                                        Désignations</p></th>
                                                                <th><p align="center" style="color: white">Quantites</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Catégorie de
                                                                        matériaux</p></th>
                                                                <th><p align="center" style="color: white">Prix
                                                                        unitaire</p></th>
                                                                <th><p align="center" style="color: white">Prix
                                                                        total</p></th>
                                                                <th><p align="center" style="color: white">Options</p>
                                                                </td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $sql = "SELECT DISTINCT * from magasin_chantier where id_chantier = '$id_chantier'";

                                                            $stmt = $db->prepare($sql);
                                                            $stmt->execute();

                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach ($tables as $table) {
                                                                $id_materiel = $table['id_materiel'];
                                                                $quantite_chantier = $table['quantite_chantier'];
                                                                $prix_unitaire_mag_chantier = $table['prix_unitaire_mag_chantier'];
                                                                $prix_total_mag_chantier = $table['prix_total_mag_chantier'];


                                                                $query = "SELECT * from materiel where id_materiel = '$id_materiel' ";
                                                                $q = $db->query($query);
                                                                while ($row = $q->fetch()) {
                                                                    $id = $row['id_materiel'];
                                                                    $ref_materiel = $row['ref_materiel'];
                                                                    $designation = $row['designation'];
                                                                    $quantite = $row['quantite'];
                                                                    $id_cat_materiel = $row['id_cat_materiel'];
                                                                    $prix_unitaire = $row['prix_unitaire'];
                                                                    $prix_total = $row['prix_total'];


                                                                    ?>

                                                                    <tr>
                                                                        <input name="id" type="hidden"
                                                                               value="<?php //echo $row['id'];
                                                                               ?>"/>

                                                                        <td align="center"> <?php echo $ref_materiel; ?>   </td>
                                                                        <td align="center"> <?php echo $designation; ?>   </td>
                                                                        <td align="center"> <?php echo $quantite_chantier; ?>   </td>
                                                                        <td align="center">
                                                                            <?php
                                                                            $sql = "SELECT DISTINCT * from categorie_materiel where id_cat_materiel = '$id_cat_materiel'";

                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();

                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                            foreach ($tables as $table) {
                                                                                echo $table['nom'];
                                                                            }

                                                                            ?>
                                                                        </td>

                                                                        <td align="center"> <?php echo $prix_unitaire_mag_chantier; ?>  </td>
                                                                        <td align="center"> <?php echo $prix_total_mag_chantier; ?>  </td>

                                                                        <td align="center" style="width: 18%"><a
                                                                                    href="ajouter_transfert_etape.php?id_mat=<?= $id_materiel ?>&id_et=<?= $id_etape ?>&idc=<?= $idc ?>"
                                                                                    style=" width:120px;"
                                                                                    class="btn btn-primary">Ajouter

                                                                            </a>


                                                                            <!--    <a class="btn btn-warning" href="modifier_materiel.php?id=<?//=$id;
                                                                            ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_materiel<?//= $id;
                                                                            ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->


                                                                            <!--  <?php
                                                                            //include("verifier_delete_materiel.php");
                                                                            ?> -->


                                                                        </td>


                                                                    </tr>

                                                                <?php }
                                                            } ?>
                                                            </tbody>


                                                            <tfoot>
                                                            <tr class="bg-primary">
                                                                <!-- <th><p align="center">Matricule </p></th> -->
                                                                <th><p align="center" style="color: white">
                                                                        Réferences</p></th>
                                                                <th><p align="center" style="color: white">
                                                                        Désignations</p></th>
                                                                <th><p align="center" style="color: white">Quantites</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Catégorie de
                                                                        matériaux</p></th>
                                                                <th><p align="center" style="color: white">Prix
                                                                        unitaire</p></th>
                                                                <th><p align="center" style="color: white">Prix
                                                                        total</p></th>
                                                                <th><p align="center" style="color: white">Options</p>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody></tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <?php
}
?>
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