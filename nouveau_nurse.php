<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouvelle Infimière(ier)</h1>
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
                                            <form action="save_nurse.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="nom_n">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prénom</label>
                                                            <input class="form-control" type="text" name="prenom_n">
                                                        </div>
                                                    </div>
<!--                                                    <div class="col-sm-6">-->
<!--                                                        <div class="form-group">-->
<!--                                                            <label>Username <span class="text-danger">*</span></label>-->
<!--                                                            <input class="form-control" type="text" name="user_n">-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email" name="email_n">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Type d'infirmière</label>
                                                            <select class="form-control" name="type_n">
                                                                <option selected="" value="N/A">...</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM type_medecin where open_close!=1");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['type_m'];
                                                                    echo '<option value ="' . $i . '" selected>';
                                                                    echo $data['label'];
                                                                    echo '</option>';
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Departement</label>
                                                            <select class="form-control" name="id_depart">
                                                                <option selected="" value="0">...</option>
                                                               <?php

                                                                $iResult = $db->query("SELECT * FROM departement where open_close!=1 ");

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
                                                                <input type="date" class="form-control" name="date_n">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group gender-select">
                                                            <label class="gen-label">Sexe:</label>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="genre_n"
                                                                           class="form-check-input" value="M" required="required">Homme
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="genre_n"
                                                                           class="form-check-input" value="F" required="required">Femme
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Adresse</label>
                                                            <div>
                                                                <input type="text" class="form-control" name="adress_n">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pays</label>
                                                            <div>
                                                                <select class="form-control" name="pays_n">
                                                                    <option  value="0">...</option>
                                                                    <?php

                                                                    $iResult = $db->query("SELECT * FROM pays  where open_close!=1  ");

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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Phone </label>
                                                            <input class="form-control" type="text" name="phone_n">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Ville </label>
                                                            <input class="form-control" type="text" name="ville_n">
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
                                                    <textarea class="form-control" rows="3" cols="30" name="bio_n"></textarea>
                                                </div>
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$nurse['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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