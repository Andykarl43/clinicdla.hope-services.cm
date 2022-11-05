<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_partie = $_REQUEST['id'];

$query = "SELECT * from partie_prennante where id_partie='" . $id_partie . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_partie = $row['id_partie'];

    /*-------------------- DETAILS FOURNISSEURS  --------------------*/
    $ref_partie = $row['ref_partie'];
    $raison_social = $row['raison_social'];
    $ville = $row['ville'];
    $tel = $row['tel'];
    $email = $row['email'];
    $pers_contact = $row['pers_contact'];
    $tel_contact = $row['tel_contact'];


    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails de la partie prenante : <?= $raison_social ?> </h1>
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
                                            <a class="nav-link active" href="<?= $partie['option2_link'] ?>">
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
                                        <!--                                     <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill" href="#menu1">
                                                                                    <i class="fas fa-users"></i>
                                                                                     Etat de paiements[]                                        </a>
                                                                            </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_regle_partie) as total from regle_partie where open_close!='1' and id_partie='$id_partie' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Etats paiements[' . $row['total'] . ']';
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
                                                                                <span class="help-block small-font">RÉFERENCE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ref_partie"
                                                                                           value="<?= $ref_partie ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">RAISON SOCIALE:</span>

                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="raison_social"
                                                                                           value="<?= $raison_social ?>"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">TEL:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel"
                                                                                           value="<?= $tel ?>" required>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">EMAIL:</span>
                                                                                <div class="col">
                                                                                    <input type="email" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="email"
                                                                                           value="<?= $email ?>">
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">PERSONNE À CONTACTER:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="pers_contact"
                                                                                           value="<?= $pers_contact ?>">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">TEL DE LA PERSONNE:</span>
                                                                                <div class="col">

                                                                                    <input style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="tel_contact"
                                                                                           value="<?= $tel_contact ?>">
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">VILLE:</span>
                                                                                <div class="col">
                                                                                    <select name="ville" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?= $ville ?>"
                                                                                                selected=""><?= $ville ?></option>
                                                                                        <?php

                                                                                        $iResult = $db->query('SELECT * FROM ville');

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
                                                        <b>L'ensemble des factures de locations.</b>
                                                        <!--                                                             <b>
                                
                                
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= $client['option1_link'] ?>?id=<?php // echo $id
                                                        ?>">
                                            <i class="fas fa-plus"></i>
                                            Nouvelle facture
                                        </a>
                                    </li>                                    
                                </ul>
                            </b> -->
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
                                                                                            Sous-traitants</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réfrences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Avances</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Soldes</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Restes</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            transaction</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>

                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $query = "SELECT * from regle_client where open_close!='1' and id_partie='$id_partie' ";
                                                                                $q = $db->query($query);
                                                                                while ($row = $q->fetch()) {
                                                                                    $id_regle_client = $row['id_regle_client'];
                                                                                    $id_client = $row['id_client'];
                                                                                    $id_choix = $row['id_choix'];
                                                                                    $type = $row['type'];
                                                                                    $montant = $row['montant'];
                                                                                    $id_mode_paiement = $row['id_mode_paiement'];
                                                                                    $id_card_bank = $row['id_card_bank'];
                                                                                    $avance = $row['avance'];
                                                                                    $date_transaction = $row['date_transaction'];
                                                                                    $reste = $row['reste'];


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden"
                                                                                               value="<?php //echo $row['id'];
                                                                                               ?>"/>

                                                                                        <td align="center">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from client where id_client = '$id_client'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['raison_social_client'];
                                                                                            }

                                                                                            ?>
                                                                                        </td>
                                                                                        <td align="center">
                                                                                            <?php
                                                                                            if ($type == 'A') {
                                                                                                $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_choix'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['objet'];
                                                                                                }

                                                                                            } elseif ($type == 'M') {
                                                                                                $sql = "SELECT DISTINCT * from marche where id_marche = '$id_choix'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['objet_marche'];
                                                                                                }


                                                                                            } else {
                                                                                                $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_choix'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom_chantier'];
                                                                                                }

                                                                                            }


                                                                                            ?>
                                                                                        </td>
                                                                                        <td align="center"> <?php echo number_format($avance); ?>  </td>
                                                                                        <td align="center"> <?php echo number_format($montant); ?>   </td>
                                                                                        <td align="center"> <?php echo number_format($reste); ?>  </td>
                                                                                        <td align="center"> <?php echo $date_transaction; ?>   </td>

                                                                                        <td align="center"
                                                                                            style="width: 18%"><a
                                                                                                    class="btn btn-primary"
                                                                                                    href="details_regle_client.php?id=<?php echo $id_regle_client; ?>"
                                                                                                    title="view"
                                                                                                    style="background-color: transparent">
                                                                                                <i style="color: green"
                                                                                                   class="fas fa-eye"></i>
                                                                                            </a>


                                                                                            <!-- <a class="btn btn-warning" href="modifier_regle_client.php?id=<?= $id_regle_client; ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>  -->


                                                                                            <!--                              <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_regle_client<?= $id_regle_client; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->


                                                                                            <!--   <?php
                                                                                            //include("verifier_delete_regle_client.php");
                                                                                            ?> -->


                                                                                        </td>


                                                                                    </tr>

                                                                                <?php } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Sous-traitants</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Réfrences</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Avances</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Soldes</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Restes</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            transaction</p></th>
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