<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_patient'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $user= $_POST['user'];
    $email= $_POST['email'];
    $genre= $_POST['genre'];
    $date= $_POST['date_aniv'];
    $adress= $_POST['adress'];
    $pays= $_POST['pays'];
//    $code= $_POST['code'];
    $phone = $_POST['phone'];
    $ville = $_POST['ville'];
//    $region = $_POST['region'];
    $bio = $_POST['bio'];
    $id_ent = $_POST['id_ent'];
    $id_ass = $_POST['id_ass'];

    $query = "SELECT round( DATEDIFF( now(), :date_aniv) / 365) as ager";
    $sql = $db->prepare($query);
    $sql->bindParam(':date_aniv', $date);
    $sql->execute();
    while ($row = $sql->fetch()) {
        $ager = $row["ager"];
    }




    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE patient SET  nom_p=:nom_p, prenom_p=:prenom_p, username_p=:username_p, age_p=:age, email_p=:email_p, 
        genre_p=:genre_p, date_aniv_p=:date_aniv_p, adresse_p=:adresse_p,  phone_p=:phone_p, ville_p=:ville_p,  pays_p=:pays_p, biography_p=:biography_p, id_ent=:id_ent, id_ass=:id_ass    WHERE id_patient = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':nom_p', $nom);
    $sql1->bindParam(':prenom_p', $prenom);
    $sql1->bindParam(':username_p', $user);
    $sql1->bindParam(':age', $ager);
    $sql1->bindParam(':email_p', $email);
    $sql1->bindParam(':genre_p', $genre);
    $sql1->bindParam(':date_aniv_p', $date);
    $sql1->bindParam(':adresse_p', $adress);
//    $sql1->bindParam(':code_postal_p', $code);
    $sql1->bindParam(':phone_p', $phone);
    $sql1->bindParam(':ville_p', $ville);
//    $sql1->bindParam(':region_p', $region);
    $sql1->bindParam(':pays_p', $pays);
    $sql1->bindParam(':biography_p', $bio);
    $sql1->bindParam(':id_ent', $id_ent);
    $sql1->bindParam(':id_ass', $id_ass);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
         //   alert('Patient a été bien mis à jour.');
            window.location.href = '<?=$patient['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           // alert('Patient n\'a pas été mis à jour.');
            window.location.href = '<?=$patient['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
