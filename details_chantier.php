<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_chantier = $_REQUEST['id'];
$idm = $_REQUEST['idm'];

$query = "SELECT * from chantier where id_chantier='" . $id_chantier . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    // ------------ infos sur le marché
    $id_marche = $row['id_marche'];
    $ref_marche = $row['ref_marche'];
    $date_begin_marche = $row['date_begin_marche'];
    $objet_marche = $row['objet_marche'];
    $montant_ttc_marche = $row['montant_ttc_marche'];

    // ------------ infos sur le chantier
    $nom_chantier = $row['nom_chantier'];
    $adresse_chantier = $row['adresse_chantier'];
    $tel_chantier = $row['tel_chantier'];
    $id_personnel = $row['id_personnel'];
    $id_pers_pointeur = $row['id_pers_pointeur'];
    $id_pers_con = $row['id_pers_con'];
    $id_pers_ges = $row['id_pers_ges'];
    $cout_h_moy_chantier = $row['cout_h_moy_chantier'];
    $dure_chantier = $row['dure_chantier'];
    $montant_ttc_chantier = $row['montant_ttc_chantier'];
    $objet_chantier = $row['objet_chantier'];
    $date_begin_chantier = $row['date_begin_chantier'];


    // /*-------------------- INFOS RH --------------------*/

    // $cat_salariale=$row['cat_salariale'];
    // $secteur=$row['secteur'];
    // $salle=$row['salle'];
    // $poste=$row['poste'];
    // $date_embauche=$row['date_embauche'];
    // $type_contrat=$row['type_contrat'];
    // $statut=$row['statut'];
    // $sal_base=$row['sal_base'];
    // $sal_horaire=$row['sal_horaire'];
    // $matricule=$row['matricule'];
    // $number_cnps=$row['number_cnps'];
    // $nom_banque=$row['nom_banque'];
    // $number_card_bancaire=$row['number_card_bancaire'];
    // $day_anciennete=$row['day_anciennete'];
    // $month_anciennete=$row['month_anciennete'];
    // $year_anciennete=$row['year_anciennete'];
    // $garant = $row['garant'];
    // $parrain_interne = $row['parrain_interne'];
    // $parrain_externe = $row['parrain_externe'];


    // /*-------------------- INFOS PAIE --------------------*/

    // $prime=$row['prime'];


    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du Chantier : <?= $nom_chantier ?> </h1>
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
                                            <?php
                                            echo '<a class="nav-link active" href="';
                                            if ($idm != 0) {
                                                echo "details_marche.php?id=" . $idm;
                                            } else {
                                                echo 'liste_chantier.php';
                                            }
                                            echo ' ">
                                            Retour
                                        </a>';
                                            ?>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-cubes"></i>
                                                Détails<!-- <?= $id_personnel ?> -->
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-users"></i>
                                                <?php

                                                $query = "SELECT count(id_personnel) as total from personnel where open_close!='1' and id_chantier='$id_chantier' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Listes Personnel[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_materiel) as total from magasin_chantier where   id_chantier='$id_chantier' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Matériaux[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_eq) as total from magasin_chantier_eq where   id_chantier='$id_chantier' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Equipements[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu4">
                                                <i class="fas fa-bus"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_engin) as total from engin where   id_chantier='$id_chantier' and open_close!='1' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Engins[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu5">
                                                <i class="fas fa-plus"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(nom_etape) as total from etape where open_close!='1' and id_chantier='$id_chantier' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Etapes[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu6">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_maint_chantier) as total from maintenance_chantier where id_chantier='$id_chantier' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Gestion maintenance[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--********************************************DETAILS************************************************* -->
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
                                                                    <table border="0"
                                                                           class="table  table-hover table-condensed"
                                                                           width="100%" cellspacing="0" id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">RÉFENCE DU MARCHÉ:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_marche"
                                                                                           value="<?= $ref_marche ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font"> OBJET DU MARCHÉ:</span>

                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_marche"
                                                                                           value="<?php echo $objet_marche ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">DATE DU MARCHÉ:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_begin_marche"
                                                                                           value="<?php echo $date_begin_marche ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT TTC MARCHÉ:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="montant_ttc_marche"
                                                                                           value="<?php echo $montant_ttc_marche ?>"
                                                                                           disabled>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">NOM DU CHANTIER :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_chantier"
                                                                                           value="<?php echo $nom_chantier ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">ADRESSE DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="adresse_chantier"
                                                                                           value="<?php echo $adresse_chantier ?>"
                                                                                           disabled>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">TEL DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="tel_chantier"
                                                                                           value="<?php echo $tel_chantier ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">CHEF CHANTIER:</span>

                                                                                <div class="col">
                                                                                    <select name="id_personnel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?= $id_personnel ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">CONDUCTEUR DU CHANTIER:</span>

                                                                                <div class="col">
                                                                                    <select name="id_pers_con" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?= $id_pers_con ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_con'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">GESTIONNAIRE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_pers_ges" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?= $id_pers_ges ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_ges'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">POINTEUR :</span>
                                                                                <div class="col">
                                                                                    <select name="id_pers_pointeur"
                                                                                            style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?= $id_pers_pointeur ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_pointeur'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">COÛT HORAIRE MOYEN</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="cout_h_moy_chantier"
                                                                                           value="<?= $cout_h_moy_chantier ?>"
                                                                                           disabled>FCFA
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">OBJET DU CHANTIER :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_chantier"
                                                                                           value="<?php echo $objet_chantier ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <?php echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_begin_chantier" value="' . date("d-m-Y", strtotime($date_begin_chantier)) . '"disabled>';
                                                                                    ?>

                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DURÉE DU CHANTIER</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="dure_chantier"
                                                                                           value="<?= $dure_chantier ?>"
                                                                                           disabled>Jour(s)

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT TCC DU CHANTIER</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray"
                                                                                           name="montant_ttc_chantier"
                                                                                           value="<?= $montant_ttc_chantier ?>"
                                                                                           disabled>FCFA

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
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************CLIENT************************************************* -->
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
                                                        <b>L'ensemble du personnel.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <!-- <a class="nav-link active" href="ajouter_personnel?id=<?= $id_chantier ?>">
                                            <i class="fas fa-user"></i>
                                            Ajouter Personnels
                                        </a> -->

                                                                    <?php
                                                                    echo '<a class="nav-link active" href="';
                                                                    if ($idm != 0) {
                                                                        echo "ajouter_personnel.php?id=" . $id_chantier . "&idm=" . $idm;
                                                                    } else {
                                                                        echo "ajouter_personnel.php?id=" . $id_chantier . "&idm=0";
                                                                    }
                                                                    echo ' ">
                                            Ajouter Personnels
                                        </a>';
                                                                    ?>
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Poste </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">tel</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Statut</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quartier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from personnel where open_close!='1' and id_chantier='$id_chantier'";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_personnel'];
                                                                                    $nom = $row['nom'];
                                                                                    $prenom = $row['prenom'];
                                                                                    $poste = $row['poste'];
                                                                                    $tel = $row['tel'];
                                                                                    $statut = $row['statut'];
                                                                                    $id_quartier = $row['id_quartier'];
                                                                                    $profession = $row['profession'];

                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php echo $id ?>"/>
                                                                                        <td align="center"><a
                                                                                                    href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                                    title="<?= $nom; ?>"
                                                                                                    style="color: black"><?= $nom . ' ' . $prenom; ?></a>
                                                                                        </td>
                                                                                        <td align="center"><a
                                                                                                    href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                                    title="<?= $poste; ?>"
                                                                                                    style="color: black"><?= $poste; ?></a>
                                                                                        </td>
                                                                                        <td align="center"><a
                                                                                                    href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                                    title="<?= $tel; ?>"
                                                                                                    style="color: black"><?= $tel ?> </a>
                                                                                        </td>
                                                                                        <td align="center"><a
                                                                                                    href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                                    title="<?= $statut; ?>"
                                                                                                    style="color: black"><?= $statut; ?></a>
                                                                                        </td>
                                                                                        <input type="hidden" name=""
                                                                                               value="<?= $profession; ?>">
                                                                                        <td align="center"><a
                                                                                                    href="details_personnel.php?id=<?php echo $id; ?>"
                                                                                                    title="<?= $id_quartier; ?>"
                                                                                                    style="color: black">
                                                                                                <?php

                                                                                                $sql = "SELECT DISTINCT * from quartier where id_quat = '$id_quartier'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom'];
                                                                                                }

                                                                                                ?>


                                                                                            </a></td>

                                                                                        <td align="center"
                                                                                            style="width: 18%">

                                                                                            <div class="btn-group mr-2"
                                                                                                 role="group"
                                                                                                 aria-label="First group">
                                                                                                <a class="btn btn-primary"
                                                                                                   href="details_personnel.php?id=<?= $id; ?>"
                                                                                                   title="view"
                                                                                                   style="background-color: transparent; color: green">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                    <!-- Transférer -->
                                                                                                </a>
                                                                                            </div>
                                                                                            <!--                     <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-warning" href="modifier_personnel.php?id=<?= $id; ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>
                       </div> -->
                                                                                            <!--                      <div class="btn-group mr-2" role="group" aria-label="First group">
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_pers<?= $id; ?>" title="supprimer"  style="background-color: transparent">
                                   <i style="color: red" class="fas fa-trash"></i> 
                                
                            </a>
                        </div>   -->

                                                                                            <!-- <?php
                                                                                            // include("verifier_delete_pers.php");
                                                                                            ?> -->


                                                                                        </td>
                                                                                    </tr>

                                                                                <?php } ?>

                                                                                </tbody>


                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Prenom</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Poste </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Secteur </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Salle</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody></tbody>
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

                                    <!--********************************************MATERIAUX************************************************* -->
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
                                                        <b>L'ensemble des matériaux.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="<?= $materiaux['option2_link'] ?>">
                                                                        <i class="fas fa-plus"></i>
                                                                        Ajouter Matériel
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Désignations</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantites</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Catégorie de matériaux</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $sql = "SELECT DISTINCT * from magasin_chantier where id_chantier = '$id_chantier'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_materiel = $table['id_materiel'];
                                                                                    $quantite_chantier = $table['quantite_chantier'];
                                                                                    $prix_unitaire_mag_chantier = $table['prix_unitaire_mag_chantier'];
                                                                                    $prix_total_mag_chantier = $table['prix_total_mag_chantier'];


                                                                                    $query = "SELECT * from materiel where id_materiel = '$id_materiel' ";
                                                                                    $q = $db->query($query);
                                                                                    while ($row = $q->fetch()) {
                                                                                        $id = $row['id_materiel'];
                                                                                        $ref_materiel = $row['ref_materiel'];
                                                                                        $designation = $row['designation'];
                                                                                        $quantite = $row['quantite'];
                                                                                        $id_cat_materiel = $row['id_cat_materiel'];
                                                                                        $prix_unitaire = $row['prix_unitaire'];
                                                                                        $prix_total = $row['prix_total'];


                                                                                        ?>

                                                                                        <tr>
                                                                                            <input name="id"
                                                                                                   type="hidden"
                                                                                                   value="<?php //echo $row['id'];
                                                                                                   ?>"/>

                                                                                            <td align="center"> <?php echo $ref_materiel; ?>   </td>
                                                                                            <td align="center"> <?php echo $designation; ?>   </td>
                                                                                            <td align="center"> <?php echo $quantite_chantier; ?>   </td>
                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from categorie_materiel where id_cat_materiel = '$id_cat_materiel'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>

                                                                                            <td align="center"> <?php echo $prix_unitaire_mag_chantier; ?>  </td>
                                                                                            <td align="center"> <?php echo $prix_total_mag_chantier; ?>  </td>

                                                                                            <td align="center"
                                                                                                style="width: 18%"><a
                                                                                                        class="btn btn-primary"
                                                                                                        href="details_materiel.php?id=<?php echo $id; ?>"
                                                                                                        title="view"
                                                                                                        style="background-color: transparent">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                </a>


                                                                                                <!--    <a class="btn btn-warning" href="modifier_materiel.php?id=<?//=$id;
                                                                                                ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_materiel<?//= $id;
                                                                                                ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->


                                                                                                <!--  <?php
                                                                                                //include("verifier_delete_materiel.php");
                                                                                                ?> -->


                                                                                            </td>


                                                                                        </tr>

                                                                                    <?php }
                                                                                } ?>
                                                                                </tbody>


                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Désignations</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantites</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Catégorie de matériaux</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody></tbody>
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

                                    <!--********************************************EQUIPEMENT************************************************* -->
                                    <div class="tab-pane container" id="menu3">
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
                                                        <b>L'ensemble des équipements.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="<?= $equipement['option2_link'] ?>">
                                                                        <i class="fas fa-plus"></i>
                                                                        Ajouter équipement
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Désignations</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantites</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Catégorie</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $sql = "SELECT DISTINCT * from magasin_chantier_eq where id_chantier = '$id_chantier'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_eq = $table['id_eq'];
                                                                                    $quant_chantier = $table['quant_chantier'];
                                                                                    $prix_unit_mag_chantier = $table['prix_unit_mag_chantier'];
                                                                                    $prix_t_mag_chantier = $table['prix_t_mag_chantier'];


                                                                                    $query = "SELECT * from equipement where id_eq = '$id_eq' ";
                                                                                    $q = $db->query($query);
                                                                                    while ($row = $q->fetch()) {
                                                                                        $id = $row['id_eq'];
                                                                                        $ref_eq = $row['ref_eq'];
                                                                                        $design_eq = $row['design_eq'];
                                                                                        $quant_eq = $row['quant_eq'];
                                                                                        $id_cat_eq = $row['id_cat_eq'];
                                                                                        $prix_unit_eq = $row['prix_unit_eq'];
                                                                                        $prix_t_eq = $row['prix_t_eq'];


                                                                                        ?>

                                                                                        <tr>
                                                                                            <input name="id"
                                                                                                   type="hidden"
                                                                                                   value="<?php //echo $row['id'];
                                                                                                   ?>"/>

                                                                                            <td align="center"> <?php echo $ref_eq; ?>   </td>
                                                                                            <td align="center"> <?php echo $design_eq; ?>   </td>
                                                                                            <td align="center"> <?php echo $quant_chantier; ?>   </td>
                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from categorie_equipement where id_cat_eq = '$id_cat_eq'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>

                                                                                            <td align="center"> <?php echo number_format($prix_unit_mag_chantier); ?>  </td>
                                                                                            <td align="center"> <?php echo number_format($prix_t_mag_chantier); ?>  </td>

                                                                                            <td align="center"
                                                                                                style="width: 18%"><a
                                                                                                        class="btn btn-primary"
                                                                                                        href="details_equipement.php?id=<?php echo $id; ?>"
                                                                                                        title="view"
                                                                                                        style="background-color: transparent">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                </a>
                                                                                                <a class="btn btn-primary"
                                                                                                   href="transfert_chantier_mag_eq.php?id=<?php echo $id; ?>&id_chantier=<?php echo $id_chantier ?>&idm=<?php echo $idm ?>"
                                                                                                   title="view"
                                                                                                   style="background-color: transparent">
                                                                                                    <i style="color: purple"
                                                                                                       class="fas fa-random"></i>
                                                                                                </a>

                                                                                                <!--    <a class="btn btn-warning" href="modifier_materiel.php?id=<?//=$id;
                                                                                                ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_materiel<?//= $id;
                                                                                                ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->


                                                                                                <!--  <?php
                                                                                                //include("verifier_delete_materiel.php");
                                                                                                ?> -->


                                                                                            </td>


                                                                                        </tr>

                                                                                    <?php }
                                                                                } ?>
                                                                                </tbody>


                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Désignations</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Quantites</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Catégorie</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            unitaire</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Prix
                                                                                            total</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody></tbody>
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

                                    <!--********************************************ENGINS************************************************* -->
                                    <!--ETAT ACADEMIQUE -->
                                    <div class="tab-pane container" id="menu4">
                                        <!-- infos civile-->


                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <!-- Tableau liste de permissions  -->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-bus"></i>
                                                        <b>L'ensemble des engins.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <?php
                                                                    echo '<a class="nav-link active" href="';
                                                                    if ($idm != 0) {
                                                                        echo "ajouter_engin_chantier.php?id=" . $id_chantier . "&idm=" . $idm;
                                                                    } else {
                                                                        echo "ajouter_engin_chantier.php?id=" . $id_chantier . "&idm=0";
                                                                    }
                                                                    echo ' ">
                                            Ajouter engin
                                        </a>';
                                                                    ?>
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Code</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Fournisseurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Type
                                                                                            d'engin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Conducteurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Chantiers</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date
                                                                                            d'arrivée</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            depart</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from engin where open_close!='1'  and id_chantier='$id_chantier' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_engin'];
                                                                                    $code = $row['code'];
                                                                                    $id_fournisseur = $row['id_cat_fournisseur'];
                                                                                    $id_cat_engin = $row['id_cat_engin'];
                                                                                    $id_personnel = $row['id_personnel'];
                                                                                    $id_chantier = $row['id_chantier'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $date_arrived = $row['date_arrived'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php echo $id; ?>"/>

                                                                                        <td align="center"> <?php echo $code; ?>   </td>
                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from fournisseur where id_fournisseur = '$id_fournisseur'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_four'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>

                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from categorie_engin where id_cat_engin = '$id_cat_engin'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>
                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>
                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_chantier'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>
                                                                                        <td align="center"> <?php echo $date_arrived; ?>   </td>
                                                                                        <td align="center"> <?php echo $date_begin; ?>   </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%">
                                                                                            <!-- <a class="btn btn-primary"  href="details_engin.php?id=<?php echo $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        
              
                         <a class="btn btn-warning" href="modifier_engin.php?id=<? //=$id;
                                                                                            ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_engin<? //= $id;
                                                                                            ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  -->
                                                                                            <div class="btn-group mr-2"
                                                                                                 role="group"
                                                                                                 aria-label="First group">
                                                                                                <a class="btn btn-primary"
                                                                                                   href="details_engin.php?id=<?= $id; ?>"
                                                                                                   title="view"
                                                                                                   style="background-color: transparent; color: green">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                    <!-- Transférer -->
                                                                                                </a>
                                                                                            </div>
                                                                                            <!--                     <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-warning" href="modifier_personnel.php?id=<?= $id; ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>
                       </div> -->
                                                                                            <!--                      <div class="btn-group mr-2" role="group" aria-label="First group">
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_pers<?= $id; ?>" title="supprimer"  style="background-color: transparent">
                                   <i style="color: red" class="fas fa-trash"></i> 
                               
                            </a>
                        </div>  -->


                                                                                            <!--  <?php
                                                                                            //include("verifier_delete_offre.php");
                                                                                            ?> -->


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Code</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Fournisseurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Type
                                                                                            d'engin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Conducteurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Chantiers</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date
                                                                                            d'arrivée</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            depart</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody></tbody>
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
                                    <!--********************************************ETAPES************************************************ -->

                                    <div class="tab-pane container" id="menu5">
                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des etapes.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="<?= $etape['option1_link'] ?>?id=<?= $id_chantier ?>">
                                                                        <i class="fas fa-plus"></i>
                                                                        Nouvelle etape
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center" style="color: white">R</p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom de
                                                                                            l'étape</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Obje du
                                                                                            chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Coût de
                                                                                            l'étape</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date du
                                                                                            debut</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            fin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            PHASES</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from etape where open_close!='1' and id_chantier= '$id_chantier' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_etape = $row['id_etape'];
                                                                                    $id_chantier = $row['id_chantier'];
                                                                                    $nom_etape = $row['nom_etape'];
                                                                                    $objet_chantier = $row['objet_chantier'];
                                                                                    $cout_etape = $row['cout_etape'];
                                                                                    $date_debut_etape = $row['date_debut_etape'];
                                                                                    $date_fin_etape = $row['date_fin_etape'];
                                                                                    $cout_etape = $row['cout_etape'];
                                                                                    $etat = $row['etat'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $id;
                                                                                               ?>"/>

                                                                                        <td align="center"> <?php echo $nom_etape; ?>  </td>
                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_chantier'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>


                                                                                        <td align="center"> <?php echo $objet_chantier; ?>  </td>
                                                                                        <td align="center"> <?php echo $cout_etape; ?>  </td>

                                                                                        <td align="center"> <?php echo $date_debut_etape; ?>  </td>
                                                                                        <td align="center"> <?php echo $date_fin_etape; ?>  </td>
                                                                                        <?php
                                                                                        if ($etat == 1) {

                                                                                            echo '<td align="center">
        <a href="modifier_etape.php?id=' . $id_etape . '&idc=' . $id_chantier . '&idm=' . $idm . '" style=" width:100px;" class="btn btn-secondary" >Achevé</a>
                                                        </td>';
                                                                                        } else {

                                                                                            echo '<td align="center">
        <a href="modifier_etape.php?id=' . $id_etape . '&idc=' . $id_chantier . '&idm=' . $idm . '" style=" width:100px;" class="btn btn-primary" >En cours</a>
                                                        </td>';

                                                                                        }


                                                                                        ?>

                                                                                        <td align="center"
                                                                                            style="width: 18%"><a
                                                                                                    class="btn btn-primary"
                                                                                                    href="details_etape.php?id=<?php echo $id_etape; ?>&idc=<?= $id_chantier ?>&idm=<?= $idm ?>"
                                                                                                    title="view"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: green"
                                                                                                   class="fas fa-eye"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-warning"
                                                                                               href="modifier_etape.php?id=<?php echo $id_etape; ?>&idc=<?= $id_chantier ?>&idm=<?= $idm ?>"
                                                                                               title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: orange"
                                                                                                   class="fas fa-pen"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-danger"
                                                                                               type="button"
                                                                                               data-toggle="modal"
                                                                                               data-target="#verifier_delete_etape<?= $id_etape; ?>"
                                                                                               title="supprimer"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a>


                                                                                            <?php
                                                                                            include("verifier_delete_etape.php");
                                                                                            ?>


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom de
                                                                                            l'étape</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Obje du
                                                                                            chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Coût de
                                                                                            l'étape</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date du
                                                                                            debut</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            fin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            PHASES</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody></tbody>
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

                                    <!--****************************************** GESTION DE   MAINTENANCE.************************************************ -->


                                    <div class="tab-pane container" id="menu6">
                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des maintenance.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="nouvelle_maintenance_chantier.php?id=<?php echo $id_chantier ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Nouvelle maintenance
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
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Intitulé </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            paiement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from maintenance_chantier where id_chantier='" . $id_chantier . "'  ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_maint_chantier = $row['id_maint_chantier'];
                                                                                    $intitule = $row['intitule'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $id_chantier = $row['idchantier'];

                                                                                    ?>
                                                                                    <tr>

                                                                                        <td align="center"><?php echo $intitule; ?>  </td>
                                                                                        <td align="center"><?php echo $date_begin; ?>  </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%">
                                                                                            <!--  <a class="btn btn-primary"  href="details_gestion_paiement.php?id=<?php //echo $id;
                                                                                            ?>" title="view"
                                                                        style="background-color: transparent">
                                                                            <i  style="color: green" class="fas fa-eye"></i> 
                                                                        </a>
                                                                    
                                                          
                                                                     <a class="btn btn-warning" href="modifier_gestion_paiement.php?id=<? //=$id;
                                                                                            ?>" title="Modifier"
                                                                        style="background-color: transparent">
                                                                            <i style="color: orange" class="fas fa-pen"></i> 
                                                                        </a>  -->
                                                                                            <a class="btn btn-danger"
                                                                                               href="delete_maintenance_chantier.php?id=<?= $id_maint_chantier; ?>&id_chantier=<?= $id_chantier ?>"
                                                                                               title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>


                                                                                <?php } ?>
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Intitulé </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            paiement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody></tbody>
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