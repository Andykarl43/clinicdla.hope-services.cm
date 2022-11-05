<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

// $query  = "SELECT id_personnel as total from personnel";
// $q = $conn->query($query);
// while($row = $q->fetch_assoc())
// {
//     $total = $row["total"];
// }
// $id_personnel = $total;

?>
<?php

$id_materiel = $_REQUEST['id'];

$query = "SELECT * from materiel where id_materiel='" . $id_materiel . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    // $id_materiel = $row['id_materiel'];
    // /*-------------------- DETAILS --------------------*/
    $ref_materiel = $row['ref_materiel'];
    $designation = $row['designation'];
    $quantite = $row['quantite'];
    $id_cat_materiel = $row['id_cat_materiel'];
    $prix_unitaire = $row['prix_unitaire'];
    $prix_total = $row['prix_total'];

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

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du matériel : <?= $ref_materiel ?> </h1>
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
                                            <a class="nav-link active" href="<?= $materiaux['option2_link'] ?>">
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
                                                $total = 0;

                                                $query = "SELECT distinct id_fournisseur,id_materiel  from fournisseur_materiel where id_materiel='$id_materiel' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    $total = $total + 1;
                                                }
                                                echo ' Fournisseur[' . $total . ']';

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-cubes"></i>
                                                Stock par chantier
                                            </a>
                                        </li>
                                        <!--                                     <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu1">
                                                                                    <i class="fas fa-user"></i>
                                                                                    Information RH
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu2">
                                                                                    <i class="fas fa-plus"></i>
                                                                                    Infos Paie
                                                                                </a>
                                                                            </li>
                                                                             <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu3">
                                                                                    <i class="fas fa-university"></i>
                                                                                    Congés
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu4">
                                                                                    <i class="fas fa-envelope"></i>
                                                                                     Credits
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu5">
                                                                                    <i class="fas fa-envelope"></i>
                                                                                     Sanctions
                                                                                </a>
                                                                            </li> -->
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
                                                                    <table class="table  table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>

                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">RÉFERENCE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_materiel"
                                                                                           value="<?php echo $ref_materiel ?>"
                                                                                           disabled="">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DESIGNATION:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="designation"
                                                                                           value="<?php echo $designation ?>"
                                                                                           disabled="">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">QUANTITÉ(S):</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="quantite"
                                                                                           value="<?= $quantite ?>"
                                                                                           disabled="">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">CATEGORIE MATÉRIAUX:</span>
                                                                                <div class="col">
                                                                                    <select name="id_cat_materiel"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled="">
                                                                                        <option value="<?= $id_cat_materiel ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from categorie_materiel where id_cat_materiel = '$id_cat_materiel'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'];
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">PRIX UNITAIRE:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="prix_unitaire"
                                                                                           value="<?= $prix_unitaire ?>"
                                                                                           disabled="">
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">PRIX TOTAL:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="prix_total"
                                                                                           value="<?= $prix_total ?>"
                                                                                           disabled="">
                                                                                    </button>
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

                                    <!--********************************************FOURNISSEUR************************************************* -->
                                    <div class="tab-pane container" id="menu1">


                                        <!-- <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant  les primes. </h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des matériaux par chantier.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_four_materiel.php?id_materiel=<?= $id_materiel ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Ajouter fournisseur
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
                                                                            <table class="table  table-hover table-condensed"
                                                                                   id="myTable">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Raison
                                                                                            Sociale</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Tel</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Contact</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Tel
                                                                                            contact</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $sql = "SELECT DISTINCT id_materiel,id_fournisseur from fournisseur_materiel where id_materiel = '$id_materiel'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_fournisseur = $table['id_fournisseur'];


                                                                                    $query = "SELECT * from fournisseur where open_close!='1'  and id_fournisseur = '$id_fournisseur' ";
                                                                                    $q = $db->query($query);
                                                                                    while ($row = $q->fetch()) {
                                                                                        $id = $row['id_fournisseur'];
                                                                                        $ref_four = $row['ref_four'];
                                                                                        $raison_social_four = $row['raison_social_four'];
                                                                                        $tel_four = $row['tel_four'];
                                                                                        $pers_contact_four = $row['pers_contact_four'];
                                                                                        $tel_contact_four = $row['tel_contact_four'];


                                                                                        ?>

                                                                                        <tr>
                                                                                            <input name="id"
                                                                                                   type="hidden"
                                                                                                   value="<?php //echo $id;
                                                                                                   ?>"/>


                                                                                            <td align="center"> <?php echo $ref_four; ?>  </td>
                                                                                            <td align="center">  <?php echo $raison_social_four; ?> </td>
                                                                                            <td align="center">  <?php echo $tel_four; ?> </td>
                                                                                            <td align="center">  <?php echo $pers_contact_four ?>  </td>
                                                                                            <td align="center">  <?php echo $tel_contact_four; ?>  </td>

                                                                                            <td align="center"
                                                                                                style="width: 18%"><a
                                                                                                        class="btn btn-primary"
                                                                                                        href="details_fournisseur.php?id=<?php echo $id; ?>"
                                                                                                        title="view"
                                                                                                        style="background-color: transparent">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                </a>


                                                                                                <!--                          <a class="btn btn-warning" href="modifier_fournisseur.php?id=<?//=$id;
                                                                                                ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_fournisseur<?//= $id;
                                                                                                ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  -->


                                                                                                <!--  <?php
                                                                                                //include("verifier_delete_client.php");
                                                                                                ?> -->


                                                                                            </td>


                                                                                        </tr>

                                                                                    <?php }
                                                                                } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Raison
                                                                                            Sociale</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Tel</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Contact</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Tel
                                                                                            contact</p></th>
                                                                                    <th style="width: 18%"><p
                                                                                                align="center"
                                                                                                style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tfoot>
                                                                            </table>

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

                                    <!--********************************************INFO PAIE************************************************* -->
                                    <div class="tab-pane container" id="menu2">


                                        <!-- <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant  les primes. </h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des matériaux par chantier.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_materiel_chantier.php?id_materiel=<?= $id_materiel ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Ajouter matériel
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            Chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantité(s)</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">date de
                                                                                            transfert</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from magasin_chantier where id_materiel='$id_materiel'";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_chantier'];
                                                                                    // $ref_materiel = $row['ref_materiel'];
                                                                                    $date_mag_chantier = $row['date_mag_chantier'];
                                                                                    $quantite_chantier = $row['quantite_chantier'];
                                                                                    // $id_cat_materiel = $row['id_cat_materiel'];
                                                                                    $prix_unitaire = $row['prix_unitaire_mag_chantier'];
                                                                                    $prix_total = $row['prix_total_mag_chantier'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php echo $id; ?>"/>

                                                                                        <td align="center"> <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id' and open_close!='1'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_chantier'];
                                                                                            }

                                                                                            ?>  </td>


                                                                                        <td align="center"> <?php echo $quantite_chantier; ?>   </td>
                                                                                        <td align="center"> <?php echo $date_mag_chantier; ?>   </td>
                                                                                        <!-- <td align="center">
                                                         <?php
                                                                                        // $sql = "SELECT DISTINCT * from categorie_materiel where id_cat_materiel = '$id_cat_materiel'";

                                                                                        //        $stmt = $db->prepare($sql);
                                                                                        //        $stmt->execute();

                                                                                        //        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                        //        foreach($tables as $table)
                                                                                        //        {
                                                                                        //            echo $table['nom'];
                                                                                        //        }

                                                                                        ?>
                                                               </td> -->

                                                                                        <td align="center"> <?php echo number_format($prix_unitaire); ?> </td>
                                                                                        <td align="center"> <?php echonumber_format($prix_total); ?> </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%">
                                                                                            <!--  <a class="btn btn-primary"  href="details_materiel.php?id=<?php echo $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        
              
                         <a class="btn btn-warning" href="modifier_materiel.php?id=<? //=$id;
                                                                                            ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_materiel<? //= $id;
                                                                                            ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->
                                                                                            <a href="ajouter_transfert_chantier.php?id_materiel=<?= $id_materiel ?>&id_chantier=<?= $id ?>"
                                                                                               style=" width:80px;"
                                                                                               class="btn btn-primary">Ajouter</a>


                                                                                            <!--  <?php
                                                                                            //include("verifier_delete_materiel.php");
                                                                                            ?> -->


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            Chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantité(s)</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">date de
                                                                                            transfert</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--******************************************ETAT PROFESSIONNEL************************************************ -->


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