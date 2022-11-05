<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_laboratin'];
    $nom = $_POST['nom_l'];
    $prenom = $_POST['prenom_l'];
    $user= "N/A";
    $email= $_POST['email_l'];
    $type_l= $_POST['type_l'];
    $genre= $_POST['genre_l'];
    $pass= "N/A";
    $date= $_POST['date_l'];
    $adress= $_POST['adress_l'];
    $pays= $_POST['pays_l'];
    $code= $_POST['code_l'];
    $id_depart = $_POST['id_depart'];
    $phone = $_POST['phone_l'];
    $ville = $_POST['ville_l'];
    $region = $_POST['region_l'];
    $bio = $_POST['bio_l'];




    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE laboratin SET type_l=:type_l ,nom_l=:nom_l, prenom_l=:prenom_l, user_l=:user_l, email_l=:email_l, 
        genre_l=:genre_l, pass_l=:pass_l, date_l=:date_l, adress_l=:adress_l, code_l=:code_l, id_depart=:id_depart, phone_l=:phone_l, ville_l=:ville_l, region_l=:region_l, pays_l=:pays_l, bio_l=:bio_l    WHERE id_laboratin = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':type_l', $type_l);
    $sql1->bindParam(':nom_l', $nom);
    $sql1->bindParam(':prenom_l', $prenom);
    $sql1->bindParam(':user_l', $user);
    $sql1->bindParam(':email_l', $email);
    $sql1->bindParam(':genre_l', $genre);
    $sql1->bindParam(':pass_l', $pass);
    $sql1->bindParam(':date_l', $date);
    $sql1->bindParam(':adress_l', $adress);
    $sql1->bindParam(':code_l', $code);
    $sql1->bindParam(':id_depart', $id_depart);
    $sql1->bindParam(':phone_l', $phone);
    $sql1->bindParam(':ville_l', $ville);
    $sql1->bindParam(':region_l', $region);
    $sql1->bindParam(':pays_l', $pays);
    $sql1->bindParam(':bio_l', $bio);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
              alert('Laboratin a été bien mis à jour.');
            window.location.href = '<?=$laboratin['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
             alert('Laboratin n\'a pas été mis à jour.');
            window.location.href = '<?=$laboratin['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
