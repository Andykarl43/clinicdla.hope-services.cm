<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');


?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Fiche de Consultation</h1>
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
                                                                    <form action="save_consultation.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Patient <span
                                                                                                class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient">
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM patient where open_close!=1 ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_patient'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                          //  echo $data['nom_p'] . ' ' . $data['prenom_p'];
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

                                                                                        <?php
                                                                                        if($lvl == 3) {
                                                                                            $iResult = $db->query("SELECT * FROM nurse where id_nurse='$id_perso_session' ");
                                                                                        }else {
                                                                                            $iResult = $db->query("SELECT * FROM nurse ");
                                                                                            echo ' <option value="0" selected="">...</option>';
                                                                                        }

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
                                                                                    <label>Taille </label>
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control"
                                                                                               value="0" name="taille"/>
                                                                                        <div class="input-group-prepend ">
                                                                                            <span class="input-group-text">cm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Poids </label>
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control" name="poids" value="0"
                                                                                               />
                                                                                        <div class="input-group-prepend ">
                                                                                            <span class="input-group-text">KG</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Température</label>
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control" name="temp"
                                                                                               value="0"/>
                                                                                        <div class="input-group-prepend ">
                                                                                            <span class="input-group-text">°C</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Pression artérielle</label>
                                                                                    <!--   <input class="form-control" type="number">mmHg -->
                                                                                    <div class="form-group input-group">
                                                                                        <input type="number"
                                                                                               class="form-control" name="pression"
                                                                                               value="0"/>
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
                                                                                        <option value="0" selected="">-----</option>
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
                                                                                        <option value="0" selected="">-----</option>
                                                                                        <?php

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
                                                                            <!--<div class="col-sm-6">-->
                                                                            <!--    <div class="form-group">-->
                                                                            <!--        <label>Date de consultation</label>-->
                                                                            <!--        <div>-->
                                                                            <!--            <input type="date"-->
                                                                            <!--                   class="form-control" name="date_con">-->
                                                                            <!--        </div>-->
                                                                            <!--    </div>-->
                                                                            <!--</div>-->
<!--                                                                            <div class="col-sm-6">-->
<!--                                                                                <div class="form-group">-->
<!--                                                                                    <label>Remise(Fcfa)</label>-->
<!--                                                                                    <div>-->
<!--                                                                                        <input type="number"-->
<!--                                                                                               class="form-control" name="remise" value="0">-->
<!--                                                                                    </div>-->
<!--                                                                                </div>-->
<!--                                                                            </div>-->


                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>observation/commentaire</label>
                                                                            <textarea class="form-control" rows="3"
                                                                                      cols="30" name="obs"></textarea>
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
                                                                    <form action="save_consultation_med.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                            <?php
                                                                            if( $lvl != 2 and $lvl != 8 and $lvl != 3){
                                                                                ?>
                                                                                    <label>Patient <span
                                                                                                class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient" >
                                                                                        <option value="0" selected="">-----</option>
                                                                                        <?php



                                                                                            $sql = "SELECT  * from patient where open_close!=1";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $data)
                                                                                            {
                                                                                                $i = $data['id_patient'];
                                                                                                echo '<option value ="' . $i . '" >';
                                                                                               // echo $data['nom_p'] . ' ' . $data['prenom_p'];
                                                                                                echo $data['ref_patient'];
                                                                                                echo '</option>';
                                                                                            }



                                                                                        ?>

                                                                                    </select>
                                                                                <?php }?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Médecin<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_medecin">

                                                                                        <?php

                                                                                        if ($lvl == 5) {
                                                                                            $iResult = $db->query("SELECT * FROM  medecin where id_medecin='$id_perso_session'");
                                                                                        } else {
                                                                                            echo '<option value="0" selected="">....</option>';
                                                                                            $iResult = $db->query("SELECT * FROM  medecin");
                                                                                        }

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
                                                                                      cols="70"></textarea>
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


    <!-- <?php


    //include("ajouter_profession.php");


    ?> -->
    <!--//Footer-->
<?php
include('foot.php');
?>