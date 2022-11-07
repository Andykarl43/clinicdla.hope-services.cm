<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des Consultations en cours...</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
                <!--                Main Body              -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Code Patient</th>
                                    <th>Patient</th>
                                    <th>Infirmière(ier)</th>
                                    <th>Age</th>
                                    <th>Médecin</th>
                                    <th>Departement</th>
                                    <th>Date de consultation</th>
                                    <th>Prix</th>
                                    <th>Reste à payer</th>
                                    <th>Payer</th>
                                    <th>Remise</th>
                                    <th>Statuts</th>
                                    <th>PDF</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = "SELECT * from regler_consul";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_reg_consul = $row['id_reg_consul'];
                                    $id_con = $row['id_con'];
                                    $id_patient = $row['id_patient'];
                                    $payer_reg= $row['payer'];
                                    $somme_reg= $row['somme'];
                                    $remise= $row['remise'];

//                                    $sql = "SELECT DISTINCT * from regler_consultation  where id_con = '$id_con'";
//
//                                    $stmt = $db->prepare($sql);
//                                    $stmt->execute();
//
//                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//                                    foreach ($tables as $table) {
//                                        $id_reg_con= $table['id_reg_con'];
//                                        $payer= $table['payer'];
//                                        $somme= $table['somme'];
//                                        $reste= $somme-$payer;
//                                    }

                                    $sql = "SELECT DISTINCT * from consultation where id_con = '$id_con'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $id_con = $table['id_con'];
                                        $ref_con = $table['ref_con'];
                                        $id_patient = $table['id_patient'];
                                        $id_depart = $table['id_depart'];
                                        $id_medecin = $table['id_medecin'];
                                        $id_nurse = $table['id_nurse'];
                                        $date_con = $table['date_con'];
                                        $temp = $table['temp'];
                                        $taille = $table['taille'];
                                        $pression = $table['pression'];
                                        $poids = $table['poids'];
                                    }

                                $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    //$nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
                                    $nom_patient= $table['ref_patient'];
                                    $age= $table['age_p'];
                                }

                                $sql = "SELECT DISTINCT * from nurse where id_nurse = '$id_nurse'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $nom_nurse= $table['nom_n'] . ' ' . $table['prenom_n'];
                                }

                                $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];
                                }

                                $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    $departement= $table['nom'] ;
                                }
                                if(empty($id_medecin)){
                                    $nom_medecin='N/A';
                                }
                                if(empty($id_nurse)){
                                    $nom_nurse='N/A';
                                }
                                if(empty($id_depart)){
                                    $departement='N/A';
                                }

                                ?>

                                <tr>
                                    <td><?=$ref_con?></td>
                                    <td><img width="28" height="28" src="assetss/img/user.jpg"
                                             class="rounded-circle m-r-5"
                                             alt=""> <?=$nom_patient?>
                                    </td>
                                    <td><?=$nom_nurse?></td>
                                    <td><?=$age?></td>
                                    <td><?=$nom_medecin?></td>
                                    <td><?=$departement?></td>
                                    <td><?= dateToFrench($date_con, " j F Y")?></td>
                                    <td><a href="#"><?=number_format($somme_reg);?></a></td>
                                    <td><a href="#"><?=number_format($somme_reg-$payer_reg-$remise);?></a></td>
                                    <td><a href="#"><?=number_format($payer_reg);?></a></td>
                                    <td><a href="#"><?=number_format($remise);?></a></td>
                                    <td>
                                        <?php
                                        if($lvl == 11){

                                                if($somme_reg-($payer_reg+$remise)==0)
                                                    echo'<span class="custom-badge status-green" >Ok</span>';
                                                else
                                                    echo'<span class="custom-badge status-red" >Pas à Jour</span>';

                                        }else{
                                            if($somme_reg-($payer_reg+$remise)==0)
                                                echo'<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon'.$id_reg_consul.'">Ok</span>';
                                            else
                                                echo'<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon'.$id_reg_consul.'">Pas à Jour</span>';
                                        }
                                        ?>

                                    </td>

                                    <td align="center"><a href="facture_consultation.php?id_reg_consul=<?=$id_reg_consul?>&id_perso=<?=$id_perso_session?>" target="_blank">
                                            <i class='fa fa-print'"></i>
                                        </a></td>
                                    <td class="text-right">
                                        <div class="modal fade" id="ajouterCon<?=$id_reg_consul?>" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header" style="padding:20px 50px;">
                                                        <h3 align="center"><i class="fas fa-map"></i> <b>Reglement: <?=$ref_con?></b></h3>
                                                        <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                                                    </div>
                                                    <div class="modal-body" style="padding:40px 50px;">
                                                        <form class="form-horizontal" action="update_con_paye.php" name="form" method="post">
                                                            <div class="form-group">
                                                                <label>Montant Recue</label>
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" name="id_reg_consul" value="<?=$id_reg_consul?>" class="form-control" >
                                                                    <input type="hidden" name="id_perso_session" value="<?=$id_perso_session?>" class="form-control" >
                                                                    <input type="hidden" name="id_con" value="<?=$id_con?>" class="form-control" >
                                                                    <input type="number" name="payer" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Montant total</label>
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" name="somme" class="form-control"  value="<?=$somme_reg?>">
                                                                    <input type="text"  class="form-control"  value="<?=number_format($somme_reg)?>"disabled=""/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Reste à payer</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text"  class="form-control"  value="<?=number_format($somme_reg-$payer_reg-$remise)?>"disabled=""/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Payer</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text"  class="form-control"  value="<?=number_format($payer_reg)?>"disabled=""/>
                                                                </div>
                                                            </div>
                                                             <?php
                                                            if( $lvl == 4 || $lvl == 7 || $lvl == 11 ){
                                                            ?>
                                                            <div class="form-group">
                                                                <label>Remise</label>
                                                                <div class="col-sm-12">
                                                                    <input type="number"  class="form-control" name="remise" value="0"/>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            }else{
                                                            ?>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="hidden"  class="form-control" name="remise" value="0"/>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                            <?php
                                                            if( $lvl == 4 || $lvl == 7 || $lvl == 11 || $lvl == 2 || $lvl == 12){
                                                            ?>
                                                            <div class="form-group">
                                                               <label>Mode de paie : <span
                                                                            class="text-danger">*</span></label>
                                                                <div class="col-sm-12">
                                                                    <select class="form-control"
                                                                            name="paie">
                                                                        <option value="0" selected="">
                                                                            ...
                                                                        </option>
                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM mode_paie where open_close!=1 ");

                                                                        while ($data = $iResult->fetch()) {

                                                                            $i = $data['id_mode_paie'];
                                                                            echo '<option value ="' . $i . '">';
                                                                            echo $data['nom'];
                                                                            echo '</option>';

                                                                        }

                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if( $lvl == 4 || $lvl == 7 || $lvl == 11 ){
                                                            ?>
                                                            <div class="form-group">
                                                                <label>Caisse <span
                                                                            class="text-danger">*</span></label>
                                                                <div class="col-sm-12">
                                                                    <select class="form-control"
                                                                            name="id_caisse">
                                                                        <option value="0" selected="">
                                                                            ...
                                                                        </option>
                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM caisse where open_close!=1 ");

                                                                        while ($data = $iResult->fetch()) {

                                                                            $i = $data['id_caisse'];
                                                                            echo '<option value ="' . $i . '">';
                                                                            echo $data['caisse'];
                                                                            echo '</option>';

                                                                        }

                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <center>
                                                                        <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                                                               value="Payer">

                                                                        <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                                                               class="btn btn-danger" value="Annuler"/></center>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--                End Body              -->

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>

        <!--    Modal pour ajouter Categorie Contrat-->
    <div class="modal fade" id="ajouterOper" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><i class="fas fa-map"></i> <b>Reglement</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="save_pays.php" name="form" method="post">
                        <div class="form-group">
                            <label>Montant Recue</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Montant total</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control" value="500,000" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center>
                                    <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                           value="Créer">

                                    <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                                                    class="btn btn-danger" value="Annuler"/></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
if (isset($_GET['witness'])) {
    $witness = $_GET['witness'];

    switch ($witness) {
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Versement Incorrecte',
                    text: 'Une erreur s\'est produite!',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Votre solde est à 200 000 ',
                    text: 'Transférer votre solde à la caisse principale!',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>