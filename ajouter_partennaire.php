<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
$id = $_REQUEST['id'];
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau sous-traitant</h1>
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
                                                    <form class="form-horizontal" action="save_partenaire.php"
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
                                                                                <input type="hidden" name="id_marche"
                                                                                       value="<?php echo $id ?>">
                                                                                <span class="help-block small-font">Sous-traitant:</span>

                                                                                <div class="col">
                                                                                    <select name="id_partie" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="" selected="">
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

                                                                            <td>
                                                                                <span class="help-block small-font">RÔLE:</span>
                                                                                <div class="col">
                                                                                    <textarea name="role"
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

                                            <a href="details_marche.php?id=<?= $id ?>" style=" width:150px;"
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