<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_client'];
    $ref_client = $_POST['ref_client'];
    $raison_social_client = $_POST['raison_social_client'];
    $ville_client = $_POST['ville_client'];
    $tel_client = $_POST['tel_client'];
    $email_client = $_POST['email_client'];
    $pers_contact_client = $_POST['pers_contact_client'];
    $tel_contact_client = $_POST['tel_contact_client'];
    $id_type_client = $_POST['id_type_client'];


    // echo $id.'</br>';
    // echo $ref_client.'</br>';
    // echo $secteur.'</br>';
    // echo $salle.'</br>';
    // echo $ref_client.'</br>';
    // echo $raison_social_client.'</br>';
    //  echo $pays_client.'</br>';
    //  echo $ville_client.'</br>';
    // echo $tel_client.'</br>';
    // echo $email_client.'</br>';
    // echo $pers_contact_client.'</br>';
    // echo $tel_contact_client.'</br>';
    // echo $nom_banque.'</br>';
    // echo $number_card_bancaire.'</br>';
    // echo $day_anciennete.'</br>';
    // echo $month_anciennete.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/

    // $query1 = " INSERT INTO personnel (ref_client,raison_social_client,pays_client,ville_client,tel_client,email_client,pers_contact_client,tel_contact_client,nom_banque,number_card_bancaire,day_anciennete,month_anciennete,year_anciennete)
    // VALUES
    // (:ref_client,:raison_social_client,:pays_client,:ville_client,:tel_client,:email_client,:pers_contact_client,:tel_contact_client,:nom_banque,:number_card_bancaire,:day_anciennete,:month_anciennete,:year_anciennete)";

    $query1 = " UPDATE client SET  ref_client=:ref_client, raison_social_client=:raison_social_client, 
                     ville_client=:ville_client, tel_client=:tel_client, email_client=:email_client, pers_contact_client=:pers_contact_client, tel_contact_client=:tel_contact_client, id_type_client=:id_type_client   
                    WHERE id_client = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':ref_client', $ref_client);
    $sql1->bindParam(':raison_social_client', $raison_social_client);
    $sql1->bindParam(':ville_client', $ville_client);
    $sql1->bindParam(':tel_client', $tel_client);
    $sql1->bindParam(':email_client', $email_client);
    $sql1->bindParam(':pers_contact_client', $pers_contact_client);
    $sql1->bindParam(':tel_contact_client', $tel_contact_client);
    $sql1->bindParam(':id_type_client', $id_type_client);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('client a été bien mis à jour.');
            window.location.href = 'liste_client.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('client n\'a pas été mis à jour.');
            window.location.href = 'liste_client.php?witness=-1';
        </script>
        <?php

    }


}
?>
