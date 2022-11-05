<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_nurse'];
    $nom = $_POST['nom_n'];
    $prenom = $_POST['prenom_n'];
    $user= "N/A";
    $email= $_POST['email_n'];
    $type_n= $_POST['type_n'];
    $genre= $_POST['genre_n'];
    $pass= "N/A";
    $date= $_POST['date_n'];
    $adress= $_POST['adress_n'];
    $pays= $_POST['pays_n'];
    $code= $_POST['code_n'];
    $id_depart = $_POST['id_depart'];
    $phone = $_POST['phone_n'];
    $ville = $_POST['ville_n'];
    $region = $_POST['region_n'];
    $bio_n = $_POST['bio_n'];




    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE nurse SET  type_n=:type_n,nom_n=:nom_n, prenom_n=:prenom_n, user_n=:user_n, email_n=:email_n, 
        genre_n=:genre_n, pass_n=:pass_n, date_n=:date_n, adress_n=:adress_n, code_n=:code_n, id_depart=:id_depart, phone_n=:phone_n, ville_n=:ville_n, region_n=:region_n, pays_n=:pays_n, bio_n=:bio_n    WHERE id_nurse = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':type_n', $type_n);
    $sql1->bindParam(':nom_n', $nom);
    $sql1->bindParam(':prenom_n', $prenom);
    $sql1->bindParam(':user_n', $user);
    $sql1->bindParam(':email_n', $email);
    $sql1->bindParam(':genre_n', $genre);
    $sql1->bindParam(':pass_n', $pass);
    $sql1->bindParam(':date_n', $date);
    $sql1->bindParam(':adress_n', $adress);
    $sql1->bindParam(':code_n', $code);
    $sql1->bindParam(':id_depart', $id_depart);
    $sql1->bindParam(':phone_n', $phone);
    $sql1->bindParam(':ville_n', $ville);
    $sql1->bindParam(':region_n', $region);
    $sql1->bindParam(':pays_n', $pays);
    $sql1->bindParam(':bio_n', $bio_n);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
          //  alert('Infimier a été bien mis à jour.');
            window.location.href = '<?=$nurse['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           // alert('Infimier n\'a pas été mis à jour.');
            window.location.href = '<?=$nurse['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
