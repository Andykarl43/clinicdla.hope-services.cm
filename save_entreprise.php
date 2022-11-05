<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
//strtolower(); // ecrire en miniscule
//strtoupper(); // ecrire en majiscule
//ucfirst(strtolower()): // ecrire first word en majiscule
?>

<?php

if ($_POST) {


    $ref_ent = $_POST['ref_ent'];
    $raison_social_ent = ucfirst(strtolower($_POST['raison_social_ent']));
   $pays_ent = $_POST['pays_ent'];
    $ville_ent = $_POST['ville_ent'];
    $tel_ent = $_POST['tel_ent'];
    $email_ent = $_POST['email_ent'];
    $personne_contact = $_POST['personne_contact'];
    $tel_contact_ent = $_POST['tel_contact_ent'];
     $date_ent=date('Y-m-d');
    $open_close = 0;


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO entreprises (ref_ent,raison_social_ent,pays_ent,ville_ent,tel_ent,email_ent,date_ent,tel_contact, open_close) 
                     VALUES (:ref_ent,:raison_social_ent,:pays_ent,:ville_ent,:tel_ent,:email_ent,:date_ent,:tel_contact_ent,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_ent', $ref_ent);
    $sql->bindParam(':raison_social_ent', $raison_social_ent);
    $sql->bindParam(':pays_ent', $pays_ent);
    $sql->bindParam(':ville_ent', $ville_ent);
    $sql->bindParam(':tel_ent', $tel_ent);
    $sql->bindParam(':email_ent', $email_ent);
    $sql->bindParam(':tel_contact_ent', $tel_contact_ent);
    $sql->bindParam(':date_ent', $date_ent);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('entreprise a été bien enregistrée.');
            window.location.href = '<?=$entreprise['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$entreprise['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
