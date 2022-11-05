<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

// $query  = "SELECT id_personnel as total from personnel";
// $q = $conn->query($query);
// while($row = $q->fetch_assoc())
// {
//     $total = $row["total"];
// }
// $id_personnel = $total;

?>
<?php
$id_etape = $_REQUEST['id'];
$idc = $_REQUEST['idc'];
if ($idc != 0) {
    $idm = $_REQUEST['idm'];
} else {
    $idm = 0;
}


$query = "SELECT * from etape where id_etape='" . $id_etape . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_etape = $row['id_etape'];
    // /*-------------------- DETAILS --------------------*/
    $id_chantier = $row['id_chantier'];
    $objet_chantier = $row['objet_chantier'];
    $date_begin_chantier = $row['date_begin_chantier'];
    $montant_ttc_chantier = $row['montant_ttc_chantier'];

    // /*------------------- ETAPE----------------------*/
    $nom_etape = $row['nom_etape'];
    $cout_etape = $row['cout_etape'];
    $date_debut_etape = $row['date_debut_etape'];
    $date_fin_etape = $row['date_fin_etape'];

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du Etape : <?= $nom_etape ?> </h1>
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
                                            if ($idc != 0) {
                                                echo "details_chantier.php?id=" . $idc . "&idm=" . $idm;
                                            } else {
                                                echo 'liste_etape.php';
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
                                                Détails
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-users"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_personnel) as total from personnel where open_close!='1' and id_etape='$id_etape' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Ressources Humainesl[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_materiel) as total from magasin_etape where   id_etape='$id_etape'  ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Ressources Matérielles[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_eq) as total from magasin_etape_eq where   id_etape='$id_etape'  ";
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

                                                $query = "SELECT DISTINCT count(id_engin) as total from engin where id_etape='$id_etape' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Engins[' . $row['total'] . ']';
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
                                                                                <span class="help-block small-font">NOM DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <select name="ref_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="" selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_chantier'];
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">   OBJET DU CHANTIER:</span>

                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="objet_chantier"
                                                                                           value="<?= $objet_chantier ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">DATE DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <?php echo '<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="' . date("d-m-Y", strtotime($date_begin_chantier)) . '"disabled>';
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT TTC DU CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="montant"
                                                                                           value="<?= $montant_ttc_chantier ?>"
                                                                                           disabled>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">NOM DE L'ETAPE :</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="nom_etape"
                                                                                           value="<?= $nom_etape ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">COÛT</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="cout" value="<?= $cout_etape ?>"
                                                                                           disabled>FCFA

                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE DEBUT</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="date_debut"
                                                                                           value="<?= $date_debut_etape ?>"
                                                                                           disabled>

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE FIN</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="date_fin"
                                                                                           value="<?= $date_fin_etape ?>"
                                                                                           disabled>

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
                                                                    <!-- <a class="nav-link active" href="ajouter_personnel_etape?id=<?php echo $id_etape ?>">
                                            <i class="fas fa-user"></i>
                                            Ajouter Personnel
                                        </a> -->
                                                                    <?php
                                                                    echo '<a class="nav-link active" href="';
                                                                    if ($idc != 0) {
                                                                        echo "ajouter_personnel_etape.php?id=" . $id_etape . "&idc=" . $idc;
                                                                    } else {
                                                                        echo "ajouter_personnel_etape.php?id=" . $id_etape . "&idc=" . $idc;;
                                                                    }
                                                                    echo ' ">
                                            Ajouter Personnel
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

                                                                                $query = "SELECT * from personnel where open_close!='1' and id_etape= '$id_etape' ";
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
                                                                                            style="width: 20%">

                                                                                            <div class="btn-group mr-2"
                                                                                                 role="group"
                                                                                                 aria-label="First group">
                                                                                                <a class="btn btn-primary"
                                                                                                   href="details_personnel.php?id=<?= $id; ?>"
                                                                                                   title="view"
                                                                                                   style="background-color: transparent">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                </a>
                                                                                            </div>

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
                                                                    <!-- <a class="nav-link active" href="ajouter_etape_materiel?id=<?php echo $id_etape ?>">
                                            <i class="fas fa-plus"></i>
                                            Ajouter Matériel
                                        </a> -->
                                                                    <?php
                                                                    echo '<a class="nav-link active" href="';
                                                                    if ($idc != 0) {
                                                                        echo "ajouter_etape_materiel.php?id=" . $id_etape . "&idc=" . $idc;
                                                                    } else {
                                                                        echo "ajouter_etape_materiel.php?id=" . $id_etape . "&idc=" . $idc;;
                                                                    }
                                                                    echo ' ">
                                            Ajouter Matériel
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

                                                                                $sql = "SELECT DISTINCT * from magasin_etape where id_etape = '$id_etape'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_materiel = $table['id_materiel'];
                                                                                    $quantite_etape = $table['quantite_etape'];
                                                                                    $prix_unitaire_mag_etape = $table['prix_unitaire_mag_etape'];
                                                                                    $prix_total_mag_etape = $table['prix_total_mag_etape'];


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
                                                                                            <td align="center"> <?php echo $quantite_etape; ?>   </td>
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

                                                                                            <td align="center"> <?php echo $prix_unitaire_mag_etape; ?>  </td>
                                                                                            <td align="center"> <?php echo $prix_total_mag_etape; ?>  </td>

                                                                                            <td align="center"
                                                                                                style="width: 18%"><a
                                                                                                        href="ajouter_transfert_etape.php?id_mat=<?= $id ?>&id_et=<?= $id_etape ?>"
                                                                                                        style=" width:120px;"
                                                                                                        class="btn btn-primary">Ajouter

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
                                                                    <!-- <a class="nav-link active" href="ajouter_etape_materiel?id=<?php echo $id_etape ?>">
                                            <i class="fas fa-plus"></i>
                                            Ajouter Matériel
                                        </a> -->
                                                                    <?php
                                                                    echo '<a class="nav-link active" href="';
                                                                    if ($idc != 0) {
                                                                        echo "ajouter_etape_materiel_eq.php?id=" . $id_etape . "&idc=" . $idc;
                                                                    } else {
                                                                        echo "ajouter_etape_materiel_eq.php?id=" . $id_etape . "&idc=" . $idc;;
                                                                    }
                                                                    echo ' ">
                                            Ajouter Equipement
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

                                                                                $sql = "SELECT DISTINCT * from magasin_etape_eq where id_etape = '$id_etape'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_eq = $table['id_eq'];
                                                                                    $quant_etape = $table['quant_etape'];
                                                                                    $prix_unit_mag_etape = $table['prix_unit_mag_etape'];
                                                                                    $prix_t_mag_etape = $table['prix_t_mag_etape'];


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
                                                                                            <td align="center"> <?php echo $quant_etape; ?>   </td>
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

                                                                                            <td align="center"> <?php echo number_format($prix_unit_mag_etape); ?>  </td>
                                                                                            <td align="center"> <?php echo number_format($prix_t_mag_etape); ?>  </td>


                                                                                            <td align="center"
                                                                                                style="width: 18%"><a
                                                                                                        href="ajouter_transfert_etape_eq.php?id_eq=<?= $id ?>&id_et=<?= $id_etape ?>"
                                                                                                        style=" width:120px;"
                                                                                                        class="btn btn-primary">Ajouter

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
                                                                    <!-- <a class="nav-link active" href="ajouter_engin_etape?id=<?php echo $id_etape ?>">
                                            <i class="fas fa-bus"></i>
                                           Ajouter engin 
                                        </a> -->
                                                                    <?php
                                                                    echo '<a class="nav-link active" href="';
                                                                    if ($idc != 0) {
                                                                        echo "ajouter_engin_etape.php?id=" . $id_etape . "&idc=" . $idc;
                                                                    } else {
                                                                        echo "ajouter_engin_etape.php?id=" . $id_etape . "&idc=" . $idc;;
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

                                                                                $query = "SELECT * from engin where open_close!='1' and id_etape = '$id_etape' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_engin = $row['id_engin'];
                                                                                    $code = $row['code'];
                                                                                    $id_cat_fournisseur = $row['id_cat_fournisseur'];
                                                                                    $id_cat_engin = $row['id_cat_engin'];
                                                                                    $id_personnel = $row['id_personnel'];
                                                                                    $id_chantier = $row['id_chantier'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $date_arrived = $row['date_arrived'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $row['id'];
                                                                                               ?>"/>

                                                                                        <td align="center"> <?php echo $code; ?>   </td>
                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from categorie_fournisseur where id_cat_fournisseur = '$id_cat_fournisseur'";

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
                                                                                            style="width: 18%"><a
                                                                                                    class="btn btn-primary"
                                                                                                    href="details_engin.php?id=<?php echo $id_engin; ?>"
                                                                                                    title="view"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: green"
                                                                                                   class="fas fa-eye"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-warning"
                                                                                               href="modifier_engin.php?id=<?= $id_engin; ?>"
                                                                                               title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: orange"
                                                                                                   class="fas fa-pen"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-danger"
                                                                                               type="button"
                                                                                               data-toggle="modal"
                                                                                               data-target="#verifier_delete_engin<?= $id_engin; ?>"
                                                                                               title="supprimer"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a>


                                                                                            <?php
                                                                                            include("verifier_delete_engin.php");
                                                                                            ?>


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