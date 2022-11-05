<?php

include('first.php');
include('php/main_side_navbar.php');

$password = password_generate(8);
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Spécialiste</h1>
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
                            <form class="form-horizontal" action="inscription_traitement_specialiste.php" method="POST">
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table border="0" class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="col">
                                                            <ul class="nav nav-pills">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-toggle="tab" href="#a1">
                                                                        <i class="fas fa-user-md"></i>
                                                                        Médecin
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="tab" href="#a2">
                                                                        <i class="fas fa-id-card-alt"></i>
                                                                        Chirugien
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="tab" href="#a3">
                                                                        <i class="fa fa-address-card"></i>
                                                                        Laborantin
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div class="tab-pane  active" id="a1">
                                                                    <span class="help-block small-font" >Médecin :</span>
                                                                    <div class="col">
                                                                        <select name="id_medecin"  style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                            <option value="0" selected>...</option>
                                                                            <?php
                                                                            $ext="E";
                                                                            $iResult = $db->query('SELECT * FROM medecin where   open_close!=1');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_medecin'];
                                                                                echo '<option value ="'.$i.'">';
                                                                                echo $data['nom_m'].' '.$data['prenom_m'];
                                                                                echo '</option>';

                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_medecin.php"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane " id="a2">
                                                                    <span class="help-block small-font" >Chirugien :</span>
                                                                    <div class="col">
                                                                        <select name="id_chirugien" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                            <option value="0" selected>...</option>
                                                                            <?php

                                                                            $iResult = $db->query('SELECT * FROM chirugien where open_close!=1  ');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_chirugien'];
                                                                                echo '<option value ="'.$i.'">';
                                                                                echo $data['nom_c'].' '.$data['prenom_c'];
                                                                                echo '</option>';

                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_chirugien.php"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane " id="a3">
                                                                    <span class="help-block small-font" >Laborantin :</span>
                                                                    <div class="col">
                                                                        <select name="id_laboratin" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                            <option value="0" selected>...</option>
                                                                            <?php

                                                                            $iResult = $db->query('SELECT * FROM laboratin where open_close!=1');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_laboratin'];
                                                                                echo '<option value ="'.$i.'">';
                                                                                echo $data['nom_l'].' '.$data['prenom_l'];
                                                                                echo '</option>';

                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_laboratin.php"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font">PROFIL</span>
                                                        <div class="col">

                                                            <input type="text" style="width:75%;border-top: 0; border-left: 0;
                                                                                    border-right: 0;
                                                                                    background: transparent;"
                                                                   value="MEMBRE" readonly>
                                                            <input type="hidden" name="lvl" value="1">

                                                            <!--<select name="lvl" style="width:75%;border-top: 0; border-left: 0;-->
                                                            <!--border-right: 0;-->
                                                            <!--background: transparent;" required>-->
                                                            <!--<option value="" selected="">...</option>-->
                                                            <?php

                                                            // $iResult = $db->query('SELECT * FROM roles');
                                                            // while ($data = $iResult->fetch()) {

                                                            // $i = $data['lvl'];
                                                            // echo '<option value ="' . $i . '">';
                                                            // echo $data['fonction'];
                                                            // echo '</option>';

                                                            // }
                                                            ?>
                                                            <!--</select>-->
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
                                                    <td>
                                                        <span class="help-block small-font">Email</span>
                                                        <div class="col">
                                                            <input type="email" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                   name="email">
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
                                    <a href="liste_utilisateurs.php" style=" width:150px;"
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