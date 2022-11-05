<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
?>
<?php
$id = $_REQUEST['id'];

$query = "SELECT * from engin where id_engin='" . $id . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_engin = $row['id_engin'];
    // /*-------------------- DETAILS --------------------*/
    $code = $row['code'];
    $id_fournisseur = $row['id_cat_fournisseur'];
    $id_cat_engin = $row['id_cat_engin'];
    $id_marque_engin = $row['id_marque_engin'];
    $serie = $row['serie'];
    $matricule = $row['matricule'];
    $number_chassis = $row['number_chassis'];
    $tarif_location = $row['tarif_location'];
    $cout_horaire = $row['cout_horaire'];
    $id_personnel = $row['id_personnel'];
    $id_chantier = $row['id_chantier'];
    $date_arrived = $row['date_arrived'];
    $date_begin = $row['date_begin'];
    $conso_moy_estime = $row['conso_moy_estime'];

    // /*-------------------- INFOS RH --------------------*/

    // $cat_salariale=$row['cat_salariale'];
    // $secteur=$row['secteur'];
    // $salle=$row['salle'];
    // $poste=$row['poste'];
    // $date_embauche=$row['date_embauche'];
    // $type_contrat=$row['type_contrat'];
    // $statut=$row['statut'];
    // $sal_base=$row['sal_base'];
    // $sal_horaire=$row['sal_horaire'];
    // $matricule=$row['matricule'];
    // $number_cnps=$row['number_cnps'];
    // $nom_banque=$row['nom_banque'];
    // $number_card_bancaire=$row['number_card_bancaire'];
    // $day_anciennete=$row['day_anciennete'];
    // $month_anciennete=$row['month_anciennete'];
    // $year_anciennete=$row['year_anciennete'];
    // $garant = $row['garant'];
    // $parrain_interne = $row['parrain_interne'];
    // $parrain_externe = $row['parrain_externe'];


    // /*-------------------- INFOS PAIE --------------------*/

    // $prime=$row['prime'];


    ?>

    <!--Content-->
