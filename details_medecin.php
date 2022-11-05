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

//     /*-------------------- DETAILS FOURNISSEURS  --------------------*/
     $nom_m = $row['nom_m'];
     $prenom_m = $row['prenom_m'];
     $adress_m = $row['adress_m'];
    // $username_m = $row['username_m'];
     $email_m = $row['email_m'];
     $genre_m = $row['genre_m'];
     $date_m = $row['date_m'];
     $pays_m = $row['pays_m'];
     $ville_m = $row['ville_m'];
     $region_m = $row['region_m'];
    // $code_postal_m = $row['code_postal_m'];
     $phone_m = $row['phone_m'];
   //  $biography_m = $row['biography_m'];
     $statut_m = $row['statut_m'];
     //$date_aniv_m = $row['date_aniv_m'];

     if(strlen($id_medecin)<=4){
         $num=$id_medecin;
         //N°   0008  /  01  /Pdt/SG/ONIGC/22
         $numeroref = substr_replace("0000",$num, -strlen($num));
        // $ref_dem_ent='N° '.$numeroref.' / '.$month.' /Pdt/SG/ONIGC/'.$years;
         $ID_Medecin= 'M'.$numeroref;

     }else{
         $num=$id_medecin;
         //N°   00008  /  01  /Pdt/SG/ONIGC/22
         $numeroref = substr_replace("00000",$num, -strlen($num));
        // $ref_dem_ent='N° '.$numeroref.' / '.$month.' /Pdt/SG/ONIGC/'.$years;
         $ID_Medecin= 'M'.$numeroref;
     }

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du Médecin : </h1>
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

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <?php
                        if( $lvl == 4 || $lvl == 7 ){
                        ?>
                        <a href="modifier_medecin.php?id=<?=$id_medecin?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>
                            Editer Profile</a>
                            <?php } ?>
                    </div>
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
                                                <h3 class="user-name m-t-0 mb-0"><?php if($nom_m=="" or $prenom_m==""){echo 'N/A';}else{echo  $nom_m . ' ' . $prenom_m;} ?></h3>
                                                <small class="text-muted"></small>
                                                <div class="staff-id">ID Medecin: <?php if($id_medecin==0){echo 'N/A';}else{echo  $ID_Medecin;} ?></div>
                                                <div class="staff-msg"><a href="#" class="btn btn-primary">Send
                                                        Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?php if($phone_m==""){echo 'N/A';}else{echo  $phone_m;} ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?php if($email_m==""){echo 'N/A';}else{echo  $email_m;} ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text"><?php if($date_m==""){echo 'N/A';}else{echo  $date_m;} ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php if($adress_m==""){echo 'N/A';}else{echo  $adress_m;} ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Sexe:</span>
                                                    <span class="text"><?php if($genre_m==""){echo 'N/A';}else{echo  $genre_m;} ?></span>
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
                            <li class="nav-item"><a class="nav-link" href="liste_commission_solde.php?id=<?=$id_medecin?>" >Soldes de services</a>
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
                                                    <input class="form-control" type="text" name="matricule" value="<?=$ID_Medecin?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label> Nom<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="nom_ing"
                                                           value="<?=$nom_m?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Prénom</label>
                                                    <input class="form-control" type="text" value="<?=$prenom_m?>" disabled>
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
                                                    <input class="form-control" type="email" value="<?=$email_m?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Birthday <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" value="<?=$date_m?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone </label>
                                                    <input class="form-control" type="text" value="<?=$phone_m?>" disabled>
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
                            <div class="table-responsive">
                                <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Code Patient</th>
                                        <th>Patient</th>
                                        <th>Age</th>
                                        <th>Médecin</th>
                                        <th>Department</th>
                                        <th>Rendez-vous</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = "SELECT * from appointment where id_medecin='$id_medecin'";
                                    $q = $db->query($query);
                                    while ($row = $q->fetch()) {
                                        $id_app = $row['id_app'];
                                        $ref_app = $row['ref_app'];
                                        $id_patient = $row['id_patient'];
                                        $id_depart = $row['id_depart'];
                                        $id_medecin = $row['id_medecin'];
                                        $date_app = $row['date_app'];
                                        $time_app = $row['time_app'];
                                        $statut_app = $row['statut_app'];


                                        ?>
                                        <tr>
                                            <td><?= $ref_app ?></td>
                                            <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                     class="rounded-circle m-r-5" alt="">
                                                <?php

                                                $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    echo $table['nom_p'].' '.$table['prenom_p'];

                                                    echo'</td>';
                                                    echo'<td>'.$table['age_p'].'</td>';
                                                }

                                                ?>

                                            <td><?php

                                                $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    echo $table['nom_m'].' '.$table['prenom_m'];


                                                }

                                                ?></td>
                                            <td><?php

                                                $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    echo $table['nom'];


                                                }



                                                ?></td>
                                            <td><?= dateToFrench($date_app, "l j F Y")?></td>
                                            <td><?=$time_app?></td>
                                            <td><?php


                                                if($statut_app==0)
                                                    echo'<span class="custom-badge status-green">active</span>';
                                                else
                                                    echo'<span class="custom-badge status-red">Inactive</span>';


                                                ?>

                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                       aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit-appointment.html"><i
                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#delete_appointment"><i
                                                                    class="fa fa-trash-o m-r-5"></i>
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

                                    $query = "SELECT * from consultation where id_medecin='$id_medecin'";
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
                                <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Code Patient</th>
                                        <th>Patient</th>
                                        <th>Médecin</th>
                                        <th>Type d'examen</th>
                                        <th>Date</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = "SELECT * from examen where id_medecin='$id_medecin' and open_close!=1";
                                    $q = $db->query($query);
                                    while ($row = $q->fetch()) {
                                        $id_exa = $row['id_exa'];
                                        $ref_exa = $row['ref_exa'];
                                        $id_patient = $row['id_patient'];
                                        $id_medecin = $row['id_medecin'];
                                        $date_exa = $row['date_exa'];
                                        $id_type_exa = $row['id_type_exa'];


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

                                        $sql = "SELECT DISTINCT * from type_exa where id_type_exa = '$id_type_exa'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($tables as $table) {
                                            $type_exa= $table['nom'] ;
                                        }
                                        if(empty($id_medecin)){
                                            $nom_medecin='N/A';
                                        }
                                        if(empty($id_type_exa)){
                                            $type_exa='N/A';
                                        }

                                        ?>

                                        <tr>
                                            <td><a href="#"><?=$ref_exa?></a></td>
                                            <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                                 class="rounded-circle m-r-5" alt=""><?=$nom_patient?></a></td>
                                            <td><a href="#"><?=$nom_medecin?></a></td>
                                            <td><a href="#"><?=$type_exa?></a></td>
                                            <td><a href="#"><?= dateToFrench($date_exa, " j F Y")?></a></td>
                                            <td class="text-right">
                                                <!--                                                <div class="dropdown dropdown-action">-->
                                                <!--                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"-->
                                                <!--                                                       aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>-->
                                                <!--                                                    <div class="dropdown-menu dropdown-menu-right">-->
                                                <!--                                                        <a class="dropdown-item" href="#" data-toggle="modal"-->
                                                <!--                                                           data-target="#delete_patient"><i class="fas fa-random"></i>-->
                                                <!--                                                            Transférer</a>-->
                                                <!--                                                        <a class="dropdown-item" href="edit-patient.html"><i-->
                                                <!--                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>-->
                                                <!--                                                        <a class="dropdown-item" href="#" data-toggle="modal"-->
                                                <!--                                                           data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i>-->
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

                                    $query = "SELECT * from hospitalisation where id_medecin='$id_medecin' and open_close!=1";
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
                            <div class="table-responsive">
                                <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Code patient</th>
                                        <th>Patient</th>
                                        <th>Age</th>
                                        <th>Médecin</th>
                                        <th>Department</th>
                                        <th>Chirugien</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $query = "SELECT * from operation where id_medecin='$id_medecin' and open_close!=1";
                                    $q = $db->query($query);
                                    while ($row = $q->fetch()) {
                                        $id_ope = $row['id_ope'];
                                        $ref_ope = $row['ref_ope'];
                                        $id_patient = $row['id_patient'];
                                        $id_medecin = $row['id_medecin'];
                                        $id_inter = $row['id_inter'];
                                        $date_ope = $row['date_ope'];
                                        $resume = $row['resume'];
                                        $obs_ope = $row['obs_ope'];
                                        $id_type_ope = $row['id_type_ope'];
                                        $time_first = $row['time_first'];
                                        $time_last = $row['time_last'];
                                        $id_depart = $row['id_depart'];



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


                                        $sql = "SELECT DISTINCT * from chirugien where id_chirugien = '$id_inter'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($tables as $table) {
                                            $nom_chirugien= $table['nom_c'] . ' ' . $table['prenom_c'];
                                        }

                                        $sql = "SELECT DISTINCT * from type_ope where id_type_ope = '$id_type_ope'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($tables as $table) {
                                            $type_ope= $table['nom'];
                                            $prix_total = $table['prix_t_ope'];
                                        }

                                        $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();

                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($tables as $table) {
                                            $departement= $table['nom'];
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
                                        if(empty($id_inter)){
                                            $nom_chirugien='N/A';
                                        }


                                        ?>

                                        <tr>
                                            <td><?=$ref_ope?></td>
                                            <td><img width="28" height="28" src="assetss/img/user.jpg"
                                                     class="rounded-circle m-r-5"
                                                     alt=""> <?=$nom_patient?>
                                            </td>
                                            <td><?=$age?></td>
                                            <td><?=$nom_medecin?></td>
                                            <td><?=$departement?></td>
                                            <td><?=$nom_chirugien?></td>
                                            <td><?= dateToFrench($date_ope, " j F Y")?></td>
                                            <td><?=$time_first?> - <?=$time_last?></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                       aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#delete_patient"><i class="fas fa-random"></i>
                                                            Transférer</a>
                                                        <a class="dropdown-item" href="modifier_operation.php?id=<?=$id_ope?>"><i
                                                                    class="fas fa-pen"></i> Edit</a>
                                                        <a class="dropdown-item" href="delete_operation.php?id=<?=$id_ope?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php  }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab9">
                            <div class="table-responsive">
                                <form method="post" action="">
                                 
                                </form>
                            </div>
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