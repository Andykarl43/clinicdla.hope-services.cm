<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-tasks" style="color: silver"></i> Liste des Ordonnances</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                        <?php if ($lvl !=11) { ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouvelle_ordonnance.php">
                                        <i class="fas fa-user"></i>
                                        Nouvelle ordonance
                                    </a>
                                </li>
                            </ul>
                        </b>
                        <?php } ?>
                        
                        <b>



                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_ordonnance_echec.php">

                                        <?php

                                        if($lvl == 5) {
                                            $query = "SELECT DISTINCT count(id_ordo) as total from ordonnance WHERE id_medecin = '$id_perso_session' and etat=-1 ";
                                        }else{
                                            $query = "SELECT DISTINCT count(id_ordo) as total from ordonnance where etat=-1  ";
                                        }

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Ordonnance en échec ['.$row['total'].']';

                                        }

                                        ?>


                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_ordonnance_suite.php">

                                        <?php

                                        if($lvl == 5) {
                                            $query = "SELECT DISTINCT count(id_ordo) as total from ordonnance WHERE id_medecin = '$id_perso_session' and etat=0 ";
                                        }else{
                                            $query = "SELECT DISTINCT count(id_ordo) as total from ordonnance where etat=0  ";
                                        }

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Ordonnance en cours de validation['.$row['total'].']';

                                        }

                                        ?>


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
                                    <th>Code Patient</th>
                                    
                                    <?php if($lvl == 5){ ?>
                                    <th>Médecin</th>
                                    <?php }elseif( $lvl == 10 ){ ?>
                                    <th>Pharmacien</th>
                                    <?php }else{ ?>
                                    <th>Médecin</th>
                                    <th>Pharmacien</th>
                                    <?php } ?>
                                    
                                    <th>listes médicaments</th>
                                    <th>observations</th>
                                    <th>Date</th>
<!--                                    <th>Statuts</th>-->
<!--                                    <th>PDF</th>-->
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                if ($lvl == 5) {
                                    $query = "SELECT * from ordonnance where id_medecin='$id_perso_session' and etat=1";
                                } elseif ($lvl == 10){
                                    $query = "SELECT * from ordonnance where id_pharmacien='$id_perso_session' and etat=1";
                                } else{
                                    $query = "SELECT * from ordonnance where etat=1";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                $id_ordo = $row['id_ordo'];
                                $ref_ordo = $row['ref_ordo'];
                                $id_patient = $row['id_patient'];
                                $id_depart = $row['id_depart'];
                                $id_medecin = $row['id_medecin'];
                                $id_pharmacien = $row['id_pharmacien'];
                                $date_ordo = $row['date_ordo'];


                                $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    //$nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
                                    $nom_patient = $table['ref_patient'];
                                    $age= $table['age_p'];
                                }



                                $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];

                                }
                                
                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pharmacien'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $nom_pharmacien= $table['nom'] . ' ' . $table['prenom'];

                                }

                                $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $departement= $table['nom'] ;
                                }

                                if(empty($id_medecin)){
                                    $nom_medecin='N/A';
                                }
                                
                                if(empty($id_pharmacien)){
                                    $nom_pharmacien='N/A';
                                }
//                                if(empty($id_nurse)){
//                                    $nom_nurse='N/A';
//                                }
                                if(empty($id_depart)){
                                    $departement='N/A';
                                }

                                ?>

                                <tr>

                                    <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                         class="rounded-circle m-r-5" alt=""><?=$nom_patient?></a></td>
                                                         
                                    <?php if($lvl == 5){?>
                                                 <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt=""><?=$nom_medecin?></a></td>
                                        <?php }elseif($lvl==10){ ?>
                                                 <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt=""><?=$nom_pharmacien?></a></td>
                                            <?php }else{?>
                                                 <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt=""><?=$nom_medecin?></a></td>
                                                 <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt=""><?=$nom_pharmacien?></a></td>
                                                <?php }?>
                                    

                                    <td align="center"><a
                                                class="btn btn-primary"
                                                href="liste_medicament_ordo.php?ref_ordo=<?=$ref_ordo?>"
                                                title="view"
                                                style="background-color: transparent">
                                            <i style="color: green" class="fas fa-eye"></i>
                                        </a></td>
                                    <td><a href="#">observations</a></td>
                                    <td><a href="#"><?= dateToFrench($date_ordo, " j F Y")?></a></td>
<!--                                    <td><span class="custom-badge status-red">Impayer</span></td>-->
<!--                                    <td align="center"><a href="#" target="_blank">-->
<!--                                            <i class='fa fa-print'"></i>-->
<!--                                        </a></td>-->
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
<!--                                                <a class="dropdown-item" href="#" data-toggle="modal"-->
<!--                                                   data-target="#delete_patient"><i class="fas fa-random"></i>-->
<!--                                                    Transférer</a>-->
                                                <?php
                                                if ($lvl != 10 and $lvl != 11) {
                                                ?>
                                                <a class="dropdown-item" href="modifier_ordonnance.php?id=<?=$id_ordo?>"><i
                                                            class="fas fa-pen"></i> Edit</a>
                                                <a class="dropdown-item" href="delete_ordonnance.php?id=<?=$id_ordo?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
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
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Stock Insuffisant !',
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
            if(confirm('Confirmer  la suppression de l\'ordonnance ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>