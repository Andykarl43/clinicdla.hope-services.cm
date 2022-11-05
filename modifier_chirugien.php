<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_chirugien = $_REQUEST['id'];

$query = "SELECT * from chirugien where id_chirugien='" . $id_chirugien . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_chirugien = $row['id_chirugien'];
    $nom_c = $row['nom_c'];
    $prenom_c = $row['prenom_c'];
    $user_c= $row['user_c'];
    $email_c= $row['email_c'];
    $type_c= $row['type_c'];
    $genre_c= $row['genre_c'];
    $pass_c= $row['pass_c'];
    $date_c= $row['date_c'];
    $adress_c= $row['adress_c'];
    $code_c= $row['code_c'];
    $pays_c = $row['pays_c'];
    $phone_c = $row['phone_c'];
    $ville_c = $row['ville_c'];
    $region_c = $row['region_c'];
    $id_depart = $row['id_depart'];
    $bio_c = $row['bio_c'];
    if($genre_c=="M"){
        $choix_M="checked";
        $choix_F="";
    }else{
        $choix_M="";
        $choix_F="checked";
    }

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier Chirugien:  <?=$nom_c.' '.$prenom_c?></h1>
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
                                            <form action="update_chirugien.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="hidden" name="id_chirugien" value="<?=$id_chirugien?>">
                                                            <input class="form-control" type="text" name="nom_c" value="<?=$nom_c?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prénom</label>
                                                            <input class="form-control" type="text" name="prenom_c" value="<?=$prenom_c?>">
                                                        </div>
                                                    </div>
<!--                                                    <div class="col-sm-6">-->
<!--                                                        <div class="form-group">-->
<!--                                                            <label>Username <span class="text-danger">*</span></label>-->
<!--                                                            <input class="form-control" type="text" name="user_c" value="--><?//=$user_c?><!--">-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email" name="email_c" value="<?=$email_c?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Type de chirugien</label>
                                                            <select class="form-control" name="type_c">
                                                                <option value="N/A">...</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM type_medecin where type_m='$type_c'");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['type_m'];
                                                                    echo '<option value ="' . $i . '" selected>';
                                                                    echo $data['label'];
                                                                    echo '</option>';
                                                                }

                                                                $iResult = $db->query("SELECT * FROM type_medecin where type_m!='$type_c' ");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['type_m'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    echo $data['label'];
                                                                    echo '</option>';

                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
<!--                                                    <div class="col-sm-6">-->
<!--                                                        <div class="form-group">-->
<!--                                                            <label>Password</label>-->
<!--                                                            <input class="form-control" type="password" name="password_c" value="--><?//=$pass_c?><!--">-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Departement</label>
                                                            <select class="form-control" name="id_depart">
                                                                <option  value="0">...</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM departement where id_depart='$id_depart' ");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_depart'];
                                                                    echo '<option value ="' . $i . '" selected="">';
                                                                    echo $data['nom'];
                                                                    echo '</option>';

                                                                }
                                                                ?>
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
                                                            <label>Date de naissance</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_c" value="<?=$date_c?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group gender-select">
                                                            <label class="gen-label">Sexe:</label>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo'  <input type="radio" name="genre_c"
                                                                           class="form-check-input" value="M" '.$choix_M.' required="required">Homme';
                                                                    ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo'<input type="radio" name="genre_c"
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
                                                                    <input type="text" class="form-control" name="adress_c" value="<?=$adress_c?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Pays</label>
                                                                    <select class="form-control" name="pays_c">
                                                                        <option  value="0">...</option>
                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM pays where id_pays='$pays_c'");

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
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Ville</label>
                                                                    <input type="text" class="form-control" name="ville_c" value="<?=$ville_c?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Région</label>
                                                                    <select class="form-control" name="region_c">
                                                                        <option selected="" value='N/A'>...</option>
                                                                        <option>Centre</option>
                                                                        <option>Ouest</option>
                                                                        <option>Sud-ouest</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Code Postal</label>
                                                                    <input type="text" class="form-control" name="code_c" value="<?=$code_c?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Phone </label>
                                                            <input class="form-control" type="text" name="phone_c" value="<?=$phone_c?>">
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
                                                                    <input type="file" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Biography</label>
                                                    <textarea class="form-control" rows="3" cols="30" name="bio_c"><?=$bio_c?></textarea>
                                                </div>
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$chirugien['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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