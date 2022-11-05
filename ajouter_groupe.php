<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
$id_groupe = $_REQUEST['id'];

$query = "SELECT * from groupement where id_groupe='" . $id_groupe . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    // ------------ infos sur le marché
    $id_groupe = $row['id_groupe'];
    $id_offre = $row['id_offre'];
    $nom_groupe = $row['nom_groupe'];

    // $prime=$row['prime'];


    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Ajouter des parties prenantes pour le groupe: <?= $nom_groupe ?></h1>
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
                            <form action="save_groupe_partie.php" method="post">
                                <div class="card-header">
                                    <b>
                                        <input type="hidden" name="id_groupe" value="<?= $id_groupe ?>">
                                        <input type="hidden" name="id_offre" value="<?= $id_offre ?>">
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills" style="float: right;">
                                            <li class="nav-item">
                                                <a class="nav-link active"
                                                   href="details_groupement.php?id=<?= $id_groupe ?>">
                                                    Retour
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <button type="submit" style=" width:150px;" name="submit_salle"
                                                        class="btn btn-primary">Enregistrer
                                                </button>
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

                                                                <th><p align="center" style="color: white">Raison
                                                                        Sociale</p></th>
                                                                <th><p align="center" style="color: white">Rôles</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Options</p>
                                                                </td>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php

                                                            $query = "SELECT * from partie_prennante where open_close!='1'";
                                                            $q = $db->query($query);
                                                            while ($row = $q->fetch()) {
                                                                $id_partie = $row['id_partie'];
                                                                $raison_social = $row['raison_social'];

                                                                ?>

                                                                <tr>
                                                                    <input name="id" type="hidden"
                                                                           value="<?php //echo $id;
                                                                           ?>"/>


                                                                    <td align="center"> <?php echo $raison_social; ?> </td>
                                                                    <td align="center"><input name="role[]"
                                                                                              class="form-control"
                                                                                              style="width: 100%"></td>

                                                                    <td align="center" style="width: 18%">


                                                                        <div class="btn-group mr-2" role="group"
                                                                             aria-label="First group">
                                                                            <input type="checkbox"
                                                                                   style=" width: 25px; height: 25px"
                                                                                   name="id_partie[]"
                                                                                   value="<?= $id_partie ?>">
                                                                        </div>


                                                                    </td>


                                                                </tr>

                                                            <?php } ?>
                                                            </tbody>

                                                            <tfoot>
                                                            <tr class="bg-primary">

                                                                <th><p align="center" style="color: white">Raison
                                                                        Sociale</p></th>
                                                                <th><p align="center" style="color: white">Rôles</p>
                                                                </th>
                                                                <th style="width: 18%"><p align="center"
                                                                                          style="color: white">
                                                                        Options</p>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody></tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">

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

            </div>
        </main>
    </div>
    <?php
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>