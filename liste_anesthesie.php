<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des Anesthésies</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                        <?php
                        if($lvl !=9 and $lvl != 11  ){
                            ?>
                            <b>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills" style="float: right;">
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="nouveau_anesthesie.php">
                                            <i class="fas fa-user"></i>
                                            Nouvelle anesthésie
                                        </a>
                                    </li>
                                </ul>
                            </b>
                        <?php } ?>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
                <!--                Main Body              -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Réferences</th>
                                    <th>Code Patient</th>
                                    <th>Médecin</th>
                                    <th>Type d'anesthésie</th>
                                    <th>Chirugien</th>
                                    <th>Date</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($lvl == 9) {
                                    $query = "SELECT * from anesthesie where open_close!=1 and id_anes='$id_perso_session'";
                                } else {

                                    $query = "SELECT * from anesthesie where open_close!=1 ";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_anes = $row['id_anes'];
                                    $ref_anes = $row['ref_anes'];
                                    $id_patient = $row['id_patient'];
                                    $id_medecin = $row['id_medecin'];
                                    $date_anes = $row['date_anes'];
                                    $id_type_anes = $row['id_type_anes'];
                                    $id_chirugien = $row['id_chirugien'];


                                    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                     //   $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
                                        $nom_patient= $table['ref_patient'];
                                        $age= $table['age_p'];
                                    }



                                    $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];
                                    }

                                    $sql = "SELECT DISTINCT * from chirugien where id_chirugien = '$id_chirugien'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_chirugien= $table['nom_c'] . ' ' . $table['prenom_c'];
                                    }

                                    $sql = "SELECT DISTINCT * from type_anes where id_type_anes = '$id_type_anes'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $type_anes= $table['nom'] ;
                                    }
                                    if(empty($id_medecin)){
                                        $nom_medecin='N/A';
                                    }
                                    if(empty($id_type_anes)){
                                        $type_anes='N/A';
                                    }
                                    if(empty($id_chirugien)){
                                        $nom_chirugien='N/A';
                                    }

                                    ?>

                                    <tr>
                                        <td><a href="#"><?=$ref_anes?></a></td>
                                        <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                             class="rounded-circle m-r-5" alt=""><?=$nom_patient?></a></td>
                                        <td><a href="#"><?=$nom_medecin?></a></td>
                                        <td><a href="#"><?=$type_anes?></a></td>
                                        <td><a href="#"><?=$nom_chirugien?></a></td>
                                        <td><a href="#"><?= dateToFrench($date_anes, " j F Y")?></a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <!--                                                <a class="dropdown-item" href="#" data-toggle="modal"-->
                                                    <!--                                                   data-target="#delete_patient"><i class="fas fa-random"></i>-->
                                                    <!--                                                    Transférer</a>-->
                                                     <?php if ($lvl !=11) { ?>
                                                    <a class="dropdown-item" href="modifier_anesthesie.php?id=<?=$id_anes?>"><i
                                                            class="fas fa-pen"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete_anesthesie.php?id_anes=<?=$id_anes?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                        Delete</a>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--                End Body              -->

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>
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
    <script type="text/javascript">
        function Supp(link){
            if(confirm('Confirmer  la suppression de l\'Anesthésie ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>