<?php
include('first.php');
include('php/main_side_navbar.php');
include('update_mdp.php');
include('update_users.php');


if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $query = "SELECT * FROM users WHERE id_users =$id_user ";
    $q = $db->query($query);
    while ($row = $q->fetch()) {
        $id_perso = $row['id_perso'];
        $pseudo = $row['pseudo'];
        $secteur = $row['secteur'];
        $salle = $row['salle'];
        $lvl_user = $row['lvl'];
        $date = $row['date'];

        $query1 = "SELECT * from roles WHERE lvl=$lvl_user";
        $q1 = $db->query($query1);
        while ($row1 = $q1->fetch()) {
            $lvl_user = $row1['fonction'];
        }

        $personnel = "";
        $query4 = "SELECT * FROM personnel WHERE id_personnel=$id_perso";
        $q4 = $db->query($query4);
        while ($row4 = $q4->fetch()) {
            $personnel = $row4['nom'] . ' ' . $row4['prenom'];
        }
    }

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Utilisateur</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <!--                Main Body-->
                <form class="form-horizontal" action="" method="POST">
                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <div class="card-header">

                                </div>

                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table border="0" class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font">NOM DU PERSONNEL</span>
                                                        <div class="col">
                                                            <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                   value="<?= strtoupper($personnel) ?>" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font">PROFIL</span>
                                                        <div class="col">
                                                            <div class="col">
                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                       value="<?= strtoupper($lvl_user) ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table border="0" class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font">Pseudo</span>
                                                        <div class="col">
                                                            <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                   value="<?= $pseudo ?>" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font">Mot de passe</span>
                                                        <div class="col">
                                                            <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                   value="XXXXXXXXXXXXXXXXXXXXXXXXXX" readonly>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="card-footer">

                                </div>

                            </div>
                        </div>
                    </div>
                    <center>
                        <!--                    <input type="submit" name="submit_update_user" class="btn btn-primary" value="Mettre à jour">-->
                        <?php
                        if ($lvl == 4 || $lvl == 5) {
                            ?>
                            <button type="button" data-toggle="modal" data-target="#editMdp" class="btn btn-primary">
                                Changer de Mot de passe
                            </button>
                            <?php
                        }
                        ?>
                        <a href="liste_utilisateurs.php" style=" width:150px;" class="btn btn-primary">Annuler</a>
                    </center>
                </form>

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!--    Modal pour éditer mdp-->
    <div class="modal fade" id="editMdp" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><b>Changer mot de passe</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Nouveau mot de passe</label>
                            <div class="col-sm-12">
                                <input type="password" name="mdp" class="form-control" required>
                                <input type="hidden" name="id_user" value="<?= $id_user ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-12">
                                <input type="submit" name="submit_mdp" class="btn btn-primary" value="Modifier">
                                <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--//Footer-->
    <?php
}
include('foot.php');
?>
