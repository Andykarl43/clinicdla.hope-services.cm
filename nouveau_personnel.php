<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

$query = "SELECT id_personnel as total from personnel";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total = $row["total"];
}
$id_personnel = $total;

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Fiche d'Inscription</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <b>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $personnel['option2_link'] ?>">

                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-cubes"></i>
                                                Etat Civile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-university"></i>
                                                Etat Academique
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-envelope"></i>
                                                Etat Professionnel
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                                <i class="fas fa-user"></i>
                                                Information RH
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu4">
                                                <i class="fas fa-plus"></i>
                                                Primes
                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Etat Civile-->
                                    <div class="tab-pane container active" id="home">
                                        <!-- infos civile-->

                                        <h5><b><u>NB:</u></b> Veillez saisir vos informations d'état civil comme sur vos
                                            pièces d'identité</h5>

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="save_civil_pers.php"
                                                          method="POST">
                                                        <div class="card-header">

                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table class="table  table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>

                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">Nom</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Prénom</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prenom"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">N° CNI ou Passport</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0;
                                                                                 border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="id_card_number"
                                                                                           >
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Date D'expiration CNI</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="id_card_validity"
                                                                                           >
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Tel</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel"
                                                                                           >
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Email</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" type="email"
                                                                                           name="email">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Nom du Père</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_pere">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Nom de la mère</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_mere">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Date de Naissance</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_naissance"
                                                                                           >
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Lieu de Naissance</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="lieu_naissance"
                                                                                           >
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Ville</span>
                                                                                <div class="col">
                                                                                    <select name="id_ville" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                        <option value="0" selected>...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM ville where open_close!=1');

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_ville'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>


                                                                                    </select>
                                                                                    <button type="button"
                                                                                            data-toggle="modal"
                                                                                            style="background-color: transparent">
                                                                                        <a href="liste_ville.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Quartier</span>
                                                                                <div class="col">
                                                                                    <select name="id_quartier" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                        <option value="0" selected>...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM quartier where open_close!=1');

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_quat'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>


                                                                                    </select>
                                                                                    <button type="button"
                                                                                            data-toggle="modal"
                                                                                            style="background-color: transparent">
                                                                                        <a href="liste_quartier.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Profession</span>
                                                                                <div class="col">
                                                                                    <select name="profession" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="0" selected="">
                                                                                            ....
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM profession where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['nom'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>


                                                                                    </select>
                                                                                    <button type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#ajouterProfession"
                                                                                            style="background-color: transparent">
                                                                                        <i class="fas fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Situation Matrimoniale</span>

                                                                                <div class="col">
                                                                                    <select name="situation_matrimoniale"
                                                                                            style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="N/A" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <option value="CELIBATAIRE">
                                                                                            CELIBATAIRE
                                                                                        </option>
                                                                                        <option value="MARIÉ(E)">
                                                                                            MARIÉ(E)
                                                                                        </option>
                                                                                        <option value="VEUF(VE)">
                                                                                            VEUF(VE)
                                                                                        </option>
                                                                                    </select>
                                                                                    <!--  <button type="button" data-toggle="modal" data-target="#ajouterS_m"  style="background-color: transparent">
                                                                                     <i class="fas fa-plus"></i>
                                                                                 </button> -->
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Nombre D'enfants</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nombre_enfants"
                                                                                           value="0">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Genre</span>
                                                                                <div class="col">
                                                                                    <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="N/A" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <option value="MASCULIN">
                                                                                            MASCULIN
                                                                                        </option>
                                                                                        <option value="FEMININ">
                                                                                            FEMININ
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="btn-toolbar" role="toolbar"
                                                                 aria-label="Toolbar with button groups"
                                                                 style="float: right;">
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <h5 class="bg-warning"><b><u>NB:</u></b> Veillez
                                                                        enregistrer avant de passer à l'étape suivante !
                                                                    </h5>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <button type="submit" name="submit_etat_civil"
                                                                            class="btn btn-primary">Enregistrer
                                                                    </button>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="Second group">
                                                                    <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--ETAT ACADEMIQUE -->
                                    <div class="tab-pane container" id="menu1">
                                        <!-- infos civile-->

                                        <h5><b><u>NB:</u></b> Veillez saisir vos informations consernant vos 5 dernieres
                                            années d'études</h5>

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="save_personnel_school.php"
                                                          method="POST" enctype="multipart/form-data">
                                                        <div class="card-header">
                                                            <input type="hidden" name="id_personnel"
                                                                   value="<?= $id_personnel ?>">
                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" width="100%"
                                                                           cellspacing="0">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th>Dilplôme</th>
                                                                            <th>Session</th>
                                                                            <th>École</th>
                                                                            <th>Mention</th>
                                                                            <th>PJ (scan du diplome)</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">
                                                                            <th>Dilplôme</th>
                                                                            <th>Session</th>
                                                                            <th>École</th>
                                                                            <th>Mention</th>
                                                                            <th>PJ (scan du diplome)</th>
                                                                        </tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="btn-toolbar" role="toolbar"
                                                                 aria-label="Toolbar with button groups"
                                                                 style="float: right;">
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <h5 class="bg-warning"><i
                                                                                class="fas fa-warning"></i>
                                                                        <b><u>NB:</u></b> Veillez enregistrer avant de
                                                                        passer à l'étape suivante ! </h5>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <button type="submit" name="submit_etat_scolaire"
                                                                            class="btn btn-primary">Enregistrer
                                                                    </button>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="Second group">
                                                                    <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--                                    Courrier-->
                                    <div class="tab-pane container" id="menu2">
                                        <!-- infos civile-->

                                        <h5><b><u>NB:</u></b> Veillez saisir vos informations consernant vos 5 dernieres
                                            années profession </h5>

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="save_personnel_background.php"
                                                          method="POST" enctype="multipart/form-data">
                                                        <div class="card-header">
                                                            <input type="hidden" name="id_personnel"
                                                                   value="<?= $id_personnel ?>">
                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" width="100%"
                                                                           cellspacing="0">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th>Entreprises</th>
                                                                            <th>Reférences <br/> "Nom (Téléphone) du
                                                                                responsable"
                                                                            </th>
                                                                            <th>Fonction</th>
                                                                            <th>Date d'arrivé</th>
                                                                            <th>Date de départ</th>
                                                                            <th>Attestation de travail ou Autres</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">
                                                                            <th>Entreprises</th>
                                                                            <th>Reférences <br/> "Nom (Téléphone) du
                                                                                responsable"
                                                                            </th>
                                                                            <th>Fonction</th>
                                                                            <th>Date d'arrivé</th>
                                                                            <th>Date de départ</th>

                                                                            <th>Attestation de travail ou Autres</th>
                                                                        </tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]"
                                                                                       style="width:100%"
                                                                                       class="form-control"
                                                                                       placeholder="Nom (Numéro) d'un responsable">
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]"
                                                                                       style="width:100%"
                                                                                       class="form-control"
                                                                                       placeholder="Nom (Numéro) d'un responsable">
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]"
                                                                                       style="width:100%"
                                                                                       class="form-control"
                                                                                       placeholder="Nom (Numéro) d'un responsable">
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]"
                                                                                       style="width:100%"
                                                                                       class="form-control"
                                                                                       placeholder="Nom (Numéro) d'un responsable">
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]"
                                                                                       style="width:100%"
                                                                                       class="form-control"
                                                                                       placeholder="Nom (Numéro) d'un responsable">
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="btn-toolbar" role="toolbar"
                                                                 aria-label="Toolbar with button groups"
                                                                 style="float: right;">
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <h5 class="bg-warning"><i
                                                                                class="fas fa-warning"></i>
                                                                        <b><u>NB:</u></b> Veillez enregistrer avant de
                                                                        passer à l'étape suivante ! </h5>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <button type="submit"
                                                                            name="submit_etat_professionnel"
                                                                            class="btn btn-primary">Enregistrer
                                                                    </button>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="Second group">
                                                                    <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- information RH -->
                                    <div class="tab-pane container" id="menu3">
                                        <!-- infos civile-->

                                        <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement
                                            de ressource humaine</h5>

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="save_infos_pers.php"
                                                          method="POST">
                                                        <div class="card-header">

                                                        </div>
                                                        <input type="hidden" name="id_personnel"
                                                               value="<?= $id_personnel ?>">
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table class="table  table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Poste</span>

                                                                                <div class="col">
                                                                                    <select name="poste" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM poste where open_close!='1'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['nom'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                    <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="nouveau_poste.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Date D'embauche</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_embauche">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Type de Contrat</span>

                                                                                <div class="col">
                                                                                    <select name="type_contrat" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="CDI">CDI</option>
                                                                                        <option value="CDD">CDD</option>
                                                                                        <option value="N/A">N/A</option>
                                                                                    </select>
                                                                                    <!--    <button type="button" data-toggle="modal" data-target="#ajouterCc"  style="background-color: transparent">
                                                                                       <i class="fas fa-plus"></i>
                                                                                   </button> -->
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Statut</span>

                                                                                <div class="col">
                                                                                    <select name="statut" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <option value="STAGIAIRE">
                                                                                            STAGIAIRE
                                                                                        </option>
                                                                                        <option value="EMPLOYÉ">
                                                                                            EMPLOYÉ
                                                                                        </option>
                                                                                    </select>
                                                                                    <!-- <button type="button" data-toggle="modal" data-target="#ajouterStatut"  style="background-color: transparent">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </button> -->
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Coût Heure Supplémentaire</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="cout_h_sup" value="0">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">Coût Horaire</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="cout_horaire" value="0"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Matricule</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="matricule" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° CNPS:</span>
                                                                                <div class="col">
                                                                                    <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="number_cnps" required>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Nom de la Banque</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_banque" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° Compte Bancaire:</span>
                                                                                <div class="col">
                                                                                    <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="number_card_bancaire"
                                                                                           required>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table  table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">Anciennete</span>
                                                                                <div class="col">
                                                                                    <label>jour(s)</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="day_anciennete"
                                                                                           placeholder="jour(s)"
                                                                                           value="0">
                                                                                    <label>mois</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_anciennete"
                                                                                           placeholder="mois" value="0">
                                                                                    <label>année(s)</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="year_anciennete"
                                                                                           placeholder="année(s)"
                                                                                           value="0">
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="btn-toolbar" role="toolbar"
                                                                 aria-label="Toolbar with button groups"
                                                                 style="float: right;">
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <h5 class="bg-warning"><b><u>NB:</u></b> Veillez
                                                                        enregistrer avant de passer à l'étape suivante !
                                                                    </h5>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <button type="submit" name="submit_etat_civil"
                                                                            class="btn btn-primary">Enregistrer
                                                                    </button>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="Second group">
                                                                    <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- infos Paie -->
                                    <div class="tab-pane container" id="menu4">
                                        <!-- infos bulletin conge-->

                                        <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant les primes.
                                        </h5>

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="save_prime_pers.php"
                                                          method="POST">
                                                        <div class="card-header">

                                                            <input type="hidden" name="id_personnel"
                                                                   value="<?= $id_personnel ?>">
                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table class="table  table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <?php
                                                                                // echo '<input name="id_personnel" type="hidden" value="'.$id_personnel.'">';
                                                                                ?>
                                                                                <span class="help-block small-font">PRIME:</span>

                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prime">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="btn-toolbar" role="toolbar"
                                                                 aria-label="Toolbar with button groups"
                                                                 style="float: right;">
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <h5 class="bg-warning"><b><u>NB:</u></b> Veillez
                                                                        enregistrer avant de passer à l'étape suivante !
                                                                    </h5>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="First group">
                                                                    <button type="submit" name="submit_etat_civil"
                                                                            class="btn btn-primary">Enregistrer
                                                                    </button>
                                                                </div>
                                                                <div class="btn-group mr-2" role="group"
                                                                     aria-label="Second group">
                                                                    <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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


    <!-- <?php


    //include("ajouter_profession.php");


    ?> -->
    <!--//Footer-->
<?php
include('foot.php');
?>