<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_fournisseur'];
    $ref_four = $_POST['ref_four'];
    $raison_social_four = $_POST['raison_social_four'];
    $pays_four = $_POST['pays_four'];
    $ville_four = $_POST['ville_four'];
    $tel_four = $_POST['tel_four'];
    $email_four = $_POST['email_four'];
    $pers_contact_four = $_POST['pers_contact_four'];
    $tel_contact_four = $_POST['tel_contact_four'];


    // echo $id.'</br>';
    // echo $ref_four.'</br>';
    // echo $secteur.'</br>';
    // echo $salle.'</br>';
    // echo $ref_four.'</br>';
    // echo $raison_social_four.'</br>';
    //  echo $pays_four.'</br>';
    //  echo $ville_four.'</br>';
    // echo $tel_four.'</br>';
    // echo $email_four.'</br>';
    // echo $pers_contact_four.'</br>';
    // echo $tel_contact_four.'</br>';
    // echo $nom_banque.'</br>';
    // echo $number_card_bancaire.'</br>';
    // echo $day_anciennete.'</br>';
    // echo $month_anciennete.'</br>';
    // echo $year_anciennete.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/

    // $query1 = " INSERT INTO personnel (ref_four,raison_social_four,pays_four,ville_four,tel_four,email_four,pers_contact_four,tel_contact_four,nom_banque,number_card_bancaire,day_anciennete,month_anciennete,year_anciennete)
    // VALUES
    // (:ref_four,:raison_social_four,:pays_four,:ville_four,:tel_four,:email_four,:pers_contact_four,:tel_contact_four,:nom_banque,:number_card_bancaire,:day_anciennete,:month_anciennete,:year_anciennete)";

    $query1 = " UPDATE fournisseur SET  ref_four=:ref_four, raison_social_four=:raison_social_four, 
                    pays_four=:pays_four, ville_four=:ville_four, tel_four=:tel_four, email_four=:email_four, pers_contact_four=:pers_contact_four, tel_contact_four=:tel_contact_four    
                    WHERE id_fournisseur = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':ref_four', $ref_four);
    $sql1->bindParam(':raison_social_four', $raison_social_four);
    $sql1->bindParam(':pays_four', $pays_four);
    $sql1->bindParam(':ville_four', $ville_four);
    $sql1->bindParam(':tel_four', $tel_four);
    $sql1->bindParam(':email_four', $email_four);
    $sql1->bindParam(':pers_contact_four', $pers_contact_four);
    $sql1->bindParam(':tel_contact_four', $tel_contact_four);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Fournisseur a été bien mis à jour.');
            window.location.href = 'liste_fournisseur.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Fournisseur n\'a pas été mis à jour.');
            window.location.href = 'liste_fournisseur.php?witness=-1';
        </script>
        <?php

    }


}
?>
