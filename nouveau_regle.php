<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Règlement sous-traitant</h1>
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
                                                    <form class="form-horizontal" action="save_reglement.php"
                                                          method="POST">
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
                                                                            <td style=" width: 50%">
                                                                                <span class="help-block small-font">Sous-traitants:</span>
                                                                                <div class="col">
                                                                                    <select name="id_partie" style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                            required="Veillez insérer le Fournisseur">
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM partie_prennante where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_partie'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['raison_social'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>

                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_partie.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td style=" width: 50%">

                                                                                <ul class="nav nav-pills">
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link active"
                                                                                           data-toggle="tab" href="#a4">
                                                                                            <i class="fas fa-envelope"></i>
                                                                                            Appel d'offre
                                                                                        </a>
                                                                                    </li>

                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link"
                                                                                           data-toggle="tab" href="#a2">
                                                                                            <i class="fas fa-cubes"></i>
                                                                                            Marchés
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link "
                                                                                           data-toggle="tab" href="#a1">
                                                                                            <i class="fas fa-building"></i>
                                                                                            Chantier
                                                                                        </a>
                                                                                    </li>

                                                                                </ul>
                                                                                <div class="tab-content">
                                                                                    <div class="tab-pane" id="a1">
                                                                                        <span class="help-block small-font"></span>

                                                                                        <div class="col">
                                                                                            <select name="id_choix3"
                                                                                                    style="width:85%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                                <option value="0"
                                                                                                        selected>...
                                                                                                </option>
                                                                                                <?php

                                                                                                $iResult = $db->query('SELECT * FROM chantier where open_close!=1');

                                                                                                while ($data = $iResult->fetch()) {

                                                                                                    $i = $data['id_chantier'];
                                                                                                    echo '<option value ="' . $i . '">';
                                                                                                    echo $data['nom_chantier'];
                                                                                                    echo '</option>';

                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                            <button type="button"
                                                                                                    style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                                <a href="nouveau_chantier.php"><i
                                                                                                            class="fas fa-plus"></i></a>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tab-pane " id="a2">
                                                                                        <span class="help-block small-font"></span>

                                                                                        <div class="col">
                                                                                            <select name="id_choix2"
                                                                                                    style="width:85%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                                <option value="0"
                                                                                                        selected>...
                                                                                                </option>
                                                                                                <?php

                                                                                                $iResult = $db->query('SELECT * FROM marche where open_close!=1');

                                                                                                while ($data = $iResult->fetch()) {

                                                                                                    $i = $data['id_marche'];
                                                                                                    echo '<option value ="' . $i . '">';
                                                                                                    echo $data['objet_marche'];
                                                                                                    echo '</option>';

                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                            <button type="button"
                                                                                                    style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                                <a href="nouveau_marche.php"><i
                                                                                                            class="fas fa-plus"></i></a>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tab-pane active "
                                                                                         id="a4">
                                                                                        <span class="help-block small-font"></span>

                                                                                        <div class="col">
                                                                                            <select name="id_choix1"
                                                                                                    style="width:85%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                                <option value="0"
                                                                                                        selected>...
                                                                                                </option>
                                                                                                <?php

                                                                                                $iResult = $db->query('SELECT * FROM appel_offre where open_close!=1');

                                                                                                while ($data = $iResult->fetch()) {

                                                                                                    $i = $data['id_offre'];
                                                                                                    echo '<option value ="' . $i . '">';
                                                                                                    echo $data['objet'];
                                                                                                    echo '</option>';

                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                            <button type="button"
                                                                                                    style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                                <a href="nouvelle_offre.php"><i
                                                                                                            class="fas fa-plus"></i></a>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </td>


                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Date de Transaction:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_transaction"
                                                                                           required>
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <span class="help-block small-font">Date D'écheance :</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_echeance"
                                                                                           required>
                                                                                </div>

                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Montant:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant"
                                                                                           value="0" required>
                                                                                    </button>
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <span class="help-block small-font">Mode de Paiement:</span>

                                                                                <div class="col">
                                                                                    <select name="id_mode_paiement"
                                                                                            style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
                                                                                            ...
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
                                                                                <span class="help-block small-font">L'avance:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="avance"
                                                                                           value="0">
                                                                                </div>
                                                                            </td>

                                                                            <td style=" width: 50%">
                                                                                <span class="help-block small-font">Banque:</span>

                                                                                <div class="col">
                                                                                    <select name="id_card_bank" style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
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
                                                                                <span class="help-block small-font">N° Chèque</span>
                                                                                <div class="col">
                                                                                    <input style="width:85%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="cheque">
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td></td>
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


    <!--    Modal pour ajouter Categorie Contrat-->


    <!--//Footer-->
<?php
include('foot.php');
?>