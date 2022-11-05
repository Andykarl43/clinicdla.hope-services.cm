<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');


?>
<?php

$id_ope=$_REQUEST['id'];

$query = "SELECT * from operation where id_ope='$id_ope'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_ope = $row['id_ope'];
    $ref_ope = $row['ref_ope'];
    $id_patient = $row['id_patient'];
    $id_medecin = $row['id_medecin'];
    $id_inter = $row['id_inter'];
    $date_ope = $row['date_ope'];
    $resume = $row['resume'];
    $obs_ope = $row['obs_ope'];
    $id_type_ope = $row['id_type_ope'];
    $time_first = $row['time_first'];
    $time_last = $row['time_last'];
    $id_depart = $row['id_depart'];


    $sql = "SELECT DISTINCT * from regler_ope  where id_ope = '$id_ope'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $id_reg_ope= $table['id_reg_ope'];
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

    $sql = "SELECT DISTINCT * from type_ope where id_type_ope = '$id_type_ope'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $type_ope= $table['nom'];
        $prix_total = $table['prix_t_ope'];
    }

    $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $departement= $table['nom'];
    }

    $iResult = $db->query("SELECT * FROM chirugien where id_chirugien='$id_inter'");

    while ($data = $iResult->fetch()) {

        $nom_chirugien =$data['nom_c'] . ' ' . $data['prenom_c'];

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
    if(empty($id_inter)){
        $nom_chirugien='N/A';
    }


    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Fiche d'Opération</h1>
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
                                            <a class="nav-link active" href="<?= $operation['option2_link'] ?>">

                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-file-medical-alt"></i>
                                                Opération
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-file-medical"></i>
                                                Rapport de l'opération
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
                                                                                    <input type="hidden" name="id_ope" value="<?=$id_ope?>">
                                                                                    <label>Patient <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient" readonly="">
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
                                                                                    <select class="form-control" name="id_medecin" readonly="">
                                                                                        <option value="<?=$id_medecin?>" selected=""><?=$nom_medecin?></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Departement</label>
                                                                                    <select class="form-control" name="id_depart" readonly="">
                                                                                        <option value="<?=$id_depart?>" selected=""><?=$departement?></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Type d'opération <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_type_ope" readonly="">
                                                                                        <option value="<?=$id_type_ope?>" selected=""><?=$type_ope?></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date d'opération</label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control" name="date_ope" value="<?=$date_ope?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Fichiers<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="file" name="fichier[]"
                                                                                           style="width:100%"
                                                                                           class="form-control"
                                                                                           multiple="multiple" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Heure de début</label>
                                                                                    <div>
                                                                                        <input type="time" class="form-control" name="time_first" value="<?=$time_first?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Heure de fin</label>
                                                                                    <div>
                                                                                        <input type="time" class="form-control" name="time_last" value="<?=$time_last?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Résumé</label>
                                                                            <textarea class="form-control" rows="3"
                                                                                      cols="30" name="resume" readonly><?=$resume?></textarea>
                                                                        </div>
                                                                        <div class="m-t-20 text-center">
                                                                            <button class="btn btn-primary submit-btn">
                                                                                Enregistrer
                                                                            </button>
                                                                            <button class="btn btn-danger submit-btn">
                                                                                Annuler
                                                                            </button>
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
                                                                                    <input type="hidden" name="partie" value="2">
                                                                                    <input type="hidden" name="id_ope" value="<?=$id_ope?>" readonly>
                                                                                    <label>Patient <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient" readonly="">
                                                                                        <option value="<?=$id_patient?>" selected="">
                                                                                            <?=$nom_patient?>
                                                                                        </option>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>intervenant<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_inter">
                                                                                        <option value="<?=$id_inter?>" selected="" readonly="">
                                                                                            <?=$nom_chirugien?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Fichiers<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="file" name="fichier[]"
                                                                                           style="width:100%"
                                                                                           class="form-control" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Observation<span class="text-danger">*</span></label>
                                                                            <textarea class="form-control" rows="20"
                                                                                      cols="70" name="obs_ope" readonly><?=$obs_ope?></textarea>
                                                                        </div>


                                                                        <div class="m-t-20 text-center">

                                                                            <button class="btn btn-primary submit-btn">
                                                                                Enregistrer
                                                                            </button>
                                                                            <button class="btn btn-danger submit-btn">
                                                                                Annuler
                                                                            </button>

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
                                                                    <form action="save_regler_ope.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="id_ope" value="<?=$id_ope?>">
                                                                                    <input type="hidden" name="id_patient" value="<?=$id_patient?>">
                                                                                    <input type="hidden" name="id_reg_ope" value="<?=$id_reg_ope?>">
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
                                                                            <a href="liste_operation_checker.php" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>


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


    <!-- <?php
}
?> -->
    <!--//Footer-->
<?php
include('foot.php');
?>