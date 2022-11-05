<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-calendar-alt" style="color: silver"></i> Liste des opérations</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                        <?php if ($lvl != 8 and $lvl !=11) { ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouvelle_operation.php">
                                        <i class="fas fa-plus-square"></i>
                                        Nouvelle opération
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
                                    <th>Réference</th>
                                    <th>Code patient</th>
                                    <th>Age</th>
                                    <th>Médecin</th>
                                    <th>Department</th>
                                    <th>Chirugien</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if ($lvl == 5 ) {
                                    $query = "SELECT * from operation where id_medecin='$id_perso_session' and open_close!=1";
                                } elseif($lvl ==8 ){
                                    $query = "SELECT * from operation where id_inter='$id_perso_session' and open_close!=1";
                                }else {

                                    $query = "SELECT * from operation where open_close!=1";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                $id_ope = $row['id_ope'];
                                $ref_ope = $row['ref_ope'];
                                $id_patient = $row['id_patient'];
                                $id_medecin = $row['id_medecin'];
                                $id_inter = $row['id_inter'];
                                $date_ope = $row['date_ope'];
                                $resume = $row['resume'];
                                $obs_ope = $row['obs_ope'];
                                $id_type_ope = $row['id_type_ope'];
                                $time_first = $row['time_first'];
                                $time_last = $row['time_last'];
                                $id_depart = $row['id_depart'];



                                    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    //$nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
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


                                    $sql = "SELECT DISTINCT * from chirugien where id_chirugien = '$id_inter'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_chirugien= $table['nom_c'] . ' ' . $table['prenom_c'];
                                    }

                                $sql = "SELECT DISTINCT * from type_ope where id_type_ope = '$id_type_ope'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $type_ope= $table['nom'];
                                    $prix_total = $table['prix_t_ope'];
                                }

                                    $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $departement= $table['nom'];
                                    }

                                if(empty($id_medecin)){
                                    $nom_medecin='N/A';
                                }
                                if(empty($id_nurse)){
                                    $nom_nurse='N/A';
                                }
                                if(empty($id_depart)){
                                    $departement='N/A';
                                }
                                    if(empty($id_inter)){
                                        $nom_chirugien='N/A';
                                    }


                                    ?>

                                <tr>
                                    <td><?=$ref_ope?></td>
                                    <td><img width="28" height="28" src="assetss/img/user.jpg"
                                             class="rounded-circle m-r-5"
                                             alt=""> <?=$nom_patient?>
                                    </td>
                                    <td><?=$age?></td>
                                    <td><?=$nom_medecin?></td>
                                    <td><?=$departement?></td>
                                    <td><?=$nom_chirugien?></td>
                                    <td><?= dateToFrench($date_ope, " j F Y")?></td>
                                    <td><?=$time_first?> - <?=$time_last?></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                 <?php if ( $lvl !=11) { ?>
<!--                                                <a class="dropdown-item" href="#" data-toggle="modal"-->
<!--                                                   data-target="#delete_patient"><i class="fas fa-random"></i>-->
<!--                                                    Transférer</a>-->
                                                <a class="dropdown-item" href="modifier_operation.php?id=<?=$id_ope?>"><i
                                                            class="fas fa-pen"></i> Edit</a>
                                                <a class="dropdown-item" href="delete_operation.php?id=<?=$id_ope?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                    Delete</a>
                                                    <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php  }?>
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
            if(confirm('Confirmer  la suppression de l\'opération ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>