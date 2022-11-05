<?php
include('php/dbconnect.php');
include('php/db.php');

// function dateToFrench($date, $format){
//     $english_days = array('Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday','Sunday');
//     $french_days = array('Lundi', 'Mardi', 'Mercredi', 'jeudi', 'Vendredi', 'Samedi', 'Dimanche');
//     $english_months = array('January', 'February', 'March','April','May', 'June','July','August', 'September','October', 'November', 'December');
//     $french_months = array('Janvier', 'Février', 'Mars','Avril','Mai', 'Juin','Juillet','Aout', 'Septembre','Octobre', 'Novembre', 'Décembre');
//     return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
// }
// function rav($base){

//     try{
//     $db = new PDO('mysql:host=localhost;dbname=apfood_syges_paie;charset=utf8', 'apfood_syges_paie_root', '5f3V+O)l?}E}');

// }catch(PDOException $e){
//     die('Erreur: '.$e->getMessage());
// }

//     $result =0;
//     $query = "SELECT * FROM rav";
//     $q = $db->query($query);
//     while($row = $q->fetch())
//     {
//         $tranche_min = $row['tranche_min'];
//         $tranche_max = $row['tranche_max'];
//         $redevance = $row['redevance'];

//         if($tranche_min < $base && $base < $tranche_max)
//             $result = $redevance;
//     }
//     return $result;
// }

// function tdl($base){
//     try{
//     $db = new PDO('mysql:host=localhost;dbname=apfood_syges_paie;charset=utf8', 'apfood_syges_paie_root', '5f3V+O)l?}E}');

// }catch(PDOException $e){
//     die('Erreur: '.$e->getMessage());
// }

//     $result =0;
//     $query = "SELECT * FROM tdl";
//     $q = $db->query($query);
//     while($row = $q->fetch())
//     {
//         $tranche_min = $row['tranche_min'];
//         $tranche_max = $row['tranche_max'];
//         $taxe_com = $row['taxe_com'];

//         if($tranche_min < $base && $base < $tranche_max)
//             $result = $taxe_com;
//     }
//     return $result;
// }


header("Content-type: application/vnd-ms-excel");
$filename = "appel-offre-syges-btp.xls";
header("Content-Disposition:attachment;filename = \"$filename\" ");

?>

<table class="table table-bordered" bordered="2">
    <thead>
    <tr class="bg-primary">
        <th><p align="center">Réferences</p></th>
        <th><p align="center">Maître d'ouvrages</p></th>
        <th><p align="center">Objets</p></th>
        <th><p align="center">Date depouillement </p></th>
        <th><p align="center">Projet interne</p></th>
        <th><p align="center">Statut du projet</p></th>
    </tr>
    </thead>
    <tbody>
    <?php

    $query = "SELECT * from appel_offre where open_close !='1' ";
    $q = $db->query($query);
    while ($row = $q->fetch()) {
        $id_offre = $row['id_offre'];
        $id_client = $row['id_client'];
        $ref_offre = $row['ref_offre'];
        $objet = $row['objet'];
        $date_lancement = $row['date_lancement'];
        $montant_offre = $row['montant_offre'];
        $month_offre = $row['month_offre'];
        $statut_interne = $row['statut_interne'];
        $etat_projet = $row['etat_projet'];
        $commentaire = $row['commentaire'];
        $observation = $row['observation'];
        // $month = dateToFrench("$month","F Y");
        $sql1 = "SELECT DISTINCT * from client where id_client = '$id_client'";

        $q1 = $db->query($sql1);
        while ($row1 = $q1->fetch()) {
            $raison = $row1['raison_social_client'];
        }


        ?>

        <tr>
            <td style="width: 10%"><?= $ref_offre ?></td>
            <!--                                                            Matricule-->
            <td style="width: 40%">
                <?php
                echo $raison;

                ?>
            </td>
            <!--                                                            Base-->
            <td><?= $objet ?></td>
            <!--                                                            IRPP-->
            <td><?= $date_lancement ?></td>
            <!--                                                            CAC-->
            <td><?php
                if ($statut_interne == 0) {
                    echo 'En attente';
                } elseif ($statut_interne == 2) {

                    echo 'Invalide';

                } elseif ($statut_interne == 1) {

                    echo 'Valide';
                } ?>

            </td>
            <!--                                                            TDL-->
            <td><?php
                if ($etat_projet == 0) {

                    echo 'En attente';
                } elseif ($etat_projet == 1) {

                    echo 'Gagner';

                } elseif ($etat_projet == 2) {

                    echo 'Perdu';

                } else {
                    echo '-';
                }


                ?></td>
        </tr>
    <?php } ?>

    </tbody>
</table>



