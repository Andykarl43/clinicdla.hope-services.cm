<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_groupe = $_REQUEST['id'];

$query = "SELECT * from groupement where id_groupe='" . $id_groupe . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_groupe = $row['id_groupe'];
    // /*-------------------- ETAT CIVILE --------------------*/
    $nom_groupe = $row['nom_groupe'];
    $date_begin = $row['date_begin'];
    $id_offre = $row['id_offre'];


    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du groupe : <?= $nom_groupe ?> </h1>
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
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="details_offre.php?id=<?= $id_offre ?>">
                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-cubes"></i>
                                                Détails
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-users"></i>
                                                <?php

                                                $query = "SELECT  count(id_partie) as total from groupe_partie where id_groupe='$id_groupe' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' partie prenante[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--********************************************DETAILS************************************************* -->
                                    <!-- Etat Civile-->
                                    <div class="tab-pane container active" id="home">
                                        <!-- infos civile-->

                                        <!-- <h5><b><u>NB:</u></b> Aucune information ne peut être modifier.</h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="#" method="POST">
                                                        <div class="card-header">
                                                            <!--  <i class="fas fa-scroll"></i>
                                     <b>L'ensemble des salles de campresj.</b>
                                                                  -->

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
                                                                                <span class="help-block small-font">NOM DU GROUPE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_groupe"
                                                                                           value="<?php echo $nom_groupe ?>"
                                                                                           readonly>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE CREATION:</span>
                                                                                <div class="col">
                                                                                    <?php echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . date("d-m-Y", strtotime($date_begin)) . '"disabled>';
                                                                                    ?>
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
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************CLIENT************************************************* -->
                                    <div class="tab-pane container" id="menu1">
                                        <!-- infos civile-->

                                        <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->


                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des partie prenantes .</b>
                                                        <b>
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_groupe.php?id=<?= $id_groupe ?>">
                                                                        <i class="fas fa-plus"></i>
                                                                        Ajouter partie
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">

                                                                                    <th><p align="center"
                                                                                           style="color: white">Raison
                                                                                            Sociale</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Rôles</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>

                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from groupe_partie where id_groupe= '$id_groupe' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_partie = $row['id_partie'];
                                                                                    $role = $row['role'];
                                                                                    $id_groupe_partie = $row['id_groupe_partie'];
                                                                                    $id_groupe = $row['id_groupe'];

                                                                                    ?>

                                                                                    <tr>


                                                                                        <td align="center"> <?php
                                                                                            $sql = "SELECT DISTINCT * from partie_prennante where id_partie = '$id_partie'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social'];
                                                                                            }

                                                                                            ?> </td>
                                                                                        <td align="center"> <?= $role ?>  </td>
                                                                                        <td align="center"><a
                                                                                                    class="btn btn-danger"
                                                                                                    href="delete_groupe_partie.php?id=<?= $id_groupe_partie ?>&id_g=<?= $id_groupe ?>"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a></td>
                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">

                                                                                    <th><p align="center"
                                                                                           style="color: white">Raison
                                                                                            Sociale</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Rôles</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>

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

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--****************************************** ............************************************************ -->

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


    <!--//Footer-->
<?php
include('foot.php');
?>