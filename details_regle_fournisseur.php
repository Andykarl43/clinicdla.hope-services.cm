<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_regle_four = $_REQUEST['id'];

$query = "SELECT * from regle_fournisseur where id_regle_four='" . $id_regle_four . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_regle_four = $row['id_regle_four'];
    /*-------------------- ETAT CIVILE --------------------*/
    $id_fournisseur = $row['id_fournisseur'];
    $id_card_bank = $row['id_card_bank'];
    $date_transaction = $row['date_transaction'];
    $id_choix = $row['id_choix'];
    $type = $row['type'];
    $date_echeance = $row['date_echeance'];
    $montant = $row['montant'];
    $avance = $row['avance'];
    $id_mode_paiement = $row['id_mode_paiement'];
    $reste = $row['reste'];
    $cheque = $row['cheque'];

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du Règlement fournisseur : <?php
                    $sql = "SELECT DISTINCT * from fournisseur where id_fournisseur = '$id_fournisseur'";

                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($tables as $table) {
                        echo $table['raison_social_four'];
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
                            <div class="card-header">
                                <b>
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                               href="<?= $reglement_fournisseur['option2_link'] ?>">
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
                                        <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-users"></i>
                    <?php

                                        // $query = "SELECT distinct count(id_fournisseur) as total from regle_ajouter_fournisseur where id_regle_four='$id_regle_four' ";
                                        // $q = $db->query($query);
                                        // while($row = $q->fetch())
                                        // {

                                        //     echo ' Règlement fournisseur['.$row['total'].']';
                                        // }

                                        ?>
                                             
                                        </a>
                                    </li>       -->
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
                                                                            <td>
                                                                                <span class="help-block small-font">FOURNISSEUR:</span>
                                                                                <div class="col">
                                                                                    <select name="id_fournisseur"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" readonly>
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
                                                                            <td>
                                                                                <?php


                                                                                if ($type == 'A') {
                                                                                    $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_choix'";

                                                                                    $stmt = $db->prepare($sql);
                                                                                    $stmt->execute();

                                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                    foreach ($tables as $table) {
                                                                                        echo ' <span class="help-block small-font" >Appel d\'offre:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . $table['objet'] . '"  readonly>
                                                                            </div>';
                                                                                    }


                                                                                } elseif ($type == 'M') {
                                                                                    $sql = "SELECT DISTINCT * from marche where id_marche = '$id_choix'";

                                                                                    $stmt = $db->prepare($sql);
                                                                                    $stmt->execute();

                                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                    foreach ($tables as $table) {
                                                                                        echo ' <span class="help-block small-font" >Marché:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . $table['objet_marche'] . '"  readonly>
                                                                            </div>';
                                                                                    }
                                                                                } elseif ($type == 'C') {
                                                                                    $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_choix'";

                                                                                    $stmt = $db->prepare($sql);
                                                                                    $stmt->execute();

                                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                    foreach ($tables as $table) {
                                                                                        echo ' <span class="help-block small-font" >Chantier:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . $table['nom_chantier'] . '"  readonly>
                                                                            </div>';
                                                                                    }

                                                                                } else {

                                                                                    echo ' <span class="help-block small-font" >aucun choix:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="N/A"  readonly>
                                                                            </div>';
                                                                                }


                                                                                ?>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE TRANSACTION:</span>
                                                                                <div class="col">
                                                                                    <?php

                                                                                    echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . date("d-m-Y", strtotime($date_transaction)) . '"readonly>';
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'ÉCHEANCE :</span>
                                                                                <div class="col">
                                                                                    <?php

                                                                                    echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . date("d-m-Y", strtotime($date_echeance)) . '"readonly>';
                                                                                    ?>
                                                                                </div>

                                                                            </td>

                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant"
                                                                                           value="<?php echo $montant ?>"
                                                                                           readonly>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MODE DE PAIEMENT:</span>

                                                                                <div class="col">
                                                                                    <select name="id_mode_paiement"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" readonly>
                                                                                        <option value="<?php echo $id_mode_paiement ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from mode_paiement where id_mode_paiement = '$id_mode_paiement'";

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
                                                                                <span class="help-block small-font">L'AVANCE:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" name="avance"
                                                                                           value="<?php echo $avance ?>"
                                                                                           readonly>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">BANQUE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_card_bank" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" readonly>
                                                                                        <option value="<?php echo $id_card_bank ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from compte_bank where id_card_bank = '$id_card_bank'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['numero_compte'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">RESTE :</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" name="reste"
                                                                                           value="<?php echo $reste ?>"
                                                                                           readonly>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° CHÈQUE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="cheque"
                                                                                           value="<?php echo $cheque ?>"
                                                                                           readonly>

                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
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
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_reglement_fournisseur?id=<?php echo $id_regle_four ?>">
                                                                        <i class="fas fa-plus"></i>
                                                                        Ajouter fournissuer
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

                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $sql = "SELECT DISTINCT * from regle_ajouter_fournisseur where id_regle_four = '$id_regle_four'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_fournisseur = $table['id_fournisseur'];


                                                                                    $query = "SELECT * from fournisseur where open_close!='1' and id_fournisseur='$id_fournisseur' ";
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


                                                                                            <td align="center"> <?php echo $ref_four; ?>  </td>
                                                                                            <td align="center"> <?php echo $raison_social_four; ?> </td>
                                                                                            <td align="center"> <?php echo $tel_four; ?> </td>
                                                                                            <td align="center"> <?php echo $pers_contact_four ?>  </td>
                                                                                            <td align="center"> <?php echo $tel_contact_four; ?>  </td>

                                                                                            <td align="center"
                                                                                                style="width: 18%">
                                                                                                <a class="btn btn-primary"
                                                                                                   href="details_fournisseur.php?id=<?php echo $id; ?>"
                                                                                                   title="view"
                                                                                                   style="background-color: transparent">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                </a>

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