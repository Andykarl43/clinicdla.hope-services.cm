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
                <h1 class="mt-4">Détails du Pesonnel : <?= $nom . ' ' . $prenom ?> </h1>
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
                                                Civile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-building"></i>
                                                Academique
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-users"></i>
                                                Professionnel
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                                <i class="fas fa-cubes"></i>
                                                Information RH
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu4">
                                                <i class="fas fa-bars"></i>
                                                Infos Paie
                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--******************************************** ETAT CIVILE************************************************* -->
                                    <!-- Etat Civile-->
                                    <div class="tab-pane container active" id="home">
                                        <!-- infos civile-->

                                        <!-- <h5><b><u>NB:</u></b> Aucune information ne peut être modifier.</h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="#" method="POST">
                                                        <div class="card-header">
                                                            <!--  <i class="fas fa-scroll"></i>
                                     <b>L'ensemble des salles de campresj.</b>
                                                                  -->

                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">

                                                                    <form method="post" action="">
                                                                        <table class="table  table-hover table-condensed"
                                                                               id="myTable">
                                                                            <tbody>

                                                                            <tr>

                                                                                <td>
                                                                                    <span class="help-block small-font">NOM</span>
                                                                                    <div class="col">
                                                                                        <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                               value="<?= $nom ?>"
                                                                                               readonly>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="help-block small-font">PRENOM</span>
                                                                                    <div class="col">
                                                                                        <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                               value="<?= $prenom ?>"
                                                                                               readonly>
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
                                                                                               value="<?= $id_card_number ?>"
                                                                                               readonly>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="help-block small-font">DATE D'EXPIRATION CNI</span>
                                                                                    <div class="col">
                                                                                        <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                               value="<?= $id_card_validity ?>"
                                                                                               readonly>
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
                                                                                background: transparent;"
                                                                                               value="<?= $tel ?>"
                                                                                               readonly>
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
                                                                                               readonly>
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
                                                                                               value="<?= $nom_pere ?>"
                                                                                               readonly>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="help-block small-font">NOM DE LA MERE</span>
                                                                                    <div class="col">
                                                                                        <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                               value="<?= $nom_mere ?>"
                                                                                               readonly>
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
                                                                                               value="<?= $date_naissance ?>"
                                                                                               readonly>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="help-block small-font">LIEU DE NAISSANCE</span>
                                                                                    <div class="col">
                                                                                        <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                               value="<?= $lieu_naissance ?>"
                                                                                               readonly>
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
                                                                                background: transparent;" readonly>
                                                                                            <option value="" selected>
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
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="help-block small-font">QUARTIER</span>
                                                                                    <div class="col">
                                                                                        <select name="id_quartier"
                                                                                                style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                            <option value="" selected>
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
                                                                                        </select>
                                                                                    </div>
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td>
                                                                                    <span class="help-block small-font">PROFESSION</span>
                                                                                    <div class="col">
                                                                                        <select name="profession"
                                                                                                style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                            <option value="<?= $profession ?>"><?= $profession ?></option>
                                                                                        </select>

                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="help-block small-font">SITUATION MATRIMONIALE</span>

                                                                                    <div class="col">
                                                                                        <select name="situation_matrimoniale"
                                                                                                style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>>
                                                                                            <option value="<?= $situation_matrimoniale ?>"><?= $situation_matrimoniale ?></option>

                                                                                        </select>

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
                                                                                               value="<?= $nombre_enfants ?>"
                                                                                               readonly>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="help-block small-font">GENRE</span>
                                                                                    <div class="col">
                                                                                        <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>>
                                                                                            <option value="<?= $genre ?>"
                                                                                                    selected><?= $genre ?></option>

                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="help-block small-font">PAYS</span>
                                                                                    <div class="col">
                                                                                        <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                            <option value="<?= $id_pays ?>"
                                                                                                    selected>
                                                                                                <?php

                                                                                                $sql = "SELECT * FROM pays where id_pays='$id_pays' ";
                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom'];
                                                                                                }
                                                                                                ?>

                                                                                            </option>

                                                                                        </select>
                                                                                    </div>
                                                                                </td>


                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </form>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************ETAT ACADEMIQUE************************************************* -->
                                    <div class="tab-pane container" id="menu1">
                                        <!-- infos civile-->

                                        <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->


                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble de mes etats academique .</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="liste_pj_aca?id_personnel=<?= $id_personnel ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Liste des Pièces jointes
                                                                        <!-- <?= $id_personnel ?> -->
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
                                                                            <table class="table table-bordered"
                                                                                   width="100%" cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th>Dilplôme</th>
                                                                                    <th>Session</th>
                                                                                    <th>École</th>
                                                                                    <th>Mention</th>
                                                                                    <!-- <th>PJ (scan du diplome)</th>  -->
                                                                                </tr>
                                                                                </thead>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th>Dilplôme</th>
                                                                                    <th>Session</th>
                                                                                    <th>École</th>
                                                                                    <th>Mention</th>
                                                                                    <!-- <th>PJ (scan du diplome)</th> -->
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

                                                                                        $diplome = $row['diplome'];
                                                                                        $session = $row['session'];
                                                                                        $ecole = $row['ecole'];
                                                                                        $mention = $row['mention'];


                                                                                        echo '<tr>
                                                                           
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" value="' . $diplome . '" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" value="' . $session . '" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" value="' . $ecole . '" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" value="' . $mention . '" readonly>
                                                                            </td>
