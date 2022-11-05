<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-calendar-alt" style="color: silver"></i> Liste des Rendez-vous</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">


                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouveau_appointment.php">
                                        <i class="fas fa-calendar-alt"></i>
                                        Nouveau rendez-vous
                                    </a>
                                </li>
                            </ul>
                        </b>


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
                                        <th>Age</th>
                                        <th>Médecin</th>
                                        <th>Department</th>
                                        <th>Rendez-vous</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($lvl == 5) {
                                            $query = "SELECT * from appointment where id_medecin='$id_perso_session' order by date_apt, time_apt";
                                        } elseif($lvl == 1){
                                            $query = "SELECT * from appointment where id_patient='$id_perso_session' order by date_apt, time_apt";
                                        }else {

                                            $query = "SELECT * from appointment order by date_apt, time_apt";
                                        }


                                        $q = $db->query($query);
                                        while ($row = $q->fetch()) {
                                            $id_app = $row['id_app'];
                                                $ref_app = $row['ref_app'];
                                                $id_patient = $row['id_patient'];
                                                $id_depart = $row['id_depart'];
                                                $id_medecin = $row['id_medecin'];
                                                $date_app = $row['date_app'];
                                                $time_app = $row['time_app'];
                                                $statut_app = $row['statut_app'];


                                    ?>
                                    <tr>
                                        <td><?= $ref_app ?></td>
                                        <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt="">
                                                 <?php

                                                $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                   // echo $table['nom_p'].' '.$table['prenom_p'];
                                                    echo $table['ref_patient'];

                                               echo'</td>';
                                                echo'<td>'.$table['age_p'].'</td>';
                                                }

                                                ?>
                                        
                                        <td><?php

                                                $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    echo $table['nom_m'].' '.$table['prenom_m'];

                                               
                                                }

                                                ?></td>
                                        <td><?php

                                                $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    echo $table['nom'];

                                               
                                                }



                                                ?></td>
                                        <td><?= dateToFrench($date_app, "l j F Y")?></td>
                                        <td><?=$time_app?></td>
                                        <td><?php


                                                if($statut_app=="1")
                                                    echo'<span class="custom-badge status-green">active</span>';
                                            else
                                                    echo'<span class="custom-badge status-red">Inactive</span>';
                                                
                                            
                                        ?>

                                         </td>
                                        
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
<!--                                                    <a class="dropdown-item" href="#" data-toggle="modal"-->
<!--                                                       data-target="#delete_patient"><i class="fas fa-random"></i>-->
<!--                                                        Transférer</a>-->
                                                    <a class="dropdown-item" href="modifier_appointment.php?id=<?=$id_app?>"><i
                                                                class="fas fa-pen"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete_appointment.php?id=<?=$id_app?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                        Delete</a>
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
            if(confirm('Confirmer  la suppression de le rendez-vous ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>