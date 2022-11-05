<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>


    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Marché</h1>
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
                                                    <form class="form-horizontal" action="save_marche.php"
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
                                                                            <td>
                                                                                <span class="help-block small-font">L'appel D'offre:</span>

                                                                                <div class="col">
                                                                                    <select name="id_offre" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
                                                                                            ...
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
                                                                            </td>                                                                       <!--  <td>
                                                                            <span class="help-block small-font" >DATE DE COMMENCEMENT:</span>
                                                                            <div class="col">
                                                                                <input  type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_begin_marche"  required>
                                                                            </div>

                                                                        </td> -->
                                                                            <td>
                                                                                <span class="help-block small-font">Entreprise:</span>

                                                                                <div class="col">
                                                                                    <select name="entreprise" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
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


                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Réference du Marché:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_marche" required>
                                                                                </div>


                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">   Objet du marché:</span>

                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_marche" required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- <tr>

                                                                            <td>
                                                                                <span class="help-block small-font" >DATE DE LANCEMENT:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                    border-right: 0;
                                                                                    background: transparent;" name="date_lancement" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font" >MONTANT TTC:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                    border-right: 0;
                                                                                    background: transparent;
                                                                                    border-color: gray" name="montant_ttc" value="0" required>
                                                                                </button>
                                                                                </div>
                                                                            </td>

                                                                        </tr> -->
                                                                        <!-- <tr>
                                                                            <td>
                                                                                <span class="help-block small-font" >MONTANT HT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                    border-right: 0;
                                                                                    background: transparent;
                                                                                    border-color: gray" name="montant_ht" value="0" required>
                                                                                </button>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font" >IRM:</span>
                                                                                <div class="col">
                                                                                    <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                    border-right: 0;
                                                                                    background: transparent;
                                                                                    border-color: gray" name="irm"  required>
                                                                                </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr> -->
                                                                        <!-- <tr>
                                                                            <td>
                                                                                <span class="help-block small-font" >DATE D'OUVERTURE DES PRIX</span>
                                                                                <div class="col">
                                                                                    <input  type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                    border-right: 0;
                                                                                    background: transparent;" name="date_open_prix"  required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font" >DATE D'APPROBATION:</span>
                                                                                <div class="col">
                                                                                    <input  type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                    border-right: 0;
                                                                                    background: transparent;" name="date_approbation"  required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>  -->
                                                                        <!--  <tr>
                                                                                 <td>
                                                                                     <span class="help-block small-font" >GARANTIE BANCAIRE</span>
                                                                                     <div class="col">
                                                                                         <input   style="width:75%;border-top: 0; border-left: 0;
                                                                                         border-right: 0;
                                                                                         background: transparent;" name="garantie_bank"  required>
                                                                                     </div>
                                                                                 </td>
                                                                                 <td>
                                                                                     <span class="help-block small-font" >TVA</span>
                                                                                 <div class="col">
                                                                                         <select name="tva" style="width:75%;border-top: 0; border-left: 0;
                                                                                         border-right: 0;
                                                                                         background: transparent;" >
                                                                                             <option value="0" selected="">...</option>
                                                                                             <option value="19.25">19,25%</option>
                                                                                         </select>
                                                                                     </div>
                                                                                 </td>
                                                                             </tr> -->
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Maître d'oeuvre:</span>

                                                                                <div class="col">
                                                                                    <select name="moe" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
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

                                                                                <span class="help-block small-font">Chef de Service du Marché:</span>

                                                                                <div class="col">
                                                                                    <select name="chef" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
                                                                                            ...
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
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Maître D'ouvrage:</span>

                                                                                <div class="col">
                                                                                    <select name="moa" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
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

                                                                                <span class="help-block small-font">Ingenieur du Marché:</span>

                                                                                <div class="col">
                                                                                    <select name="ingenieur" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
                                                                                            ...
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
                                                                                <span class="help-block small-font">Délai D'execution</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="day_marche"
                                                                                           placeholder="jour(s)"
                                                                                           value="0"><label>jour(s)</label>

                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_marche"
                                                                                           placeholder="mois" value="0">
                                                                                    <label>mois</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Coût:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_ttc"
                                                                                           value="0" required>
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
                                                                                <span class="help-block small-font">Remarque:</span>
                                                                                <div class="col">
                                                                                    <textarea name="remarque"
                                                                                              class="form-control"
                                                                                              style="width: 100%"
                                                                                              required></textarea>
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


    <!--    Modal pour ajouter Categorie Contrat-->


    <!--//Footer-->
<?php
include('foot.php');
?>