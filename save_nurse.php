<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $nom_n = $_POST['nom_n'];
    $nom_n = strtoupper($nom_n);
    $prenom_n = ucfirst(strtolower($_POST['prenom_n']));
     $user_n = "N/A";
     $pass_n = "N/A";
     $email_n = $_POST['email_n'];
     $type_n = $_POST['type_n'];
     $id_depart = $_POST['id_depart'];
     $date_n = $_POST['date_n'];
    $genre_n = $_POST['genre_n'];
     $adress_n = $_POST['adress_n'];
    $pays_n = $_POST['pays_n'];
    $ville_n = $_POST['ville_n'];
    $region_n = "N/A";
    $code_n = "N/A";
    $phone_n = $_POST['phone_n'];
    $bio_n = $_POST['bio_n'];
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


    $query = " INSERT INTO nurse (type_n,nom_n,prenom_n,user_n,email_n,pass_n,id_depart,date_n,genre_n,adress_n,pays_n,ville_n,region_n,code_n,phone_n,bio_n) 
                     VALUES (:type_n,:nom_n,:prenom_n,:user_n,:email_n,:pass_n,:id_depart,:date_n,:genre_n,:adress_n,:pays_n,:ville_n,:region_n,:code_n,:phone_n,:bio_n)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':type_n', $type_n);
    $sql->bindParam(':nom_n', $nom_n);
    $sql->bindParam(':prenom_n', $prenom_n);
    $sql->bindParam(':user_n', $user_n);
    $sql->bindParam(':email_n', $email_n);
    $sql->bindParam(':pass_n', $pass_n);
    $sql->bindParam(':id_depart', $id_depart);
    $sql->bindParam(':date_n', $date_n);
    $sql->bindParam(':genre_n', $genre_n);
    $sql->bindParam(':adress_n', $adress_n);
    $sql->bindParam(':pays_n', $pays_n);
    $sql->bindParam(':ville_n', $ville_n);
    $sql->bindParam(':region_n', $region_n);
    $sql->bindParam(':code_n', $code_n);
    $sql->bindParam(':phone_n', $phone_n);
    $sql->bindParam(':bio_n', $bio_n);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$nurse['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           //alert('Error.');
            window.location.href = '<?=$nurse['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
