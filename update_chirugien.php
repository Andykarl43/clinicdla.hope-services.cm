<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_chirugien'];
    $nom = $_POST['nom_c'];
    $prenom = $_POST['prenom_c'];
    $user= $_POST['user_c'];
    $email= $_POST['email_c'];
    $type_c= $_POST['type_c'];
    $genre= $_POST['genre_c'];
    $pass= $_POST['pass_c'];
    $date= $_POST['date_c'];
    $adress= $_POST['adress_c'];
    $pays= $_POST['pays_c'];
    $code= $_POST['code_c'];
    $id_depart = $_POST['id_depart'];
    $phone = $_POST['phone_c'];
    $ville = $_POST['ville_c'];
    $region = $_POST['region_c'];
    $bio = $_POST['bio_c'];




    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE chirugien SET type_c=:type_c ,nom_c=:nom_c, prenom_c=:prenom_c, user_c=:user_c, email_c=:email_c, 
        genre_c=:genre_c, pass_c=:pass_c, date_c=:date_c, adress_c=:adress_c, code_c=:code_c, id_depart=:id_depart, phone_c=:phone_c, ville_c=:ville_c, region_c=:region_c, pays_c=:pays_c, bio_c=:bio_c     WHERE id_chirugien = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':type_c', $type_c);
    $sql1->bindParam(':nom_c', $nom);
    $sql1->bindParam(':prenom_c', $prenom);
    $sql1->bindParam(':user_c', $user);
    $sql1->bindParam(':email_c', $email);
    $sql1->bindParam(':genre_c', $genre);
    $sql1->bindParam(':pass_c', $pass);
    $sql1->bindParam(':date_c', $date);
    $sql1->bindParam(':adress_c', $adress);
    $sql1->bindParam(':code_c', $code);
    $sql1->bindParam(':id_depart', $id_depart);
    $sql1->bindParam(':phone_c', $phone);
    $sql1->bindParam(':ville_c', $ville);
    $sql1->bindParam(':region_c', $region);
    $sql1->bindParam(':pays_c', $pays);
    $sql1->bindParam(':bio_c', $bio);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
          //  alert('Chirugien a été bien mis à jour.');
              window.location.href = '<?=$chirugien['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
          //  alert('Chirugien n\'a pas été mis à jour.');
            window.location.href = '<?=$chirugien['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
