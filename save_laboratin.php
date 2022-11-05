<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


//
    $nom_l = strtoupper($_POST['nom_l']);
    $prenom_l = ucfirst(strtolower($_POST['prenom_l']));
     $user_l = "N/A";
     $pass_l = "N/A";
     $email_l = $_POST['email_l'];
    $type_l = $_POST['type_l'];
     $id_depart = $_POST['id_depart'];
     $date_l = $_POST['date_l'];
    $genre_l = $_POST['genre_l'];
     $adress_l = $_POST['adress_l'];
    $pays_l = $_POST['pays_l'];
    $ville_l = $_POST['ville_l'];
    $region_l = "N/A";
    $code_l = "N/A";
    $phone_l = $_POST['phone_l'];
    $bio_l = $_POST['bio_l'];
    // $open_close = 0;
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


    $query = " INSERT INTO laboratin (type_l,nom_l,prenom_l,user_l,email_l,pass_l,id_depart,date_l,genre_l,adress_l,pays_l,ville_l,region_l,code_l,phone_l,bio_l) 
                     VALUES (:type_l,:nom_l,:prenom_l,:user_l,:email_l,:pass_l,:id_depart,:date_l,:genre_l,:adress_l,:pays_l,:ville_l,:region_l,:code_l,:phone_l,:bio_l)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':type_l', $type_l);
    $sql->bindParam(':nom_l', $nom_l);
    $sql->bindParam(':prenom_l', $prenom_l);
    $sql->bindParam(':user_l', $user_l);
    $sql->bindParam(':email_l', $email_l);
    $sql->bindParam(':pass_l', $pass_l);
    $sql->bindParam(':id_depart', $id_depart);
    $sql->bindParam(':date_l', $date_l);
    $sql->bindParam(':genre_l', $genre_l);
    $sql->bindParam(':adress_l', $adress_l);
    $sql->bindParam(':pays_l', $pays_l);
    $sql->bindParam(':ville_l', $ville_l);
    $sql->bindParam(':region_l', $region_l);
    $sql->bindParam(':code_l', $code_l);
    $sql->bindParam(':phone_l', $phone_l);
    $sql->bindParam(':bio_l', $bio_l);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$laboratin['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           //alert('Error.');
            window.location.href = '<?=$laboratin['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
