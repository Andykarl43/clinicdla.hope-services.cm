<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
$id_etape = $_REQUEST['id'];
$idc = $_REQUEST['idc'];


$query = "SELECT * from etape where id_etape='" . $id_etape . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    // ------------ infos sur le marché
    $id_etape = $row['id_etape'];
    $id_chantier = $row['id_chantier'];

    // $prime=$row['prime'];


    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste du Personnels</h1>
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
                            <form action="save_pers_etape.php" method="post">
                                <div class="card-header">
                                    <b>
                                        <input type="hidden" name="id_etape" value="<?= $id_etape ?>">
                                        <input type="hidden" name="idc" value="<?= $idc ?>">
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills" style="float: right;">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?= $personnel['option1_link'] ?>">
                                                    <i class="fas fa-user"></i>
                                                    Nouveau personnel
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <button type="submit" style=" width:150px;" class="btn btn-primary">
                                                    Enregistrer
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
                                                                <!-- <th><p align="center">Matricule </p></th> -->
                                                                <th><p align="center" style="color: white">Nom</p></th>
                                                                <th><p align="center" style="color: white">Poste </p>
                                                                </th>
                                                                <th><p align="center" style="color: white">tel</p></th>
                                                                <th><p align="center" style="color: white">Statut</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Quartier</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Options</p>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $query = "SELECT * from personnel where open_close!='1' and id_chantier='$id_chantier' and id_etape != '$id_etape' ";
                                                            $q = $db->query($query);
                                                            while ($row = $q->fetch()) {
                                                                $id = $row['id_personnel'];
                                                                $nom = $row['nom'];
                                                                $prenom = $row['prenom'];
                                                                $poste = $row['poste'];
                                                                $tel = $row['tel'];
                                                                $statut = $row['statut'];
                                                                $id_quartier = $row['id_quartier'];
                                                                $profession = $row['profession'];


                                                                ?>

                                                                <tr>
                                                                    <input name="id" type="hidden"
                                                                           value="<?php echo $id ?>"/>
                                                                    <td align="center"><a
                                                                                href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                title="<?= $nom; ?>"
                                                                                style="color: black"><?= $nom . ' ' . $prenom; ?></a>
                                                                    </td>
                                                                    <td align="center"><a
                                                                                href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                title="<?= $profession; ?>"
                                                                                style="color: black"><?= $profession; ?></a>
                                                                    </td>
                                                                    <td align="center"><a
                                                                                href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                title="<?= $tel; ?>"
                                                                                style="color: black"><?= $tel ?> </a>
                                                                    </td>
                                                                    <td align="center"><a
                                                                                href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                title="<?= $statut; ?>"
                                                                                style="color: black"><?= $statut; ?></a>
                                                                    </td>
                                                                    <input type="hidden" name=""
                                                                           value="<?= $profession; ?>">
                                                                    <td align="center"><a
                                                                                href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                title="<?= $id_quartier; ?>"
                                                                                style="color: black">
                                                                            <?php

                                                                            $sql = "SELECT DISTINCT * from quartier where id_quat = '$id_quartier'";

                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();

                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                            foreach ($tables as $table) {
                                                                                echo $table['nom'];
                                                                            }

                                                                            ?>


                                                                        </a></td>

                                                                    <td align="center" style="width: 18%">

                                                                        <!-- <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-primary"  href="details_personnel.php?id=<?= $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-warning" href="modifier_personnel.php?id=<?= $id; ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>
                       </div>
                     <div class="btn-group mr-2" role="group" aria-label="First group">
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_pers<?= $id; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>
                        </div> 
                       
                    <?php
                                                                        // include("verifier_delete_pers.php");
                                                                        ?> -->

                                                                        <div class="btn-group mr-2" role="group"
                                                                             aria-label="First group">
                                                                            <!-- <a class="btn btn-primary" type="" data-toggle="modal" data-target="#verifier_delete_pers<?= $id; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i> -->
                                                                            <input type="checkbox"
                                                                                   style=" width: 25px; height: 25px"
                                                                                   name="id_personnel[]"
                                                                                   value="<?= $id ?>">
                                                                            <!-- </a> -->
                                                                        </div>


                                                                    </td>
                                                                </tr>

                                                            <?php } ?>

                                                            </tbody>


                                                            <tfoot>
                                                            <tr class="bg-primary">
                                                                <!-- <th><p align="center">Matricule </p></th> -->
                                                                <th><p align="center" style="color: white">Nom</p></th>
                                                                <th><p align="center" style="color: white">Poste </p>
                                                                </th>
                                                                <th><p align="center" style="color: white">tel</p></th>
                                                                <th><p align="center" style="color: white">Statut</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Quartier</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Options</p>
                                                                </th>
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
<?php
if (isset($_GET['witness'])) {
    $witness = $_GET['witness'];

    switch ($witness) {
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>