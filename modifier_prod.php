<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

$id_medi = $_REQUEST['id'];

$query = "SELECT * from medicament where id_medi='" . $id_medi . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_medi = $row['id_medi'];

    /*-------------------- DETAILS MEDICAMENTS --------------------*/
    $nom_medi = $row['nom_medi'];
    $ref_medi = $row['ref_medi'];
    $id_type_medi = $row['id_type_medi'];
    $prix_u_a = $row['prix_unitaire'];
    $prix_u_v = $row['prix_u_v'];
    $date_medi = $row['date_medi'];
    $alert_prod = $row['alert_prod'];
    $date_fin = $row['date_fin'];
    $id_four = $row['id_four'];

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier Produit: <?=$nom_medi?></h1>
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
                            <div class="card-header">

                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Etat Civile-->
                                    <!-- infos civile-->


                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <form action="update_prod.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="nom_medi" value="<?=$nom_medi?>"
                                                                   required="required">
                                                            <input  type="hidden" name="id_medi" value="<?=$id_medi?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Catégorie</label>
                                                            <select class="form-control" name="id_type_medi">

                                                                    <?php

                                                                    $iResult = $db->query("SELECT * FROM type_medi where id_type_medi='$id_type_medi' ");

                                                                    while ($data = $iResult->fetch()) {

                                                                        $i = $data['id_type_medi'];
                                                                        echo '<option value ="' . $i . '">';
                                                                        echo $data['nom'];
                                                                        echo '</option>';

                                                                    }

                                                                    ?>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM type_medi ");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_type_medi'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    echo $data['nom'];
                                                                    echo '</option>';

                                                                }

                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prix Unitaire à l'achat<span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" type="number" name="prix_u_a" value="<?=$prix_u_a?>"
                                                                   required="Prix unitaire à l'achat">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prix Unitaire à la vente<span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" type="number" name="prix_u_v" value="<?=$prix_u_v?>"
                                                                   required="Prix unitaire à la vente">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <div>
                                                                <input type="date" class="form-control" value="<?=$date_medi?>"
                                                                       name="date_medi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Stock Alert</label>
                                                            <div>
                                                                <input type="number" class="form-control" value="<?=$alert_prod?>"
                                                                       name="alert_prod">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date Péremption</label>
                                                            <div>
                                                                <input type="date" class="form-control" value="<?=$date_fin?>"
                                                                       name="date_fin">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Fournisseur</label>
                                                            <select class="form-control" name="id_four">

                                                                    <?php

                                                                    $iResult = $db->query("SELECT * FROM fournisseur where id_four='$id_four' ");

                                                                    while ($data = $iResult->fetch()) {

                                                                        $i = $data['id_four'];
                                                                        echo '<option value ="' . $i . '">';
                                                                        echo $data['raison_social_four'];
                                                                        echo '</option>';

                                                                    }

                                                                    ?>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM fournisseur ");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_four'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    echo $data['raison_social_four'];
                                                                    echo '</option>';

                                                                }

                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="liste_prod.php" class="btn btn-danger submit-btn" >Annuler</a>
<!--                                                    <a  style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>-->
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
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


    <!--    Modal pour ajouter Categorie Contrat-->
<?php
}
?>

    <!--//Footer-->
<?php
include('foot.php');
?>