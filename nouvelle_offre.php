<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

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
                                                    <form class="form-horizontal" action="save_offre.php" method="POST">
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
                                                                            <td>
                                                                                <span class="help-block small-font">Référence:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_offre" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Objet:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="objet"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">Maître D'ouvrage:</span>
                                                                                <div class="col">
                                                                                    <select name="id_client" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="" selected="">
                                                                                            ...
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
                                                                                        <a href="nouveau_client.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Montant du Maché:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_offre"
                                                                                           value="0" required>
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Montant du DAO:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_dao"
                                                                                           value="0" required>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Date de Lancement :</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_lancement"
                                                                                           required>
                                                                                </div>

                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Date de Dépouillement:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_open_offre"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Délai D'execution</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:55%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_offre"
                                                                                           placeholder="mois" value="0">MOIS
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font">Soumissionaire:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="soumis"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N°Compte Bancaire:</span>

                                                                                <div class="col">
                                                                                    <select name="id_card_bank" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="" selected="">
                                                                                            ...
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
                                                                                <span class="help-block small-font">Type:</span>

                                                                                <div class="col">
                                                                                    <select name="id_type" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT id_type, nom_type FROM type  group by nom_type asc ");

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
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-file"></i>
                                                        Fichiers Joints (DAO)
                                                    </div>
                                                    <div class="well bs-component">
                                                        <fieldset>
                                                            <div class="card">
                                                                <div class="" style=" width: 100%">
                                                                    <table>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <div class="row mb-3"
                                                                                         style="padding: 20px">
                                                                                        <label>
                                                                                            <svg width="1em"
                                                                                                 height="1em"
                                                                                                 viewBox="0 0 16 16"
                                                                                                 class="bi bi-file-earmark-arrow-up"
                                                                                                 fill="currentColor"
                                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                                                                                <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                                                                                <path fill-rule="evenodd"
                                                                                                      d="M8 12a.5.5 0 0 0 .5-.5V7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 7.707V11.5a.5.5 0 0 0 .5.5z"/>
                                                                                            </svg>
                                                                                        </label>
                                                                                        <div class="col">
                                                                                            <input id="fichier"
                                                                                                   type="file"
                                                                                                   name="fichier"
                                                                                                   style="width:80%">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </fieldset>
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


    <!--    Modal pour ajouter Categorie Contrat-->


    <!--//Footer-->
<?php
include('foot.php');
?>