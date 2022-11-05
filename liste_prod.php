<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des Produits</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                         <?php
                        if( $lvl != 11  ){
                        ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouveau_prod.php">
                                        <i class="fas fa-cubes"></i>
                                        Nouveau_produit
                                    </a>
                                </li>
                            </ul>
                        </b>
                         <?php
                        }
                        ?>


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
                                    <th>Categorie</th>
                                    <th>prix unitaire achat</th>
                                    <th>prix unitaire vente</th>
                                    <th>Date Péremption</th>
                                    <th>Fournisseur</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = "SELECT * from medicament where open_close!=1";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                $id_medi = $row['id_medi'];
                                $nom_medi = $row['nom_medi'];
                                $ref_medi = $row['ref_medi'];
                                $id_type_medi = $row['id_type_medi'];
                                $prix_u_a = $row['prix_unitaire'];
                                $prix_u_v = $row['prix_u_v'];
                                $date_medi = $row['date_medi'];
                                $alert_prod = $row['alert_prod'];
                                $date_fin = $row['date_fin'];
                                $id_four = $row['id_four'];


                                $sql = "SELECT DISTINCT * from type_medi where id_type_medi = '$id_type_medi'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $type_medi= $table['nom'];
                                }



                                $sql = "SELECT DISTINCT * from fournisseur where id_four = '$id_four'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $nom_four= $table['raison_social_four'];
                                }


                                if(empty($id_type_medi)){
                                    $type_medi='N/A';
                                }
                                if(empty($id_four)){
                                    $nom_four='N/A';
                                }

                                ?>

                                <tr>
                                    <td><a href="#"><?=$ref_medi?></a></td>
                                    <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                         class="rounded-circle m-r-5" alt=""><?=$nom_medi?></a></td>
                                    <td><a href="#"><?=$type_medi?></a></td>
                                    <td><a href="#"><?=number_format($prix_u_a)?></a></td>
                                    <td><a href="#"><?=number_format($prix_u_v)?></a></td>
                                    <td><a href="#"><?=$date_fin?></a></td>
                                    <td><a href="#"><?=$nom_four?></a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                             <?php
                                             if( $lvl != 11 and $lvl !=10  ){
                                                  ?>
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="modifier_prod.php?id=<?=$id_medi?>"><i
                                                            class="fas fa-pen"></i> Edit</a>
                                                <a class="dropdown-item" href="delete_prod_prod.php?id=<?=$id_medi?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                    Delete</a>
                                            </div>
                                             <?php
                                            }
                                            ?>
                                        </div>
                                    </td>

                                </tr>
                            <?php
                                }
                                ?>
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