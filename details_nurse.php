<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_nurse = $_REQUEST['id'];

$query = "SELECT * from nurse where id_nurse='" . $id_nurse . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_nurse = $row['id_nurse'];

//     /*-------------------- DETAILS FOURNISSEURS  --------------------*/
    $nom_n = $row['nom_n'];
    $prenom_n = $row['prenom_n'];
    $adress_n = $row['adress_n'];
    // $username_m = $row['username_m'];
    $email_n = $row['email_n'];
    $genre_n = $row['genre_n'];
    $date_n = $row['date_n'];
    $pays_n = $row['pays_n'];
    $ville_n = $row['ville_n'];
    $region_n = $row['region_n'];
    // $code_postal_m = $row['code_postal_m'];
    $phone_n = $row['phone_n'];
    //  $biography_m = $row['biography_m'];
    $statut_n = $row['statut_n'];
    //$date_aniv_m = $row['date_aniv_m'];

    if(strlen($id_nurse)<=4){
        $num=$id_nurse;
        //N°   0008  /  01  /Pdt/SG/ONIGC/22
        $numeroref = substr_replace("0000",$num, -strlen($num));
        // $ref_dem_ent='N° '.$numeroref.' / '.$month.' /Pdt/SG/ONIGC/'.$years;
        $ID_Nurse= 'M'.$numeroref;

    }else{
        $num=$id_nurse;
        //N°   00008  /  01  /Pdt/SG/ONIGC/22
        $numeroref = substr_replace("00000",$num, -strlen($num));
        // $ref_dem_ent='N° '.$numeroref.' / '.$month.' /Pdt/SG/ONIGC/'.$years;
        $ID_Nurse= 'M'.$numeroref;
    }

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du Infirmier(ière) : </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <!--                Main Body-->

                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Profile</h4>
                    </div>
