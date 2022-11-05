<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des certificats médicaux</h1>
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
                                    <a class="btn btn-primary" href="nouveau_cert_medi.php">
                                        <i class="fas fa-user"></i>
                                        Nouveau certificat médical
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
                                <tr align="center">
                                    <th>Réf</th>
                                    <th>Patient</th>
                                    <th>Médecin</th>
                                    <th>Nbre de jour</th>
                                    <th>Date debut</th>
                                    <th>Date fin</th>
                                    <th>PDF</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($lvl == 5) {
                                    $query = "SELECT * from certi_medi where id_medecin='$id_perso_session' and open_close!=1";
                                } else {

                                    $query = "SELECT * from certi_medi where open_close!=1";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_certi_medi = $row['id_certi_medi'];
                                    $ref_certi_medi = $row['ref_certi_medi'];
                                    $id_patient = $row['id_patient'];
                                    $id_medecin = $row['id_medecin'];
                                    $date_debut = $row['date_debut'];
                                    $date_fin = $row['date_fin'];
                                    $nb_jour = $row['nb_jour'];


                                    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
                                        $age= $table['age_p'];
                                    }
                                    $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];
                                    }


                                    if(empty($id_medecin)){
                                        $nom_medecin='N/A';
                                    }

                                    if(empty($id_patient)){
                                        $nom_patient='N/A';
                                    }

                                    ?>
                                    <tr align="center">
                                        <td><a href="#"> <?=$ref_certi_medi?></a></td>
                                        <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5"
                                                 alt=""><a href="#"><?=$nom_patient?></a></td>
                                        <td><a href="#"> <?=$nom_medecin?></a></td>
                                        <td><a href="#"><?=$nb_jour?></a></td>
                                        <td><a href="#"><?= dateToFrench($date_debut, " j F Y")?></a></td>
                                        <td><a href="#"><?= dateToFrench($date_fin, " j F Y")?></a></td>
                                        <td><a href="facture_certi_medi.php?id_certi_medi=<?=$id_certi_medi?>" target="_blank">
                                                <i class="fa fa-print"></i>
                                            </a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="modifier_cert_medi.php?id=<?=$id_certi_medi?>"><i
                                                            class="fas fa-pen"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete_cert_medi.php?id=<?=$id_certi_medi?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
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
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Différence de jours Incorrect !!!',
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
            if(confirm('Confirmer  la suppression de l\'hospitalisation ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>