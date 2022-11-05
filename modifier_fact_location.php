<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_fact_location = $_REQUEST['id'];

$query = "SELECT * from fact_location where id_fact_location='" . $id_fact_location . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_fact_location = $row['id_fact_location'];
    /*-------------------- DETAILS --------------------*/
    $number_fact = $row['number_fact'];
    $id_engin = $row['id_engin'];
    $id_chantier = $row['id_chantier'];
    $id_chantier = $row['id_chantier'];
    $montant = $row['montant'];
    $motif = $row['motif'];
    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier la Facture de Location: <?= $number_fact ?></h1>
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
                                                    <form class="form-horizontal" action="update_fact_location.php"
                                                          method="POST">
                                                        <div class="card-header">
                                                            <input type="hidden" name="id_fact_location"
                                                                   value="<?= $id_fact_location ?>">
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
                                                                                <span class="help-block small-font">N°FACTURE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="number_fact"
                                                                                           value="<?= $number_fact ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">ENGIN:</span>
                                                                                <div class="col">
                                                                                    <select name="id_engin" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $id_engin ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from engin where id_engin = '$id_engin'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['number_chassis'];
                                                                                            }
                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM engin');

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_engin'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['number_chassis'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_engin.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <select name="id_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $id_chantier ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_chantier'];
                                                                                            }
                                                                                            ?>

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
                                                                                    </button>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant"
                                                                                           value="<?= $montant ?>"
                                                                                           required>
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
                                                                                <span class="help-block small-font">MOTIF:</span>
                                                                                <div class="col">
                                                                                    <!--     <textarea name="motif" class="form-control" style="width: 100%" ></textarea> -->

                                                                                    <input type="text" name="motif"
                                                                                           class="form-control"
                                                                                           style="width: 100%"
                                                                                           value="<?= $motif ?>">
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

                                            <a href="liste_fact_location.php" style=" width:150px;"
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