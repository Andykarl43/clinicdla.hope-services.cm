<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

$total_apt = 0;
// $today = date("Y-m-d");
// $today = date("t", strtotime($today));

 $year = (new DateTime())->format("Y");
 $month = (new DateTime())->format("m");
 $day = (new DateTime())->format("d");
 $query  = "SELECT count(id_certi_medi) as total from certi_medi";
 $q = $conn->query($query);
 while($row = $q->fetch_assoc())
 {
     $total_apt = $row["total"];
 }
 $id_app = $total_apt + 1;
 $ref_app = 'CM_'.$year.'_'.$month.'_'.$day.'_'.$id_app;
?>


    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Certificat Medical </h1>
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
                                            <form action="save_cert_medi.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Réference <span
                                                                        class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" value="<?=$ref_app?>" name="ref_certi_medi" readonly>
                                                        </div>
                                                    </div>
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
                                                                    echo $data['nom_p'] . ' ' . $data['prenom_p'];
                                                                    echo '</option>';

                                                                }

                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Médecin<span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control" name="id_medecin">
                                                                <?php

                                                                if ($lvl == 5) {
                                                                    $iResult = $db->query("SELECT * FROM  medecin where id_medecin='$id_perso_session' and open_close!=1");
                                                                } else {
                                                                    echo '<option value="0" selected="">....</option>';
                                                                    $iResult = $db->query("SELECT * FROM  medecin where open_close!=1");
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
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date de début</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_debut">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date de fin</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_fin">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$certificat['option1_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>

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