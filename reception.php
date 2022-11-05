<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouvelle reception</h1>
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
                            <form class="form-horizontal" action="#" method="POST">
                                <div class="card-header">
                                    Formulaire
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font">Type de reception</span>
                                                        <div class="col">
                                                            <select name="id_rec" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                <option value="0" selected="">...</option>
                                                                <option value="1">Reception Provisoire</option>
                                                                <option value="2">Reception Définitive</option>
                                                                <option value="3">Recption Technique</option>
                                                            </select>

                                                        </div>
                                                    </td>

                                                    <td style="width: 50%">
                                                        <span class="help-block small-font">Date</span>
                                                        <div class="col">
                                                            <input name="date_rec" type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"
                                         style="float: right;">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="submit_etat_civil" class="btn btn-primary">
                                                Enregistrer
                                            </button>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

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
                                            <a class="nav-link active" data-toggle="modal" data-target="#ajouter_pj"
                                               href="#">
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
                                                <form method="post" action="#">
                                                    <table class="table table-bordered table-hover" id="dataTable"
                                                           width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">NOM</p></th>
                                                            <th><p align="center">Options</p></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <!--      <?php

                                                        // $query = "SELECT * from pj_etat_academique where id_personnel='".$id_personnel."' ";
                                                        //                 $q = $db->query($query);
                                                        //                 while($row = $q->fetch())
                                                        //                 {
                                                        //                     $id  =$row['id_pj'];
                                                        //                     $nom_pj  =$row['nom_pj'];
                                                        //                     $lien  =$row['lien'];
                                                        ?> -->

                                                        <tr>

                                                            <td align="center"><a
                                                                        href="<?php //echo  $lien; ?>"><?php //echo $nom_pj; ?></a>
                                                            </td>
                                                            <td align="center">
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_salle"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>

                                                            </td>
                                                        </tr>


                                                        <!--  <?php //} ?> -->
                                                        </tbody>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">NOM</p></th>
                                                            <th><p align="center">Options</p></th>

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


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

<?php


include("ajouter_pj_reception.php");


?>
    <!--//Footer-->
<?php
include('foot.php');
?>