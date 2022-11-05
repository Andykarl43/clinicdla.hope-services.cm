<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_laboratin = $_REQUEST['id'];

$query = "SELECT * from laboratin where id_laboratin='" . $id_laboratin . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_laboratin = $row['id_laboratin'];
    $nom_l = $row['nom_l'];
    $prenom_l = $row['prenom_l'];
    $user_l= $row['user_l'];
    $email_l= $row['email_l'];
    $type_l = $row['type_l'];
    $genre_l= $row['genre_l'];
    $pass_l= $row['pass_l'];
    $date_l= $row['date_l'];
    $adress_l= $row['adress_l'];
    $code_l= $row['code_l'];
    $pays_l = $row['pays_l'];
    $phone_l = $row['phone_l'];
    $ville_l = $row['ville_l'];
    $region_l = $row['region_l'];
    $id_depart = $row['id_depart'];
    $bio_l = $row['bio_l'];
    if($genre_l=="M"){
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
                <h1 class="mt-4">Modifier Laborantin: <?=$nom_l.' '.$prenom_l?></h1>
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
                                            <form action="update_laboratin.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="hidden" name="id_laboratin" value="<?=$id_laboratin?>">
                                                            <input class="form-control" type="text" name="nom_l" value="<?=$nom_l?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prénom</label>
                                                            <input class="form-control" type="text" name="prenom_l" value="<?=$prenom_l?>">
                                                        </div>
                                                    </div>
<!--                                                    <div class="col-sm-6">-->
<!--                                                        <div class="form-group">-->
<!--                                                            <label>Username <span class="text-danger">*</span></label>-->
<!--                                                            <input class="form-control" type="text" name="user_l" value="--><?//=$user_l?><!--">-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email" name="email_l" value="<?=$email_l?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Type de laborantin</label>
                                                            <select class="form-control" name="type_l">
                                                                <option value="N/A">...</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM type_medecin where type_m='$type_l'");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['type_m'];
                                                                    echo '<option value ="' . $i . '" selected>';
                                                                    echo $data['label'];
                                                                    echo '</option>';
                                                                }

                                                                $iResult = $db->query("SELECT * FROM type_medecin where type_m!='$type_l' ");

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
<!--                                                            <input class="form-control" type="password" name="password_l" value="--><?//=$pass_l?><!--">-->
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
                                                                    echo '<option value ="' . $i . '" selected>';
                                                                    echo $data['nom'];
                                                                    echo '</option>';

                                                                }

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
                                                                <input type="date" class="form-control" name="date_l" value="<?=$date_l?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group gender-select">
                                                            <label class="gen-label">Sexe:</label>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo'  <input type="radio" name="genre_l"
                                                                           class="form-check-input" value="M" '.$choix_M.' required="required">Homme';
                                                                    ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo'<input type="radio" name="genre_l"
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
                                                                    <input type="text" class="form-control" name="adress_l" value="<?=$adress_l?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Pays</label>
                                                                    <select class="form-control" name="pays_l">
                                                                        <option  value="0">...</option>
                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM pays where id_pays='$pays_n'");

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
                                                                    <input type="text" class="form-control" name="ville_l" value="<?=$ville_l?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Région</label>
                                                                    <select class="form-control" name="region_l">
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
                                                                    <input type="text" class="form-control" name="code_l" value="<?=$code_l?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Phone </label>
                                                            <input class="form-control" type="text" name="phone_l" value="<?=$phone_l?>">
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
                                                    <textarea class="form-control" rows="3" cols="30" name="bio_l"><?=$bio_l?></textarea>
                                                </div>
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$laboratin['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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