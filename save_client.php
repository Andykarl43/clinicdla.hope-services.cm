<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_client = $_POST['ref_client'];
    $raison_social_client = $_POST['raison_social_client'];
    $id_type_client = $_POST['id_type_client'];
    $ville_client = $_POST['ville_client'];
    $tel_client = $_POST['tel_client'];
    $email_client = $_POST['email_client'];
    $pers_contact_client = $_POST['pers_contact_client'];
    $tel_contact_client = $_POST['tel_contact_client'];
    $open_close = 0;
    // echo $ref_client.'</br>';
    // echo $raison_social_client.'</br>';
    // echo $id_type_client.'</br>';
    // echo $ville_client.'</br>';
    // echo $email_client.'</br>';
    // echo $pers_contact_client.'</br>';
    // echo $tel_contact_client.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO client (ref_client,raison_social_client,id_type_client,ville_client,tel_client,email_client,pers_contact_client,tel_contact_client,open_close) 
                     VALUES (:ref_client,:raison_social_client,:id_type_client,:ville_client,:tel_client,:email_client,:pers_contact_client,:tel_contact_client,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_client', $ref_client);
    $sql->bindParam(':raison_social_client', $raison_social_client);
    $sql->bindParam(':id_type_client', $id_type_client);
    $sql->bindParam(':ville_client', $ville_client);
    $sql->bindParam(':tel_client', $tel_client);
    $sql->bindParam(':email_client', $email_client);
    $sql->bindParam(':pers_contact_client', $pers_contact_client);
    $sql->bindParam(':tel_contact_client', $tel_contact_client);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('client a été bien enregistrée.');
            window.location.href = '<?=$client['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$client['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
