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
$filename = "etat_magasin_".$heure.".xls";
header("Content-Disposition:attachment;filename = \"$filename\" ");

?>

<table class="table table-bordered"  border="1">
    <thead>
    <tr class="bg-primary">
        <th><p align="center" style="color: black">Reference </p></th>
        <th><p align="center" style="color: black">Médicaments</p></th>
        <th><p align="center" style="color: black">quantites</p></th>
        <th><p align="center" style="color: black">Categorie</p></th>
        <th><p align="center" style="color: black">Prix unitaire</p></th>
        <th><p align="center" style="color: black">Prix total</p></th>
    </tr>
    </thead>
    <tbody>
    <?php

    $rsc1="N/A";
    $rsc2="N/A";


    $query = "SELECT * from magasin";
    $q = $db->query($query);
    while($row = $q->fetch())
    {
        $id_mag = $row['id_mag'];
        $id_medi = $row['id_medi'];
        $qt_com = $row['qt_com'];
        $prix=$row['prix_ht'];



        $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $ref_medi = $table['ref_medi'];
            $nom_medi= $table['nom_medi'];
            //$prix= $table['prix_unitaire'];
            $id_type_medi= $table['id_type_medi'];
            $prix= $table['prix_unitaire'];

            $sql = "SELECT DISTINCT * from type_medi where id_type_medi = '$id_type_medi'";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tables as $table) {
                $type_medi= $table['nom'];
            }
        }

        if(empty($id_type_medi)){
            $type_medi='N/A';
        }
        if(empty($id_medi)){
            $nom_medi='N/A';
        }

        ?>


        <tr align="center">
<!--            <td align="center"> --><?php //echo $ref_medi; ?><!--   </td>-->
<!--            <td><a href="#"><i class="fas fa-cubes" aria-hidden="true"></i> --><?//=$nom_medi?><!--</a></td>-->
<!--            <td align="center">--><?php //echo number_format($qt_com) ?><!--  </td>-->
<!--            <td align="center">--><?//=$type_medi?><!-- </td>-->
<!--            <td align="center">--><?php //echo number_format($prix) ?><!--  </td>-->
<!--            <td><a href="#">--><?//= number_format($prix*$qt_com) ?><!--</a></td>-->
            <td>
                <?php  echo $ref_medi; ?>
            </td>
            <td >
                <?php  echo $nom_medi; ?>
            </td>
            <!--                                                            Base-->
            <td><?php echo number_format($qt_com) ?></td>
            <td><?=$type_medi?> </td>
            <!--                                                            IRPP-->
            <td><?php echo number_format($prix)?></td>

            <td><?= number_format($prix*$qt_com)?></td>

        </tr>
    <?php } ?>

    </tbody>
</table>



