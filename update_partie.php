<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_partie'];
    $ref_partie = $_POST['ref_partie'];
    $raison_social = $_POST['raison_social'];
    $ville = $_POST['ville'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $pers_contact = $_POST['pers_contact'];
    $tel_contact = $_POST['tel_contact'];


    // echo $id.'</br>';
    // echo $ref_.'</br>';
    // echo $secteur.'</br>';
    // echo $salle.'</br>';
    // echo $ref_.'</br>';
    // echo $raison_social_.'</br>';
    //  echo $pays_.'</br>';
    //  echo $ville_.'</br>';
    // echo $tel_.'</br>';
    // echo $email_.'</br>';
    // echo $pers_contact_.'</br>';
    // echo $tel_contact_.'</br>';
    // echo $nom_banque.'</br>';
    // echo $number_card_bancaire.'</br>';
    // echo $day_anciennete.'</br>';
    // echo $month_anciennete.'</br>';
    // echo $year_anciennete.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/

    // $query1 = " INSERT INTO personnel (ref_,raison_social_,pays_,ville_,tel_,email_,pers_contact_,tel_contact_,nom_banque,number_card_bancaire,day_anciennete,month_anciennete,year_anciennete)
    // VALUES
    // (:ref_,:raison_social_,:pays_,:ville_,:tel_,:email_,:pers_contact_,:tel_contact_,:nom_banque,:number_card_bancaire,:day_anciennete,:month_anciennete,:year_anciennete)";

    $query1 = " UPDATE partie_prennante  SET  ref_partie=:ref_partie, raison_social=:raison_social, 
                     ville=:ville, tel=:tel, email=:email, pers_contact=:pers_contact, tel_contact=:tel_contact    
                    WHERE id_partie = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':ref_partie', $ref_partie);
    $sql1->bindParam(':raison_social', $raison_social);
    $sql1->bindParam(':ville', $ville);
    $sql1->bindParam(':tel', $tel);
    $sql1->bindParam(':email', $email);
    $sql1->bindParam(':pers_contact', $pers_contact);
    $sql1->bindParam(':tel_contact', $tel_contact);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert(' Partie prenante a été bien mis à jour.');
            window.location.href = 'liste_partie.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Partie n\'a pas été mis à jour.');
            window.location.href = 'liste_partie.php?witness=-1';
        </script>
        <?php

    }


}
?>
