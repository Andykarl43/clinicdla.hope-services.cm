<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_four = $_POST['ref_four'];
    $raison_social_four = $_POST['raison_social_four'];
    $pays_four = $_POST['pays_four'];
    $ville_four = $_POST['ville_four'];
    $tel_four = $_POST['tel_four'];
    $email_four = $_POST['email_four'];
    $pers_contact_four = $_POST['pers_contact_four'];
    $tel_contact_four = $_POST['tel_contact_four'];
    $open_close = 0;


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO fournisseur (ref_four,raison_social_four,pays_four,ville_four,tel_four,email_four,pers_contact_four,tel_contact_four, open_close) 
                     VALUES (:ref_four,:raison_social_four,:pays_four,:ville_four,:tel_four,:email_four,:pers_contact_four,:tel_contact_four,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_four', $ref_four);
    $sql->bindParam(':raison_social_four', $raison_social_four);
    $sql->bindParam(':pays_four', $pays_four);
    $sql->bindParam(':ville_four', $ville_four);
    $sql->bindParam(':tel_four', $tel_four);
    $sql->bindParam(':email_four', $email_four);
    $sql->bindParam(':pers_contact_four', $pers_contact_four);
    $sql->bindParam(':tel_contact_four', $tel_contact_four);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('fournisseur a été bien enregistrée.');
            window.location.href = '<?=$fournisseur['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$fournisseur['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
