<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fa fa-user-md" style="color: silver" aria-hidden="true"></i> Liste des
                    Médecins</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                        <?php
                        if( $lvl == 4 || $lvl == 7 ){
                        ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouveau_medecin.php">
                                        <i class="fas fa-user-md"></i>
                                        Nouveau médecin
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
                                    <th>Spécialité</th>
                                    <th>Type</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($lvl == 5) {
                                    $query = "SELECT * from medecin where id_medecin='$id_perso_session' order by nom_m,prenom_m asc";
                                } else {

                                    $query = "SELECT * from medecin  order by nom_m,prenom_m asc";
                                }


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_medecin = $row['id_medecin'];
                                    $nom_m = $row['nom_m'];
                                    $prenom_m = $row['prenom_m'];
                                    $id_spe = $row['id_spe'];
                                    $phone_m = $row['phone_m'];
                                    $ville_m = $row['ville_m'];
                                    $id_spe = $row['id_spe'];
                                    $type_m = $row['type_m'];
                                    $email_m = $row['email_m'];
                                    $region_m = $row['region_m'];
                                    // $profession = $row['profession'];


                                    $sql = "SELECT DISTINCT * from specialiste where id_spe = '$id_spe'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $specialiste=$table['nom'];
                                    }

                                    $sql = "SELECT DISTINCT * from type_medecin where type_m = '$type_m'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $type_medecin=$table['label'];
                                    }

                                    if(empty($specialiste)){
                                        $specialiste='N/A';
                                    }
                                    if(empty($type_medecin)){
                                        $type_medecin='N/A';
                                    }


                                    ?>
                                    <tr>
                                        <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                 class="rounded-circle m-r-5" alt=""><a
                                                    href="details_medecin.php?id=<?= $id_medecin ?>"><?php echo $nom_m . ' ' . $prenom_m ?></a>
                                        </td>
                                        <td><a href="details_medecin.php?id=<?= $id_medecin ?>"><?=$specialiste?></a></td>
                                        <td><a href="details_medecin.php?id=<?= $id_medecin ?>"><?=$type_medecin ?></a>
                                        </td>
                                        <td><a href="details_medecin.php?id=<?= $id_medecin ?>"><?= $phone_m ?></a></td>
                                        <td><a href="details_medecin.php?id=<?= $id_medecin ?>"><?= $email_m ?></a></td>
                                        <td class="text-right">

                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php
                                                    if( $lvl == 4 || $lvl == 7 ){
                                                    ?>
                                                    <a class="dropdown-item" href="modifier_medecin.php?id=<?=$id_medecin?>"><i
                                                                class="fa fa-pen"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete_medecin.php?id=<?=$id_medecin?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
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
            if(confirm('Confirmer  la suppression du medecin ?')){
                document.location.href = link;
            }
        }
    </script>

    <!--//Footer-->
<?php
include('foot.php');
?>