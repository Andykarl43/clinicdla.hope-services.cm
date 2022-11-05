<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-shipping-fast" style="color: silver"></i>Nouveau Fournisseur</h1>
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
                                            <form action="save_four.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Réference <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="ref_four">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Raison Sociale <span
                                                                        class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                   name="raison_social_four">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pays</label>
                                                            <div>
                                                                <select class="form-control" name="pays">
                                                                    <option  value="0">...</option>
                                                                    <?php

                                                                    $iResult = $db->query("SELECT * FROM pays where open_close!=1 ");

                                                                    while ($data = $iResult->fetch()) {

                                                                        $i = $data['nom'];
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
                                                            <label>Ville</label>
                                                            <select class="form-control" name="ville">
                                                                <option  value="0">...</option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM ville where open_close!=1 ");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['nom'];
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
                                                            <label>Email</label>
                                                            <input class="form-control" type="email" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Tel</label>
                                                            <input class="form-control" type="text" name="tel">
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-sm-6">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label> Personne à contacter</label>-->
                                                    <!--        <input class="form-control" type="text" placeholder="en cour..." disabled="">-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <!--<div class="col-sm-6">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label> Tel contact</label>-->
                                                    <!--        <input class="form-control" type="text" placeholder="en cour..."  disabled="">-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
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
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$fournisseur['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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