<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
?>

<?php
$id = $_REQUEST['id'];

$query = "SELECT * from personnel where id_personnel='" . $id . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_personnel = $row['id_personnel'];
    /*-------------------- ETAT CIVILE --------------------*/
    $matricule = $row['matricule'];
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $id_card_number = $row['id_card_number'];
    $id_card_validity = $row['id_card_validity'];
    $tel = $row['tel'];
    $email = $row['email'];
    $nom_pere = $row['nom_pere'];
    $nom_mere = $row['nom_mere'];
    $date_naissance = $row['date_naissance'];
    $lieu_naissance = $row['lieu_naissance'];
    $profession = $row['profession'];
    $situation_matrimoniale = $row['situation_matrimoniale'];
    $nombre_enfants = $row['nombre_enfants'];
    $genre = $row['genre'];
    $id_quartier = $row['id_quartier'];
    $id_ville = $row['id_ville'];
    $id_pays = $row['id_pays'];

    /*-------------------- INFOS RH --------------------*/
    $poste = $row['poste'];
    $date_embauche = $row['date_embauche'];
    $type_contrat = $row['type_contrat'];
    $statut = $row['statut'];
    $cout_h_sup = $row['cout_h_sup'];
    $cout_horaire = $row['cout_horaire'];
    $matricule = $row['matricule'];
    $number_cnps = $row['number_cnps'];
    $nom_banque = $row['nom_banque'];
    $number_card_bancaire = $row['number_card_bancaire'];
    $day_anciennete = $row['day_anciennete'];
    $month_anciennete = $row['month_anciennete'];
    $year_anciennete = $row['year_anciennete'];


    /*-------------------- INFOS PAIE --------------------*/

    $prime = $row['prime'];


    ?>


    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">NOM DE L'EMPLOYE: <?= $nom . ' ' . $prenom . ' (' . $matricule . ')' ?> </h1>
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
                                <ul class="nav nav-pills" style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= $personnel['option2_link'] ?>">

                                            Annuler
                                        </a>
                                    </li>
                                </ul>
                                <b>
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

                                        <h5><b><u>NB:</u></b> Informations d'état civil </h5>

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="update_civil_pers.php"
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
                                                                                <input type="hidden" name="id_personnel"
                                                                                       value="<?= $id ?>">
                                                                                <span class="help-block small-font">NOM</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom"
                                                                                           value="<?= $nom ?>" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">PRENOM</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prenom"
                                                                                           value="<?= $prenom ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">N° CNI ou PASSPORT</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0;
                                                                                 border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="id_card_number"
                                                                                           value="<?= $id_card_number ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'EXPIRATION CNI</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="id_card_validity"
                                                                                           value="<?= $id_card_validity ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">TEL</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel"
                                                                                           value="<?= $tel ?>" required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">EMAIL</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" type="email"
                                                                                           value="<?= $email ?>"
                                                                                           name="email">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">NOM DU PERE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_pere"
                                                                                           value="<?= $nom_pere ?>">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">NOM DE LA MERE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_mere"
                                                                                           value="<?= $nom_mere ?>">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE NAISSANCE</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_naissance"
                                                                                           value="<?= $date_naissance ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">LIEU DE NAISSANCE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="lieu_naissance"
                                                                                           value="<?= $lieu_naissance ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">VILLE</span>
                                                                                <div class="col">
                                                                                    <select name="id_ville" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $id_ville ?>"
                                                                                                selected>
                                                                                            <?php

                                                                                            $sql = "SELECT * FROM ville where id_ville='$id_ville' ";
                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'];
                                                                                            }
                                                                                            ?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM ville');

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_ville'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>

                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">QUARTIER</span>
                                                                                <div class="col">
                                                                                    <select name="id_quartier" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $id_quartier ?>"
                                                                                                selected>
                                                                                            <?php

                                                                                            $sql = "SELECT * FROM quartier where id_quat='$id_quartier' ";
                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'];
                                                                                            }
                                                                                            ?>

                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM quartier');

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_quat'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </td>

                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">PROFESSION</span>
                                                                                <div class="col">
                                                                                    <select name="profession" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $profession ?>"
                                                                                                selected=""><?= $profession ?></option>
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
                                                                                <span class="help-block small-font">SITUATION MATRIMONIALE</span>

                                                                                <div class="col">
                                                                                    <select name="situation_matrimoniale"
                                                                                            style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $situation_matrimoniale ?>"
                                                                                                selected=""><?= $situation_matrimoniale ?></option>
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
                                                                                <span class="help-block small-font">NOMBRE D'ENFANTS</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nombre_enfants"
                                                                                           value="<?= $nombre_enfants ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">GENRE</span>
                                                                                <div class="col">
                                                                                    <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $genre ?>"
                                                                                                selected=""><?= $genre ?></option>
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
                                                    <form class="form-horizontal" action="update_personnel_school.php"
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
                                                                            <!-- <th>PJ (scan du diplome)</th> -->
                                                                        </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">
                                                                            <th>Dilplôme</th>
                                                                            <th>Session</th>
                                                                            <th>École</th>
                                                                            <th>Mention</th>
                                                                            <!--  <th>PJ (scan du diplome)</th> -->
                                                                        </tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                        <?php

                                                                        $query = "SELECT  count(id_perso) as total from etat_academique where id_perso='" . $id_personnel . "' ";
                                                                        $stmt = $db->prepare($query);
                                                                        $stmt->execute();

                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach ($tables as $table) {
                                                                            $total = $table['total'];
                                                                            // echo $total;
                                                                        }
                                                                        if ($total > 0) {


                                                                            $query = "SELECT* from etat_academique where id_perso='" . $id_personnel . "'";
                                                                            $q = $db->query($query);
                                                                            while ($row = $q->fetch()) {
                                                                                $id = $row['id_etat_academique'];
                                                                                $diplome = $row['diplome'];
                                                                                $session = $row['session'];
                                                                                $ecole = $row['ecole'];
                                                                                $mention = $row['mention'];


                                                                                echo '
                                                                       <input type="hidden" name="id_etat[]" value="' . $id . '">
                                                                       <input type="hidden" name="statut" value="1">

                                                                       <tr>
                                                                           
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" value="' . $diplome . '">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" value="' . $session . '">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" value="' . $ecole . '">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" value="' . $mention . '">
                                                                            </td>
                                                                            <td>

                                                                            
                                                                            </td> 
                                                                        </tr>';
                                                                            }

                                                                        } else {

                                                                            echo ' <tr>
                                                                   <input type="hidden" name="statut" value="0">
                                                                           
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control">
                                                                            </td>
<!--                                                                             <td>
                                                                                <input type="file" name="fichier[0]"   style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                      <!--       <td>
                                                                                <input type="file" name="fichier[1]"  style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control">
                                                                            </td>
                                                                    <!--         <td>
                                                                                <input type="file" name="fichier[2]"  style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                    <!--         <td>
                                                                                <input type="file" name="fichier[3]"  style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                       <!--      <td>
                                                                                <input type="file" name="fichier[4]"  style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>';
                                                                        }
                                                                        ?>

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
                                            <form class="form-horizontal" action="update_personnel_work.php"
                                                  method="POST" enctype="multipart/form-data">

                                                <input type="hidden" name="id_personnel" value="<?= $id_personnel ?>">
                                                <fieldset>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" width="100%"
                                                               cellspacing="0">
                                                            <thead>
                                                            <tr class="bg-primary">
                                                                <th>Entreprises</th>
                                                                <th>Reférences <br/> "Nom (Téléphone) du responsable"
                                                                </th>
                                                                <th>Fonction</th>
                                                                <th>Date d'arrivé</th>
                                                                <th>Date de départ</th>
                                                                <!-- <th>PJ (scan )</th> -->
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr class="bg-primary">
                                                                <th>Entreprises</th>
                                                                <th>Reférences <br/> "Nom (Téléphone) du responsable"
                                                                </th>
                                                                <th>Fonction</th>
                                                                <th>Date d'arrivé</th>
                                                                <th>Date de départ</th>
                                                                <!-- <th>PJ (scan)</th> -->
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                            <?php

                                                            $query = "SELECT  count(id_perso) as total from etat_professionnel where id_perso='" . $id_personnel . "' ";
                                                            $stmt = $db->prepare($query);
                                                            $stmt->execute();

                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($tables as $table) {
                                                                $total = $table['total'];
                                                                // echo $total;
                                                            }
                                                            if ($total > 0) {

                                                                $query = "SELECT* from etat_professionnel where id_perso='" . $id_personnel . "'";
                                                                $q = $db->query($query);
                                                                while ($row = $q->fetch()) {

                                                                    $id = $row['id_etat_professionnel'];
                                                                    $entreprise = $row['entreprise'];
                                                                    $reference = $row['reference'];
                                                                    $fonction = $row['fonction'];
                                                                    $date_arrive = $row['date_arrive'];
                                                                    $date_depart = $row['date_depart'];


                                                                    echo '<tr>
                                                                       <input type="hidden" name="id_etat[]" value="' . $id . '">
                                                                       <input type="hidden" name="statut" value="1">
                                                                           
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" value="' . $entreprise . '" >
                                                                            </td>
                                                                            <td>
                                                                                <input  name="reference[]" style="width:100%" class="form-control" value="' . $reference . '" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" value="' . $fonction . '"  >
                                                                            </td>
                                                                            <td>
                                                                                <input type="date" name="date_arrive[]" style="width:100%" class="form-control" value="' . $date_arrive . '" >
                                                                            </td>                                                                      <td>
                                                                                <input type="date" name="date_depart[]" style="width:100%" class="form-control" value="' . $date_depart . '" >
                                                                            </td>                                                                    
                                                                             <td>

                                                                                
                                                                            </td>  
                                                                        </tr>';
                                                                }

                                                            } else {

                                                                echo ' <tr>                                                                            
                                                                            <input type="hidden" name="statut" value="0">

                                                                            <td style="width: 20%">
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td style="width: 20%">
                                                                                <input name="reference[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td style="width: 20%">
                                                                                <input name="fonction[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td style="width: 10%">
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td style="width: 10%">
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                    <!--       <td style="width: 20%">
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                   <!--         <td>
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                    <!--        <td>
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                    <!--        <td>
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" >
                                                                            </td>
                                                                    <!--        <td>
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>';
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </fieldset>


                                                <div class="btn-toolbar" role="toolbar"
                                                     aria-label="Toolbar with button groups" style="float: right;">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <h5 class="bg-warning"><i class="fas fa-warning"></i>
                                                            <b><u>NB:</u></b> Veillez enregistrer avant de passer à
                                                            l'étape suivante ! </h5>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <button type="submit" name="submit_etat_professionnel"
                                                                class="btn btn-primary">Enregistrer
                                                        </button>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <!-- information RH -->
                                    <div class="tab-pane container" id="menu3">
                                        <!-- infos civile-->

                                        <h5><b><u>NB:</u></b>Informations concernant le traitement de ressource humaine
                                        </h5>

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="update_infos_pers.php"
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
                                                                            <input type="hidden" name="id_personnel"
                                                                                   value="<?= $id_personnel ?>">
                                                                            <td>
                                                                                <span class="help-block small-font">POSTE</span>

                                                                                <div class="col">
                                                                                    <select name="poste" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?= $poste ?>"
                                                                                                selected=""><?= $poste ?></option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM poste where open_close!='1' ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['nom'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE D'EMBAUCHE</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_embauche"
                                                                                           value="<?= $date_embauche ?>">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">TYPE DE CONTRAT</span>

                                                                                <div class="col">
                                                                                    <select name="type_contrat" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="CDI"><?= $type_contrat ?></option>
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
                                                                                <span class="help-block small-font">STATUT</span>

                                                                                <div class="col">
                                                                                    <select name="statut" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $statut ?>"
                                                                                                selected=""><?= $statut ?></option>
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
                                                                                <span class="help-block small-font">COÛT HEURE SUPLLEMENTAIRE</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="cout_h_sup"
                                                                                           value="<?= $cout_h_sup ?>">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">COÛT HORAIRE</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="cout_horaire"
                                                                                           value="<?= $cout_horaire ?>">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">MATRICULE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="matricule"
                                                                                           value="<?= $matricule ?>">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° CNPS:</span>
                                                                                <div class="col">
                                                                                    <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="number_cnps"
                                                                                           value="<?= $number_cnps ?>">
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">NOM DE LA BANQUE</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_banque">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N° COMPTE BANCAIRE:</span>
                                                                                <div class="col">
                                                                                    <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="number_card_bancaire"
                                                                                           value="<?= $number_card_bancaire ?>">
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
                                                                                <span class="help-block small-font">ANCIENNETE</span>
                                                                                <div class="col">
                                                                                    <label>jour(s)</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="day_anciennete"
                                                                                           placeholder="jour(s)"
                                                                                           value="<?= $day_anciennete ?>">
                                                                                    <label>mois</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_anciennete"
                                                                                           placeholder="mois"
                                                                                           value="<?= $month_anciennete ?>">
                                                                                    <label>année(s)</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="year_anciennete"
                                                                                           placeholder="année(s)"
                                                                                           value="<?= $year_anciennete ?>">
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
                                                    <form class="form-horizontal" action="update_prime_pers.php"
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
                                                                                <?php
                                                                                echo '<input name="id_personnel" type="hidden" value="' . $id_personnel . '">';
                                                                                ?>
                                                                                <span class="help-block small-font">PRIME:</span>

                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prime"
                                                                                           value="<?= $prime ?>">
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
    <?php
}
?>

    <!--    Modal pour ajouter Situation Matrimoniale-->
    <div class="modal fade" id="ajouterS_m" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><b>Nouvelle Situation Matrimoniale</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label>Intitulé</label>
                            <div class="col-sm-12">
                                <input type="text" name="intitule" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="submit_sm" class="btn btn-primary" value="Créer">
                                <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--    Modal pour ajouter Poste-->
    <div class="modal fade" id="ajouterPoste" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><b>Nouveau Poste</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label>Intitulé</label>
                            <div class="col-sm-12">
                                <input type="text" name="intitule" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="submit_poste" class="btn btn-primary" value="Créer">
                                <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--    Modal pour ajouter Statut-->
    <div class="modal fade" id="ajouterStatut" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><b>Nouveau Statut</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label>Intitulé</label>
                            <div class="col-sm-12">
                                <input type="text" name="intitule" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="submit_statut" class="btn btn-primary" value="Créer">
                                <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--    Modal pour ajouter Categorie Contrat-->
    <div class="modal fade" id="ajouterCc" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><b>Nouvelle Categorie Contrat</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label>Intitulé</label>
                            <div class="col-sm-12">
                                <input type="text" name="intitule" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="submit_cs" class="btn btn-primary" value="Créer">
                                <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--    Modal pour ajouter Categorie Contrat-->
    <div class="modal fade" id="ajouterAvantage" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><b>Nouvelle Avantage</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label>Intitulé</label>
                            <div class="col-sm-12">
                                <input type="text" name="avantage" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="submit_cs" class="btn btn-primary" value="Créer">
                                <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php


include("ajouter_profession.php");


?>
    <!--//Footer-->
<?php
include('foot.php');
?>