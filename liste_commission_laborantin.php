<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');
$id_medecin = $_REQUEST['id'];

$sql = "SELECT DISTINCT * from laboratin where id_laboratin = '$id_medecin'";

$stmt = $db->prepare($sql);
$stmt->execute();

$tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($tables as $table) {
    $nom_medecin=$table['nom_l'].' '.$table['prenom_l'];
}

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Commissions du spécialiste: <?=$nom_medecin?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
                <!--                Main Body              -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th><p align="center">Services</p></th>
                                    <th><p align="center">Commissions(%)</p></th>
                                    <th><p align="center">Spécialistes</p></th>
                                    <th><p align="center">Nombre de fois </p></th>
                                    <th><p align="center">Reste à payer</p></th>
                                    <th><p align="center">Payer</p></th>
                                    <th><p align="center">Solde total</p></th>
                                    <th><p align="center">Règlement</p></th>
                                    <th><p align="center">Date</p></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sum=0; $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0; $sum6=0; $sum7=0;

                                $query = "SELECT * from commission where id_entite='$id_medecin' and type_entite='M' and open_close!=1";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_comi = $row['id_comi'];
                                    $ref_comi = $row['ref_comi'];
                                    $id_service = $row['id_service'];
                                    $comi = $row['comi'];
                                     $date_reg_comi='N/A';

                                    //---consultation----//
                                    switch ($id_service){
                                        case '1';
                                            $ct=0;
                                            $sql = "SELECT DISTINCT * from regler_comi_consul where id_spe='$id_medecin' and type_spe='M'  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $payer_comi= $table['payer_comi'];
                                                $somme_comi= $table['somme_comi'];
                                                $id_reg_comi_consul= $table['id_reg_comi'];
                                                $ct++;
                                            }
                                            if(!empty($id_reg_comi_consul)){
                                            }else{
                                                $id_reg_comi_consul=0;
                                            }

                                            if($ct==0){ $payer_comi=0; $somme_comi=0;}


                                            $prix_total_consul=0;
                                            $total_consul=0;
                                            $payer_consul=0;
                                            $sql = "SELECT id_type_consul  from regler_consul where id_medecin = '$id_medecin' and (payer+remise)-somme=0 ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {

                                                $total_consul+=1;
                                                $id_type_consul=$table['id_type_consul'];

                                                $sql = "SELECT DISTINCT * from type_consul where id_type_consul = '$id_type_consul'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    $prix_t_consul= $table['prix_t_consul'];
                                                }
                                                $prix_total_consul+=(int) round(($prix_t_consul*$comi)/100);
                                                $sum1=$prix_total_consul;
                                            }


                                            break;
                                        case '2';
                                            //-------Examen-------//

                                            $ct=0;
                                            $sql = "SELECT DISTINCT * from regler_comi_exa where id_spe='$id_medecin' and type_spe='M'  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $payer_comi= $table['payer_comi'];
                                                $somme_comi= $table['somme_comi'];
                                                $id_reg_comi_exa= $table['id_reg_comi'];
                                                $ct++;
                                            }
                                            if(!empty($id_reg_comi_exa)){
                                            }else{
                                                $id_reg_comi_exa=0;
                                            }
                                            if($ct==0){ $payer_comi=0; $somme_comi=0;}

                                            $prix_total_exa=0;
                                            $total_exa=0;
                                            $payer_exa=0;
                                            $sql = "SELECT DISTINCT *  from regler_examen where id_lab = '$id_medecin' and (payer+remise)-somme=0";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $total_exa+=1;
                                                $id_type_exa=$table['id_type_exa'];

                                                $sql = "SELECT DISTINCT * from type_exa where id_type_exa = '$id_type_exa'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    $prix_t_exa= $table['prix_t_exa'];
                                                }
                                                $prix_total_exa+=(int) round(($prix_t_exa*$comi)/100);
                                                $sum2=$prix_total_exa;
                                            }
                                            break;
                                        case '3';

                                            $ct=0;
                                            $sql = "SELECT DISTINCT * from regler_comi_hosp where id_spe='$id_medecin' and type_spe='M'  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $payer_comi= $table['payer_comi'];
                                                $somme_comi= $table['somme_comi'];
                                                $id_reg_comi_hosp= $table['id_reg_comi'];
                                                $ct++;
                                            }
                                            if(!empty($id_reg_comi_hosp)){
                                            }else{
                                                $id_reg_comi_hosp=0;
                                            }
                                            if($ct==0){ $payer_comi=0; $somme_comi=0;}

                                            //-------Hospitalisations-------//
                                            $prix_total_hosp=0;
                                            $total_hosp=0;
                                            $payer_hosp=0;
                                            $sql = "SELECT DISTINCT * from regler_hosp where id_medecin = '$id_medecin' and (payer+remise)-somme=0 ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $total_hosp+=1;
                                                $id_type_hosp=$table['id_type_hosp'];

                                                $sql = "SELECT DISTINCT * from type_hosp where id_type_hosp = '$id_type_hosp'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    $prix_t_hosp= $table['prix_t_hosp'];
                                                }
                                                $prix_total_hosp+=(int) round(($prix_t_hosp*$comi)/100);
                                                $sum3=$prix_total_hosp;
                                            }
                                            break;
                                        case '4';
                                            $ct=0;
                                            $sql = "SELECT DISTINCT * from regler_comi_ordo where id_spe='$id_medecin' and type_spe='M'  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $payer_comi= $table['payer_comi'];
                                                $somme_comi= $table['somme_comi'];
                                                $id_reg_comi_ordo= $table['id_reg_comi'];
                                                $ct++;
                                            }
                                            if(!empty($id_reg_comi_ordo)){
                                            }else{
                                                $id_reg_comi_ordo=0;
                                            }
                                            if($ct==0){ $payer_comi=0; $somme_comi=0;}

                                            //-------Ordonnances-------//
                                            $prix_total_ordo=0;
                                            $total_ordo=0;
                                            $payer_ordo=0;
                                            $sql = "SELECT DISTINCT * from regler_ordo where id_medecin = '$id_medecin' and (payer+remise)-somme=0 and etat=1";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $total_ordo+=1;
                                                $prix_t_ordo=$table['payer'];


                                                $prix_total_ordo+=(int) round(($prix_t_ordo*$comi)/100);
                                                $sum4=$prix_total_ordo;
                                            }

                                            break;
                                        case '5';

                                            $ct=0;
                                            $sql = "SELECT DISTINCT * from regler_comi_ope where id_spe='$id_medecin' and type_spe='M'  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $payer_comi= $table['payer_comi'];
                                                $somme_comi= $table['somme_comi'];
                                                $id_reg_comi_ope= $table['id_reg_comi'];
                                                $ct++;
                                            }
                                            if(!empty($id_reg_comi_ope)){
                                            }else{
                                                $id_reg_comi_ope=0;
                                            }
                                            if($ct==0){ $payer_comi=0; $somme_comi=0;}

                                            //-------Opérations-------//
                                            $prix_total_ope=0;
                                            $total_ope=0;
                                            $payer_ope=0;
                                            $sql = "SELECT id_type_ope  from regler_ope where id_medecin = '$id_medecin' and (payer+remise)-somme=0";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $total_ope+=1;
                                                $id_type_ope=$table['id_type_ope'];

                                                $sql = "SELECT DISTINCT * from type_ope where id_type_ope = '$id_type_ope'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    $prix_t_ope= $table['prix_t_ope'];
                                                }
                                                $prix_total_ope+= (int) round(($prix_t_ope*$comi)/100);
                                                $sum5=$prix_total_ope;
                                            }
                                            break;
                                        case '6';


                                            $ct=0;
                                            $sql = "SELECT DISTINCT * from regler_comi_anes where  id_spe='$id_medecin' and type_spe='M'  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $payer_comi= $table['payer_comi'];
                                                $somme_comi= $table['somme_comi'];
                                                $id_reg_comi_anes= $table['id_reg_comi'];
                                                $ct++;
                                            }
                                            if(!empty($id_reg_comi_anes)){
                                            }else{
                                                $id_reg_comi_anes=0;
                                            }


                                            if($ct==0){ $payer_comi=0; $somme_comi=0;}
                                            //-------Anesthésie-------//
                                            $prix_total_anes=0;
                                            $total_anes=0;
                                            $payer_anes=0;
                                            $sql = "SELECT id_type_anes  from regler_anesthesie where id_medecin = '$id_medecin' and (payer+remise)-somme =0  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $total_anes+=1;
                                                $id_type_anes=$table['id_type_anes'];

                                                $sql = "SELECT DISTINCT * from type_anes where id_type_anes = '$id_type_anes'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    $prix_t_anes= $table['prix_t_anes'];
                                                }
                                                $prix_total_anes+=(int) round(($prix_t_anes*$comi)/100);
                                                $sum6=$prix_total_anes;
                                            }
                                            break;
                                        case '7';

                                            $ct=0;
                                            $sql = "SELECT DISTINCT * from regler_comi_eco where  id_spe='$id_medecin' and type_spe='M'  ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $payer_comi= $table['payer_comi'];
                                                $somme_comi= $table['somme_comi'];
                                                $id_reg_comi_eco= $table['id_reg_comi'];
                                                $ct++;
                                            }
                                            if(!empty($id_reg_comi_eco)){
                                            }else{
                                                $id_reg_comi_eco=0;
                                            }
                                            if($ct==0){ $payer_comi=0; $somme_comi=0;}

                                            //-------Ecographie-------//
                                            $prix_total_eco=0;
                                            $total_eco=0;
                                            $sql = "SELECT id_type_eco  from regler_ecographie where id_medecin = '$id_medecin' and (payer+remise)-somme =0 ";

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();

                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tables as $table) {
                                                $total_eco+=1;
                                                $id_type_eco=$table['id_type_eco'];

                                                $sql = "SELECT DISTINCT * from type_eco where id_type_eco = '$id_type_eco'";

                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    $prix_t_eco= $table['prix_t_eco'];
                                                }
                                                $prix_total_eco+= (int) round(($prix_t_eco*$comi)/100);
                                                $sum7=$prix_total_eco;

                                            }
                                            break;

                                    }


                                    //---Exemen----//
                                    $id_entite = $row['id_entite'];
                                    $date_comi = $row['date_comi'];


                                    $sql = "SELECT DISTINCT * from service where id_service = '$id_service'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $service=$table['nom'];
                                    }

                                    $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_entite'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $entite=$table['nom_m'].' '.$table['prenom_m'];
                                    }

                                    ?>

                                    <tr>
                                        <td align="center"><?=$service?>  </td>
                                        <td align="center">
                                            <?php echo number_format($comi) ?>
                                        </td>
                                        <td align="center">
                                            <?=$entite?>
                                        </td>
                                        <td align="center">
                                            <?php  switch ($id_service) { case '1'; echo number_format($total_consul); break; case '2'; echo number_format($total_exa); break; case '3'; echo number_format($total_hosp); break; case '4'; echo number_format($total_ordo);  break; case '5'; echo number_format($total_ope); break; case '6'; echo number_format($total_anes); break; case '7'; echo number_format($total_eco); break; }  ?>
                                        </td>
                                        <td align="center">
                                            <?php switch ($id_service) { case'1'; echo number_format($prix_total_consul-$payer_comi); break;  case'2'; echo number_format($prix_total_exa-$payer_comi); break; case'3'; echo number_format($prix_total_hosp-$payer_comi); break; case'4'; echo number_format($prix_total_ordo-$payer_comi); break; case'5'; echo number_format($prix_total_ope-$payer_comi); break;  case'6'; echo number_format($prix_total_anes-$payer_comi); break; case'7'; echo number_format($prix_total_eco-$payer_comi); break; }?>
                                        </td>
                                        <td align="center">
                                            <?php echo number_format($payer_comi); //switch ($id_service) { case'1'; echo number_format($payer_comi); break; case'2'; echo number_format($payer_comi); break; case'6'; echo number_format($payer_comi); break; }?>
                                        </td>
                                        <td align="center">
                                            <?php    switch ($id_service) { case '1'; echo $prix_total_consul; break; case '2'; echo $prix_total_exa; break; case '3'; echo $prix_total_hosp; break; case '4'; echo $prix_total_ordo; break; case '5'; echo $prix_total_ope; break; case '6'; echo $prix_total_anes; break; case '7'; echo $prix_total_eco; break; } ?>
                                        </td>
                                        <td align="center"><?php
                                            switch ($id_service){

                                                case '1';
                                                    if ($prix_total_consul - $payer_comi == 0) {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-green">Ok</span></a>
//                                                                            ';
                                                        echo '<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Ok</span>';
                                                    } else {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-red">Pas à Jour</span></a>';
                                                        echo '<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Pas à Jour</span>';
                                                    }
                                                    break;


                                                case '2';
                                                    if ($prix_total_exa - $payer_comi == 0) {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-green">Ok</span></a>
//                                                                            ';
                                                        echo '<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Ok</span>';
                                                    } else {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-red">Pas à Jour</span></a>';
                                                        echo '<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Pas à Jour</span>';
                                                    }
                                                    break;

                                                case '3';

                                                    if ($prix_total_hosp - $payer_comi == 0) {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-green">Ok</span></a>
//                                                                            ';
                                                        echo '<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Ok</span>';
                                                    } else {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-red">Pas à Jour</span></a>';
                                                        echo '<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Pas à Jour</span>';
                                                    }
                                                    break;
                                                case '4';
                                                    //ordonnance
                                                    if ($prix_total_ordo - $payer_comi == 0) {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-green">Ok</span></a>
//                                                                            ';
                                                        echo '<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Ok</span>';
                                                    } else {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-red">Pas à Jour</span></a>';
                                                        echo '<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Pas à Jour</span>';
                                                    }
                                                    break;
                                                case '5';
                                                    if ($prix_total_ope - $payer_comi == 0) {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-green">Ok</span></a>
//                                                                            ';
                                                        echo '<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Ok</span>';
                                                    } else {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-red">Pas à Jour</span></a>';
                                                        echo '<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Pas à Jour</span>';
                                                    }
                                                    break;


                                                case '6';
                                                    if ($prix_total_anes - $payer_comi == 0) {

//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-green">Ok</span></a>
//                                                                            ';
                                                        $nom_form="ajouterCon1".$id_service;
                                                        echo '<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Ok</span>';
                                                    } else {

                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-red">Pas à Jour</span></a>';
                                                        echo '<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Pas à Jour</span>';
                                                    }
                                                    break;


                                                case '7';
                                                    if ($prix_total_eco - $payer_comi == 0) {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-green">Ok</span></a>
//                                                                            ';
                                                        echo '<span class="custom-badge status-green" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Ok</span>';
                                                    } else {
                                                        $nom_form="ajouterCon1".$id_service;
//                                            echo'<a
//                                                                            href="modifier_hosp_checker.php?id='.$id_reg_consul.'"
//                                                                            title=""
//                                                                            style="color: black"><span class="custom-badge status-red">Pas à Jour</span></a>';
                                                        echo '<span class="custom-badge status-red" data-toggle="modal" data-target="#ajouterCon1' . $id_service . '">Pas à Jour</span>';
                                                    }
                                                    break;
                                            }

                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <?php  switch ($id_service) { case'1'; echo $date_reg_comi; break; case'2'; echo $date_reg_comi; break; case'3'; echo $date_reg_comi; break; case'4'; echo $date_reg_comi; break; case'5'; echo $date_reg_comi; break; case'6'; echo $date_reg_comi; break; case'7'; echo $date_reg_comi; break;} ?>
                                            
                                            <div class="modal fade" id="<?=$nom_form?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="padding:20px 50px;">
                                                            <h3 align="center"><i class="fas fa-map"></i> <b>Reglement-<?=$id_service?>: <?=$ref_comi?></b></h3>
                                                            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                                                        </div>
                                                        <div class="modal-body" style="padding:40px 50px;">
                                                            <form class="form-horizontal" action="update_comi.php" name="form" method="post">
                                                                <div class="form-group">
                                                                    <label>Montant Recue</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="id_reg" value="<?php  switch ($id_service) { case'1'; echo $id_reg_comi_consul; break; case'2'; echo $prix_total_exa; break; case'3'; echo $prix_total_hosp; break; case'4'; echo $prix_total_ordo; case'5'; echo $prix_total_ope; break; case'6'; echo $id_reg_comi_anes; break; case'7'; echo $prix_total_eco; break;} ?>" class="form-control" >
                                                                        <input type="hidden" name="id_perso" value="<?=$id_perso_session?>" class="form-control" >
                                                                        <input type="hidden" name="id_spe" value="<?=$id_medecin?>" class="form-control" >
                                                                        <input type="hidden" name="id_service" value="<?=$id_service?>" class="form-control" >
                                                                        <input type="hidden" name="type_spe" value="L" class="form-control" >
                                                                        <input type="number" name="payer_comi" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Montant total</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="somme_comi" class="form-control"  value="<?php switch ($id_service) { case'1'; echo $prix_total_consul-$payer_comi; break; case'2'; echo $prix_total_exa-$payer_comi; break; case'3'; echo $prix_total_hosp-$payer_comi; break; case'4'; echo $prix_total_ordo-$payer_comi; break; case'5'; echo $prix_total_ope-$payer_comi; break; case'6'; echo $prix_total_anes-$payer_comi; break; case'7'; echo $prix_total_eco-$payer_comi; break;}?>">
                                                                        <input type="text"  class="form-control"  value="<?php switch ($id_service) { case'1'; echo number_format($prix_total_consul-$payer_comi); break; case'2'; echo number_format($prix_total_exa-$payer_comi); break; case'3'; echo number_format($prix_total_hosp-$payer_comi); break; case'4'; echo number_format($prix_total_ordo-$payer_comi); break;  case'5'; echo number_format($prix_total_ope-$payer_comi); break; case'6'; echo number_format($prix_total_anes-$payer_comi); break; case'7'; echo number_format($prix_total_eco-$payer_comi); break;}?>"disabled="">
                                                                    </div>
                                                                </div>
                                                                <!--                                                                        <div class="form-group">-->
                                                                <!--                                                                            <label>Payer</label>-->
                                                                <!--                                                                            <div class="col-sm-12">-->
                                                                <!--                                                                                <input type="text"  class="form-control"  value="--><?php //switch ($id_service) { case'1'; echo number_format($payer_comi); break; case'6'; echo number_format($payer_comi); break; }?><!--"disabled="">-->
                                                                <!--                                                                            </div>-->
                                                                <!--                                                                        </div>-->
                                                                <div class="form-group">
                                                                    <label>Reste à payer</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="text"  class="form-control"  value="<?php switch ($id_service) { case'1'; echo number_format($prix_total_consul-$payer_comi); break; case'2'; echo number_format($prix_total_exa-$payer_comi); break;  case'3'; echo number_format($prix_total_hosp-$payer_comi); break; case'4'; echo number_format($prix_total_ordo-$payer_comi); break;case'5'; echo number_format($prix_total_ope-$payer_comi); break; case'6'; echo number_format($prix_total_anes-$payer_comi); break; case'7'; echo number_format($prix_total_eco-$payer_comi); break; }?>" disabled="">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if( $lvl == 4 || $lvl == 7 || $lvl == 11 ){
                                                                    ?>
                                                                    <div class="form-group">
                                                                        <label>Caisse <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-sm-12">
                                                                            <select class="form-control"
                                                                                    name="id_caisse">
                                                                                <option value="0" selected="">
                                                                                    ...
                                                                                </option>
                                                                                <?php

                                                                                $iResult = $db->query("SELECT * FROM caisse where open_close!=1 ");

                                                                                while ($data = $iResult->fetch()) {

                                                                                    $i = $data['id_caisse'];
                                                                                    echo '<option value ="' . $i . '">';
                                                                                    echo $data['caisse'];
                                                                                    echo '</option>';

                                                                                }

                                                                                ?>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <center>
                                                                            <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                                                                   value="Payer">

                                                                            <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                                                                   class="btn btn-danger" value="Annuler"/></center>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--                End Body              -->

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!--    Modal pour ajouter Categorie Contrat-->
    <div class="modal fade" id="ajouterOper" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><i class="fas fa-map"></i> <b>Reglement</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="save_pays.php" name="form" method="post">
                        <div class="form-group">
                            <label>Montant Recue</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Montant total</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control" value="500,000" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center>
                                    <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                           value="Créer">

                                    <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                           class="btn btn-danger" value="Annuler"/></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
if (isset($_GET['witness'])) {
    $witness = $_GET['witness'];

    switch ($witness) {
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Versement Incorrecte',
                    text: 'Une erreur s\'est produite!',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Payement supérieur à la somme requis !',
                    text: 'Une erreur s\'est produite!',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>