<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_marche = $_REQUEST['id'];

$query = "SELECT * from marche where id_marche='" . $id_marche . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_marche = $row['id_marche'];
    /*-------------------- ETAT CIVILE --------------------*/
    $id_offre = $row['id_offre'];
    $date_begin_marche = $row['date_begin_marche'];
    $ref_marche = $row['ref_marche'];
    $objet_marche = $row['objet_marche'];
    $date_lancement = $row['date_lancement'];
    $montant_ttc = $row['montant_ttc'];
    $montant_ht = $row['montant_ht'];
    $irm = $row['irm'];
    $date_open_prix = $row['date_open_prix'];
    $date_approbation = $row['date_approbation'];
    $garantie_bank = $row['garantie_bank'];
    $day_marche = $row['day_marche'];
    $month_marche = $row['month_marche'];
    $remarque = $row['remarque'];
    $tva = $row['tva'];
    $moa = $row['moa'];
    $ingenieur = $row['ingenieur'];

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifer le Marché : <?= $ref_marche ?></h1>
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
                                                    <form class="form-horizontal" action="update_marche.php"
                                                          method="POST">
                                                        <div class="card-header">
                                                            <input type="hidden" name="id_marche"
                                                                   value="<?= $id_marche ?>">
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
                                                                                <span class="help-block small-font">L'APPEL D'OFFRE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_offre" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_offre ?>"
                                                                                                selected=""><?php
                                                                                            $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_offre' ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['ref_offre'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM appel_offre where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_offre'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['ref_offre'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouvelle_offre.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE COMMENCEMENT:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_begin_marche"
                                                                                           value="<?= $date_begin_marche ?>"
                                                                                           required>
                                                                                </div>

                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">RÉFENCE DU MARCHÉ:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_marche"
                                                                                           value="<?= $ref_marche ?>"
                                                                                           required>
                                                                                </div>


                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">   OBJET DU MARCHÉ:</span>

                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_marche"
                                                                                           value="<?= $objet_marche ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE LANCEMENT:</span>
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
                                                                                <span class="help-block small-font">MONTANT TTC:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_ttc"
                                                                                           value="<?= $montant_ttc ?>"
                                                                                           required>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT HT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_ht"
                                                                                           value="<?= $montant_ht ?>"
                                                                                           required>
                                                                                    </button>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">IRM:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="irm"
                                                                                           value="<?= $irm ?>" required>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'OUVERTURE DES PRIX</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_open_prix"
                                                                                           value="<?= $date_open_prix ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'APPROBATION:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_approbation"
                                                                                           value="<?= $date_approbation ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">GARANTIE BANCAIRE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="garantie_bank"
                                                                                           value="<?= $garantie_bank ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">TVA</span>
                                                                                <div class="col">
                                                                                    <select name="tva" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $tva ?>"
                                                                                                selected=""><?= $tva ?></option>
                                                                                        <option value="0">...</option>
                                                                                        <option value="19.25">19,25%
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">MAÎTRE D'OUVRAGE:</span>

                                                                                <div class="col">
                                                                                    <select name="moa" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $moa ?>"
                                                                                                selected=""><?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$moa' ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_client'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM client where open_close!='1'");

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
                                                                                        <a href="nouveau_personnel.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <span class="help-block small-font">INGENIEUR DU MARCHÉ:</span>

                                                                                <div class="col">
                                                                                    <select name="ingenieur" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $ingenieur ?>"
                                                                                                selected=""><?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$ingenieur' ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM personnel where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_personnel'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'] . ' ' . $data['prenom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_personnel.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DELAI D'EXECUTION</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="day_marche"
                                                                                           placeholder="jour(s)"
                                                                                           value="<?= $day_marche ?>"><label>jour(s)</label>

                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_marche"
                                                                                           placeholder="mois"
                                                                                           value="<?= $month_marche ?>">
                                                                                    <label>mois</label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">REMARQUE:</span>
                                                                                <div class="col">
                                                                                    <!-- <textarea name="remarque" class="form-control" style="width: 100%" required></textarea> -->
                                                                                    <input type="text" name="remarque"
                                                                                           style="width: 100%"
                                                                                           value="<?= $remarque ?>">
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

                                            <a href="liste_marche.php" style=" width:150px;"
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