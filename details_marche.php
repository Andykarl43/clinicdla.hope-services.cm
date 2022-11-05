<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_marche = $_REQUEST['id'];

$query = "SELECT * from marche where id_marche='" . $id_marche . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    // $id_personnel = $row['id_personnel'];
    // /*-------------------- DETAILS --------------------*/
    $id_offre = $row['id_offre'];
    $date_begin_marche = $row['date_begin_marche'];
    $ref_marche = $row['ref_marche'];
    $objet_marche = $row['objet_marche'];
    $date_lancement = $row['date_lancement'];
    $montant_ttc = $row['montant_ttc'];
    $montant_ht = $row['montant_ht'];
    $irm = $row['irm'];
    $date_open_prix = $row['date_open_prix'];
    $date_approbation = $row['date_approbation'];
    $garantie_bank = $row['garantie_bank'];
    $tva = $row['tva'];
    $moa = $row['moa'];
    $moe = $row['moe'];
    $ingenieur = $row['ingenieur'];
    $entreprise = $row['entreprise'];
    $chef = $row['chef'];
    $day_marche = $row['day_marche'];
    $month_marche = $row['month_marche'];
    $remarque = $row['remarque'];


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
                <h1 class="mt-4">Détails du Marché : <?= $ref_marche ?> </h1>
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
                                            <a class="nav-link active" href="<?= $marche['option2_link'] ?>">
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

                                                $query = "SELECT count(nom_chantier) as total from chantier where open_close!='1' and ref_marche=\"$ref_marche\" ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Chantier[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-users"></i>
                                                <?php

                                                $query = "SELECT count(id_partie) as total from partenaire where   id_marche='$id_marche' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Sous-traitants[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                                <i class="fas fa-cubes"></i>
                                                <?php
                                                $query = "SELECT count(id_pj_marche) as total from pj_marche where id_marche='" . $id_marche . "' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' documents[' . $row['total'] . ']';
                                                }
                                                ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu4">
                                                <i class="fas fa-bars"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(libelle) as total from phase_execution where id_marche='$id_marche' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Phase d\'éxecution[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu5">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_rec_marche) as total from reception_marche where id_marche='$id_marche' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Receptions[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu6">
                                                <i class="fas fa-list-alt"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_ges_paie) as total from gestion_paie where id_marche='$id_marche' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Gestion de paiement[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu7">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_maint_marche) as total from maintenance_marche where id_marche='$id_marche' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Gestion maintenance[' . $row['total'] . ']';
                                                }

                                                ?>
                                            </a>
                                        </li>
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
                                                                           width="100%" cellspacing="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">L'APPEL D'OFFRE:</span>

                                                                                <div class="col">
                                                                                    <select name="ref_offre" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_offre ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_offre'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['ref_offre'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <!--                   <td>
                                                                            <span class="help-block small-font" >DATE DE COMMENCEMENT:</span>
                                                                            <div class="col">
                                                                                <input  type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  value="<?php //echo $date_begin_marche
                                                                            ?>" name="date_begin"  disabled>
                                                                            </div>

                                                                        </td> -->
                                                                            <td>
                                                                                <span class="help-block small-font">ENTREPRISE:</span>

                                                                                <div class="col">
                                                                                    <select name="entreprise" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $entreprise ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$entreprise'";

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


                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">RÉFENCE DU MARCHÉ:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_marche"
                                                                                           value="<?php echo $ref_marche ?>"
                                                                                           disabled>
                                                                                </div>


                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">   OBJET DU MARCHÉ:</span>

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
                                                                        <!-- <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >DATE DE LANCEMENT:</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_lancement" value="<?php //echo $date_lancement
                                                                        ?>" disabled>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >MONTANT TTC:</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_ttc" value="<?php //echo $montant_ttc
                                                                        ?>" disabled>
                                                                            </button> 
                                                                            </div>
                                                                        </td>
                                                                    </tr> -->
                                                                        <!-- <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >MONTANT HT:</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant_ht" value="<?php //echo $montant_ht
                                                                        ?>" disabled>
                                                                            </button> 
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >IRM:</span>
                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="irm" value="<?php //echo $irm
                                                                        ?>" disabled>
                                                                            </button> 
                                                                            </div>
                                                                        </td>
                                                                    </tr> -->
                                                                        <!--  <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'OUVERTURE DES PRIX</span>
                                                                            <div class="col">
                                                                                <input  type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_open_prix" value="<?php// echo $date_open_prix
                                                                        ?>" disabled>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'APPROBATION:</span>
                                                                            <div class="col">
                                                                                <input  type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_approbation" value="<?php //echo $date_approbation
                                                                        ?>" disabled>
                                                                            </div>
                                                                        </td>
                                                                    </tr>  -->
                                                                        <!--  <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >GARANTIE BANCAIRE</span>
                                                                            <div class="col">
                                                                                <input   style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="garantie_bank" value="<?php //echo $garantie_bank
                                                                        ?>" disabled>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >TVA</span>
                                                                        <div class="col">
                                                                                <select name="tva" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="<?php //echo $tva
                                                                        ?>" selected="" disabled><?php //echo $tva
                                                                        ?>%</option>
                                                                                   
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>  -->
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">MAÎTRE D'OEUVRE:</span>

                                                                                <div class="col">
                                                                                    <select name="moe" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $moe ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$moe'";

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
                                                                                <span class="help-block small-font">CHEF DE SERVICE DU MARCHÉ:</span>

                                                                                <div class="col">
                                                                                    <select name="chef" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $chef ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$chef'";

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
                                                                                <span class="help-block small-font">MAÎTRE D'OUVRAGE:</span>

                                                                                <div class="col">
                                                                                    <select name="moa" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $moa ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$moa'";

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
                                                                                <span class="help-block small-font">INGENIEUR DU MARCHÉ:</span>

                                                                                <div class="col">
                                                                                    <select name="ingenieur" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $ingenieur ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$ingenieur'";

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


                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">DELAI D'EXECUTION</span>
                                                                                <div class="col">

                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="day_marche"
                                                                                           placeholder="jour(s)"
                                                                                           value="<?php echo $day_marche ?>"
                                                                                           disabled><label>jour(s)</label>

                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="month_marche"
                                                                                           placeholder="mois"
                                                                                           value="<?php echo $month_marche ?>"
                                                                                           disabled> <label>mois</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">COÛT:</span>
                                                                                <div class="col">
                                                                                    <?php
                                                                                    echo ' <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="montant_ttc" value="' . number_format($montant_ttc) . ' "  disabled>';
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">REMARQUE:</span>
                                                                                <div class="col">
                                                                                    <!-- <textarea name="remarque" class="form-control"  style="width: 100%" required></textarea> -->
                                                                                    <input type="text" name="remarque"
                                                                                           style="width: 100%"
                                                                                           value="<?php echo $remarque ?>"
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
                                                        <b>L'ensemble des chantiers.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="<?= $chantier['option1_link'] ?>?id=<?= $id_marche ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Ajouter un chantier
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
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            TTC</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Chef
                                                                                            Chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Pointeur</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Durée du
                                                                                            chantier</p></th>
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

                                                                                $query = "SELECT * from chantier where open_close!='1' and ref_marche=\"$ref_marche\" ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_chantier = $row['id_chantier'];
                                                                                    $ref_marche = $row['ref_marche'];
                                                                                    $id_chantier = $row['id_chantier'];
                                                                                    $montant = $row['montant_ttc_marche'];
                                                                                    $id_personnel = $row['id_personnel'];
                                                                                    $id_pers_pointeur = $row['id_pers_pointeur'];
                                                                                    $dure_chantier = $row['dure_chantier'];
                                                                                    $nom_chantier = $row['nom_chantier'];
                                                                                    $etat = $row['etat'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php echo $id_chantier; ?>"/>

                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from marche where ref_marche = \"$ref_marche\" ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['ref_marche'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>

                                                                                        <td align="center"><?= $nom_chantier ?>
                                                                                        </td>
                                                                                        <td align="center"> <?php echo $montant; ?>   </td>
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
                                                                                            $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_pointeur'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom'] . ' ' . $table['prenom'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>
                                                                                        <td align="center"> <?php echo $dure_chantier; ?>   </td>
                                                                                        <?php
                                                                                        if ($etat == 1) {

                                                                                            echo '<td align="center">
        <a href="modifier_chantier.php?id=' . $id_chantier . '" style=" width:100px;" class="btn btn-secondary" >Achevé</a>
                                                        </td>';
                                                                                        } else {

                                                                                            echo '<td align="center">
        <a href="modifier_chantier.php?id=' . $id_chantier . '" style=" width:100px;" class="btn btn-primary" >En cours</a>
                                                        </td>';

                                                                                        }


                                                                                        ?>

                                                                                        <td align="center"
                                                                                            style="width: 18%"><a
                                                                                                    class="btn btn-primary"
                                                                                                    href="details_chantier.php?id=<?php echo $id_chantier; ?>&idm=<?= $id_marche ?>"
                                                                                                    title="view"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: green"
                                                                                                   class="fas fa-eye"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-warning"
                                                                                               href="modifier_chantier.php?id=<?= $id_chantier; ?>"
                                                                                               title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: orange"
                                                                                                   class="fas fa-pen"></i>
                                                                                            </a>


                                                                                            <a class="btn btn-danger"
                                                                                               type="button"
                                                                                               data-toggle="modal"
                                                                                               data-target="#verifier_delete_chantier<?= $id_chantier; ?>"
                                                                                               title="supprimer"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a>


                                                                                            <?php
                                                                                            include("verifier_delete_chantier.php");
                                                                                            ?>


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réferences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            TTC</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Chef
                                                                                            Chantier</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Pointeur</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Durée du
                                                                                            chantier</p></th>
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************INFO PAIE************************************************* -->
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
                                                        <b>L'ensemble des parties prenantes.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_partennaire.php?id=<?= $id_marche ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Ajouter Sous-traitant(s)
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
                                                                                            sous-traitant</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Rôles</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from partenaire where id_marche='$id_marche'";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_part = $row['id_part'];
                                                                                    $id_partie = $row['id_partie'];
                                                                                    $role = $row['role'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $id;
                                                                                               ?>"/>

                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from partie_prennante where  id_partie = '$id_partie'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>

                                                                                        <td align="center"> <?php echo $role; ?>  </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%"><a
                                                                                                    class="btn btn-primary"
                                                                                                    href="details_partie.php?id=<?php echo $id_partie; ?>"
                                                                                                    title="view"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: green"
                                                                                                   class="fas fa-eye"></i>
                                                                                            </a>


                                                                                            <!--                          <a class="btn btn-warning" href="modifier_partie.php?id=<?= $id_partie; ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>  -->


                                                                                            <a class="btn btn-danger"
                                                                                               href="delete_partie.php?id=<?= $id_part ?>&id_m=<?= $id_marche ?>"
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
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center"
                                                                                           style="color: white">Nom du
                                                                                            sous-traitant</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Rôles</p></th>
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
                                                        <b>Liste des documents .</b>

                                                        <!-- Nav pills -->

                                                        <b>


                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-toggle="modal"
                                                                       data-target="#ajouter_pj" href="#">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Nouveau document

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

                                                                                $query = "SELECT * from pj_marche where id_marche='" . $id_marche . "' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id = $row['id_pj_marche'];
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
                                                                                                   href="delete_pj_marche.php?id=<?= $id ?>&id_marche=<?= $id_marche ?>"
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
                                    <!--********************************************PHASE D'EXECUTION************************************************ -->

                                    <div class="tab-pane container" id="menu4">
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
                                                                       href="nouvelle_phase_execution.php?id=<?php echo $id_marche ?>">
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
                                                                                            Libelle</p></th>
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
                                                                                <?php

                                                                                $query = "SELECT * from phase_execution where id_marche='" . $id_marche . "'  ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_phase_exe = $row['id_phase_exe'];
                                                                                    $libelle = $row['libelle'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $month_delai = $row['month_delai'];
                                                                                    $day_delai = $row['day_delai'];
                                                                                    $id_marche = $row['id_marche'];

                                                                                    ?>
                                                                                    <tr>

                                                                                        <td align="center"><?php echo $libelle; ?>  </td>
                                                                                        <td align="center"><?php echo $date_begin; ?>  </td>
                                                                                        <td align="center"><?php echo $day_delai . 'Jour(s) et' . $month_delai . 'moi(s)'; ?>  </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%">

                                                                                            <!-- <a class="btn btn-warning" href="modifier_partie_prenante.php?id=<? //=$id_phase_exe;
                                                                                            ?>" title="Modifier"
                                                                        style="background-color: transparent">
                                                                            <i style="color: orange" class="fas fa-pen"></i> 
                                                                        </a>  -->


                                                                                            <a class="btn btn-danger"
                                                                                               type="button"
                                                                                               data-toggle="modal"
                                                                                               data-target="#verifier_delete_phase_execution<?= $id_phase_exe; ?>"
                                                                                               title="supprimer"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a>


                                                                                            <?php
                                                                                            include("verifier_delete_phase_execution.php");
                                                                                            ?>


                                                                                        </td>
                                                                                    </tr>


                                                                                <?php } ?>
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Libelle</p></th>
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


                                    <!--********************************************MES CONGES 2222222************************************************* -->
                                    <!--ETAT ACADEMIQUE -->
                                    <div class="tab-pane container" id="menu5">
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
                                                        <b>L'ensemble des pièces jointes.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="nouvelle_reception.php?id=<?= $id_marche ?>">
                                                                        <i class="fas fa-cubes"></i>
                                                                        Nouvelle Reception
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </b>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="well bs-component">

                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" id="dataTable"
                                                                           width="100%" cellspacing="0">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center" style="color: white">
                                                                                    Type de Reception </p></th>
                                                                            <th><p align="center" style="color: white">
                                                                                    Date </p></th>
                                                                            <th><p align="center" style="color: white">
                                                                                    Pièces jointe(s)</p></th>
                                                                            <th><p align="center" style="color: white">
                                                                                    Options</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php

                                                                        $query = "SELECT * from reception_marche where id_marche='" . $id_marche . "'  ";
                                                                        $q = $db->query($query);
                                                                        while ($row = $q->fetch()) {
                                                                            $id_rec_marche = $row['id_rec_marche'];
                                                                            $id_rec = $row['id_rec'];
                                                                            $date_begin = $row['date_begin'];
                                                                            $nom_rec = $row['nom_rec'];
                                                                            $id_marche = $row['id_marche'];

                                                                            ?>
                                                                            <tr>

                                                                                <td align="center"><?php echo $nom_rec; ?>   </td>
                                                                                <td align="center"
                                                                                    style="width: 25%"><?php echo date("d-m-Y", strtotime($date_begin)); ?>   </td>

                                                                                <td align="center">
                                                                                    <a class="btn btn-primary"
                                                                                       href="liste_pj_reception.php?id=<?= $id_rec_marche ?>"
                                                                                       title="view"
                                                                                       style="background-color: transparent">
                                                                                        <i style="color: green"
                                                                                           class="fas fa-eye"></i>
                                                                                    </a>
                                                                                </td>


                                                                                <td align="center" style="width: 18%">

                                                                                    <div class="btn-group mr-2"
                                                                                         role="group"
                                                                                         aria-label="First group">
                                                                                        <a class="btn btn-warning"
                                                                                           href="modifier_recption.php?id=<?= $id_rec_marche ?>"
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
                                                                                           href="delete_recption.php??id=<?= $id_rec_marche ?>"
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
                                                                            <th><p align="center" style="color: white">
                                                                                    Type de Reception </p></th>
                                                                            <th><p align="center" style="color: white">
                                                                                    Date </p></th>
                                                                            <th><p align="center" style="color: white">
                                                                                    Pièces jointe(s)</p></th>
                                                                            <th><p align="center" style="color: white">
                                                                                    Options</p></th>
                                                                        </tr>
                                                                        </tr>
                                                                        </tfoot>
                                                                        <tbody></tbody>
                                                                    </table>


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
                                                                       href="nouvelle_gestion_paiement.php?id=<?php echo $id_marche ?>">
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
                                                                        <form method="post" action="">
                                                                            <table class="table table-bordered"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Numéro
                                                                                            en décompte </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            paiement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            Recue</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            Restant</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from gestion_paie where id_marche='" . $id_marche . "'  ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_ges_paie = $row['id_ges_paie'];
                                                                                    $numero_attache = $row['numero_attache'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $montant_paie_ht = $row['montant_paie_ht'];
                                                                                    $montant_paie_ttc = $row['montant_paie_ttc'];
                                                                                    $id_marche = $row['id_marche'];

                                                                                    ?>
                                                                                    <tr>

                                                                                        <td align="center"><?php echo $numero_attache; ?>  </td>
                                                                                        <td align="center"><?php echo $date_begin; ?>  </td>
                                                                                        <td align="center"><?php echo number_format($montant_paie_ht) ?>  </td>
                                                                                        <td align="center"><?php echo number_format($montant_paie_ttc) ?>  </td>

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
                                                                                               type="button"
                                                                                               data-toggle="modal"
                                                                                               data-target="#verifier_delete_gestion_paiement<?= $id_ges_paie; ?>"
                                                                                               title="supprimer"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: red"
                                                                                                   class="fas fa-trash"></i>
                                                                                            </a>


                                                                                            <?php
                                                                                            include("verifier_delete_gestion_paiement.php");
                                                                                            ?>


                                                                                        </td>
                                                                                    </tr>


                                                                                <?php } ?>
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Numéro
                                                                                            en décompte </p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            paiement</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            Recue</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Montant
                                                                                            Restant</p></th>
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


                                    <!--****************************************** GESTION DE   MAINTENANCE.************************************************ -->


                                    <div class="tab-pane container" id="menu7">
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
                                                                       href="nouvelle_maintenance.php?id=<?php echo $id_marche ?>">
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

                                                                                $query = "SELECT * from maintenance_marche where id_marche='" . $id_marche . "'  ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_maint_marche = $row['id_maint_marche'];
                                                                                    $intitule = $row['intitule'];
                                                                                    $date_begin = $row['date_begin'];
                                                                                    $id_marche = $row['id_marche'];

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
                                                                                               href="delete_maintenance.php?id=<?= $id_maint_marche; ?>&id_marche=<?= $id_marche ?>"
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


    include("ajouter_pj_doc_marche.php");


    ?>
    <?php
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>