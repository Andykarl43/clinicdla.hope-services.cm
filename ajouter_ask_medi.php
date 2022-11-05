<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

$id = $_REQUEST['id_ask_medi'];

$query  = "SELECT * from demande_medicament where id_ask_medi='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $id_ask_medi = $row['id_ask_medi'];
    /*-------------------- ETAT CIVILE --------------------*/
    $nom_salle=$row['nom_salle'];
    $date_debut=$row['date_debut'];
    $date_valide=$row['date_valide'];
    $heure=$row['heure'];
    $id_perso=$row['id_perso'];
    $responsable=$row['responsable'];
    $today=date("Y-m-d");

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier la  Demande de médicament</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="update_demande_medi.php" method="POST">
                                <div class="card-header">
                                    <!--  <ul class="nav nav-pills">
                                     <li class="nav-item">
                                        <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                     </li>
                                 </ul> -->
                                </div>
                                <div class="card-body" >
                                    <fieldset>
                                        <div class="table-responsive">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Auteur</label>
                                                        <input type="hidden" name="id_ask_medi" value="<?=$id_ask_medi?>">
                                                        <select class="form-control" name="id_perso" readonly="">
                                                            <option value="<?=$id_perso?>" selected="">
                                                                <?=$responsable?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Date de demande</label>
                                                        <div>
                                                            <input type="date" class="form-control " name="date_debut" value="<?=$today?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr/>
                                                </div>
                                            </div>


                                            <div class="card mb-4" style="background-color: silver">
                                                <div class="card-header">
                                                    <i class="fas fa-scroll"></i>
                                                    <b>Liste des médicaments </b>
                                                </div>

                                            </div>

                                            <table  style="background-color: ivory" class="table table-border table-striped custom-table mb-0" id="dataTable">
                                                <thead>
                                                <tr>
                                                    <th>Code Produit</th>
                                                    <th>Nom</th>
                                                    <th>Categorie</th>
                                                    <th>prix unitaire</th>
                                                    <th>Quantités</th>
                                                    <!--                                                    <th>Date Péremption</th>-->
                                                    <!--                                                    <th>Fournisseur</th>-->
                                                    <th class="text-right">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i=0;

                                                $query = "SELECT * from magasin where qt_com!=0";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {
                                                    $id_mag = $row['id_mag'];
                                                    $id_medi = $row['id_medi'];
                                                    $qt_com = $row['qt_com'];
                                                    $prix=$row['prix_ht'];


                                                    $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi'";

                                                    $stmt = $db->prepare($sql);
                                                    $stmt->execute();

                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    foreach ($tables as $table) {
                                                        $ref_medi = $table['ref_medi'];
                                                        $nom_medi= $table['nom_medi'];
                                                        //$prix= $table['prix_unitaire'];
                                                        $id_type_medi= $table['id_type_medi'];
                                                        $prix= $table['prix_unitaire'];

                                                        $sql = "SELECT DISTINCT * from type_medi where id_type_medi = '$id_type_medi'";

                                                        $stmt = $db->prepare($sql);
                                                        $stmt->execute();

                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($tables as $table) {
                                                            $type_medi= $table['nom'];
                                                        }
                                                    }

                                                    if(empty($id_type_medi)){
                                                        $type_medi='N/A';
                                                    }
                                                    if(empty($id_medi)){
                                                        $nom_medi='N/A';
                                                    }

                                                    ?>


                                                    <tr>
                                                        <td><a href="#"><?php echo $ref_medi; ?></a></td>
                                                        <td><a href="#"><i class="fas fa-cubes" aria-hidden="true"></i> <?=$nom_medi?></a></td>
                                                        <td><a href="#"><?=$type_medi?> </a></td>
                                                        <td><a href="#"><?php echo number_format($prix) ?> </a></td>
                                                        <td><input type="number"  style=" width: 50px; height: 25px" name="<?php echo 'quantite['.$i.']';?>" value="<?=$qt_com?>" min="0" max="<?=$qt_com?>" /></td>
                                                        <td align="center">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <input type="checkbox"  style=" width: 25px; height: 25px" name="<?php echo 'id_medi['.$i.']';?>" value="<?=$id_medi?>"   />

                                                            </div>



                                                        </td>

                                                    </tr>

                                                    <?php $i++; }?>

                                                </tbody>
                                            </table>

                                        </div>
                                    </fieldset>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="submit_etat_civil" class="btn btn-primary" >Enregistrer</button>
                                            <!--                                            <a href="nouvelle_demande_produit_fin.php" style=" width:150px;" class="btn btn-primary" >Enregistrer</a>-->
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">

                                        </div>
                                    </div>
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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="" >

                                                </form>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <?php
}
    ?>

    <!--//Footer-->
<?php
include('foot.php');
?>