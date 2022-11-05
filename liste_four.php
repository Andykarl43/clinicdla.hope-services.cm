<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-shipping-fast" style="color: silver"></i> Liste Fournisseurs</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">
                        <?php if($lvl != 11){ ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouveau_four.php">
                                        <i class="fas fa-plus-circle"></i>
                                        Nouveau fournisseur
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
                                    <th>Raison Sociale</th>
                                    <th>email</th>
                                    <th>Tel</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php

                                $query = "SELECT * from fournisseur order by date_four asc";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                $id_four = $row['id_four'];
                                $ref_four = $row['ref_four'];
                                $raison_social_four = $row['raison_social_four'];
                                $email_four = $row['email_four'];
                                $pays_four = $row['pays_four'];
                                $ville_four = $row['ville_four'];
                                $tel_four = $row['tel_four'];
                                $contact = $row['personne_contact'];
                                $tel = $row['tel_contact'];
                                
                                if(empty($email_four)){
                                    $email_four='N/A';
                                }
                                if(empty($tel_four)){
                                    $tel_four='N/A';
                                }


                                    ?>

                                <tr>
                                    <td><a href="#"><?= $ref_four ?></a></td>
                                    <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                         class="rounded-circle m-r-5" alt=""><?= $raison_social_four ?></a></td>
                                    <td><a href="#"><?= $email_four ?></a></td>
                                    <td><a href="#"><?= $tel_four ?></a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <?php if($lvl != 11){ ?>
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="modifier_four.php?id=<?=$id_four?>"><i
                                                            class="fa fa-pen"></i> Edit</a>
                                                <a class="dropdown-item" href="delete_four.php?id=<?=$id_four?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                    Delete</a>
                                            </div>
                                            <?php } ?>
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
                    title: 'Oops...', c
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
            if(confirm('Confirmer  la suppression du fournisseur ?')){
                document.location.href = link;
            }
        }
    </script>


    <!--//Footer-->
<?php
include('foot.php');
?>