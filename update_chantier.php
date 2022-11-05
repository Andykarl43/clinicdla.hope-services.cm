<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    // ------------ infos sur le marché
    // $ref_marche = $_POST['ref_marche'];
    // $date_begin_marche = $_POST['date_begin_marche'];
    // $objet_marche = $_POST['objet_marche'];
    // $montant_ttc_marche = $_POST['montant_ttc_marche'];

    // ------------ infos sur le chantier
    $id = $_POST['id_chantier'];
    $nom_chantier = $_POST['nom_chantier'];
    $adresse_chantier = $_POST['adresse_chantier'];
    $objet_chantier = $_POST['objet_chantier'];
    $date_begin_chantier = $_POST['date_begin_chantier'];
    $tel_chantier = $_POST['tel_chantier'];
    $id_personnel = $_POST['id_personnel'];
    $id_pers_pointeur = $_POST['id_pers_pointeur'];
    $id_pers_con = $_POST['id_pers_con'];
    $id_pers_ges = $_POST['id_pers_ges'];
    $cout_h_moy_chantier = $_POST['cout_h_moy_chantier'];
    $dure_chantier = $_POST['dure_chantier'];
    $etat = $_POST['etat'];
    $montant_chantier = $cout_h_moy_chantier * $dure_chantier;

    // echo $etat;


    // echo 'ref:'.$ref_marche.'</br>';
    // echo 'date_marche:'.$date_begin_marche.'</br>';
    // echo 'objet_marche:'.$objet_marche.'</br>';
    // echo 'montant_ttc_marche:'.$montant_ttc_marche.'</br></br>';

    // echo 'nom_chantier:'.$nom_chantier.'</br>';
    // echo 'adresse_chantier:'.$adresse_chantier.'</br>';
    // echo 'objet_chantier:'.$objet_chantier.'</br>';
    // echo 'date_begin_chantier:'.$date_begin_chantier.'</br>';
    // echo 'tel_chantier:'.$tel_chantier.'</br>';
    // echo 'id_personnel:'.$id_personnel.'</br>';
    // echo 'id_pers_pointeur:'.$id_pers_pointeur.'</br>';
    // echo 'cout_h_moy_chantier:'.$cout_h_moy_chantier.'</br>';
    // echo 'dure_chantier:'.$dure_chantier.'</br>';
    // echo 'montant_chantier:'.$montant_chantier.'</br>';

    $query = " UPDATE etape SET    
                    objet_chantier=:objet_chantier, date_begin_chantier=:date_begin_chantier, montant_ttc_chantier=:montant_chantier  WHERE id_chantier = '$id' ";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':objet_chantier', $objet_chantier);
    $sql->bindParam(':date_begin_chantier', $date_begin_chantier);
    $sql->bindParam(':montant_chantier', $montant_chantier);
    $sql->execute();


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE chantier SET  nom_chantier=:nom_chantier, adresse_chantier=:adresse_chantier, 
                    objet_chantier=:objet_chantiers, date_begin_chantier=:date_begin_chantiers, tel_chantier=:tel_chantier, id_personnel=:id_personnel, id_pers_pointeur=:id_pers_pointeur, id_pers_con=:id_pers_con, 
                    id_pers_ges=:id_pers_ges, cout_h_moy_chantier=:cout_h_moy_chantier, dure_chantier=:dure_chantier, etat=:etat, 
                     montant_ttc_chantier=:montant_chantier  WHERE id_chantier = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':nom_chantier', $nom_chantier);
    $sql1->bindParam(':adresse_chantier', $adresse_chantier);
    $sql1->bindParam(':objet_chantiers', $objet_chantier);
    $sql1->bindParam(':date_begin_chantiers', $date_begin_chantier);
    $sql1->bindParam(':tel_chantier', $tel_chantier);
    $sql1->bindParam(':id_personnel', $id_personnel);
    $sql1->bindParam(':id_pers_pointeur', $id_pers_pointeur);
    $sql1->bindParam(':id_pers_con', $id_pers_con);
    $sql1->bindParam(':id_pers_ges', $id_pers_ges);
    $sql1->bindParam(':cout_h_moy_chantier', $cout_h_moy_chantier);
    $sql1->bindParam(':dure_chantier', $dure_chantier);
    $sql1->bindParam(':etat', $etat);
    $sql1->bindParam(':montant_chantier', $montant_chantier);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Chantier a été bien mis à jour.');
            window.location.href = '<?=$chantier['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Chantier n\'a pas été mis à jour.');
            window.location.href = '<?=$chantier['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
