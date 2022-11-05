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
                                            <a class="nav-link active" href="<?= $postulant['option2_link'] ?>">
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
                                        <!--                                  <li class="nav-item">
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
                                                                            </li>    -->
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