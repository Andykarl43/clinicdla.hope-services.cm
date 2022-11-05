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

    /*-------------------- DETAILS FOURNISSEURS  --------------------*/
    // $ref_offre = $row['ref_offre'];

    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouvelle caution Bancaire</h1>
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
                                                    <form class="form-horizontal" action="save_caution.php"
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

                                                                            <td>
                                                                                <span class="help-block small-font">Nom de la Banque:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_banque">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Date de Création:</span>
                                                                                <div class="col">
                                                                                    <input type="date" name="date_begin"
                                                                                           style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">Montant</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="montant_caution">

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Statut:</span>
                                                                                <div class="col">
                                                                                    <select name="etat_caution" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <option value="1">Récuperer
                                                                                        </option>
                                                                                        <option value="2">Non
                                                                                            Récuperer
                                                                                        </option>
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

                                            <a href="details_offre.php?id=<?= $id_offre ?>.php" style=" width:150px;"
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