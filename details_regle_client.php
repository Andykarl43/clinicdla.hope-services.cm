<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_regle_client = $_REQUEST['id'];

$query = "SELECT * from regle_client where id_regle_client='" . $id_regle_client . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_regle_client = $row['id_regle_client'];
    /*-------------------- ETAT CIVILE --------------------*/
    $id_client = $row['id_client'];
    $id_card_bank = $row['id_card_bank'];
    $date_transaction = $row['date_transaction'];
    $id_chantier = $row['id_chantier'];
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
                <h1 class="mt-4">Détails du Règlement client : <?php
                    $sql = "SELECT DISTINCT * from client where id_client = '$id_client'";

                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($tables as $table) {
                        echo $table['raison_social_client'];
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
                                            <a class="nav-link active" href="<?= $reglement_client['option2_link'] ?>">
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
                                        <!--                                     <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-users"></i>
                                            <?php

                                        // $query = "SELECT distinct count(id_client) as total from regle_client where id_regle_client='$id_regle_client' ";
                                        // $q = $db->query($query);
                                        // while($row = $q->fetch())
                                        // {

                                        //     echo ' Reglement client['.$row['total'].']';
                                        // }

                                        ?> 
                                             
                                        </a>
                                    </li>   -->
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
                                                                                <span class="help-block small-font">CLIENT:</span>
                                                                                <div class="col">
                                                                                    <select name="id_client" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" disabled>
                                                                                        <option value="<?php echo $id_client ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$id_client'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_client'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">BANQUE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_card_bank" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" disabled>
                                                                                        <option value="<?php echo $id_card_bank ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from compte_bank where id_card_bank = '$id_card_bank'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['numero_bank'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE TRANSACTION:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;"
                                                                                           name="date_transaction"
                                                                                           value="<?php echo
                                                                                           $date_transaction ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <select name="id_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" disabled="">
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
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'ÉCHEANCE :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;"
                                                                                           name="date_echeance"
                                                                                           value="<?php echo $date_echeance ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant"
                                                                                           value="<?php echo $montant ?>"
                                                                                           disabled>
                                                                                    </button>
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
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MODE DE PAIEMENT:</span>

                                                                                <div class="col">
                                                                                    <select name="id_mode_paiement"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" disabled="">
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
                                                                                <span class="help-block small-font">RESTE :</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray;" name="reste"
                                                                                           value="<?php echo $reste ?>"
                                                                                           disabled>
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
                                                                                           disabled>
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
                                                                       href="ajouter_reglement_client?id=<?php echo $id_regle_client ?>">
                                                                        <i class="fas fa-plus"></i>
                                                                        ajouter un client
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
                                                                                            Clients</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Mode</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            L'avance</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Le
                                                                                            solde</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">le
                                                                                            reste</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            transition</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>

                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from regle_client where open_close!='1' and id_client='$id_client' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_regle_client = $row['id_regle_client'];
                                                                                    $id_client = $row['id_client'];
                                                                                    $id_chantier = $row['id_chantier'];
                                                                                    $montant = $row['montant'];
                                                                                    $id_mode_paiement = $row['id_mode_paiement'];
                                                                                    $id_card_bank = $row['id_card_bank'];
                                                                                    $avance = $row['avance'];
                                                                                    $date_transaction = $row['date_transaction'];
                                                                                    $reste = $row['reste'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $row['id'];
                                                                                               ?>"/>

                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$id_client'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_client'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>
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
                                                                                        <td align="center"> <?php echo $avance; ?>  </td>
                                                                                        <td align="center"> <?php echo $montant; ?>   </td>
                                                                                        <td align="center"> <?php echo $reste; ?>  </td>
                                                                                        <td align="center"> <?php echo $date_transaction; ?>   </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%"><a
                                                                                                    class="btn btn-primary"
                                                                                                    href="details_regle_client.php?id=<?php echo $id_regle_client; ?>"
                                                                                                    title="view"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: green"
                                                                                                   class="fas fa-eye"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-warning"
                                                                                               href="modifier_regle_client.php?id=<?= $id_regle_client; ?>"
                                                                                               title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: orange"
                                                                                                   class="fas fa-pen"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-danger"
                                                                                               type="button"
                                                                                               data-toggle="modal"
                                                                                               data-target="#verifier_delete_regle_client<?= $id_regle_client; ?>"
                                                                                               title="supprimer"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a>


                                                                                            <?php
                                                                                            include("verifier_delete_regle_client.php");
                                                                                            ?>


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Clients</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Mode</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            L'avance</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Le
                                                                                            solde</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">le
                                                                                            reste</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            transition</p></th>
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