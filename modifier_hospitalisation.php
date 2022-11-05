<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_hosp = $_REQUEST['id'];

$query = "SELECT * from hospitalisation where id_hosp='$id_hosp'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_hosp = $row['id_hosp'];
    $ref_hosp = $row['ref_hosp'];
    $id_patient = $row['id_patient'];
    $id_nurse = $row['id_nurse'];
    $id_service = $row['id_service'];
    $id_medecin = $row['id_medecin'];
    $date_hosp = $row['date_hosp'];
    $id_type_hosp = $row['id_type_hosp'];
    $lit = $row['lit'];
    $nb_jour = $row['nb_jour'];
    $chambre = $row['chambre'];


    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
      //  $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
        $nom_patient = $table['ref_patient'];
        $age= $table['age_p'];
    }

    $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];
    }




    $sql = "SELECT DISTINCT * from nurse where id_nurse = '$id_nurse'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $nom_nurse= $table['nom_n'] . ' ' . $table['prenom_n'];
    }

    $sql = "SELECT DISTINCT * from type_hosp where id_type_hosp = '$id_type_hosp'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $type_hosp= $table['nom'] ;
    }
    $sql = "SELECT DISTINCT * from service where id_service = '$id_service'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $service= $table['nom'] ;
    }
    if(empty($id_medecin)){
        $nom_medecin='N/A';
    }
    if(empty($id_nurse)){
        $nom_nurse='N/A';
    }
    if(empty($id_type_hosp)){
        $type_hosp='N/A';
    }

    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier Hospitalisation</h1>
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
                                            <form action="update_hospitalisation.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_hosp" value="<?=$id_hosp?>">
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
                                                                   // echo $data['nom_p'] . ' ' . $data['prenom_p'];
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
                                                            <label>Médecin <span
                                                                        class="text-danger">*</span></label>
                                                            <select class="form-control" name="id_medecin">
                                                                <option value="<?=$id_medecin?>" selected=""><?=$nom_medecin?></option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM medecin ");

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
<!--                                                    <div class="col-sm-6">-->
<!--                                                        <div class="form-group">-->
<!--                                                            <label>Service <span-->
<!--                                                                    class="text-danger">*</span></label>-->
<!--                                                            <select class="form-control" name="id_service">-->
<!--                                                                <option value="--><?//=$id_service?><!--" selected="">--><?//=$service?><!--</option>-->
<!--                                                                --><?php
//
//                                                                $iResult = $db->query("SELECT * FROM service ");
//
//                                                                while ($data = $iResult->fetch()) {
//
//                                                                    $i = $data['id_service'];
//                                                                    echo '<option value ="' . $i . '">';
//                                                                    echo $data['nom'];
//                                                                    echo '</option>';
//
//                                                                }
//                                                                ?>
<!--                                                            </select>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>N° de la Chambre</label>
                                                            <input class="form-control" type="text" name="chambre" value="<?=$chambre?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Type d'hospitalisation <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control" name="id_type_hosp">
                                                                <option value="<?=$id_type_hosp?>" selected=""><?=$type_hosp?></option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM type_hosp ");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_type_hosp'];
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
                                                            <label>N° du lit <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="lit" value="<?=$lit?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nbre de jour <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" type="number" name="nb_jour" value="<?=$nb_jour?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date d'entrée</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_hosp" value="<?=$date_hosp?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$hospitalisation['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>

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