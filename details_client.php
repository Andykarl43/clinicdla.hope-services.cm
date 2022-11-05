<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_client = $_REQUEST['id'];

$query = "SELECT * from client where id_client='" . $id_client . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_client = $row['id_client'];

    /*-------------------- DETAILS FOURNISSEURS  --------------------*/
    $ref_client = $row['ref_client'];
    $raison_social_client = $row['raison_social_client'];
    $id_type_client = $row['id_type_client'];
    $ville_client = $row['ville_client'];
    $tel_client = $row['tel_client'];
    $email_client = $row['email_client'];
    $pers_contact_client = $row['pers_contact_client'];
    $tel_contact_client = $row['tel_contact_client'];


    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du clients : <?= $raison_social_client ?> </h1>
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
                                            <a class="nav-link active" href="<?= $client['option2_link'] ?>">
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

                                                $query = "SELECT DISTINCT count(id_regle_client) as total from regle_client where open_close!='1' and id_client='$id_client' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Facture de location[' . $row['total'] . ']';
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
                                                                                           name="ref_client"
                                                                                           value="<?php echo $ref_client ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">RAISON SOCIALE:</span>

                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="raison_social_client"
                                                                                           value="<?php echo $raison_social_client ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <!--                                                                         <td>
                                                                            <span class="help-block small-font" >PAYS:</span>
                                                                            <div class="col">
                                                                                <select name="pays_client" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                    <option value="<?= $pays_client ?>" selected=""><?= $pays_client ?></option>
                                                                             </select>
                                                                            </div>
                                                                        </td> -->
                                                                            <td>
                                                                                <span class="help-block small-font">VILLE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="ville_client"
                                                                                           value="<?php echo $ville_client ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">TEL:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="tel_client"
                                                                                           value="<?php echo $tel_client ?>"
                                                                                           disabled>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">EMAIL:</span>
                                                                                <div class="col">
                                                                                    <input type="email" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="email_client"
                                                                                           value="<?php echo $email_client ?>"
                                                                                           disabled>
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
                                                                                           name="pers_contact_client"
                                                                                           value="<?php echo $pers_contact_client ?>"
                                                                                           disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">TEL DE LA PERSONNE:</span>
                                                                                <div class="col">

                                                                                    <input style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="tel_contact_client"
                                                                                           value="<?php echo $tel_contact_client ?>"
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
                                                        <b>L'ensemble des états de paiements.</b>
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
                                                                                            Fournisseurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Mode</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            L'avance</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Le
                                                                                            solde</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">le
                                                                                            reste</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            transition</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p></th>

                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <!-- <?php

                                                                                // $query = "SELECT * from reglement_fournisseur";
                                                                                // $q = $db->query($query);
                                                                                // while($row = $q->fetch())
                                                                                // {
                                                                                //     $id = $row['id_regle_fournisseur'];
                                                                                //     $id_client = $row['id_client'];
                                                                                //     $id_chantier = $row['id_chantier'];
                                                                                //     $montant = $row['montant'];
                                                                                //     $mode_paie = $row['mode_paie'];
                                                                                //     $id_card_bank = $row['id_card_bank'];
                                                                                //     // $quartier = $row['quartier'];
                                                                                //     $date_transaction = $row['date_transaction'];
                                                                                //     $date_echeance = $row['date_echeance'];


                                                                                ?> -->

                                                                                <tr>
                                                                                    <input name="id" type="hidden"
                                                                                           value="<?php //echo $row['id'];
                                                                                           ?>"/>

                                                                                    <td align="center">
                                                                                        <!--                                                         <?php
                                                                                        // $sql = "SELECT DISTINCT * from fournisseur where id_client = '$id_client'";

                                                                                        //        $stmt = $db->prepare($sql);
                                                                                        //        $stmt->execute();

                                                                                        //        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                        //        foreach($tables as $table)
                                                                                        //        {
                                                                                        //            echo $table['nom'];
                                                                                        //        }

                                                                                        ?> -->
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <!--                                                         <?php
                                                                                        // $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                        //         $stmt = $db->prepare($sql);
                                                                                        //         $stmt->execute();

                                                                                        //         $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                        //         foreach($tables as $table)
                                                                                        //         {
                                                                                        //             echo $table['nom'];
                                                                                        //         }

                                                                                        ?> -->
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <!-- <?php //echo $montant;
                                                                                        ?> --> </td>
                                                                                    <td align="center">
                                                                                        <!-- <?php //echo $mode_paie;
                                                                                        ?> -->  </td>
                                                                                    <td align="center">
                                                                                        <!-- <?php //echo $date_transaction;
                                                                                        ?> --> </td>
                                                                                    <td align="center">
                                                                                        <!-- <?php //echo $date_echeance;
                                                                                        ?> -->  </td>

                                                                                    <td align="center"
                                                                                        style="width: 18%">
                                                                                        <!-- <a class="btn btn-primary"  href="details_regle_fournissseur.php?id=<?php //echo $id;
                                                                                        ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i>  -->
                                                                                        </a>


                                                                                        <a class="btn btn-warning"
                                                                                           href="modifier_regle_fournisseur.php?id=<?//=$id;
                                                                                           ?>" title="Modifier"
                                                                                           style="background-color: transparent">
                                                                                            Traiter
                                                                                            <!--   <i style="color: orange" class="fas fa-pen"></i>  -->
                                                                                        </a>


                                                                                        <!--  <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_regle_fournisseur<?//= $id;
                                                                                        ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  
                    -->


                                                                                        <!--  <?php
                                                                                        //include("verifier_delete_salle.php");
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
                                                                                            Fournisseurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Mode</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            L'avance</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Le
                                                                                            solde</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">le
                                                                                            reste</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            transition</p></th>
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
                                                                                            Clients</p></th>
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

                                                                                $query = "SELECT * from regle_client where open_close!='1' and id_client='$id_client' ";
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
                                                                                            Clients</p></th>
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