<?php
                        if( $lvl == 4 || $lvl == 7 ){
                        ?>
                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="modifier_nurse.php?id=<?=$id_nurse?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>
                            Editer Profile</a>
                    </div>
                    <?php }?>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php if($nom_n=="" or $prenom_n==""){echo 'N/A';}else{echo  $nom_n . ' ' . $prenom_n;} ?></h3>
                                                <small class="text-muted"></small>
                                                <div class="staff-id">ID Infirmière(ier): <?php if($id_nurse==0){echo 'N/A';}else{echo  $ID_Nurse;} ?></div>
                                                <div class="staff-msg"><a href="#" class="btn btn-primary">Send
                                                        Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?php if($phone_n==""){echo 'N/A';}else{echo  $phone_n;} ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?php if($email_n==""){echo 'N/A';}else{echo  $email_n;} ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text"><?php if($date_n==""){echo 'N/A';}else{echo  $date_n;} ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php if($adress_n==""){echo 'N/A';}else{echo  $adress_n;} ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Sexe:</span>
                                                    <span class="text"><?php if($genre_n==""){echo 'N/A';}else{echo  $genre_n;} ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Rendez-vous</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Consultations</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab4" data-toggle="tab">Examens</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab5" data-toggle="tab">Antécédants</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab6" data-toggle="tab">Factures</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab7"
                                                data-toggle="tab">Hopspitalisations</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab8" data-toggle="tab">Opérations</a>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab9" data-toggle="tab">Soldes de services</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-cont">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <form action="#" method="POST">
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Matricule<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="matricule" value="<?=$ID_Nurse?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label> Nom<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="nom_ing"
                                                           value="<?=$nom_n?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Prénom</label>
                                                    <input class="form-control" type="text" value="<?=$prenom_n?>" disabled>
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Username <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="username"
                                                           required="required">
                                                </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="email" value="<?=$email_n?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Birthday <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" value="<?=$date_n?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone </label>
                                                    <input class="form-control" type="text" value="<?=$phone_n?>" disabled>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!--                            <div class="row">-->
                            <!--                                <div class="col-md-12">-->
                            <!--                                    <div class="card-box">-->
                            <!--                                        <h3 class="card-title">Education Informations</h3>-->
                            <!--                                        <div class="experience-box">-->
                            <!--                                            <ul class="experience-list">-->
                            <!--                                                <li>-->
                            <!--                                                    <div class="experience-user">-->
                            <!--                                                        <div class="before-circle"></div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="experience-content">-->
                            <!--                                                        <div class="timeline-content">-->
                            <!--                                                            <a href="#/" class="name">International College of Medical-->
                            <!--                                                                Science (UG)</a>-->
                            <!--                                                            <div>MBBS</div>-->
                            <!--                                                            <span class="time">2001 - 2003</span>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </li>-->
                            <!--                                                <li>-->
                            <!--                                                    <div class="experience-user">-->
                            <!--                                                        <div class="before-circle"></div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="experience-content">-->
                            <!--                                                        <div class="timeline-content">-->
                            <!--                                                            <a href="#/" class="name">International College of Medical-->
                            <!--                                                                Science (PG)</a>-->
                            <!--                                                            <div>MD - Obstetrics & Gynaecology</div>-->
                            <!--                                                            <span class="time">1997 - 2001</span>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </li>-->
                            <!--                                            </ul>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="card-box mb-0">-->
                            <!--                                        <h3 class="card-title">Experience</h3>-->
                            <!--                                        <div class="experience-box">-->
                            <!--                                            <ul class="experience-list">-->
                            <!--                                                <li>-->
                            <!--                                                    <div class="experience-user">-->
                            <!--                                                        <div class="before-circle"></div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="experience-content">-->
                            <!--                                                        <div class="timeline-content">-->
                            <!--                                                            <a href="#/" class="name">Consultant Gynecologist</a>-->
                            <!--                                                            <span class="time">Jan 2014 - Present (4 years 8 months)</span>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </li>-->
                            <!--                                                <li>-->
                            <!--                                                    <div class="experience-user">-->
                            <!--                                                        <div class="before-circle"></div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="experience-content">-->
                            <!--                                                        <div class="timeline-content">-->
                            <!--                                                            <a href="#/" class="name">Consultant Gynecologist</a>-->
                            <!--                                                            <span class="time">Jan 2009 - Present (6 years 1 month)</span>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </li>-->
                            <!--                                                <li>-->
                            <!--                                                    <div class="experience-user">-->
                            <!--                                                        <div class="before-circle"></div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="experience-content">-->
                            <!--                                                        <div class="timeline-content">-->
                            <!--                                                            <a href="#/" class="name">Consultant Gynecologist</a>-->
                            <!--                                                            <span class="time">Jan 2004 - Present (5 years 2 months)</span>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </li>-->
                            <!--                                            </ul>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                        <div class="tab-pane" id="bottom-tab2">

                        </div>
                        <div class="tab-pane" id="bottom-tab3">
                            <div class="table-responsive">
                                <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <!--                                    <th>Code Patient</th>-->
                                        <th>Reference</th>
                                        <th>Patient</th>
                                        <th>Infirmière(ier)</th>
                                        <th>Age</th>
                                        <th>Médecin</th>
                                        <th>Departement</th>
                                        <th>Date de consultation</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = "SELECT * from consultation where id_nurse='$id_nurse'";
                                    $q = $db->query($query);
                                    while ($row = $q->fetch()) {
                                        $id_con = $row['id_con'];
                                        $ref_con = $row['ref_con'];
                                        $id_patient = $row['id_patient'];
                                        $id_depart = $row['id_depart'];
                                        $id_medecin = $row['id_medecin'];
                                        $id_nurse = $row['id_nurse'];
                                        $date_con = $row['date_con'];
                                        $temp = $row['temp'];
                                        $taille = $row['taille'];
                                        $pression = $row['pression'];
                                        $poids = $row['poids'];


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

                                        $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($tables as $table) {
                                            $nom_medecin= $table['nom_m'] . ' ' . $table['prenom_m'];
                                        }

                                        $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($tables as $table) {
                                            $departement= $table['nom'] ;
                                        }
                                        if(empty($id_medecin)){
                                            $nom_medecin='N/A';
                                        }
                                        if(empty($id_nurse)){
                                            $nom_nurse='N/A';
                                        }
                                        if(empty($id_depart)){
                                            $departement='N/A';
                                        }

                                        ?>
                                        <tr>
                                            <td><?=$ref_con?></td>
                                            <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                     class="rounded-circle m-r-5"
                                                     alt=""> <?=$nom_patient?>
                                            </td>
                                            <td><?=$nom_nurse?></td>
                                            <td><?=$age?></td>
                                            <td><?=$nom_medecin?></td>
                                            <td><?=$departement?></td>
                                            <td><?= dateToFrench($date_con, " j F Y")?></td>
                                            <td class="text-right">
                                                <!--                                                <div class="dropdown dropdown-action">-->
                                                <!--                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"-->
                                                <!--                                                       aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>-->
                                                <!--                                                    <div class="dropdown-menu dropdown-menu-right">-->
                                                <!--                                                        <a class="dropdown-item" href="#" data-toggle="modal"-->
                                                <!--                                                           data-target="#delete_patient"><i class="fas fa-random"></i>-->
                                                <!--                                                            Transférer</a>-->
                                                <!--                                                        <a class="dropdown-item" href="edit-appointment.html"><i-->
                                                <!--                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>-->
                                                <!--                                                        <a class="dropdown-item" href="#" data-toggle="modal"-->
                                                <!--                                                           data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i>-->
                                                <!--                                                            Delete</a>-->
                                                <!--                                                    </div>-->
                                                <!--                                                </div>-->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab4">
                            <div class="table-responsive">
                                    <!-- mets seulement la table-->
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab5">
                            Tab content 5
                        </div>
                        <div class="tab-pane" id="bottom-tab6">
                            Tab content 6
                        </div>
                        <div class="tab-pane" id="bottom-tab7">
                            <div class="table-responsive">
                                <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                    <thead>
                                    <tr align="center">
                                        <th>Patient</th>
                                        <th>Infimière</th>
                                        <th>Médecin</th>
                                        <th>Type d'hospitalisation</th>
                                        <th>N° chambre</th>
                                        <th>N° lit</th>
                                        <th>Nbre de jour</th>
                                        <th>Date</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = "SELECT * from hospitalisation where id_nurse='$id_nurse' and open_close!=1";
                                    $q = $db->query($query);
                                    while ($row = $q->fetch()) {
                                        $id_hosp = $row['id_hosp'];
                                        $ref_hosp = $row['ref_hosp'];
                                        $id_patient = $row['id_patient'];
                                        $id_nurse = $row['id_nurse'];
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
                                            $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
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
//                                $sql = "SELECT DISTINCT * from service where id_service = '$id_service'";
//
//                                $stmt = $db->prepare($sql);
//                                $stmt->execute();
//
//                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//                                foreach ($tables as $table) {
//                                    $service= $table['nom'] ;
//                                }
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
                                        <tr align="center">
                                            <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                     class="rounded-circle m-r-5"
                                                     alt=""><a href="#"><?=$nom_patient?></a></td>
                                            <td><a href="#"> <?=$nom_nurse?></a></td>
                                            <td><a href="#"> <?=$nom_medecin?></a></td>
                                            <td><a href="#"> <?=$type_hosp?></a></td>
                                            <td><a href="#"> <?=$chambre?></a></td>
                                            <td><a href="#"><?=$lit?></a></td>
                                            <td><a href="#"><?=$nb_jour?></a></td>
                                            <td><a href="#"><?= dateToFrench($date_hosp, " j F Y")?></a></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                       aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <!--                                                <a class="dropdown-item" href="#" data-toggle="modal"-->
                                                        <!--                                                   data-target="#delete_patient"><i class="fas fa-random"></i>-->
                                                        <!--                                                    Transférer</a>-->
                                                        <a class="dropdown-item" href="modifier_hospitalisation.php?id=<?=$id_hosp?>"><i
                                                                    class="fas fa-pen"></i> Edit</a>
                                                        <a class="dropdown-item" href="delete_hospitalisation.php?id=<?=$id_hosp?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab8">
                            Tab content 8
                        </div>
                        <div class="tab-pane" id="bottom-tab9">
                            Tab content 9
                        </div>

                    </div>
                </div>
            </div>

            <!--                Main Body-->
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


    <!--//Footer-->
<?php
include('foot.php');
?>