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

$id_eq = $_REQUEST['id'];

$query = "SELECT * from equipement where id_eq='" . $id_eq . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    $ref_eq = $row['ref_eq'];
    $design_eq = $row['design_eq'];
    $quant_eq = $row['quant_eq'];
    $id_cat_eq = $row['id_cat_eq'];
    $prix_unit_eq = $row['prix_unit_eq'];
    $prix_t_eq = $row['prix_t_eq'];
    $alert_eq = $row['alert_eq'];

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails de l'équipement : <?= $ref_eq ?> </h1>
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
                                            <a class="nav-link active" href="<?= $equipement['option2_link'] ?>">
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

                                                $query = "SELECT distinct id_fournisseur,id_eq  from fournisseur_equipement where id_eq='$id_eq' ";
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
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                                <i class="fas fa-random"></i>
                                                histprique des transactions
                                            </a>
                                        </li>
                                        <!--
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
                                                                                background: transparent;" name="ref_eq"
                                                                                           value="<?php echo $ref_eq ?>"
                                                                                           disabled="">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DESIGNATION:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="design_eq"
                                                                                           value="<?php echo $design_eq ?>"
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
                                                                                           name="quant_eq"
                                                                                           value="<?= $quant_eq ?>"
                                                                                           disabled="">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">CATEGORIE MATÉRIAUX:</span>
                                                                                <div class="col">
                                                                                    <select name="id_cat_eq" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled="">
                                                                                        <option value="<?= $id_cat_eq ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from categorie_equipement where id_cat_eq = '$id_cat_eq'";

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
                                                                                " name="prix_unit_eq"
                                                                                           value="<?= $prix_unit_eq ?>"
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
                                                                                " name="prix_t_eq"
                                                                                           value="<?= $prix_t_eq ?>"
                                                                                           disabled="">
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Stock d'alert:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="alert_eq"
                                                                                           value="<?= $alert_eq ?>"
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
                                                        <b>L'ensemble des équipements par chantier.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_four_equipement.php?id_eq=<?= $id_eq ?>">
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

                                                                                $sql = "SELECT DISTINCT id_eq,id_fournisseur from fournisseur_equipement where id_eq = '$id_eq'";

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
                                                        <b>L'ensemble des équipements par chantier.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_materiel_chantier_eq.php?id_eq=<?= $id_eq ?>">
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

                                                                                $query = "SELECT * from magasin_chantier_eq where id_eq='$id_eq'";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_chantier'];
                                                                                    // $ref_materiel = $row['ref_materiel'];
                                                                                    $date_mag_chantier_eq = $row['date_mag_chantier_eq'];
                                                                                    $quant_chantier = $row['quant_chantier'];
                                                                                    // $id_cat_materiel = $row['id_cat_materiel'];
                                                                                    $prix_unitaire = $row['prix_unit_mag_chantier'];
                                                                                    $prix_total = $row['prix_t_mag_chantier'];


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


                                                                                        <td align="center"> <?php echo $quant_chantier; ?>   </td>
                                                                                        <td align="center"> <?php echo $date_mag_chantier_eq; ?>   </td>
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
                                                                                        <td align="center"> <?php echo number_format($prix_total); ?> </td>

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
                                                                                            <a href="ajouter_transfert_chantier_eq.php?id_eq=<?= $id_eq ?>&id_chantier=<?= $id ?>"
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


                                    <!--********************************************FOURNISSEUR************************************************* -->
                                    <div class="tab-pane container" id="menu3">


                                        <!-- <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant  les primes. </h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des transactions.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <!-- <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="ajouter_four_equipement.php?id_eq=<?= $id_eq ?>">
                                            <i class="fas fa-cubes"></i>
                                            Ajouter fournisseur 
                                        </a>
                                    </li>                                    
                                </ul> -->
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
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">Zone de
                                                                                            départ</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Zone
                                                                                            d'arrivée</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Equipements</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantité Entrée(s)</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Quantité
                                                                                            Sortie(s)</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php


                                                                                $query = "SELECT * from mouvement_eq where id_eq = '$id_eq'";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_move_eq'];
                                                                                    $id_depart = $row['id_depart'];
                                                                                    $id_arrive = $row['id_arrive'];
                                                                                    $id_eq = $row['id_eq'];
                                                                                    $quant_in = $row['quant_in'];
                                                                                    $quant_out = $row['quant_out'];
                                                                                    $prix_unit_move_eq = $row['prix_unit_move_eq'];
                                                                                    $prix_t_move_eq = $row['prix_t_move_eq'];
                                                                                    $date_move_eq = $row['date_move_eq'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $row['id'];
                                                                                               ?>"/>

                                                                                        <td align="center"> <?php
                                                                                            if ($id_depart == 0) {
                                                                                                echo "magasin centrale";
                                                                                            } else {
                                                                                                $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_depart'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom_chantier'];
                                                                                                }
                                                                                            }

                                                                                            ?>  </td>


                                                                                        <td align="center">
                                                                                            <?php
                                                                                            if ($id_arrive == 0) {
                                                                                                echo "magasin centrale";
                                                                                            } else {
                                                                                                $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_arrive'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom_chantier'];
                                                                                                }
                                                                                            }

                                                                                            ?>  </td>
                                                                                        <td align="center"> <?php
                                                                                            $sql = "SELECT DISTINCT * from equipement where id_eq = '$id_eq'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['design_eq'];
                                                                                            }

                                                                                            ?>  </td>
                                                                                        <td align="center">
                                                                                            <?php echo $quant_in ?>
                                                                                        </td>

                                                                                        <td align="center"> <?php echo $quant_out; ?>  </td>
                                                                                        <td align="center"> <?php echo number_format($prix_unit_move_eq); ?>  </td>
                                                                                        <td align="center"> <?php echo number_format($prix_t_move_eq); ?>  </td>
                                                                                        <td align="center"> <?php echo $date_move_eq; ?>  </td>

                                                                                        <!--    <td align="center" style="width: 18%">              <a class="btn btn-primary"  href="details_equipement.php?id=<?php //echo $id;
                                                                                        ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        <a class="btn btn-primary"  href="transfert_chantier_mag_eq.php?id=<?php //echo $id;
                                                                                        ?>&id_chantier=<?php //echo $id_chantier;
                                                                                        ?>&idm=<?php //echo $idm;
                                                                                        ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: purple" class="fas fa-random"></i> 
                            </a>
              
                         <a class="btn btn-warning" href="modifier_materiel.php?id=<?//=$id;
                                                                                        ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_materiel<?//= $id;
                                                                                        ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  
                   
            
                                                
                     <?php
                                                                                        //include("verifier_delete_materiel.php");
                                                                                        ?>
                                    
                            
                        
                 </td>  -->


                                                                                    </tr>

                                                                                <?php }
                                                                                //  }
                                                                                ?>
                                                                                </tbody>


                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">Zone de
                                                                                            départ</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Zone
                                                                                            d'arrivée</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Equipements</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantité Entrée(s)</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Quantité
                                                                                            Sortie(s)</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date</p>
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