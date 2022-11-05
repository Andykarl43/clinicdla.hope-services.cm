<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    // ------------ infos sur le marché
    $id_marche = $_POST['id_marche'];
    $ref_marche = $_POST['ref_marche'];
    $date_begin_marche = $_POST['date_begin_marche'];
    $objet_marche = $_POST['objet_marche'];
    $montant_ttc_marche = $_POST['montant_ttc_marche'];

    // ------------ infos sur le chantier
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
    $montant_chantier = $cout_h_moy_chantier * $dure_chantier;
    $open_close = 0;
    // en cours=0 et achever=1
    $etat = 0;

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


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO chantier (id_marche,ref_marche,date_begin_marche,objet_marche,montant_ttc_marche,nom_chantier,adresse_chantier,objet_chantier,date_begin_chantier,tel_chantier,id_personnel,id_pers_pointeur,id_pers_con,id_pers_ges,cout_h_moy_chantier,dure_chantier,montant_ttc_chantier,etat,open_close) 
    VALUES (:id_marche,:ref_marche,:date_begin_marche,:objet_marche,:montant_ttc_marche,:nom_chantier,:adresse_chantier,:objet_chantier,:date_begin_chantier,:tel_chantier,:id_personnel,:id_pers_pointeur,:id_pers_con,:id_pers_ges,:cout_h_moy_chantier,:dure_chantier,:montant_chantier,:etat,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':id_marche', $id_marche);
    $sql->bindParam(':ref_marche', $ref_marche);
    $sql->bindParam(':date_begin_marche', $date_begin_marche);
    $sql->bindParam(':objet_marche', $objet_marche);
    $sql->bindParam(':montant_ttc_marche', $montant_ttc_marche);
    $sql->bindParam(':nom_chantier', $nom_chantier);
    $sql->bindParam(':adresse_chantier', $adresse_chantier);
    $sql->bindParam(':objet_chantier', $objet_chantier);
    $sql->bindParam(':date_begin_chantier', $date_begin_chantier);
    $sql->bindParam(':tel_chantier', $tel_chantier);
    $sql->bindParam(':id_personnel', $id_personnel);
    $sql->bindParam(':id_pers_pointeur', $id_pers_pointeur);
    $sql->bindParam(':id_pers_con', $id_pers_con);
    $sql->bindParam(':id_pers_ges', $id_pers_ges);
    $sql->bindParam(':cout_h_moy_chantier', $cout_h_moy_chantier);
    $sql->bindParam(':dure_chantier', $dure_chantier);
    $sql->bindParam(':montant_chantier', $montant_chantier);
    $sql->bindParam(':etat', $etat);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Chantier a été bien enregistrée.');
            window.location.href = '<?=$chantier['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$chantier['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
