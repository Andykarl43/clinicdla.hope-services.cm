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

$heure = date("G_i");
header("Content-type: application/vnd-ms-excel");
$filename = "etat_pharmacie_".$heure.".xls";
header("Content-Disposition:attachment;filename = \"$filename\" ");

?>

<table class="table table-bordered"  border="1">
    <thead>
    <tr class="bg-primary">
        <th><p align="center" style="color: black">Code Produit </p></th>
        <th><p align="center" style="color: black">Médicaments</p></th>
        <th><p align="center" style="color: black">quantites</p></th>
        <th><p align="center" style="color: black">Categorie</p></th>
        <th><p align="center" style="color: black">Date Peremption</p></th>
        <th><p align="center" style="color: black">Prix unitaire</p></th>
        <th><p align="center" style="color: black">Prix total</p></th>
    </tr>
    </thead>
    <tbody>
    <?php

    $rsc1="N/A";
    $rsc2="N/A";


    $query = "SELECT * from pharmacie";
    $q = $db->query($query);
    while ($row = $q->fetch()) {
        $id_medi = $row['id_medi'];
        $quantite = $row['quantite'];



        $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $id_medi = $table['id_medi'];
            $nom_medi = $table['nom_medi'];
            $ref_medi = $table['ref_medi'];
            $id_type_medi = $table['id_type_medi'];
            $prix_u_a = $table['prix_unitaire'];
            $date_medi = $table['date_medi'];
            $alert_prod = $table['alert_prod'];
            $date_fin = $table['date_fin'];
            $id_four = $table['id_four'];
        }

        $sql = "SELECT DISTINCT * from type_medi where id_type_medi = '$id_type_medi'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $type_medi= $table['nom'];
        }

        ?>


        <tr align="center">
            <td><?=$ref_medi?></td>
            <td><?=$nom_medi?></td>
            <td><?=$quantite?></td>
            <td><?=$type_medi?></td>
            <td><?=$date_medi?></td>
            <td><?=number_format($prix_u_a)?></td>
            <td><?=number_format($quantite*$prix_u_a)?></td>

        </tr>
    <?php } ?>

    </tbody>
</table>



