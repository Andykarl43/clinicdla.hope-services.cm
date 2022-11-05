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
    $date_hosp = $row['date_hosp'];
    $id_type_hosp = $row['id_type_hosp'];
    $lit = $row['lit'];
    $nb_jour = $row['nb_jour'];
    $chambre = $row['chambre'];

    $sql = "SELECT * from regler_hosp  where id_hosp = '$id_hosp'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $id_reg_hosp= $table['id_reg_hosp'];
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
    if(empty($id_service)){
        $service='N/A';
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
                                            <form action="save_regler_hosp.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_hosp" value="<?=$id_hosp?>">
                                                            <input type="hidden" name="id_patient" value="<?=$id_patient?>">
                                                            <input type="hidden" name="id_reg_hosp" value="<?=$id_reg_hosp?>">
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
                                                            <label>Infirmière<span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control" name="id_nurse" readonly="">
                                                                <option value="<?=$id_nurse?>" selected=""><?=$nom_nurse?></option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Service <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control" name="id_service" readonly="">
                                                                <option value="<?=$id_service?>" selected=""><?=$service?></option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>N° de la Chambre</label>
                                                            <input class="form-control" type="text" name="chambre" value="<?=$chambre?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Type d'hospitalisation <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control" name="id_type_hosp" readonly="">
                                                                <option value="<?=$id_type_hosp?>" selected=""><?=$type_hosp?></option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>N° du lit <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="lit" value="<?=$lit?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nbre de jour <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" type="number" name="nb_jour" value="<?=$nb_jour?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date d'entrée</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_hosp" value="<?=$date_hosp?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
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