<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Engin</h1>
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
                                                    <form class="form-horizontal" action="save_engin.php" method="POST">
                                                        <div class="card-header">

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
                                                                                <span class="help-block small-font">Code:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="code"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font"> Fournisseur:</span>

                                                                                <div class="col">
                                                                                    <select name="id_cat_fournisseur"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM fournisseur where open_close!='1' ");

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

                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font">Categorie D'engin:</span>

                                                                                <div class="col">
                                                                                    <select name="id_cat_engin" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM categorie_engin where open_close!='1' ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_cat_engin'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>

                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_type_engin.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">Marque D'engin:</span>
                                                                                <div class="col">
                                                                                    <select name="id_marque_engin"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * from marque_engin where open_close!='1' ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_marque_engin'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_marque_engin.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Série:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="serie"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Matricule :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="matricule" required>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° de Chassis:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="number_chassis"
                                                                                           required>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Tarif de Location:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="tarif_location"
                                                                                           value="0" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Coût Horaire</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="cout_horaire"
                                                                                           placeholder="mois" value="0">
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Conducteur:</span>

                                                                                <div class="col">
                                                                                    <select name="id_personnel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM personnel');

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
                                                                                <span class="help-block small-font">Chantier:</span>

                                                                                <div class="col">
                                                                                    <select name="id_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
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
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Date D'arrivée:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_arrived" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Date Départ:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_begin" required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">Consommation Moyenne Estimée</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="conso_moy_estime"
                                                                                           placeholder="mois" value="0">
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

                                            <a href="liste_engin.php" style=" width:150px;"
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


    <!--    Modal pour ajouter Categorie Contrat-->


    <!--//Footer-->
<?php
include('foot.php');
?>