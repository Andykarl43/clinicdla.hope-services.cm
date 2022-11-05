<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {
    

       if(!empty($_POST['genre_c'])){
        ?>
        <script>
            Toast.fire({
                icon: 'warning',
                title: 'vous n\'avez définit le genre'
            })
            window.location.href = '<?=$chirugien['option2_link']?>?witness=-1';
        </script>
        <?php
        $genre_c = $_POST['genre_c'];
    }


//
    $nom_c = strtoupper($_POST['nom_c']);
    $prenom_c = ucfirst(strtolower($_POST['prenom_c']));
     $user_c = "N/A";
     $pass_c = "N/A";
     $email_c = $_POST['email_c'];
     $type_c = $_POST['type_c'];
     $id_depart = $_POST['id_depart'];
     $date_c = $_POST['date_c'];
    
     $adress_c = $_POST['adress_c'];
    $pays_c = $_POST['pays_c'];
    $ville_c = $_POST['ville_c'];
    $region_c = "N/A";
    $code_c = "N/A";
    $phone_c = $_POST['phone_c'];
    $bio_c = $_POST['bio_c'];
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


    $query = " INSERT INTO chirugien (type_c,nom_c,prenom_c,user_c,email_c,pass_c,id_depart,date_c,genre_c,adress_c,pays_c,ville_c,region_c,code_c,phone_c,bio_c) 
                     VALUES (:type_c,:nom_c,:prenom_c,:user_c,:email_c,:pass_c,:id_depart,:date_c,:genre_c,:adress_c,:pays_c,:ville_c,:region_c,:code_c,:phone_c,:bio_c)";

    $sql = $db->prepare($query);
    // Bind parameters to statement
    $sql->bindParam(':type_c', $type_c);
    $sql->bindParam(':nom_c', $nom_c);
    $sql->bindParam(':prenom_c', $prenom_c);
    $sql->bindParam(':user_c', $user_c);
    $sql->bindParam(':email_c', $email_c);
    $sql->bindParam(':pass_c', $pass_c);
    $sql->bindParam(':id_depart', $id_depart);
    $sql->bindParam(':date_c', $date_c);
    $sql->bindParam(':genre_c', $genre_c);
    $sql->bindParam(':adress_c', $adress_c);
    $sql->bindParam(':pays_c', $pays_c);
    $sql->bindParam(':ville_c', $ville_c);
    $sql->bindParam(':region_c', $region_c);
    $sql->bindParam(':code_c', $code_c);
    $sql->bindParam(':phone_c', $phone_c);
    $sql->bindParam(':bio_c', $bio_c);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
          window.location.href = '<?=$chirugien['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           //alert('Error.');
            window.location.href = '<?=$chirugien['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
