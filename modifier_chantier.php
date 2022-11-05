<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_chantier = $_REQUEST['id'];

$query = "SELECT * from chantier where id_chantier='" . $id_chantier . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    // ------------ infos sur le marché
    $id_marche = $row['id_marche'];
    $ref_marche = $row['ref_marche'];
    $date_begin_marche = $row['date_begin_marche'];
    $objet_marche = $row['objet_marche'];
    $montant_ttc_marche = $row['montant_ttc_marche'];

    // ------------ infos sur le chantier
    $nom_chantier = $row['nom_chantier'];
    $adresse_chantier = $row['adresse_chantier'];
    $tel_chantier = $row['tel_chantier'];
    $id_personnel = $row['id_personnel'];
    $id_pers_pointeur = $row['id_pers_pointeur'];
    $id_pers_con = $row['id_pers_con'];
    $id_pers_ges = $row['id_pers_ges'];
    $cout_h_moy_chantier = $row['cout_h_moy_chantier'];
    $dure_chantier = $row['dure_chantier'];
    $montant_ttc_chantier = $row['montant_ttc_chantier'];
    $objet_chantier = $row['objet_chantier'];
    $date_begin_chantier = $row['date_begin_chantier'];
    $etat = $row['etat'];
    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier Chantier: <?= $nom_chantier ?></h1>
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
                                                    <form class="form-horizontal" action="update_chantier.php"
                                                          method="POST">
                                                        <div class="card-header">
                                                            <input type="hidden" name="id_chantier"
                                                                   value="<?= $id_chantier ?>">
                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table border="0"
                                                                           class="table  table-hover table-condensed"
                                                                           width="100%" cellspacing="0" id="myTable">
                                                                        <tbody>
                                                                        <tr style=" color: gray; background-color: silver">
                                                                            <td colspan="2" align="center">
                                                                                <i class="fas fa-scroll"></i>
                                                                                <b>les infos sur le marché.</b>
                                                                                <b>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">RÉFENCE DU MARCHÉ:</span>
                                                                                <div class="col">

                                                                                    <select name="ref_marche" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $ref_marche ?>"
                                                                                                selected=""><?= $ref_marche ?></option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">   OBJET DU MARCHÉ:</span>
                                                                                <input type="hidden" name="objet_marche"
                                                                                       value="<?= $objet_marche ?>">
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_marche"
                                                                                           value="<?= $objet_marche ?>">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">DATE DU MARCHÉ:</span>
                                                                                <input type="hidden"
                                                                                       name="date_begin_marche"
                                                                                       value="<?= $date_begin_marche ?>">
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_begin_marche"
                                                                                           value="<?= $date_begin_marche ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT TTC DU MARCHÉ:</span>
                                                                                <input type="hidden"
                                                                                       name="montant_ttc_marche"
                                                                                       value="<?= $montant_ttc_marche ?>">
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                            " name="montant_ttc_marche"
                                                                                           value="<?= $montant_ttc_marche ?>"
                                                                                           disabled>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr style=" color: gray; background-color: silver">
                                                                            <td colspan="2" align="center">
                                                                                <i class="fas fa-scroll"></i>
                                                                                <b>Saisir les infos du chantier.</b>
                                                                                <b>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">NOM DU CHANTIER :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_chantier"
                                                                                           value="<?= $nom_chantier ?>"
                                                                                           required>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">ADRESSE DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="adresse_chantier"
                                                                                           value="<?= $adresse_chantier ?>"
                                                                                           required>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">OBJET DU CHANTIER :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_chantier"
                                                                                           value="<?= $objet_chantier ?>"
                                                                                           required>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE COMMENCEMENT:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="date_begin_chantier"
                                                                                           value="<?= $date_begin_chantier ?>"
                                                                                           required>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">TEL DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="tel_chantier"
                                                                                           value="<?= $tel_chantier ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">CHEF CHANTIER:</span>

                                                                                <div class="col">
                                                                                    <select name="id_personnel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_personnel ?>"
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
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM personnel where open_close!='1' ");

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
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">CONDUCTEUR DU CHANTIER:</span>

                                                                                <div class="col">
                                                                                    <select name="id_pers_con" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_pers_con ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_con'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM personnel where open_close!='1' ");

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

                                                                            <td>
                                                                                <span class="help-block small-font">GESTIONNAIRE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_pers_ges" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_pers_ges ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_ges'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM personnel where open_close!='1' ");

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
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">POINTEUR :</span>
                                                                                <div class="col">
                                                                                    <select name="id_pers_pointeur"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_pers_pointeur ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_pointeur'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM personnel where open_close!='1' ");

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

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">COÛT HORAIRE MOYEN</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="cout_h_moy_chantier"
                                                                                           value="<?= $cout_h_moy_chantier ?>"
                                                                                           required>FCFA
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DURÉE DU CHANTIER</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="dure_chantier"
                                                                                           value="<?= $dure_chantier ?>"
                                                                                           required>Jour(s)

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">PHASE DU CHANTIER</span>
                                                                                <div class="col">
                                                                                    <select name="etat" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $etat ?>">
                                                                                            <?php
                                                                                            if ($etat == 1) {
                                                                                                echo "Achevé";
                                                                                            } else {
                                                                                                echo "En cours";
                                                                                            }
                                                                                            ?>
                                                                                        </option>
                                                                                        <option value="0">En cours
                                                                                        </option>
                                                                                        <option value="1">Achevé
                                                                                        </option>
                                                                                        <!--  <option value="N/A">N/A</option> -->
                                                                                    </select>

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

                                            <a href="details_marche.php?id=<?= $id_marche ?>" style=" width:150px;"
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