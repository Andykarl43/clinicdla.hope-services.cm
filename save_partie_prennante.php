<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_partie = $_POST['ref_partie'];
    $raison_social = $_POST['raison_social'];
    $ville = $_POST['ville'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $pers_contact = $_POST['pers_contact'];
    $tel_contact = $_POST['tel_contact'];
    $open_close = 0;

    // echo $ref_partie.'</br>';
    // echo $raison_social.'</br>';
    // echo $id_type_client.'</br>';
    // echo $ville.'</br>';
    // echo $email.'</br>';
    // echo $pers_contact.'</br>';
    // echo $tel_contact.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO partie_prennante (ref_partie,raison_social,ville,tel,email,pers_contact,tel_contact,open_close) 
                     VALUES (:ref_partie,:raison_social,:ville,:tel,:email,:pers_contact,:tel_contact,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_partie', $ref_partie);
    $sql->bindParam(':raison_social', $raison_social);
    $sql->bindParam(':ville', $ville);
    $sql->bindParam(':tel', $tel);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':pers_contact', $pers_contact);
    $sql->bindParam(':tel_contact', $tel_contact);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Partie prennante a été bien enregistrée.');
            window.location.href = '<?=$partie['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$partie['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
