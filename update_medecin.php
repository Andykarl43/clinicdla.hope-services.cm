<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_medecin'];
    $nom_m = $_POST['nom_m'];
    $prenom_m = $_POST['prenom_m'];
    $user_m= $_POST['user_m'];
    $email_m= $_POST['email_m'];
    $type_m= $_POST['type_m'];
    $genre_m= $_POST['genre_m'];
//    $pass_m= $_POST['pass_m'];
    $pass_m='N/A';
    $date_m= $_POST['date_m'];
    $adress_m= $_POST['adress_m'];
    $pays_m= $_POST['pays_m'];
//    $code_m= $_POST['code_m'];
    $id_spe = $_POST['id_spe'];
    $phone_m = $_POST['phone_m'];
    $ville_m = $_POST['ville_m'];
//    $region_m = $_POST['region_m'];
    $bio_m = $_POST['bio_m'];




    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE medecin SET  nom_m=:nom_m, prenom_m=:prenom_m, user_m=:user_m, email_m=:email_m, type_m=:type_m, 
        genre_m=:genre_m, pass_m=:pass_m, date_m=:date_m, adress_m=:adress_m, id_spe=:id_spe, phone_m=:phone_m, ville_m=:ville_m,  pays_m=:pays_m, bio_m=:bio_m    WHERE id_medecin = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':nom_m', $nom_m);
    $sql1->bindParam(':prenom_m', $prenom_m);
    $sql1->bindParam(':user_m', $user_m);
    $sql1->bindParam(':email_m', $email_m);
    $sql1->bindParam(':type_m', $type_m);
    $sql1->bindParam(':genre_m', $genre_m);
    $sql1->bindParam(':pass_m', $pass_m);
    $sql1->bindParam(':date_m', $date_m);
    $sql1->bindParam(':adress_m', $adress_m);
//    $sql1->bindParam(':code_m', $code_m);
    $sql1->bindParam(':id_spe', $id_spe);
    $sql1->bindParam(':phone_m', $phone_m);
    $sql1->bindParam(':ville_m', $ville_m);
//    $sql1->bindParam(':region_m', $region_m);
    $sql1->bindParam(':pays_m', $pays_m);
    $sql1->bindParam(':bio_m', $bio_m);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
           // alert('Médecin a été bien mis à jour.');
            window.location.href = '<?=$medecin['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
          //  alert('Médecin n\'a pas été mis à jour.');
            window.location.href = '<?=$medecin['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