<!--                                                                             <td>

                                                                                <input type="file" name="fichier_aca[]" style="width:100%" class="form-control" readonly>
                                                                            </td> -->  
                                                                        </tr>';
                                                                                    }

                                                                                } else {

                                                                                    echo ' <tr>
                                                                           
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <!-- <td>
                                                                                <input type="file" name="fichier[0]"  value="0" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                          <!--   <td>
                                                                                <input type="file" name="fichier[1]" value="0" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                          <!--   <td>
                                                                                <input type="file" name="fichier[2]" value="0" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                         <!--    <td>
                                                                                <input type="file" name="fichier[3]" value="0" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                           <!--  <td>
                                                                                <input type="file" name="fichier[4]" value="0" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>';


                                                                                }
                                                                                ?>

                                                                                </tbody>
                                                                            </table>
                                                                        </form>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************ETAT PROFESSIONNEL************************************************* -->
                                    <div class="tab-pane container" id="menu2">
                                        <!-- infos civile-->

                                        <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->


                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble de mes etats professionnels</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="liste_pj_prof?id_personnel=<?= $id_personnel ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Liste des Pièces jointes
                                                                        <!-- <?= $id_personnel ?> -->
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
                                                                            <table class="table table-bordered"
                                                                                   width="100%" cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th>Entreprises</th>
                                                                                    <th>Reférences <br/> "Nom
                                                                                        (Téléphone) du responsable"
                                                                                    </th>
                                                                                    <th>Fonction</th>
                                                                                    <th>Date d'arrivé</th>
                                                                                    <th>Date de départ</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th>Entreprises</th>
                                                                                    <th>Reférences <br/> "Nom
                                                                                        (Téléphone) du responsable"
                                                                                    </th>
                                                                                    <th>Fonction</th>
                                                                                    <th>Date d'arrivé</th>
                                                                                    <th>Date de départ</th>
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
                                                                           
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" value="' . $entreprise . '" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input  name="reference[]" style="width:100%" class="form-control" value="' . $reference . '" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" value="' . $fonction . '" readonly >
                                                                            </td>
                                                                            <td>
                                                                                <input type="date" name="date_arrive[]" style="width:100%" class="form-control" value="' . $date_arrive . '" readonly>
                                                                            </td>                                                                      <td>
                                                                                <input type="date" name="date_depart[]" style="width:100%" class="form-control" value="' . $date_depart . '" readonly>
                                                                            </td>                                                                    
