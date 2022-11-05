<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$doc0 = 1;
$doc01 = 2;
$doc02 = 3;
$id_offre = $_REQUEST['id'];


$query = " SELECT a.id_offre, a.ref_offre, a.id_card_bank, a.id_client, a.objet , a.date_lancement, a.montant_offre, a.date_open_offre, a.month_offre, a.montant_dao, a.soumissionaire, a.doc, a.doc1, a.doc2, a.id_type  FROM appel_offre as a WHERE a.id_offre='" . $id_offre . "' ";

$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    $ref_offre = $row['ref_offre'];
    $id_card_bank = $row['id_card_bank'];
    $id_client = $row['id_client'];
    $objet = $row['objet'];
    $date_lancement = $row['date_lancement'];
    $montant_offre = $row['montant_offre'];
    $date_open_offre = $row['date_open_offre'];
    $month_offre = $row['month_offre'];
    $montant_dao = $row['montant_dao'];
    $soumis = $row['soumissionaire'];
    $id_type = $row['id_type'];
    $doc = $row['doc'];
    $doc1 = $row['doc1'];
    $doc2 = $row['doc2'];


    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails de L'Appel d'offre : <?= $ref_offre ?></h1>
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
                                            <a class="nav-link active" href="<?= $offre['option2_link'] ?>">
                                                Retour
                                            </a>
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
                                                <i class="fas fa-building"></i>
                                                <?php

                                                $query = "SELECT count(ref_marche) as total from marche where id_offre='$id_offre' and open_close!='1' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Marchés[' . $row['total'] . ']';
                                                }

                                                ?>

                                                <!-- <sup><span class="badge badge-warning">100</span></sup> -->
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-users"></i>
                                                <?php

                                                $query = "SELECT count(id_groupe) as total from groupement where id_offre='$id_offre' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Groupement[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                                <i class="fas fa-cubes"></i>

                                                <?php

                                                $query = "SELECT a.id_offre, a.ref_offre, a.id_card_bank, a.id_client, a.objet , a.date_lancement, a.montant_offre, a.date_open_offre, a.month_offre, a.montant_dao, a.soumissionaire, p.id_pj, count(p.nom_pj) as total, p.lien, p.doc, p.doc1, p.doc2 FROM appel_offre as a left join pj_offre_document as p on ( a.id_offre=p.id_offre) WHERE a.id_offre='" . $id_offre . "'";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Documents[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu4">
                                                <i class="fas fa-cubes"></i>

                                                <?php
                                                $query = "SELECT count(id_pj_offre) as total from pj_appel_offre where id_offre='" . $id_offre . "' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Pièces Jointes[' . $row['total'] . ']';
                                                }
                                                ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu5">
                                                <i class="fas fa-cubes"></i>

                                                <?php

                                                $query = "SELECT count(id_caut) as total from caution_bancaire where id_offre='$id_offre' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Caution Bancaire[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
                                        <!--                                     <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu4">
                                                                                    <i class="fas fa-bars"></i>
                                                                                    Phase d'éxecution[]
                                                                                </a>
                                                                            </li>
                                                                           <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu5">
                                                                                    <i class="fas fa-list-alt"></i>
                                                                                    Gestion de paiement
                                                                                </a>
                                                                            </li>  -->
                                        <!--                                      <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu3">
                                                                                    <i class="fas fa-university"></i>
                                                                                    Congés
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu4">
                                                                                    <i class="fas fa-envelope"></i>
                                                                                     Credits
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu5">
                                                                                    <i class="fas fa-envelope"></i>
                                                                                     Sanctions
                                                                                </a>
                                                                            </li> -->
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
                                                                                <span class="help-block small-font">RÉFERENCE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_offre"
                                                                                           value="<?php echo $ref_offre ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">OBJET:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="objet"
                                                                                           value="<?php echo $objet ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">MAÎTRE D'OUVRAGE:</span>
                                                                                <div class="col">
                                                                                    <select name="id_client" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_client ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$id_client'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_client'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT DU MARCHÉ:</span>
                                                                                <div class="col">
                                                                                    <?php
                                                                                    echo ' <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="montant_dao" value="' . number_format($montant_offre) . ' "  disabled>';
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT DU DAO:</span>
                                                                                <div class="col">
                                                                                    <?php
                                                                                    echo ' <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="montant_dao" value="' . number_format($montant_dao) . ' "  disabled>';
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE LANCEMENT :</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_lancement"
                                                                                           value="<?php echo $date_lancement ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DATE DE DEPOUILLEMENT:</span>
                                                                                <div class="col">
                                                                                    <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="date_open"
                                                                                           value="<?php echo $date_open_offre ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">DÉLAI D'EXECUTION</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_offre"
                                                                                           value="<?php echo $month_offre ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">SOUMISSIONAIRE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="soumis"
                                                                                           value="<?php echo $soumis ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">N°COMPTE BANCAIRE:</span>

                                                                                <div class="col">
                                                                                    <select name="id_card_bank" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_card_bank ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from compte_bank where id_card_bank = '$id_card_bank'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['numero_compte'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">Type:</span>

                                                                                <div class="col">
                                                                                    <select name="id_type" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_type ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT id_type, nom_type FROM type  where id_type='$id_type'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_type'];
                                                                                            }

                                                                                            ?>
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

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************LISTE DES CHANTIERS************************************************* -->
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
                                                        <b>L'ensemble des marchés.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="<?= $marche['option1_link'] ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Ajouter un marché
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
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réference du marché</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">L'appel
                                                                                            d'offre</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Objet</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            lancement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Remarque</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from marche where id_offre='$id_offre' and open_close!='1' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_marche'];
                                                                                    $ref_marche = $row['ref_marche'];
                                                                                    $id_offre = $row['id_offre'];
                                                                                    $objet_marche = $row['objet_marche'];
                                                                                    $date_lancement = $row['date_lancement'];
                                                                                    $montant_ht = $row['montant_ht'];
                                                                                    $montant_ttc = $row['montant_ttc'];
                                                                                    $remarque = $row['remarque'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $row['id'];
                                                                                               ?>"/>

                                                                                        <td align="center"> <?php echo $ref_marche; ?>  </td>
                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_offre'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['ref_offre'];
                                                                                            }

                                                                                            ?>   </td>

                                                                                        <td align="center"> <?php echo $objet_marche; ?>   </td>
                                                                                        <td align="center"> <?php echo $date_lancement; ?>   </td>
                                                                                        <td align="center"> <?php echo $remarque; ?>   </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%"><a
                                                                                                    class="btn btn-primary"
                                                                                                    href="details_marche.php?id=<?php echo $id; ?>"
                                                                                                    title="view"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: green"
                                                                                                   class="fas fa-eye"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-warning"
                                                                                               href="modifier_marche.php?id=<?= $id; ?>"
                                                                                               title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: orange"
                                                                                                   class="fas fa-pen"></i>
                                                                                            </a>


                                                                                            <!--                              <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_marche<? //= $id;
                                                                                            ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->


                                                                                            <!--  <?php
                                                                                            //include("verifier_delete_marche.php");
                                                                                            ?> -->


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réference du marché</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">L'appel
                                                                                            d'offre</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Objet</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            lancement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Remarque</p></th>
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

                                    <!--********************************************GROUPEMENT************************************************* -->
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
                                                        <b>L'ensemble des groupements.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="nouveau_groupement.php?id=<?= $id_offre ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Ajouter un groupe
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
                                                                                           style="color: white">Nom du
                                                                                            groupe</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from groupement ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_groupe = $row['id_groupe'];
                                                                                    $nom_groupe = $row['nom_groupe'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $statut = $row['statut'];
                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $id;
                                                                                               ?>"/>

                                                                                        <td align="center">
                                                                                            <?php echo $nom_groupe ?>
                                                                                        </td>
                                                                                        <td align="center"> <?php echo date("d-m-Y", strtotime($date_begin)); ?>  </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%">
                                                                                            <?php
                                                                                            if ($statut == 0) {

                                                                                                echo '<a   class="btn btn-primary"  href="ajouter_groupe.php?id=' . $id_groupe . '" 
                            > Ajouter
                            </a>';


                                                                                            } else {

                                                                                                echo ' <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a class="btn btn-primary"  href="details_groupement.php?id=' . $id_groupe . '" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a> 
                            </div>';
                                                                                                // echo'<a class="btn btn-warning" href="modifier_groupe.php?id='.$id.'" title="Modifier"
                                                                                                //     style="background-color: transparent">
                                                                                                //         <i style="color: orange" class="fas fa-pen"></i>
                                                                                                //     </a> ';

                                                                                                echo '<div class="btn-group mr-2" role="group" aria-label="First group">
                        <a class="btn btn-danger"  href="delete_groupe.php?id=' . $id_groupe . '&id_offre=' . $id_offre . '"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>
                            </div>';

                                                                                            }

                                                                                            ?>


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>


                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            groupe</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date</p>
                                                                                    </th>
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

                                    <!--********************************************MES CONGES************************************************* -->
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
                                                        <b>L'ensemble des documments.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <!-- <a class="nav-link active" href="<?php //$engin['option1_link']
                                                                    ?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouvelle  
                                        </a> -->
                                                                </li>
                                                            </ul>
                                                        </b>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="well bs-component">

                                                            <fieldset>
                                                                <div class="table-responsive">

                                                                    <button class="accord">OFFRES ADMINISTRATIVES
                                                                    </button>
                                                                    <div class="panelle">

                                                                        <?php


                                                                        if ($doc == 1) {

                                                                            $sql = "SELECT * from pj_offre_document where doc=1 and id_offre='" . $id_offre . "'  ";

                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();

                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                            foreach ($tables as $row) {
                                                                                $id_pj = $row['id_pj'];
                                                                                $nom_pj = $row['nom_pj'];
                                                                                $lien = $row['lien'];
                                                                                $doc = $row['doc'];


                                                                                echo '<table  border="1" class="table  table-hover table-condensed" width="100%" cellspacing="0" >
                                                                        <tbody>
 
                                                                        <tr>
                                                                            <td style="width: 50%" align="center">

                                                                               <a href="' . $lien . '">' . $nom_pj . '</a>
                                                                            </td>
                                                                            
                                                                            <td  align="center">

                                                        <a class="btn btn-danger"  href="delete_offre_document.php?id=' . $id_pj . '&id_offre=' . $id_offre . '&statut=0"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>                                        
                                                                            </td>
                                                                        </tr>


                                                        
                                                                        </tbody>
                                                                    </table>';
                                                                            }
                                                                        } else {


                                                                            echo ' <form class="form-horizontal" method="post" action="save_offre_document.php" enctype="multipart/form-data">
        <input type="hidden" name="id_offre" value="' . $id_offre . '">
        <input type="hidden" name="doc" value="' . $doc0 . '">
  <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" >
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 50%" >

                                                                               <span class="help-block small-font" >Pièce jointe:</span>
                                                                              <div class="col">
                                                                                <input type="file" name="fichier" style="width:100%" class="form-control">
                                                                                    </div>
                                                                            </td>
                                                                            
                                                                            <td >

                                                                                <button type="submit" style=" width:150px; float: right; margin-top: 10px"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>                                        
                                                                            </td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                
                                                               </form> ';


                                                                        }

                                                                        ?>


                                                                    </div>
                                                                    <button class="accord">OFFRES TECHNIQUES</button>
                                                                    <div class="panelle">
                                                                        <?php


                                                                        if ($doc1 == 1) {

                                                                            $sql = "SELECT * from pj_offre_document where doc1=1 and id_offre='" . $id_offre . "'  ";

                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();

                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                            foreach ($tables as $row) {
                                                                                $id_pj = $row['id_pj'];
                                                                                $nom_pj = $row['nom_pj'];
                                                                                $lien = $row['lien'];
                                                                                $doc = $row['doc'];


                                                                                echo '<table  border="1" class="table  table-hover table-condensed" width="100%" cellspacing="0" >
                                                                        <tbody>
 
                                                                        <tr>
                                                                            <td style="width: 50%" align="center">

                                                                               <a href="' . $lien . '">' . $nom_pj . '</a>
                                                                            </td>
                                                                            
                                                                            <td align="center">

                                                        <a class="btn btn-danger"  href="delete_offre_document.php?id=' . $id_pj . '&id_offre=' . $id_offre . '&statut=1"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>                                        
                                                                            </td>
                                                                        </tr>


                                                        
                                                                        </tbody>
                                                                    </table>';
                                                                            }
                                                                        } else {


                                                                            echo ' <form class="form-horizontal" method="post" action="save_offre_document.php" enctype="multipart/form-data">
        <input type="hidden" name="id_offre" value="' . $id_offre . '">
        <input type="hidden" name="doc" value="' . $doc0 . '">
  <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" >
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 50%">

                                                                               <span class="help-block small-font" >Pièce jointe:</span>
                                                                              <div class="col">
                                                                                <input type="file" name="fichier" style="width:100%" class="form-control">
                                                                                    </div>
                                                                            </td>
                                                                            
                                                                            <td>

                                                                                <button type="submit" style=" width:150px; float: right; margin-top: 10px"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>                                        
                                                                            </td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                
                                                               </form> ';


                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <button class="accord">OFFRES FINANCIERES</button>
                                                                    <div class="panelle">
                                                                        <?php


                                                                        if ($doc2 == 1) {

                                                                            $sql = "SELECT * from pj_offre_document where doc2=1 and id_offre='" . $id_offre . "'  ";

                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();

                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                            foreach ($tables as $row) {
                                                                                $id_pj = $row['id_pj'];
                                                                                $nom_pj = $row['nom_pj'];
                                                                                $lien = $row['lien'];
                                                                                $doc = $row['doc'];


                                                                                echo '<table  border="1" class="table  table-hover table-condensed" width="100%" cellspacing="0" >
                                                                        <tbody>
 
                                                                        <tr>
                                                                            <td style="width: 50%" align="center">

                                                                               <a href="' . $lien . '">' . $nom_pj . '</a>
                                                                            </td>
                                                                            
                                                                            <td align="center">

                                                        <a class="btn btn-danger"  href="delete_offre_document.php?id=' . $id_pj . '&id_offre=' . $id_offre . '&statut=2"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>                                        
                                                                            </td>
                                                                        </tr>


                                                        
                                                                        </tbody>
                                                                    </table>';
                                                                            }
                                                                        } else {


                                                                            echo ' <form class="form-horizontal" method="post" action="save_offre_document.php" enctype="multipart/form-data">
        <input type="hidden" name="id_offre" value="' . $id_offre . '">
        <input type="hidden" name="doc" value="' . $doc0 . '">
  <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" >
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 50%">

                                                                               <span class="help-block small-font" >Pièce jointe:</span>
                                                                              <div class="col">
                                                                                <input type="file" name="fichier" style="width:100%" class="form-control">
                                                                                    </div>
                                                                            </td>
                                                                            
                                                                            <td>

                                                                                <button type="submit" style=" width:150px; float: right; margin-top: 10px"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>                                        
                                                                            </td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                
                                                               </form> ';


                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                            </fieldset>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--********************************************MES CONGES 2222222************************************************* -->
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
                                                        <i class="fas fa-scroll"></i>
                                                        <b>Liste des pièces jointes .</b>

                                                        <!-- Nav pills -->

                                                        <b>


                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-toggle="modal"
                                                                       data-target="#ajouter_pj" href="#">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Nouvelle pièce(s) jointe(s)

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
                                                                        <form method="post" action="#">
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center">NOM</p></th>
                                                                                    <th><p align="center">Options</p>
                                                                                    </th>

                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from pj_appel_offre where id_offre='" . $id_offre . "' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_pj_offre'];
                                                                                    $nom_pj = $row['nom_pj'];
                                                                                    $lien = $row['lien'];
                                                                                    ?>

                                                                                    <tr>

                                                                                        <td align="center"><a
                                                                                                    href="<?php echo $lien; ?>"><?php echo $nom_pj; ?></a>
                                                                                        </td>
                                                                                        <td align="center">
                                                                                            <div class="btn-group mr-2"
                                                                                                 role="group"
                                                                                                 aria-label="First group">
                                                                                                <a class="btn btn-danger"
                                                                                                   href="delete_pj_appel_offre.php?id=<?= $id ?>&id_offre=<?= $id_offre ?>"
                                                                                                   style="background-color: transparent">
                                                                                                    <i style="color: red"
                                                                                                       class="fas fa-trash"></i>
                                                                                                </a>
                                                                                            </div>

                                                                                        </td>
                                                                                    </tr>


                                                                                <?php } ?>
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center">NOM</p></th>
                                                                                    <th><p align="center">Options</p>
                                                                                    </th>

                                                                                </tr>
                                                                                </tfoot>

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

                                    <!--********************************************MES CONGES 2222222************************************************* -->
                                    <div class="tab-pane container" id="menu5">
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
                                                        <b>L'ensemble des cautions bancaires.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="nouvelle_caution.php?id=<?= $id_offre ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Ajouter une caution
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
                                                                                           style="color: white">Nom de
                                                                                            la banque</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Montant</p>
                                                                                    </td></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Statut</p>
                                                                                    </td></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Option</p>
                                                                                    </td></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from caution_bancaire ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_caut = $row['id_caut'];
                                                                                    $nom_banque = $row['nom_banque'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $etat_caution = $row['etat_caution'];
                                                                                    $montant_caution = $row['montant_caution'];
                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $id;
                                                                                               ?>"/>

                                                                                        <td align="center">
                                                                                            <?php echo $nom_banque ?>
                                                                                        </td>
                                                                                        <td align="center"> <?php echo number_format($montant_caution); ?>  </td>
                                                                                        <td align="center"> <?php echo date("d-m-Y", strtotime($date_begin)); ?>  </td>
                                                                                        <td align="center"
                                                                                            style="width: 20%"> <?php
                                                                                            if ($etat_caution == 1) {

                                                                                                echo '
        <a href="#" style=" width:100px;" class="btn btn-primary" >Récuperer</a>
                                                        ';
                                                                                            } else {

                                                                                                echo '
        <a href="#" style=" width:150px;" class="btn btn-danger" >Non Récuperer</a>
                                                        ';

                                                                                            } ?> </td>


                                                                                        <td align="center"
                                                                                            style="width: 18%">
                                                                                            <div class="btn-group mr-2"
                                                                                                 role="group"
                                                                                                 aria-label="First group">
                                                                                                <a class="btn btn-warning"
                                                                                                   href="#"
                                                                                                   title="Modifier"
                                                                                                   style="background-color: transparent">
                                                                                                    <i style="color: orange"
                                                                                                       class="fas fa-pen"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="btn-group mr-2"
                                                                                                 role="group"
                                                                                                 aria-label="First group">
                                                                                                <a class="btn btn-danger"
                                                                                                   href="#"
                                                                                                   style="background-color: transparent">
                                                                                                    <i style="color: red"
                                                                                                       class="fas fa-trash"></i>
                                                                                                </a>
                                                                                            </div>


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>


                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom de
                                                                                            la banque</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Montant</p>
                                                                                    </td></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Statut</p>
                                                                                    </td></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Option</p>
                                                                                    </td></th>
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
                                    <!--********************************************PHASE D'EXECUTION************************************************ -->

                                    <div class="tab-pane container" id="menu5">
                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des phases d'éxecutions.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="nouvelle_phase_execution.php?id=<?php // echo $id_marche
                                                                       ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Nouvelle phase
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
                                                                                            Numéro</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            commencement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Délai
                                                                                            d'éxecution</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <!--                                                         <?php

                                                                                // $query = "SELECT * from phase_execution where id_marche='".$id_marche."'  ";
                                                                                //     $q = $db->query($query);
                                                                                //     while($row = $q->fetch())
                                                                                //     {
                                                                                //         $id = $row['id_phase_exe'];
                                                                                //         $numero = $row['numero'];
                                                                                //         $date_commencement = $row['date_commencement'];
                                                                                //         $month_delai = $row['month_delai'];
                                                                                //         $day_delai = $row['day_delai'];
                                                                                //         $id_marche = $row['id_marche'];

                                                                                ?> -->
                                                                                <tr>

                                                                                    <td align="center"><?php //echo $numero;
                                                                                        ?>  </td>
                                                                                    <td align="center"><?php //echo $date_commencement;
                                                                                        ?>  </td>
                                                                                    <td align="center"><?php //echo $day_delai.'Jour(s) et'.$month_delai;
                                                                                        ?>  </td>

                                                                                    <td align="center"
                                                                                        style="width: 18%">
                                                                                        <a class="btn btn-primary"
                                                                                           href="details_partie_prenante.php?id=<?php //echo $id;
                                                                                           ?>" title="view"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: green"
                                                                                               class="fas fa-eye"></i>
                                                                                        </a>


                                                                                        <a class="btn btn-warning"
                                                                                           href="modifier_partie_prenante.php?id=<?//=$id;
                                                                                           ?>" title="Modifier"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: orange"
                                                                                               class="fas fa-pen"></i>
                                                                                        </a>


                                                                                        <a class="btn btn-danger"
                                                                                           type="button"
                                                                                           data-toggle="modal"
                                                                                           data-target="#verifier_delete_partie_prenante<?//= $id;
                                                                                           ?>" title="supprimer"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: red"
                                                                                               class="fas fa-trash"></i>
                                                                                        </a>


                                                                                        <!--  <?php
                                                                                        //include("verifier_delete_partie_prenante.php");
                                                                                        ?> -->


                                                                                    </td>
                                                                                </tr>


                                                                                <!--  <?php //}
                                                                                ?> -->
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Numéro</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            commencement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Délai
                                                                                            d'éxecution</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
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

                                    <!--****************************************** GESTION DE PAIEMENT.************************************************ -->


                                    <div class="tab-pane container" id="menu6">
                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des paiements.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="nouvelle_gestion_paiement.php?id=<?php // echo $id_marche
                                                                       ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Nouveau paiement
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
                                                                        <form>
                                                                            <table class="table table-bordered"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Numéro
                                                                                            d'attachement </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            paiement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            HT</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            TTC</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <!--                                                         <?php

                                                                                // $query = "SELECT * from gestion_attachement where id_marche='".$id."'  ";
                                                                                //     $q = $db->query($query);
                                                                                //     while($row = $q->fetch())
                                                                                //     {
                                                                                //         $id = $row['id_ges_attache'];
                                                                                //         $numero_attache = $row['numero_attache'];
                                                                                //         $date_paie = $row['date_paie'];
                                                                                //         $montant_attache_ht = $row['montant_paie_ht];
                                                                                //         $montant_attache_ttc = $row['montant_paie_ttc'];

                                                                                ?> -->
                                                                                <tr>

                                                                                    <td align="center"><?php //echo $numero_attache;
                                                                                        ?>  </td>
                                                                                    <td align="center"><?php //echo $date_paie;
                                                                                        ?>  </td>
                                                                                    <td align="center"><?php //echo $montant_paie_ht
                                                                                        ?>  </td>
                                                                                    <td align="center"><?php //echo $montant_paie_ttc
                                                                                        ?>  </td>

                                                                                    <td align="center"
                                                                                        style="width: 18%">
                                                                                        <a class="btn btn-primary"
                                                                                           href="details_gestion_paiement.php?id=<?php //echo $id;
                                                                                           ?>" title="view"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: green"
                                                                                               class="fas fa-eye"></i>
                                                                                        </a>


                                                                                        <a class="btn btn-warning"
                                                                                           href="modifier_gestion_paiement.php?id=<?//=$id;
                                                                                           ?>" title="Modifier"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: orange"
                                                                                               class="fas fa-pen"></i>
                                                                                        </a>


                                                                                        <a class="btn btn-danger"
                                                                                           type="button"
                                                                                           data-toggle="modal"
                                                                                           data-target="#verifier_delete_gestion_paiement<?//= $id;
                                                                                           ?>" title="supprimer"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: red"
                                                                                               class="fas fa-trash"></i>
                                                                                        </a>


                                                                                        <!--  <?php
                                                                                        //include("verifier_delete_gestion_paiement.php");
                                                                                        ?> -->


                                                                                    </td>
                                                                                </tr>


                                                                                <!--  <?php //}
                                                                                ?> -->
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Numéro
                                                                                            d'attachement </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            paiement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            HT</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            TTC</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
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


    include("ajouter_pj_offre.php");


    ?>
    <?php
}
?>
    <!--    Modal pour ajouter Situation Matrimoniale-->
    <script>
        var acc = document.getElementsByClassName("accord");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("activ");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>


    <!--//Footer-->
<?php
include('foot.php');
?>