<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

$id_patient  = $_REQUEST['id'];

$query = "SELECT * from patient where id_patient='" . $id_patient . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_patient = $row['id_patient'];
    $ref_patient = $row['ref_patient'];

    /*-------------------- DETAILS PATIENTS --------------------*/
    $nom_p = $row['nom_p'];
    $prenom_p = $row['prenom_p'];
    $age_p = $row['age_p'];
    $username_p = $row['username_p'];
    $email_p = $row['email_p'];
    $genre_p = $row['genre_p'];
    $adresse_p = $row['adresse_p'];
    $pays_p = $row['pays_p'];
    $ville_p = $row['ville_p'];
//    $region_p = $row['region_p'];
//    $code_postal_p = $row['code_postal_p'];
    $phone_p = $row['phone_p'];
    $biography_p = $row['biography_p'];
    $statut_p = $row['statut_p'];
    $id_ent = $row['id_ent'];
    $id_ass = $row['id_ass'];
    $date_aniv_p = $row['date_aniv_p'];
    if($genre_p=="M"){
        $choix_M="checked";
        $choix_F="";
    }else{
        $choix_M="";
        $choix_F="checked";
    }

    $iResult = $db->query("SELECT * FROM entreprises WHERE id_ent='$id_ent'");

    while ($data = $iResult->fetch()) {

        $i = $data['id_ent'];
        $raison_social_ent= $data['raison_social_ent'];


    }

    $iResult = $db->query("SELECT * FROM assurances WHERE id_ass='$id_ass'");

    while ($data = $iResult->fetch()) {

        $i = $data['id_ass'];
        $raison_social_ass= $data['raison_social_ass'];


    }
    if(empty($id_ass)){
        $raison_social_ass="N/A";
    }

    if(empty($id_ent)){
        $raison_social_ent="N/A";
    }

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier Patient: <?=$nom_p.' '.$prenom_p?></h1>
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

                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Etat Civile-->
                                    <!-- infos civile-->


                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <form action="update_patient.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Code Patient</label>
                                                            <input class="form-control" type="text" name="ref_patient" value="<?=$ref_patient?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="hidden" name="id_patient" value="<?=$id_patient?>">
                                                            <input class="form-control" type="text" name="nom" value="<?=$nom_p?>"
                                                                   required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prénom</label>
                                                            <input class="form-control" type="text" name="prenom" value="<?=$prenom_p?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Username <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="user" value="<?=$username_p?>"
                                                                   required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email" name="email" value="<?=$email_p?>">
                                                        </div>
                                                    </div>
                                                    <!--  <div class="col-sm-6">
                                                         <div class="form-group">
                                                             <label>Password</label>
                                                             <input class="form-control" type="password" name="password" required="required">
                                                         </div>
                                                     </div>
                                                     <div class="col-sm-6">
                                                         <div class="form-group">
                                                             <label>Confirm Password</label>
                                                             <input class="form-control" type="password" name="check_password" required="required">
                                                         </div>
                                                     </div> -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date de Naissance</label>
                                                            <div>
                                                                <input type="date" class="form-control" value="<?=$date_aniv_p?>"
                                                                       name="date_aniv">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group gender-select">
                                                            <label class="gen-label">Sexe:</label>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo'  <input type="radio" name="genre"
                                                                           class="form-check-input" value="M" '.$choix_M.' required="required">Homme';
                                                                    ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo'<input type="radio" name="genre"
                                                                           class="form-check-input" value="F" '.$choix_F.' required="required">Femme';
                                                                    ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Adresse</label>
                                                                    <input type="text" class="form-control"
                                                                           name="adress" value="<?=$adresse_p?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 ">
                                                                <div class="form-group">
                                                                    <label>Pays</label>
                                                                    <select class="form-control" name="pays">
                                                                        <option  value="0">...</option>
                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM pays where id_pays='$pays_p'");

                                                                        while ($data = $iResult->fetch()) {

                                                                            $i = $data['id_pays'];
                                                                            echo '<option value ="' . $i . '" selected>';
                                                                            echo $data['nom'];
                                                                            echo '</option>';

                                                                        }

                                                                        $iResult = $db->query("SELECT * FROM pays ");

                                                                        while ($data = $iResult->fetch()) {

                                                                            $i = $data['id_pays'];
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
                                                                    <label>Ville</label>
                                                                    <input type="text" class="form-control"
                                                                           name="ville" value="<?=$ville_p?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 ">
                                                                <div class="form-group">
                                                                    <label>entreprise</label>
                                                                    <select class="form-control" name="id_ent" >
                                                                        <option  value="<?=$id_ent?>" selected><?=$raison_social_ent?></option>

                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM entreprises");

                                                                        while ($data = $iResult->fetch()) {

                                                                            $i = $data['id_ent'];
                                                                            echo '<option value ="' . $i . '">';
                                                                            echo $data['raison_social_ent'];
                                                                            echo '</option>';

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Assurance</label>
                                                                    <select class="form-control" name="id_ass" >
                                                                        <option  value="<?=$id_ass?>" selected><?=$raison_social_ass?></option>

                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM assurances ");

                                                                        while ($data = $iResult->fetch()) {

                                                                            $i = $data['id_ass'];
                                                                            echo '<option value ="' . $i . '">';
                                                                            echo $data['raison_social_ass'];
                                                                            echo '</option>';

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
<!--                                                            <div class="col-sm-6 col-md-6 col-lg-3">-->
<!--                                                                <div class="form-group">-->
<!--                                                                    <label>State/Province</label>-->
<!--                                                                    <select class="form-control" name="region">-->
<!--                                                                        <option value="California">California</option>-->
<!--                                                                        <option value="Alaska">Alaska</option>-->
<!--                                                                        <option value="Alabama">Alabama</option>-->
<!--                                                                    </select>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="col-sm-6 col-md-6 col-lg-3">-->
<!--                                                                <div class="form-group">-->
<!--                                                                    <label>Postal Code</label>-->
<!--                                                                    <input type="text" class="form-control"-->
<!--                                                                           name="code" value="--><?//=$code_postal_p?><!--">-->
<!--                                                                </div>-->
<!--                                                            </div>-->
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Phone </label>
                                                            <input class="form-control" type="text" name="phone" value="<?=$phone_p?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Avatar</label>
                                                            <div class="profile-upload">
                                                                <div class="upload-img">
                                                                    <img alt="" src="assetss/img/user.jpg">
                                                                </div>
                                                                <div class="upload-input">
                                                                    <input type="file" class="form-control"
                                                                           name="fichier">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Short Biography</label>
                                                    <textarea class="form-control" rows="3" cols="30"
                                                              name="bio"><?=$biography_p?></textarea>
                                                </div>
<!--                                                <div class="form-group">-->
<!--                                                    <label class="display-block">Status</label>-->
<!--                                                    <div class="form-check form-check-inline">-->
<!--                                                        <input class="form-check-input" type="radio" name="status"-->
<!--                                                               id="doctor_active" value="1" checked>-->
<!--                                                        <label class="form-check-label" for="doctor_active">-->
<!--                                                            Active-->
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-check form-check-inline">-->
<!--                                                        <input class="form-check-input" type="radio" name="status"-->
<!--                                                               id="doctor_inactive" value="2">-->
<!--                                                        <label class="form-check-label" for="doctor_inactive">-->
<!--                                                            Inactive-->
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$patient['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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