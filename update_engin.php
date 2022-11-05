<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_engin'];
    $code = $_POST['code'];
    $id_cat_fournisseur = $_POST['id_cat_fournisseur'];
    $id_cat_engin = $_POST['id_cat_engin'];
    $id_marque_engin = $_POST['id_marque_engin'];
    $serie = $_POST['serie'];
    $matricule = $_POST['matricule'];
    $number_chassis = $_POST['number_chassis'];
    $tarif_location = $_POST['tarif_location'];
    $cout_horaire = $_POST['cout_horaire'];
    $id_personnel = $_POST['id_personnel'];
    $id_chantier = $_POST['id_chantier'];
    $date_arrived = $_POST['date_arrived'];
    $date_begin = $_POST['date_begin'];
    $conso_moy_estime = $_POST['conso_moy_estime'];


    // echo $id.'</br>';
    // echo $code.'</br>';
    // echo $secteur.'</br>';
    // echo $salle.'</br>';
    // echo $code.'</br>';
    // echo $data_begin_marche.'</br>';
    //  echo $id_cat_engin.'</br>';
    //  echo $id_marque_engin.'</br>';
    // echo $serie.'</br>';
    // echo $matricule.'</br>';
    // echo $number_chassis.'</br>';
    // echo $tarif_location.'</br>';
    // echo $cout_horaire.'</br>';
    // echo $id_personnel.'</br>';
    // echo $id_chantier.'</br>';
    // echo $date_arrived.'</br>';
    // echo $date_begin.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE engin SET  code=:code, id_cat_fournisseur=:id_cat_fournisseur, 
                    id_cat_engin=:id_cat_engin, id_marque_engin=:id_marque_engin, serie=:serie, matricule=:matricule, number_chassis=:number_chassis, tarif_location=:tarif_location, cout_horaire=:cout_horaire, id_personnel=:id_personnel, id_chantier=:id_chantier, date_arrived=:date_arrived, date_begin=:date_begin, conso_moy_estime=:conso_moy_estime    WHERE id_engin = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':code', $code);
    $sql1->bindParam(':id_cat_fournisseur', $id_cat_fournisseur);
    $sql1->bindParam(':id_cat_engin', $id_cat_engin);
    $sql1->bindParam(':id_marque_engin', $id_marque_engin);
    $sql1->bindParam(':serie', $serie);
    $sql1->bindParam(':matricule', $matricule);
    $sql1->bindParam(':number_chassis', $number_chassis);
    $sql1->bindParam(':tarif_location', $tarif_location);
    $sql1->bindParam(':cout_horaire', $cout_horaire);
    $sql1->bindParam(':id_personnel', $id_personnel);
    $sql1->bindParam(':id_chantier', $id_chantier);
    $sql1->bindParam(':date_arrived', $date_arrived);
    $sql1->bindParam(':date_begin', $date_begin);
    $sql1->bindParam(':conso_moy_estime', $conso_moy_estime);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Engin a été bien mis à jour.');
            window.location.href = '<?=$engin['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Engin n\'a pas été mis à jour.');
            window.location.href = '<?=$engin['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
