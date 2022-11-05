<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php

// $total_apt = 0;
// $today = date("Y-m-d");
// $today = date("t", strtotime($today));

$year = (new DateTime())->format("Y");
$month = (new DateTime())->format("m");
$day = (new DateTime())->format("d");
$query  = "SELECT count(id_app) as total from appointment";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_apt = $row["total"];
}
$id_app = $total_apt + 1;
$ref_app = 'APT_'.$year.'_'.$month.'_'.$day.'_'.$id_app;
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Rendez-vous</h1>
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
                                            <form action="save_appointment.php" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Code (APT-AAAA-MM-JJ-ID)</label>
                                                            
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

                                                                <?php
                                                                if($lvl ==1 ){
                                                                     $iResult = $db->query("SELECT * FROM patient where id_patient='$id_perso_session'");

                                                                }else{
                                                                    echo'<option value="0" selected="">....</option>';
                                                                     $iResult = $db->query("SELECT * FROM patient");

                                                                }
                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_patient'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    //echo $data['nom_p'].' '.$data['prenom_p'];
                                                                    echo $data['ref_patient'];
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
                                                                <option value="0" selected="">....</option>
                                                                <?php

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
                                                    <?php
                                                    if($lvl != 1){?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Médecin</label>
                                                            <select class="form-control" name="id_medecin">

                                                                <?php
                                                                if($lvl == 5){
                                                                    $iResult = $db->query("SELECT * FROM  medecin where id_medecin='$id_perso_session'");
                                                                }else{
                                                                    echo'<option value="0" selected="">....</option>';
                                                                    $iResult = $db->query("SELECT * FROM  medecin");
                                                                }

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
                                                        <?php }else{?>
                                                        <input type="hidden" name="id_medecin" value="0">
                                                            <?php }?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_app">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Time</label>
                                                            <div>
                                                                <input type="time" class="form-control" name="time_app">
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
                                                    <label>raison du rendez-vous </label>
                                                    <textarea cols="30" rows="4" class="form-control" name="sms_app"></textarea>
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


    <!--//Footer-->
<?php
include('foot.php');
?>