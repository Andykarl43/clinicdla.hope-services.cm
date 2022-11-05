<?php

include('first.php');
include('php/main_side_navbar.php');
$password = password_generate(8);
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Utilisateur Patient</h1>
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
                            <form class="form-horizontal" action="inscription_traitement_patient.php" method="POST">
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table border="0" class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 50%">
                                                        <span class="help-block small-font">NOM DU PATIENT</span>

                                                        <div class="col">
                                                            <select name="id_patient" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                <option value="" selected="">...</option>
                                                                <?php
                                                                $query = "SELECT * from patient where open_close!=1";
                                                                $q = $db->query($query);
                                                                while ($row = $q->fetch()) {
                                                                    $id_patient = $row['id_patient'];
                                                                    $nom = $row['nom_p'];
                                                                    $prenom = $row['prenom_p'];

                                                                    echo '<option value="' . $id_patient . '">';
                                                                    echo $nom . ' ' . $prenom;
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
                                                                <?php

                                                                    $iResult = $db->query('SELECT * FROM roles where id=1');

                                                                //$iResult = $db->query('SELECT * FROM roles');
                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['lvl'];
                                                                    echo '<option value ="' . $i . '" selected>';
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
                                                            <input type="text" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                   name="password" value="<?=$password?>" required>
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
                                    <a href="liste_user_patient.php" style=" width:150px;"
                                       class="btn btn-danger"><font>Annuler</font></a>
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