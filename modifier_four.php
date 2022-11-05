<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_four = $_REQUEST['id'];

$query = "SELECT * from fournisseur where id_four='" . $id_four . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_four = $row['id_four'];
    $ref_four = $row['ref_four'];
    $raison_social_four= $row['raison_social_four'];
    $email_four= $row['email_four'];
    $pays_four= $row['pays_four'];
    $ville_four= $row['ville_four'];
    $tel_four= $row['tel_four'];
    $personne_contact= $row['personne_contact'];
    $tel_contact= $row['tel_contact'];
    $date_four = $row['date_four'];
    
    if(empty($ville_four)){
        $ville_four='N/A';
    }
    if(empty($pays_four)){
        $pays_four='N/A';
    }

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-shipping-fast" style="color: silver"></i>Modifier Fournisseur: <?=$raison_social_four?> </h1>
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
                                            <form action="update_four.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Réference <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="hidden" name="id_four" value="<?=$id_four?>">
                                                            <input class="form-control" type="text" name="ref_four" value="<?=$ref_four?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Raison Sociale <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                   name="raison_social_four" value="<?=$raison_social_four?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pays</label>
                                                            <select class="form-control" name="pays">
                                                                
                                                                <?php
                                                                
                                                                if(empty($pays_four)){
                                                                    echo '<option  value="0" selected>N/A</option>';
                                                                }else{
                                                                        $iResult = $db->query("SELECT * FROM pays where id_pays='$pays_four'");
    
                                                                    while ($data = $iResult->fetch()) {
    
                                                                        $i = $data['id_pays'];
                                                                        echo '<option value ="' . $i . '" selected>';
                                                                        echo $data['nom'];
                                                                        echo '</option>';

                                                                     }
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
                                                            <select class="form-control" name="ville">
                                                                
                                                                <?php
                                                                
                                                                if(empty($ville_four)){
                                                                    echo'<option  value="0" selected>N/A</option>';
                                                                }else{
                                                                    echo'<option  value="'.$ville_four.'" selected>'.$ville_four.'</option>';
                                                                }

                                                                
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
                                                            <input class="form-control" type="email" name="email" value="<?=$email_four?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Tel</label>
                                                            <input class="form-control" type="text" name="tel" value="<?=$tel_four?>">
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-sm-6">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label> Personne à contacter</label>-->
                                                    <!--        <input class="form-control" type="text" placeholder="en cour..." disabled="" value="<?=$personne_contact?>">-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <!--<div class="col-sm-6">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label> Tel contact</label>-->
                                                    <!--        <input class="form-control" type="text" placeholder="en cour..."  disabled="" value="<?=$tel_contact?>">-->
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
    <?php
}
    ?>

    <!--//Footer-->
<?php
include('foot.php');
?>