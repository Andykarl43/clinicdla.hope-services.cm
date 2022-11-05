<?php

include('first.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Utilisateur</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?= strtoupper($nom_user) ?> il est <?= date("G:i"); ?> en ce jour
                        du <?= dateToFrench("now", "l j F Y"); ?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <?php
                                if (isset($_GET['reg_err'])) {
                                    $err = $_GET['reg_err'];

                                    switch ($err) {
                                        case 'password';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> mot de passe différent
                                            </div>
                                            <?php
                                            break;
                                        case 'already';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> compte déjà existant
                                            </div>
                                            <?php
                                            break;
                                        case 'email';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> email non valide
                                            </div>
                                            <?php
                                            break;
                                        case 'pseudo_lenght';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> pseudo trop long
                                            </div>
                                            <?php
                                            break;
                                        case 'email_lenght';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> email trop long
                                            </div>
                                            <?php
                                            break;
                                        case 'success';
                                            ?>
                                            <div class="alert alert-success">
                                                <strong>Succès : </strong> inscription réussie, vous pouvez vous
                                                connecter en cliquant sur "Connexion" !
                                            </div>
                                            <?php
                                            break;
                                    }
                                }
                                ?>
                            </div>
                            <form class="form-horizontal" action="inscription_traitement.php" method="POST">
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table border="0" class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font">NOM DU PERSONNEL</span>

                                                        <div class="col">
                                                            <select name="id_person" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                <option value="" selected="">...</option>
                                                                <?php
                                                                $query = "SELECT * from personnel";
                                                                $q = $db->query($query);
                                                                while ($row = $q->fetch()) {
                                                                    $id_personnel = $row['id_personnel'];
                                                                    $matricule = $row['matricule'];
                                                                    $nom = $row['nom'];
                                                                    $prenom = $row['prenom'];

                                                                    echo '<option value="' . $id_personnel . '">';
                                                                    echo $nom . ' ' . $prenom . ' (' . $matricule . ')';
                                                                    echo '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font">PROFIL</span>
                                                        <div class="col">
                                                            <select name="lvl" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                <option value="" selected="">...</option>
                                                                <?php
                                                                if($lvl == 6 ){
                                                                    $iResult = $db->query('SELECT * FROM roles where id=6');
                                                                }else{
                                                                    $iResult = $db->query('SELECT * FROM roles');
                                                                }

                                                                //$iResult = $db->query('SELECT * FROM roles');
                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['lvl'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    echo $data['fonction'];
                                                                    echo '</option>';

                                                                }
                                                                ?>
                                                            </select>
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
                                                                   name="pseudo" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font">Mot de passe</span>
                                                        <div class="col">
                                                            <input type="password" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                   name="password" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <center>
                                    <button type="submit" style=" width:150px;" name="submit_user"
                                            class="btn btn-primary">Créer
                                    </button>
                                    <a href="liste_user_personnel.php" style=" width:150px;"
                                       class="btn btn-primary"><font>Annuler</font></a>
                                </center>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!--//Footer-->
<?php
include('foot.php');
?>