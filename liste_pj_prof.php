<?php
include("first.php");
include('php/main_side_navbar.php');
include("php/db.php");
?>
<?php
$id = $_REQUEST['id_personnel'];

$query = "SELECT * from personnel where id_personnel='" . $id . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_personnel = $row['id_personnel'];
    /*-------------------- ETAT CIVILE --------------------*/
    $matricule = $row['matricule'];
    $nom = $row['nom'];
    $prenom = $row['prenom'];

    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du Pesonnel (Pièces jointes): <?= $nom . ' ' . $prenom ?></h1>
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
                                <i class="fas fa-scroll"></i>
                                <b>Liste des pièces jointes .</b>

                                <!-- Nav pills -->

                                <b>


                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="modal"
                                               data-target="#ajouter_pj_prof<?= $id_personnel ?>" href="#">
                                                <i class="fas fa-cubes"></i>
                                                Nouvelle pièce(s) jointe(s)

                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="">
                                                    <table class="table table-bordered table-hover" id="dataTable"
                                                           width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">NOM</p></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from pj_etat_professionnel where id_personnel='" . $id . "' ";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $nom_pj = $row['nom_pj'];
                                                            $lien = $row['lien'];
                                                            ?>

                                                            <tr>

                                                                <td align="center"><a
                                                                            href="<?php echo $lien; ?>"><?php echo $nom_pj; ?></a>
                                                                </td>
                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">NOM</p></th>

                                                        </tr>
                                                        </tfoot>

                                                    </table>
                                                </form>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!--                                             <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="save_pj.php" name="form" method="post">
                    <div class="form-group">
                        <label>Pièce(s) jointe(s):</label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id_personnel" value="<?= $id ?>">
                            <input type="file" name="fichier[]"  style="width:100%" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                            <button  type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary" value="Ok"></button>
                            
                            <input type="reset" data-dismiss="modal" style=" width:25% "  class="btn btn-danger" value="Annuler"/>
                        </center>

                        </div>
                    </div>
                </form>
            </div> -->

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


    include("ajouter_pj_prof.php");


    ?>

<?php } ?>


    <!--//Footer-->
<?php
include('foot.php');
?>