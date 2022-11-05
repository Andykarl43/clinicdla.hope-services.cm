<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_offre = $_REQUEST['id'];

$query = "SELECT * from appel_offre where id_offre='" . $id_offre . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_offre = $row['id_offre'];

    /*-------------------- DETAILS PARTIE PRENANTES --------------------*/
    $ref_offre = $row['ref_offre'];
    $id_card_bank = $row['id_card_bank'];
    $id_client = $row['id_client'];
    $objet = $row['objet'];
    $date_lancement = $row['date_lancement'];
    $montant_offre = $row['montant_offre'];
    $date_open_offre = $row['date_open_offre'];
    $month_offre = $row['month_offre'];
    $id_type = $row['id_type'];
    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouvelle Appel d'offre</h1>
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
                                                    <form class="form-horizontal" action="update_offre.php"
                                                          method="POST">
                                                        <div class="card-header">
                                                            <input type="hidden" name="id_offre"
                                                                   value="<?= $id_offre ?>">
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
                                                                                <span class="help-block small-font">RÉFERENCE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_offre"
                                                                                           value="<?= $ref_offre ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N°COMPTE BANCAIRE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_card_bank" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_card_bank ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from compte_bank where id_card_bank = '$id_card_bank' ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['code_guichet'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM compte_bank where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_card_bank'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['code_guichet'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>

                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_compte_bank.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">MAÎTRE D'OUVRAGE:</span>
                                                                                <div class="col">
                                                                                    <select name="id_client" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_client ?>"
                                                                                                selected=""><?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$id_client' ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_client'];
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM client where open_close!='1' ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_client'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['raison_social_client'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_client.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">OBJET:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="objet"
                                                                                           value="<?= $objet ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE LANCEMENT :</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_lancement"
                                                                                           value="<?= $date_lancement ?>"
                                                                                           required>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_offre"
                                                                                           value="<?= $montant_offre ?>"
                                                                                           required>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'OUVERTURE PLIS:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_open_offre"
                                                                                           value="<?= $date_open_offre ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DÉLAI D'EXECUTION</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_offre"
                                                                                           placeholder="mois"
                                                                                           value="<?= $month_offre ?>">
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Type:</span>

                                                                                <div class="col">
                                                                                    <select name="id_type" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_type ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT id_type, nom_type FROM type  where id_type='$id_type' ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_type'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT id_type, nom_type FROM type  group by nom_type");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_type'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom_type'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>

                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="liste_type.php"><i
                                                                                                    class="fas fa-plus"></i></a>
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

                                            <a href="liste_offre.php" style=" width:150px;"
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