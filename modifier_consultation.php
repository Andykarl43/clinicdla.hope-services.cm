<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
?>
<?php

$id_con = $_REQUEST['id'];

$query = "SELECT * from consultation where id_con='$id_con'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_con = $row['id_con'];
    $ref_con = $row['ref_con'];
    $id_patient = $row['id_patient'];
    $id_depart = $row['id_depart'];
    $id_medecin = $row['id_medecin'];
    $id_nurse = $row['id_nurse'];
    $date_con = $row['date_con'];
    $temp = $row['temp'];
    $taille = $row['taille'];
    $pression = $row['pression'];
    $poids = $row['poids'];
    $obs = $row['obs'];
    $obs_medecin = $row['obs_medecin'];
    $id_type_consul = $row['id_type_consul'];


    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
    //    $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
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

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier la fiche de Consultation</h1>
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
                                            <a class="nav-link active" href="<?= $consultation['option2_link'] ?>">

                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-heartbeat"></i>
                                                Paramètres du Patient
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-stethoscope"></i>
                                                Rapport du Médecin
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
                                                                    <form action="update_consultation.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <input type="hidden" name="partie" value="1">
                                                                                <input type="hidden" name="id_con" value="<?=$id_con?>">
                                                                                <div class="form-group">
                                                                                    <label>Patient <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient">
                                                                                        <option value="<?=$id_patient?>" selected="">
                                                                                            <?=$nom_patient?>
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM patient where open_close!=1 ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_patient'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                         //   echo $data['nom_p'] . ' ' . $data['prenom_p'];
                                                                                            echo $data['ref_patient'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Infirmière<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_nurse">
                                                                                        <option value="<?=$id_nurse?>" selected=""><?=$nom_nurse?></option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM nurse ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_nurse'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom_n'] . ' ' . $data['prenom_n'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Taille <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control"
                                                                                               name="taille" value="<?=$taille?>"/>
                                                                                        <div class="input-group-prepend ">
                                                                                            <span class="input-group-text">cm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Poids <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control" name="poids" value="<?=$poids?>"
                                                                                               />
                                                                                        <div class="input-group-prepend ">
                                                                                            <span class="input-group-text">KG</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Température<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control" name="temp" value="<?=$temp?>"
                                                                                               />
                                                                                        <div class="input-group-prepend ">
                                                                                            <span class="input-group-text">°C</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Pression artérielle<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <!--   <input class="form-control" type="number">mmHg -->
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control" name="pression" value="<?=$pression?>"
                                                                                              />
                                                                                        <div class="input-group-prepend ">
                                                                                            <span class="input-group-text">mmHg</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Département</label>

                                                                                    <select class="form-control"  name="id_depart">
                                                                                        <option value="<?=$id_depart?>" selected=""><?=$departement?></option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM departement ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_depart'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        ?>
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Type Consultation</label>

                                                                                    <select class="form-control"  name="id_type_consul">
                                                                                        <option value="0" >-----</option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM type_consul where id_type_consul='$id_type_consul'");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_type_consul'];
                                                                                            echo '<option value ="' . $i . '" selected="">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        $iResult = $db->query("SELECT * FROM type_consul ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_type_consul'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        ?>
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date de consultation</label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control" name="date_con" value="<?=$date_con?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>observation/commentaire</label>
                                                                            <textarea class="form-control" rows="3"
                                                                                      cols="30" name="obs" ><?=$obs?></textarea>
                                                                        </div>

                                                                        <div class="m-t-20 text-center">
                                                                            <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                                            <a href="<?=$consultation['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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
                                                                    <form action="update_consultation.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <input type="hidden" name="partie" value="2">
                                                                                <input type="hidden" name="id_con" value="<?=$id_con?>">
                                                                                <div class="form-group">

                                                                                    <label>Patient <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient"
                                                                                            >
                                                                                        <option value="<?=$id_patient?>" selected="">
                                                                                            <?=$nom_patient?>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Médecin<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_medecin">
                                                                                        <option value="<?=$id_medecin?>" selected=""><?=$nom_medecin?></option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM medecin ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_medecin'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom_m'] . ' ' . $data['prenom_m'];
                                                                                            echo '</option>';

                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>observation<span class="text-danger">*</span></label>
                                                                            <textarea class="form-control" rows="20" name="obs_medecin"
                                                                                      cols="70"><?=$obs_medecin?></textarea>
                                                                        </div>


                                                                        <div class="m-t-20 text-center">
                                                                            <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                                            <a href="<?=$consultation['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>


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


    <!-- <?php } ?> -->
    <!--//Footer-->
<?php
include('foot.php');
?>