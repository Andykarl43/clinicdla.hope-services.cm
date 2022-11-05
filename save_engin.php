<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


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
    $open_close = 0;


    // echo $code.'</br>';
    // echo $id_cat_fournisseur.'</br>';
    // echo $id_cat_engin.'</br>';
    // echo $id_marque_engin.'</br>';
    // echo $serie.'</br>';
    // echo $matricule.'</br>';
    // echo $number_chassis.'</br>';
    // echo $tarif_location.'</br>';
    // echo $cout_horaire.'</br>';
    // echo $id_personnel.'</br>';
    // echo $id_chantier.'</br>';
    // echo $date_arrived.'</br>';
    // echo $date_begin.'</br>';
    // echo $conso_moy_estime.'</br>';
    // echo $open_close.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO engin (code,id_cat_fournisseur,id_cat_engin,id_marque_engin,serie,matricule,number_chassis,tarif_location,cout_horaire,id_personnel,id_chantier,date_arrived,date_begin,conso_moy_estime,open_close) 
                     VALUES (:code,:id_cat_fournisseur,:id_cat_engin,:id_marque_engin,:serie,:matricule,:number_chassis,:tarif_location,:cout_horaire,:id_personnel,:id_chantier,:date_arrived,:date_begin,:conso_moy_estime,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':code', $code);
    $sql->bindParam(':id_cat_fournisseur', $id_cat_fournisseur);
    $sql->bindParam(':id_cat_engin', $id_cat_engin);
    $sql->bindParam(':id_marque_engin', $id_marque_engin);
    $sql->bindParam(':serie', $serie);
    $sql->bindParam(':matricule', $matricule);
    $sql->bindParam(':number_chassis', $number_chassis);
    $sql->bindParam(':tarif_location', $tarif_location);
    $sql->bindParam(':cout_horaire', $cout_horaire);
    $sql->bindParam(':id_personnel', $id_personnel);
    $sql->bindParam(':id_chantier', $id_chantier);
    $sql->bindParam(':date_arrived', $date_arrived);
    $sql->bindParam(':date_begin', $date_begin);
    $sql->bindParam(':conso_moy_estime', $conso_moy_estime);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Engin a été bien enregistrée.');
            window.location.href = '<?=$engin['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$engin['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
