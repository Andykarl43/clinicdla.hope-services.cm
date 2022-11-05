<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');


?>
<?php
$id_exa=$_REQUEST['id'];

$query = "SELECT * from examen where id_exa='$id_exa'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_exa = $row['id_exa'];
    $ref_exa = $row['ref_exa'];
    $id_patient = $row['id_patient'];
    $id_medecin = $row['id_medecin'];
    $date_exa = $row['date_exa'];
    $id_type_exa = $row['id_type_exa'];
    $obs = $row['obs'];
    $obs_exa = $row['obs_exa'];
    $id_lab = $row['id_lab'];

    $sql = "SELECT DISTINCT * from regler_examen  where id_exa = '$id_exa'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $id_reg_exa= $table['id_reg_exa'];
        $payer= $table['payer'];
        $somme= $table['somme'];
        $reste= $somme-$payer;
    }


    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
        $age= $table['age_p'];

    }



    $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];
    }

    $sql = "SELECT DISTINCT * from type_exa where id_type_exa = '$id_type_exa'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $type_exa= $table['nom'] ;
    }

    $iResult = $db->query("SELECT * FROM laboratin where id_laboratin='$id_lab'");

    while ($data = $iResult->fetch()) {

        $nom_lab =$data['nom_l'] . ' ' . $data['prenom_l'];

    }

    if(empty($id_medecin)){
        $nom_medecin='N/A';
    }
    if(empty($id_type_exa)){
        $type_exa='N/A';
    }
    if(empty($id_lab)){
        $nom_lab='N/A';
    }

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Fiche d'Examen</h1>
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
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $examen['option2_link'] ?>">

                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-file-medical-alt"></i>
                                                Examen
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-file-medical"></i>
                                                Résultat des Examens
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-file-medical"></i>
                                                Règlement
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

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">

                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <div class="col-lg-8 offset-lg-2">
                                                                    <form action="#" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="partie" value="1">
                                                                                    <input type="hidden" name="id_exa" value="<?=$id_exa?>">
                                                                                    <label>Patient <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient" readonly>
                                                                                        <option value="<?=$id_patient?>" selected="">
                                                                                            <?=$nom_patient?>
                                                                                        </option>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Médecin<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_medecin" readonly>
                                                                                        <option value="<?=$id_medecin?>" selected=""><?=$nom_medecin?></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group" >
                                                                                    <label>Type d'examen <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_type_exa" readonly>
                                                                                        <option value="<?=$id_type_exa?>" selected=""><?=$type_exa?></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date de l'examen</label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control " name="date_exa" value="<?=$date_exa?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>observation/commentaire</label>
                                                                            <textarea class="form-control" rows="3" name="obs"
                                                                                      cols="30" readonly><?=$obs?></textarea>
                                                                        </div>
                                                                        <div class="m-t-20 text-center">
                                                                            <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                                            <a href="<?=$examen['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>

                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--ETAT ACADEMIQUE -->
                                    <div class="tab-pane container" id="menu1">
                                        <!-- infos civile-->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">

                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <div class="col-lg-8 offset-lg-2">
                                                                    <form action="#" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Patient <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient" readonly>
                                                                                        <option value="<?=$id_patient?>" selected="">
                                                                                            <?=$nom_patient?>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Laboratein<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_laboratin" readonly>
                                                                                        <option value="<?=$id_lab?>" selected="">
                                                                                            <?=$nom_lab?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Fichier<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="file" name="fichier[]"
                                                                                           style="width:100%"
                                                                                           class="form-control" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>observation<span class="text-danger">*</span></label>
                                                                            <textarea class="form-control" rows="20"
                                                                                      cols="70" name="obs_exa" readonly><?=$obs_exa?></textarea>
                                                                        </div>


                                                                        <div class="m-t-20 text-center">
                                                                            <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                                            <a href="<?=$examen['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>


                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane container" id="menu2">
                                        <!-- infos civile-->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">

                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <div class="col-lg-8 offset-lg-2">
                                                                    <form action="save_regler_examen.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="id_exa" value="<?=$id_exa?>">
                                                                                    <input type="hidden" name="id_patient" value="<?=$id_patient?>">
                                                                                    <input type="hidden" name="id_reg_exa" value="<?=$id_reg_exa?>">
                                                                                    <label>Caisse <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_caisse" >
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM caisse  where open_close!='1' ");

                                                                                        while($data = $iResult->fetch()){

                                                                                            $i = $data['id_caisse'];
                                                                                            echo '<option value ="'.$i.'">';
                                                                                            echo $data['caisse'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Cassière<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_perso" >
                                                                                        <option value="0" selected="">
                                                                                        ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM personnel  where open_close!='1' ");

                                                                                        while($data = $iResult->fetch()){

                                                                                            $i = $data['id_personnel'];
                                                                                            echo '<option value ="'.$i.'">';
                                                                                            echo $data['nom'].' '.$data['prenom'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Versement</label>
                                                                                    <input class="form-control" type="number" name="payer" value="0">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Somme</label>
                                                                                    <div>
                                                                                        <input type="hidden"  name="somme"
                                                                                               value="<?=$somme?>" >
                                                                                        <input type="number" class="form-control" name="somme"
                                                                                               value="<?=$somme?>" disabled="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Reste à Payer</label>
                                                                                    <input class="form-control" type="number"  value="<?=$reste?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
<!--                                                                        <div class="form-group">-->
<!--                                                                            <label>observation<span class="text-danger">*</span></label>-->
<!--                                                                            <textarea class="form-control" rows="20"-->
<!--                                                                                      cols="70" name="obs_exa" readonly>--><?//=$obs_exa?><!--</textarea>-->
<!--                                                                        </div>-->


                                                                        <div class="m-t-20 text-center">
                                                                            <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                                            <a href="liste_examen_checker.php" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>


                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- information RH -->

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


    <!-- <?php }
?> -->
    <!--//Footer-->
<?php
include('foot.php');
?>