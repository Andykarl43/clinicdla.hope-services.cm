<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

// $total_apt = 0;
// $today = date("Y-m-d");
// $today = date("t", strtotime($today));

 $year = (new DateTime())->format("Y");
$month = (new DateTime())->format("m");
 $day = (new DateTime())->format("d");
// $query  = "SELECT count(id_app) as total from appointment";
// $q = $conn->query($query);
// while($row = $q->fetch_assoc())
// {
//     $total_apt = $row["total"];
// }
// $id_app = $total_apt + 1;
// $ref_app = 'APT_'.$year.'_'.$month.'_'.$day.'_'.$id_app;

$sql="SELECT count(id_patient) as total FROM patient ";
$stmt = $db->prepare($sql);
$stmt->execute();

$tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($tables as $table)
{
    $num=$table['total'];
}
$num++;
if(strlen($num)<=4){
    //N°   0008  /  01  /Pdt/SG/ONIGC/22
    $numeroref = substr_replace("0000",$num, -strlen($num));
    $ref_patient='P'.$numeroref.''.$year.''.$month.''.$day;

}else{
    //N°   00008  /  01  /Pdt/SG/ONIGC/22
    $numeroref = substr_replace("00000",$num, -strlen($num));
    $ref_patient='P'.$numeroref.''.$year.''.$month.''.$day;

}

?>

    <!--Content-->

    <div id="layoutSidenav_content"> 
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Patient</h1>
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
                                            <form action="save_patient.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Code Patient <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="hidden" name="ref_patient"
                                                                   value="<?=$ref_patient?>" >
                                                            <input class="form-control" type="text" name="ref_patient"
                                                                   value="<?=$ref_patient?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="nom"
                                                                   required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prénom</label>
                                                            <input class="form-control" type="text" name="prenom">
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-sm-6">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>Username <span class="text-danger">*</span></label>-->
                                                    <!--        <input class="form-control" type="text" name="username"-->
                                                    <!--               value="N/A">-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" type="email" name="email">
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
                                                                <input type="date" class="form-control"
                                                                       name="date_aniv">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group gender-select">
                                                            <label class="gen-label">Sexe:</label>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="gender" value="M"
                                                                           class="form-check-input" required="required">Homme
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="gender" value="F"
                                                                           class="form-check-input" required="">Femme
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Adresse</label>
                                                            <input type="text" class="form-control"
                                                                           name="adresse">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                             <label>Ville</label>
                                                            <input type="text" class="form-control"
                                                                           name="ville">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                           <label>Pays</label>
                                                            <select class="form-control" name="pays">
                                                                        <option  value="0" selected>...</option>
                                                                        <?php

                                                                        $iResult = $db->query("SELECT * FROM pays where open_close!=1 ");

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
                                                            <label>Phone </label>
                                                            <input class="form-control" type="text" name="phone">
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
                                                              name="biography"></textarea>
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


    <!--//Footer-->
<?php
include('foot.php');
?>