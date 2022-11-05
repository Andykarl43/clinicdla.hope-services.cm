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
    $date_echeance = $row['date_echeance'];
    $montant = $row['montant'];
    $avance = $row['avance'];
    $reste = $row['reste'];
    $cheque = $row['cheque'];
    $id_mode_paiement = $row['id_mode_paiement'];
    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier Règlement
                    Fournisseur: <?php $sql = "SELECT DISTINCT * from fournisseur where id_fournisseur = '$id_fournisseur'";

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
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">

                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Etat Civile-->
                                    <div class="tab-pane container active" id="home">
                                        <!-- infos civile-->


                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="update_regle_fournisseur.php"
                                                          method="POST">
                                                        <div class="card-header">
                                                            <input type="hidden" name="id_regle_four"
                                                                   value="<?= $id_regle_four ?>">
                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table border="0"
                                                                           class="table  table-hover table-condensed"
                                                                           width="100%" cellspacing="0" id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style=" width: 50%">
                                                                                <span class="help-block small-font">FOURNISSEUR:</span>
                                                                                <div class="col">
                                                                                    <select name="id_fournisseur"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                            required="Veillez insérer le Fournisseur">
                                                                                        <option value="<?= $id_fournisseur ?>"
                                                                                                selected="">
                                                                                            <?php $sql = "SELECT DISTINCT * from fournisseur where id_fournisseur = '$id_fournisseur'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_four'];
                                                                                            }
                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM fournisseur where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_fournisseur'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['raison_social_four'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>

                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_fournisseur.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td style=" width: 50%">
                                                                                <span class="help-block small-font">BANQUE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_card_bank" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $id_card_bank ?>"
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
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM compte_bank');

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_card_bank'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['numero_compte'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="liste_compte_bank.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE TRANSACTION:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_transaction"
                                                                                           value="<?= $date_transaction ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <select name="id_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $id_chantier ?>"
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
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM chantier');

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_chantier'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom_chantier'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'ÉCHEANCE :</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_echeance"
                                                                                           value="<?= $date_echeance ?>"
                                                                                           required>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant"
                                                                                           value="<?= $montant ?>"
                                                                                           required>
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
                                                                                background: transparent;" name="avance"
                                                                                           value="<?= $avance ?>">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MODE DE PAIEMENT:</span>

                                                                                <div class="col">
                                                                                    <select name="id_mode_paiement"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_mode_paiement ?>"
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
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM mode_paiement where open_close!='1' ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_mode_paiement'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="liste_mode_paiement.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">RESTE :</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="reste"
                                                                                           value="<?= $reste ?>">
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° CHÈQUE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="cheque"
                                                                                           value="<?= $cheque ?>">
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

                                                </div>
                                            </div>
                                        </div>

                                        <center>
                                            <button type="submit" style=" width:150px;" name="submit_salle"
                                                    class="btn btn-primary">Enregistrer
                                            </button>

                                            <a href="liste_regle_fournisseur.php" style=" width:150px;"
                                               class="btn btn-primary"><font>Annuler</font></a>
                                        </center>
                                        </form>
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

    <?php
}
?>

    <!--    Modal pour ajouter Categorie Contrat-->


    <!--//Footer-->
<?php
include('foot.php');
?>