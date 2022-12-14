<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des Ecographies</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">
                                
                                  <?php

                                        if( $lvl != 11) {
                                            ?>

                            <b>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills" style="float: right;">
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="nouveau_ecographie.php">
                                            <i class="fas fa-user"></i>
                                            Nouvelle ├ęcographie
                                        </a>
                                    </li>
                                </ul>
                            </b>
                            
                        <b>
                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="nav-link" href="liste_ecographie_suite.php">

                                        <?php

                                        if($lvl == 5) {
                                            $query = "SELECT DISTINCT count(id_eco) as total from ecographie WHERE id_medecin = '$id_perso_session' and etat=0 ";
                                        }else{
                                            $query = "SELECT DISTINCT count(id_eco) as total from ecographie where etat=0  ";
                                        }

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {
                                            echo ' Ecographie en cours de paiement['.$row['total'].']';

                                        }

                                        ?>


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
                                    <th>R├ęferences</th>
                                    <th>Code Patient</th>
                                    <th>M├ędecin</th>
                                    <th>Type d'├ęcographie</th>
                                    <th>Date</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($lvl == 5) {
                                    $query = "SELECT * from ecographie where open_close!=1 and id_medecin='$id_perso_session' and etat=1 ";
                                } else {

                                    $query = "SELECT * from ecographie where open_close!=1 and etat=1 ";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_eco = $row['id_eco'];
                                    $ref_eco = $row['ref_eco'];
                                    $id_patient = $row['id_patient'];
                                    $id_medecin = $row['id_medecin'];
                                    $date_eco = $row['date_eco'];
                                    $id_type_eco = $row['id_type_eco'];


                                    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                      //  $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
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



                                    $sql = "SELECT DISTINCT * from type_eco where id_type_eco = '$id_type_eco'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $type_eco= $table['nom'] ;
                                    }
                                    if(empty($id_medecin)){
                                        $nom_medecin='N/A';
                                    }
                                    if(empty($id_type_eco)){
                                        $type_eco='N/A';
                                    }


                                    ?>

                                    <tr>
                                        <td><a href="#"><?=$ref_eco?></a></td>
                                        <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                             class="rounded-circle m-r-5" alt=""><?=$nom_patient?></a></td>
                                        <td><a href="#"><?=$nom_medecin?></a></td>
                                        <td><a href="#"><?=$type_eco?></a></td>
                                        <td><a href="#"><?= dateToFrench($date_eco, " j F Y")?></a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                     <?php

                                                    if( $lvl != 11) {
                                                     ?>
                                                    <!--                                                <a class="dropdown-item" href="#" data-toggle="modal"-->
                                                    <!--                                                   data-target="#delete_patient"><i class="fas fa-random"></i>-->
                                                    <!--                                                    Transf├ęrer</a>-->
                                                    <a class="dropdown-item" href="modifier_ecographie.php?id=<?=$id_eco?>"><i
                                                            class="fas fa-pen"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete_ecographie.php?id_eco=<?=$id_eco?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
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
                    'Succ├Ęs',
                    'Op├ęration effectu├ęe avec succ├Ęs !',
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
                    footer: 'Re├ęssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>
    <script type="text/javascript">
        function Supp(link){
            if(confirm('Confirmer  la suppression de l\'ecographie ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>