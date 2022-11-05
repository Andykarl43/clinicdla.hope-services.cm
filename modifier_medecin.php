<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_medecin = $_REQUEST['id'];

$query = "SELECT * from medecin where id_medecin='" . $id_medecin . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_medecin = $row['id_medecin'];
    $nom_m = $row['nom_m'];
    $prenom_m = $row['prenom_m'];
    $user_m= $row['user_m'];
    $email_m= $row['email_m'];
    $type_m= $row['type_m'];
    $genre_m= $row['genre_m'];
    $pass_m= $row['pass_m'];
    $date_m= $row['date_m'];
    $adress_m= $row['adress_m'];
    $code_m= $row['code_m'];
    $id_spe = $row['id_spe'];
    $pays_m = $row['pays_m'];
    $phone_m = $row['phone_m'];
    $ville_m = $row['ville_m'];
    $region_m = $row['region_m'];
    $bio_m = $row['bio_m'];
    if($genre_m=="M"){
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
                <h1 class="mt-4">Modifier Médecin: <?=$nom_m.' '.$prenom_m?></h1>
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
                                            <form action="update_medecin.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="hidden" name="id_medecin" value="<?=$id_medecin?>">
                                                            <input class="form-control" type="text" name="nom_m" value="<?=$nom_m?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prénom</label>
                                                            <input class="form-control" type="text" name="prenom_m" value="<?=$prenom_m?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Username <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="user_m" value="<?=$user_m?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email" name="email_m" value="<?=$email_m?>" >
                                                        </div>
                                                    </div>
<!--                                                    <div class="col-sm-6">-->
<!--                                                        <div class="form-group">-->
<!--                                                            <label>Password</label>-->
<!--                                                            <input class="form-control" type="password" name="password_m" >-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Spécialité</label>
                                                            <select class="form-control" name="id_spe">
                                                                <option value="0">...</option>
                                                                <?php

                                                            $iResult = $db->query("SELECT * FROM specialiste where  id_spe='$id_spe'");

                                                            while ($data = $iResult->fetch()) {

                                                                $i = $data['id_spe'];
                                                                echo '<option value ="' . $i . '" selected>';
                                                                echo $data['nom'];
                                                                echo '</option>';
                                                            }

                                                                $iResult = $db->query("SELECT * FROM specialiste ");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_spe'];
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
                                                            <label>Type de medecin</label>
                                                                <select class="form-control" name="type_m">
                                                                    <option value="N/A">...</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM type_medecin where type_m='$type_m'");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['type_m'];
                                                                    echo '<option value ="' . $i . '" selected>';
                                                                    echo $data['label'];
                                                                    echo '</option>';
                                                                }

                                                                    $iResult = $db->query("SELECT * FROM type_medecin where type_m!='$type_m' ");

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
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date de naissance</label>
                                                            <div>
                                                                <input type="date" class="form-control" name="date_m" value="<?=$date_m?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group gender-select">
                                                            <label class="gen-label">Sexe:</label>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                  echo'  <input type="radio" name="genre_m"
                                                                           class="form-check-input" value="M" '.$choix_M.' required="required">Homme';
                                                                           ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo'<input type="radio" name="genre_m"
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
                                                                    <input type="text" class="form-control" name="adress_m" value="<?=$adress_m?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Pays</label>
                                                                    <select class="form-control" name="pays_m">
                                                                        <option  value="0">...</option>
                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM pays where id_pays='$pays_m'");

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
                                                                    <input type="text" class="form-control" name="ville_m" value="<?=$ville_m?>">
                                                                </div>
                                                            </div>
<!--                                                            <div class="col-sm-6 col-md-6 col-lg-3">-->
<!--                                                                <div class="form-group">-->
<!--                                                                    <label>Région</label>-->
<!--                                                                    <select class="form-control" name="region_m">-->
<!--                                                                        <option selected="" value='N/A'>...</option>-->
<!--                                                                        <option>Centre</option>-->
<!--                                                                        <option>Ouest</option>-->
<!--                                                                        <option>Sud-ouest</option>-->
<!--                                                                    </select>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="col-sm-6 col-md-6 col-lg-3">-->
<!--                                                                <div class="form-group">-->
<!--                                                                    <label>Code Postal</label>-->
<!--                                                                    <input type="text" class="form-control" name="code_m"value="--><?//=$code_m?><!--" >-->
<!--                                                                </div>-->
<!--                                                            </div>-->
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Phone </label>
                                                            <input class="form-control" type="text" name="phone_m" value="<?=$phone_m?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Avatar</label>
                                                            <div class="profile-upload">
                                                                <div class="upload-img">
                                                                    <img alt="" src="assetss/img/user.jpg" >
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
                                                    <textarea class="form-control" rows="3" cols="30" name="bio_m"><?=$bio_m?></textarea>
                                                </div>
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$medecin['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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
    <?php
}
    ?>

    <!--    Modal pour ajouter Categorie Contrat-->


    <!--//Footer-->
<?php
include('foot.php');
?>