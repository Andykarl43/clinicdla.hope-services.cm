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
    // $id_personnel = $row['id_personnel'];
    // /*-------------------- DETAILS --------------------*/

    $id_chantier = $row['id_chantier'];
    // $ref_marche = $row['ref_marche'];
    $objet_chantier = $row['objet_chantier'];
    $date_begin_chantier = $row['date_begin_chantier'];
    $montant_ttc_chantier = $row['montant_ttc_chantier'];
    $nom_chantier = $row['nom_chantier'];
    $tel_chantier = $row['tel_chantier'];
    $id_personnel = $row['id_personnel'];
    $id_pers_pointeur = $row['id_pers_pointeur'];
    $dure_chantier = $row['dure_chantier'];
    ?>


    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouvelle Etape</h1>
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
                                                    <form class="form-horizontal" action="save_etape.php" method="POST">
                                                        <div class="card-header">

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
                                                                                <b>les infos sur le chantier.</b>
                                                                                <b>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="hidden" name="id_chantier"
                                                                                       value="<?= $id_chantier ?>">

                                                                                <span class="help-block small-font">Nom du Chantier:</span>
                                                                                <div class="col">
                                                                                    <select name="id_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '" . $id_chantier . "'";

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
                                                                            <td>
                                                                                <input type="hidden"
                                                                                       name="objet_chantier"
                                                                                       value="<?= $objet_chantier ?>">

                                                                                <span class="help-block small-font">   Objet du Marche:</span>

                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_chantier"
                                                                                           value="<?= $objet_chantier ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <input type="hidden"
                                                                                       name="date_begin_chantier"
                                                                                       value="<?= $date_begin_chantier ?>">

                                                                                <span class="help-block small-font">Date du Chantier:</span>
                                                                                <div class="col">
                                                                                    <?php echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_begin_chantier" value="' . date("d-m-Y", strtotime($date_begin_chantier)) . '"disabled>';
                                                                                    ?>

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="hidden"
                                                                                       name="montant_ttc_chantier"
                                                                                       value="<?= $montant_ttc_chantier ?>">

                                                                                <span class="help-block small-font">Coût Total:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="montant_ttc_chantier"
                                                                                           value="<?= $montant_ttc_chantier ?>"
                                                                                           disabled>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr style=" color: gray; background-color: silver">
                                                                            <td colspan="2" align="center">
                                                                                <i class="fas fa-scroll"></i>
                                                                                <b>Saisir les infos de l'étape.</b>
                                                                                <b>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td style=" width: 50%">
                                                                                <span class="help-block small-font">Nom de L'etape:</span>
                                                                                <div class="col">
                                                                                    <select name="nom_etape" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                            required="Veillez insérer le client">
                                                                                        <option value="" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM etape_chantier where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['nom'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>

                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="liste_etape_chantier.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Coût</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="cout_etape"
                                                                                           value="0" required>FCFA

                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Date de Debut</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="date_debut_etape"
                                                                                           required>

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Date de Fin</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="date_fin_etape"
                                                                                           required>

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

                                            <a href="details_chantier?id=<?= $id_chantier ?>" style=" width:150px;"
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