<!--                                                                             <td>

                                                                                <input type="file" name="fichier_prof[]" style="width:100%" class="form-control">
                                                                            </td> --> 
                                                                        </tr>';
                                                                                    }

                                                                                } else {

                                                                                    echo ' <tr>                                                                            

                                                                            <td style="width: 20%">
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td style="width: 20%">
                                                                                <input name="reference[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td style="width: 20%">
                                                                                <input name="fonction[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td style="width: 10%">
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td style="width: 10%">
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                    <!--        <td style="width: 20%">
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                       <!--     <td>
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                         <!--   <td>
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control"readonly >
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                          <!--  <td>
                                                                                <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="reference[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_arrive[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="date_depart[]" type="date" style="width:100%" class="form-control" readonly>
                                                                            </td>
                                                                            <td>
                                                                               <!-- <input type="file" name="fichier[]" style="width:100%" class="form-control">
                                                                            </td> -->
                                                                        </tr>';
                                                                                }
                                                                                ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************INFOS RH ************************************************* -->
                                    <!--ETAT ACADEMIQUE -->
                                    <div class="tab-pane container" id="menu3">
                                        <!-- infos civile-->


                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <!-- Tableau liste de permissions  -->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des informations RH.</b>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="well bs-component">
                                                            <form class="form-horizontal">
                                                                <fieldset>
                                                                    <div class="table-responsive">
                                                                        <form method="post" action="">
                                                                            <table class="table  table-hover table-condensed"
                                                                                   id="myTable">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span class="help-block small-font">POSTE</span>

                                                                                        <div class="col">
                                                                                            <select name="poste" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                                <option value="<?= $poste ?>"
                                                                                                        selected=""><?= $poste ?></option>
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
                                                                                                   value="<?= $date_embauche ?>"
                                                                                                   disabled>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span class="help-block small-font">TYPE DE CONTRAT</span>

                                                                                        <div class="col">
                                                                                            <select name="type_contrat"
                                                                                                    style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                                <option value="<?= $type_contrat ?>"><?= $type_contrat ?></option>
                                                                                            </select>
                                                                                            <!--    <button type="button" data-toggle="modal" data-target="#ajouterCc"  style="background-color: transparent">
                                                                                               <i class="fas fa-plus"></i>
                                                                                           </button> -->
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="help-block small-font">STATUT</span>

                                                                                        <div class="col">
                                                                                            <select name="statut"
                                                                                                    style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                                <option value="<?= $statut ?>"
                                                                                                        selected=""><?= $statut ?></option>
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
                                                                                                   value="<?= $cout_h_sup ?>"
                                                                                                   disabled>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="help-block small-font">COÛT HORAIRE</span>
                                                                                        <div class="col">
                                                                                            <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                                   name="cout_horaire"
                                                                                                   value="<?= $cout_horaire ?>"
                                                                                                   disabled>
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
                                                                                                   value="<?= $matricule ?>"
                                                                                                   disabled>
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
                                                                                                   value="<?= $number_cnps ?>"
                                                                                                   disabled>
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
                                                                                                   name="nom_banque"
                                                                                                   value="<?= $nom_banque ?>"
                                                                                                   disabled>
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
                                                                                                   value="<?= $number_card_bancaire ?>"
                                                                                                   disabled>
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
                                                                                                   value="<?= $day_anciennete ?>"
                                                                                                   disabled>
                                                                                            <label>mois</label>
                                                                                            <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                                   name="month_anciennete"
                                                                                                   placeholder="mois"
                                                                                                   value="<?= $month_anciennete ?>"
                                                                                                   disabled>
                                                                                            <label>année(s)</label>
                                                                                            <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                                   name="year_anciennete"
                                                                                                   value="<?= $year_anciennete ?>"
                                                                                                   disabled>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
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
                                    </div>
                                    <!--********************************************PRIME************************************************ -->

                                    <div class="tab-pane container" id="menu4">
                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>Prime.</b>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="well bs-component">
                                                            <form class="form-horizontal">
                                                                <fieldset>
                                                                    <div class="table-responsive">
                                                                        <form method="post" action="">
                                                                            <table class="table  table-hover table-condensed"
                                                                                   id="myTable">
                                                                                <tbody>

                                                                                <tr>
                                                                                    <td>
                                                                                        <span class="help-block small-font">PRIME:</span>

                                                                                        <div class="col">
                                                                                            <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                                   value="<?php if ($prime == 0) {
                                                                                                       echo $prime = 0;
                                                                                                   } else {
                                                                                                       echo $prime;
                                                                                                   }

                                                                                                   ?>" readonly>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>

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
                                    </div>


                                    <!--****************************************** ............************************************************ -->

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


    <!--//Footer-->
<?php
include('foot.php');
?>