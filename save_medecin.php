<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $nom_m = strtoupper($_POST['nom_m']);
    $prenom_m = ucfirst(strtolower($_POST['prenom_m']));
     $user_m = "N/A";
//     $pass_m = $_POST['password_m'];
    $pass='N/A';
     $email_m = $_POST['email_m'];
     $id_spe = $_POST['id_spe'];
     $type_m = $_POST['type_m'];
     $date_m = $_POST['date_m'];
    $genre_m = $_POST['genre_m'];
     $adress_m = $_POST['adress_m'];
    $pays_m = $_POST['pays_m'];
    $ville_m = $_POST['ville_m'];
//    $region_m = $_POST['region_m'];
//    $code_m = $_POST['code_m'];
    $phone_m = $_POST['phone_m'];
    $bio_m = $_POST['bio_m'];
    $open_close = 0;
    // echo $ref_client.'</br>';
    // echo $raison_social_client.'</br>';
    // echo $id_type_client.'</br>';
    // echo $ville_client.'</br>';
    // echo $email_client.'</br>';
    // echo $pers_contact_client.'</br>';
    // echo $tel_contact_client.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//

    // $query = " INSERT INTO medecin (nom_m,prenom_m,user_m,email_m) 
    //                  VALUES (:nom_m,:prenom_m,:user_m,:email_m)";


    $query = " INSERT INTO medecin (nom_m,prenom_m,user_m,email_m,pass_m,id_spe,type_m,date_m,genre_m,adress_m,pays_m,ville_m,phone_m,bio_m) 
                     VALUES (:nom_m,:prenom_m,:user_m,:email_m,:pass_m,:id_spe,:type_m,:date_m,:genre_m,:adress_m,:pays_m,:ville_m,:phone_m,:bio_m)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':nom_m', $nom_m);
    $sql->bindParam(':prenom_m', $prenom_m);
    $sql->bindParam(':user_m', $user_m);
    $sql->bindParam(':email_m', $email_m);
    $sql->bindParam(':pass_m', $pass_m);
    $sql->bindParam(':id_spe', $id_spe);
    $sql->bindParam(':type_m', $type_m);
    $sql->bindParam(':date_m', $date_m);
    $sql->bindParam(':genre_m', $genre_m);
    $sql->bindParam(':adress_m', $adress_m);
    $sql->bindParam(':pays_m', $pays_m);
    $sql->bindParam(':ville_m', $ville_m);
    $sql->bindParam(':phone_m', $phone_m);
    $sql->bindParam(':bio_m', $bio_m);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$medecin['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           //alert('Error.');
            window.location.href = '<?=$medecin['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
