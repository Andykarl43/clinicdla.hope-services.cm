<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_ass = $_POST['ref_ass'];
    $raison_social_ass = ucfirst(strtolower($_POST['raison_social_ass']));
    $pays_ass = $_POST['pays_ass'];
    $ville_ass = $_POST['ville_ass'];
    $tel_ass = $_POST['tel_ass'];
    $email_ass = $_POST['email_ass'];
    $personne_contact = $_POST['personne_contact'];
    $tel_contact_ass = $_POST['tel_contact_ass'];
    $date_ass=date('y-m-d');
    $open_close = 0;


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO assurances (ref_ass,raison_social_ass,pays_ass,ville_ass,tel_ass,email_ass,date_ass,tel_contact, open_close) 
                     VALUES (:ref_ass,:raison_social_ass,:pays_ass,:ville_ass,:tel_ass,:email_ass,:date_ass,:tel_contact_ass,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_ass', $ref_ass);
    $sql->bindParam(':raison_social_ass', $raison_social_ass);
    $sql->bindParam(':pays_ass', $pays_ass);
    $sql->bindParam(':ville_ass', $ville_ass);
    $sql->bindParam(':tel_ass', $tel_ass);
    $sql->bindParam(':email_ass', $email_ass);
    $sql->bindParam(':tel_contact_ass', $tel_contact_ass);
    $sql->bindParam(':date_ass', $date_ass);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Assurances a été bien enregistrée.');
            window.location.href = '<?=$assurances['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$assurances['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