<te
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du Engin : <?= $code ?></h1>
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
                                <b>
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $engin['option2_link'] ?>">
                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-cubes"></i>
                                                Détails<!-- <?= $id_personnel ?> -->
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-users"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_fact_location) as total from fact_engin where id_engin='$id_engin' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Facture de location[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--********************************************DETAILS************************************************* -->
                                    <!-- Etat Civile-->
                                    <div class="tab-pane container active" id="home">
                                        <!-- infos civile-->

                                        <!-- <h5><b><u>NB:</u></b> Aucune information ne peut être modifier.</h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="#" method="POST">
                                                        <div class="card-header">
                                                            <!--  <i class="fas fa-scroll"></i>
                                     <b>L'ensemble des salles de campresj.</b>
                                                                  -->

                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table border="0"
                                                                           class="table  table-hover table-condensed"
                                                                           width="100%" cellspacing="0" id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font">CODE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="code"
                                                                                           value="<?php echo $code ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font"> FOURNISSEUR:</span>

                                                                                <div class="col">
                                                                                    <select name="id_cat_fournisseur"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_fournisseur ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from fournisseur where id_fournisseur = '$id_fournisseur'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_four'];
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>

                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font">TYPE D'ENGIN:</span>

                                                                                <div class="col">
                                                                                    <select name="id_cat_engin" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_cat_engin ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from categorie_engin where id_cat_engin = '$id_cat_engin'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">MARQUE D'ENGIN:</span>
                                                                                <div class="col">
                                                                                    <select name="id_marque_engin"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_marque_engin ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from marque_engin where id_marque_engin = '$id_marque_engin'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">SÉRIE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="serie"
                                                                                           value="<?php echo $serie ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">MATRICULE :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="matricule"
                                                                                           value="<?php echo $matricule ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° DE CHASSIS:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                        " name="number_chassis"
                                                                                           value="<?php echo $number_chassis ?>"
                                                                                           disabled>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">TARIF DE LOCATION:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="tarif_location"
                                                                                           value="<?php echo $tarif_location ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">COÛT HORAIRE</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="cout_horaire"
                                                                                           value="<?php echo $cout_horaire ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">CONDUCTEUR:</span>

                                                                                <div class="col">
                                                                                    <select name="id_personnel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_personnel ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">CHANTIER:</span>

                                                                                <div class="col">
                                                                                    <select name="id_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_chantier ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_chantier'];
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'ARRIVÉE:</span>
                                                                                <div class="col">
                                                                                    <?php echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . date("d-m-Y", strtotime($date_arrived)) . '"disabled>';
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DEPART:</span>
                                                                                <div class="col">

                                                                                    <?php

                                                                                    echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . date("d-m-Y", strtotime($date_begin)) . '"disabled>';
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">CONSOMMATION MOYENNE ESTIMÉE</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="conso_moy_estime"
                                                                                           value="<?php echo $conso_moy_estime ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************CLIENT************************************************* -->
                                    <div class="tab-pane container" id="menu1">
                                        <!-- infos civile-->

                                        <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->


                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble de facture de location.</b>
                                                        <!--                                                             <b>
                                
                                
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= $client['option1_link'] ?>?id=<?php // echo $id
                                                        ?>">
                                            <i class="fas fa-user"></i>
                                            Nouvelle Facture
                                        </a>
                                    </li>                                    
                                </ul>
                            </b> -->
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="well bs-component">
                                                            <form class="form-horizontal">
                                                                <fieldset>
                                                                    <div class="table-responsive">
                                                                        <form method="post" action="">
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">N°
                                                                                            Facture</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Engin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Montant</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Chantiers</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Motif</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>

                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php
                                                                                $sql = "SELECT DISTINCT * from fact_engin where id_engin = '$id_engin'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_fact_location = $table['id_fact_location'];


                                                                                    $query = "SELECT * from fact_location where open_close!='1' and id_fact_location = '$id_fact_location' ";
                                                                                    $q = $db->query($query);
                                                                                    while ($row = $q->fetch()) {
                                                                                        $id = $row['id_fact_location'];
                                                                                        $number_fact = $row['number_fact'];
                                                                                        $id_engin = $row['id_engin'];
                                                                                        $montant = $row['montant'];
                                                                                        $id_chantier = $row['id_chantier'];
                                                                                        $motif = $row['motif'];


                                                                                        ?>

                                                                                        <tr>
                                                                                            <input name="id"
                                                                                                   type="hidden"
                                                                                                   value="<?php //echo $row['id'];
                                                                                                   ?>"/>

                                                                                            <td align="center"> <?php echo $number_fact; ?>   </td>
                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from engin where id_engin = '$id_engin'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['number_chassis'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>

                                                                                            <td align="center"> <?php echo $montant; ?>  </td>
                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom_chantier'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>
                                                                                            <td align="center"> <?php echo $motif; ?>   </td>

                                                                                            <td align="center"
                                                                                                style="width: 18%"><a
                                                                                                        class="btn btn-primary"
                                                                                                        href="details_regle_fournissseur.php?id=<?php echo $id; ?>"
                                                                                                        title="view"
                                                                                                        style="background-color: transparent">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                </a>


                                                                                                <!--  <a class="btn btn-warning" href="modifier_regle_fournisseur.php?id=<?//=$id;
                                                                                                ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_fact_location<?//= $id;
                                                                                                ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  
                    -->


                                                                                                <!--  <?php
                                                                                                //include("verifier_delete_fact_location.php");
                                                                                                ?> -->


                                                                                            </td>


                                                                                        </tr>

                                                                                    <?php }
                                                                                } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">N°
                                                                                            Facture</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Engin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Montant</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Chantiers</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Motif</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>

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

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--****************************************** ............************************************************ -->

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
    <?php
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>