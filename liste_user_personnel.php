<?php
include("first.php");
include('php/main_side_navbar.php');
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Utilisateurs</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?= strtoupper($nom_user) ?>, il est <?= date("G:i"); ?> en ce jour
                        du <?= dateToFrench("now", "l j F Y"); ?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">

                                <!-- Nav pills -->

                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="btn btn-primary" href="nouveau_utilisateur.php">
                                                <i class="fas fa-plus"></i>
                                                Nouvel Utilisateur personnel
                                            </a>
                                        </li>
                                    </ul>
                                </b>

                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="">
                                                    <table class="table table-bordered table-hover" id="dataTable"
                                                           width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">pseudo</p></th>
                                                            <th><p align="center">Profil</p></th>
                                                            <!--                                                            <th><p align="center">Chantier</p></th>-->
                                                            <th><p align="center">Date d'inscription</p></th>
                                                            <th><p align="center">Statut</p></th>
                                                            <?php
                                                            if ($lvl == 4 || $lvl == 5) {
                                                                ?>
                                                                <th><p align="center">Action</p></th>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tr>
                                                        </thead>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">pseudo</p></th>
                                                            <th><p align="center">Profil</p></th>
                                                            <!--                                                            <th><p align="center">Chantier</p></th>-->
                                                            <th><p align="center">Date d'inscription</p></th>
                                                            <th><p align="center">Statut</p></th>
                                                            <?php
                                                            if ($lvl == 4 || $lvl == 5) {
                                                                ?>
                                                                <th><p align="center">Action</p></th>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php
                                                        if( $lvl == 4 ||  $lvl == 7  )
                                                            $query = "SELECT * from users ";
                                                        else
                                                            $query = "SELECT * from users where lvl=6";


                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_user = $row['id_users'];
                                                            $id_perso = $row['id_perso'];
                                                            $pseudo = $row['pseudo'];
                                                            $lvl_user = $row['lvl'];
                                                            $date = $row['date'];

                                                            $query1 = "SELECT * from roles WHERE lvl=$lvl_user";
                                                            $q1 = $db->query($query1);
                                                            while ($row1 = $q1->fetch()) {
                                                                $lvl_user = $row1['fonction'];
                                                            }

//                                                            $id_chantier = 0;
//                                                            $query2 = "SELECT * from personnel WHERE id_personnel=$id_perso";
//                                                            $q2 = $db->query($query2);
//                                                            while ($row2 = $q2->fetch()) {
//                                                                $id_chantier = $row2['id_chantier'];
//                                                            }
//
//                                                            $query3 = "SELECT * from chantier WHERE id_chantier=$id_chantier";
//                                                            $q3 = $db->query($query3);
//                                                            while ($row3 = $q3->fetch()) {
//                                                                $id_chantier = $row3['nom_chantier'];
//                                                            }

                                                            $statut = $row['statut'];
                                                            if ($statut == "D") {
                                                                $statut = "Innactif(ve)";
                                                                $togle = 'fas fa-toggle-off';
                                                            } else {
                                                                $statut = "Actif(ve)";
                                                                $togle = 'fas fa-toggle-on';
                                                            }

                                                            ?>

                                                            <tr>
                                                                <td align="center"><b><a
                                                                            href="modifier_users.php?id_user=<?= $id_user ?>"><?= $pseudo; ?></a></b>
                                                                </td>
                                                                <td align="center"><b><?= $lvl_user; ?></b></td>
                                                                <?php
                                                                //                                                                if ($id_chantier == "0") {
                                                                //                                                                    $id_chantier = "N/A";
                                                                //                                                                }
                                                                ?>
                                                                <!--                                                                <td align="center"><b>--><?php ////$id_chantier; ?><!--</b></td>-->
                                                                <td align="center"><b><?= $date; ?></b></td>
                                                                <td align="center"><?= $statut ?></td>
                                                                <?php
                                                                if ($lvl == 4 || $lvl == 5) {
                                                                    ?>
                                                                    <td align="center"><a
                                                                            href="statut_users.php?id_user=<?= $id_user ?>"><i
                                                                                class="<?= $togle ?>"></a></i></td>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!--//Footer-->
<?php
include('foot.php');
?>