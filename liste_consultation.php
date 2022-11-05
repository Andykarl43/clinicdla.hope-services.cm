<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-heartbeat" style="color: silver"></i> Liste des consultations</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                        <?php
                        if( $lvl != 1 and  $lvl != 11 ){
                        ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouvelle_consultation.php">
                                        <i class="fas fa-heartbeat"></i>
                                        Nouvelle consultation
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
<!--                                    <th>Code Patient</th>-->
                                    <th>Réference</th>
                                    <th style="width: 15%"> Code Patient</th>
                                    <th style="width: 15%">Infirmière(ier)</th>
                                    <th>Age</th>
                                    <th style="width: 15%">Médecin</th>
                                    <th>Departement</th>
                                    <th>Type Consultation</th>
                                    <th>Date de consultation</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($lvl == 5 ) {
                                    $query = "SELECT * from consultation where id_medecin='$id_perso_session' and open_close!=1";
                                } elseif( $lvl == 3){
                                      $query = "SELECT * from consultation where id_nurse='$id_perso_session' and open_close!=1";
                                }else {

                                    $query = "SELECT * from consultation where open_close!=1";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                $id_con = $row['id_con'];
                                $ref_con = $row['ref_con'];
                                $id_patient = $row['id_patient'];
                                $id_depart = $row['id_depart'];
                                $id_medecin = $row['id_medecin'];
                                $id_nurse = $row['id_nurse'];
                                $date_con = $row['date_con'];
                                $temp = $row['temp'];
                                $taille = $row['taille'];
                                $pression = $row['pression'];
                                $poids = $row['poids'];
                                $id_type_consul = $row['id_type_consul'];


                                    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        //$nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
                                        $nom_patient= $table['ref_patient'];
                                       $age= $table['age_p'];
                                    }

                                    $sql = "SELECT DISTINCT * from nurse where id_nurse = '$id_nurse'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_nurse= $table['nom_n'] . ' ' . $table['prenom_n'];
                                    }

                                    $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];
                                    }

                                    $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $departement= $table['nom'] ;
                                    }

                                    $sql = "SELECT DISTINCT * from type_consul where id_type_consul = '$id_type_consul'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $type_consul= $table['nom'] ;
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
                                    if(empty($id_type_consul)){
                                        $type_consul='N/A';
                                    }

                                    ?>
                                <tr>
                                    <td><?=$ref_con?></td>
                                    <td><img width="28" height="28" src="assetss/img/user.jpg"
                                             class="rounded-circle m-r-5"
                                             alt=""> <?=$nom_patient?>
                                    </td>
                                    <td><?=$nom_nurse?></td>
                                    <td><?=$age?></td>
                                    <td><?=$nom_medecin?></td>
                                    <td><?=$departement?></td>
                                    <td><?=$type_consul?></td>
                                    <td><?= dateToFrench($date_con, " j F Y")?></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
<!--                                                <a class="dropdown-item" href="#" data-toggle="modal"-->
<!--                                                   data-target="#delete_patient"><i class="fas fa-random"></i>-->
<!--                                                    Transférer</a>-->
                                                <?php
                                                if( $lvl != 1 and  $lvl != 11){
                                                ?>
                                                    <a class="dropdown-item" href="details_consultation.php?id=<?=$id_con?>"><i
                                                                class="fas fa-eye"></i> Détails</a>
                                                <a class="dropdown-item" href="modifier_consultation.php?id=<?=$id_con?>"><i
                                                            class="fas fa-pen"></i> Edit</a>

                                                <a class="dropdown-item" href="delete_consultation.php?id=<?=$id_con?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                    Delete</a>
                                                <?php }?>
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
            if(confirm('Confirmer  la suppression de la consultation ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>