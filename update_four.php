<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_four'];
    $ref_four = $_POST['ref_four'];
    $raison_social_four= $_POST['raison_social_four'];
    $email_four= $_POST['email'];
    $pays_four= $_POST['pays'];
    $ville_four= $_POST['ville'];
    $tel_four= $_POST['tel'];
    $personne_contact= 0;
    $tel_contact= 'N/A';
    $date_four = date('Y-m-d');




    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE fournisseur SET  ref_four=:ref_four, raison_social_four=:raison_social_four, email_four=:email_four, pays_four=:pays_four, 
        ville_four=:ville_four, tel_four=:tel_four, date_four=:date_four WHERE id_four = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':ref_four', $ref_four);
    $sql1->bindParam(':raison_social_four', $raison_social_four);
    $sql1->bindParam(':email_four', $email_four);
    $sql1->bindParam(':pays_four', $pays_four);
    $sql1->bindParam(':ville_four', $ville_four);
    $sql1->bindParam(':tel_four', $tel_four);
    // $sql1->bindParam(':personne_contact', $personne_contact);
    // $sql1->bindParam(':tel_contact', $tel_contact);
    $sql1->bindParam(':date_four', $date_four);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            //  alert('Chirugien a été bien mis à jour.');
           window.location.href = '<?=$fournisseur['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //  alert('Chirugien n\'a pas été mis à jour.');
            window.location.href = '<?=$fournisseur['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
