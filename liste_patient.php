<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');
//strtolower(); // ecrire en miniscule
//strtouppor(); // ecrire en majiscule
//ucfirst(strtolower()): // ecrire first word en majiscule
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des patients</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                        <?php
                        if($lvl != 1 and $lvl != 11){
                        ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouveau_patient.php">
                                        <i class="fas fa-user"></i>
                                        Nouveau patient
                                    </a>
                                </li>
                            </ul>
                        </b>
                        <?php
                        }
                        ?>


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
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
<!--                                    <th>Entreprise</th>-->
<!--                                    <th>Assurance</th>-->
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($lvl == 1) {

                                    $query = "SELECT * from patient where open_close!=1 and id_patient='$id_perso_session'  order by nom_p, prenom_p";
                                } else {

                                    $query = "SELECT * from patient where open_close!=1 order by nom_p, prenom_p";
                                }

                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_patient = $row['id_patient'];
                                    $ref_patient = $row['ref_patient'];
                                    $nom = $row['nom_p'];
                                    $prenom = $row['prenom_p'];
                                    $age = $row['age_p'];
                                    $adresse_p = $row['adresse_p'];
                                    $phone_p = $row['phone_p'];
                                    $email_p = $row['email_p'];
                                    $id_ent = $row['id_ent'];
                                    $id_ass = $row['id_ass'];

                                    $sql = "SELECT DISTINCT * from entreprises where id_ent = '$id_ent'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $raison_social_ent= $table['raison_social_ent'];
                                    }

                                    $sql = "SELECT DISTINCT * from assurances where id_ass= '$id_ass'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $raison_social_ass= $table['raison_social_ass'];
                                    }

                                    if(empty($id_ass)){
                                        $raison_social_ass="N/A";
                                    }

                                    if(empty($id_ent)){
                                        $raison_social_ent="N/A";
                                    }


                                    ?>
                                    <tr>
                                        <td><a href="details_patient.php?id=<?= $id_patient ?>"><?= $ref_patient ?></a></td>
                                        <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt=""><a
                                                    href="details_patient.php?id=<?= $id_patient ?>"><?php echo $nom . ' ' . $prenom ?></a>
                                        </td>
                                        <td><a href="details_patient.php?id=<?= $id_patient ?>"><?= $age ?></a></td>
                                        <td><a href="details_patient.php?id=<?= $id_patient ?>"><?= $adresse_p ?></a>
                                        </td>
                                        <td><a href="details_patient.php?id=<?= $id_patient ?>"><?= $phone_p ?></a></td>
                                        <td><a href="details_patient.php?id=<?= $id_patient ?>"><?= $email_p ?></a></td>
<!--                                        <td><a href="details_patient.php?id=--><?//= $id_patient ?><!--">--><?//= ucfirst(strtolower($raison_social_ent)) ?><!--</a></td>-->
<!--                                        <td><a href="details_patient.php?id=--><?//= $id_patient ?><!--">--><?//= ucfirst(strtolower($raison_social_ass)) ?><!--</a></td>-->
                                        <td class="text-right">

                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php
                                                    if($lvl == 2 || $lvl == 4  ){
                                                    ?><a class="dropdown-item" href="details_patient.php?id=<?= $id_patient ?>"><i
                                                                    class="fas fa-eye"></i> Détails</a>
                                                    <a class="dropdown-item" href="modifier_patient.php?id=<?=$id_patient?>"><i
                                                                class="fa fa-pen"></i> Edit</a>
                                                    <?php } ?>
                                                    <?php
                                                    if($lvl == 4 || $lvl == 7 ){
                                                    ?>
                                                    <a class="dropdown-item" href="delete_patient.php?id=<?=$id_patient?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
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
            if(confirm('Confirmer  la suppression du patient ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>