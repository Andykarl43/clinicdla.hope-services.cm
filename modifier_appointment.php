<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

<?php
$id_app = $_REQUEST['id'];

$query = "SELECT * from appointment where id_app='" . $id_app . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_app= $row['id_app'];
    $ref_app = $row['ref_app'];
    $id_patient= $row['id_patient'];
    $id_depart= $row['id_depart'];
    $id_medecin= $row['id_medecin'];
    $date_app= $row['date_app'];
    $time_app= $row['time_app'];
    $patient_email= $row['patient_email'];
    $patient_phone= $row['patient_phone'];
    $message = $row['message'];
    $statut_app = $row['statut_app'];
    $date_apt = $row['date_apt'];
    $time_apt = $row['time_apt'];
    if($statut_app=="1"){
        $choix_act="checked";
        $choix_des="";
    }else{
        $choix_act="";
        $choix_des="checked";
    }

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier Appointment: <?=$ref_app?></h1>
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
                                    <ul class="nav nav-pills">

                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Etat Civile-->


                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <form action="update_appointment.php" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Code (APT-AAAA-MM-JJ-ID)</label>
                                                            <input type="hidden" class="form-control" name="id_app" value="<?=$id_app?>">

                                                            <?php
                                                            echo '<input class="form-control" name="ref_app" type="hidden" value="'.$ref_app.'">';
                                                            echo '<input class="form-control"  class="form-control form-control-lg" value="'.$ref_app.'" disabled >';
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Patient</label>
                                                            <select class="form-control" name="id_patient">
                                                                <option value="0" >....</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM patient where id_patient='$id_patient'");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_patient'];
                                                                    echo '<option value ="' . $i . '"selected="">';
                                                                    //echo $data['nom_p'].' '.$data['prenom_p'];
                                                                    echo $data['ref_patient'];
                                                                    echo '</option>';

                                                                }

                                                                $iResult = $db->query("SELECT * FROM patient");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_patient'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    echo $data['nom_p'].' '.$data['prenom_p'];
                                                                    echo '</option>';

                                                                }
                                                                ?>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Departement</label>
                                                            <select class="form-control" name="id_depart">
                                                                <option value="0" >....</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM departement where  id_depart='$id_depart'");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_depart'];
                                                                    echo '<option value ="' . $i . '"selected>';
                                                                    echo $data['nom'];
                                                                    echo '</option>';

                                                                }


                                                                $iResult = $db->query("SELECT * FROM departement");

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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Médecin</label>
                                                            <select class="form-control" name="id_medecin">
                                                                <option value="0" >....</option>
                                                                <?php
                                                                $iResult = $db->query("SELECT * FROM  medecin where id_medecin='$id_medecin'");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_medecin'];
                                                                    echo '<option value ="' . $i . '" selected="">';
                                                                    echo $data['nom_m'].' '.$data['prenom_m'];
                                                                    echo '</option>';


                                                                }
                                                                $iResult = $db->query("SELECT * FROM  medecin");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_medecin'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    echo $data['nom_m'].' '.$data['prenom_m'];
                                                                    echo '</option>';

                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_app" value="<?=$date_app?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Time</label>
                                                            <div>
                                                                <input type="time" class="form-control" name="time_app" value="<?=$time_app?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Patient Email</label>
                                                            <input class="form-control" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Patient Phone Number</label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea cols="30" rows="4" class="form-control" name="sms_app"><?=$message?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="display-block">Status</label>
                                                    <div class="form-check form-check-inline">
                                                        <?php
                                                        echo'<input class="form-check-input" type="radio" name="statut_app"
                                                               id="doctor_active" value="1" '.$choix_act.' >';
                                                               ?>
                                                        <label class="form-check-label" for="doctor_active">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <?php
                                                        echo'<input class="form-check-input" type="radio" name="statut_app"
                                                               id="doctor_inactive" value="2" '.$choix_des.' >'
                                                               ?>
                                                        <label class="form-check-label" for="doctor_inactive">
                                                            Inactive
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$appointment['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


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


    <!--    Modal pour ajouter Categorie Contrat-->

    <?php
}
    ?>
    <!--//Footer-->
<?php
include('foot.php');
?>