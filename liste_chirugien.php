<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-id-card-alt" style="color: silver"></i> Liste des chirugiens</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">
                        <?php if ($lvl != 8 and $lvl != 11) { ?>

                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouveau_chirugien.php">
                                        <i class="fas fa-user"></i>
                                        Nouveau chirugien
                                    </a>
                                </li>
                            </ul>
                        </b>
                        <?php }?>


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
                                    <th>Name</th>
                                    <th>Département</th>
                                    <th>Type</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($lvl == 8) {
                                    $query = "SELECT * from chirugien where id_chirugien='$id_perso_session' and open_close!=1 order by nom_c,prenom_c asc";
                                } else {

                                    $query = "SELECT * from chirugien where open_close!=1 order by nom_c,prenom_c asc";
                                }
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_chirugien = $row['id_chirugien'];
                                    $nom_c = $row['nom_c'];
                                    $prenom_c = $row['prenom_c'];
                                    $id_depart = $row['id_depart'];
                                    $phone_c= $row['phone_c'];
                                    $ville_c= $row['ville_c'];
                                    $email_c = $row['email_c'];
                                    $type_c = $row['type_c'];
                                    // $profession = $row['profession'];

                                    $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $departement=$table['nom'];
                                    }
                                    if(empty($departement)){
                                        $departement='N/A';
                                    }

                                    ?>

                                    <tr>
                                        <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt=""><a
                                                    href="details_chirugien.php?id=<?= $id_chirugien ?>"><?php echo $nom_c . ' ' . $prenom_c ?></a>
                                        </td>
                                        <td><a href="details_chirugien.php?id=<?= $id_chirugien ?>"><?=$departement?></a></td>
                                        </td>
                                        <td><a href="details_chirugien.php?id=<?= $id_chirugien ?>"><?= $type_c ?></a></td>
                                        <td><a href="details_chirugien.php?id=<?= $id_chirugien ?>"><?= $phone_c ?></a></td>
                                        <td><a href="details_chirugien.php?id=<?= $id_chirugien ?>"><?= $email_c ?></a></td>
                                        <td class="text-right">

                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php if ($lvl != 8 and $lvl != 11) { ?>
                                                    <a class="dropdown-item" href="modifier_chirugien.php?id=<?=$id_chirugien?>"><i
                                                                class="fa fa-pen"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete_chirugien.php?id=<?=$id_chirugien?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                        Delete</a><?php }?>
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
            if(confirm('Confirmer  la suppression du Chirugien ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>