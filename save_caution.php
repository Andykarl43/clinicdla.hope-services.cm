<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_offre = $_POST['id_offre'];
    $nom_banque = $_POST['nom_banque'];
    $date_begin = $_POST['date_begin'];
    $montant_caution = $_POST['montant_caution'];
    $etat_caution = $_POST['etat_caution'];;


//--------------------------------- insertion un materiel -----------------------------------------//


    $query = " INSERT INTO caution_bancaire (id_offre,nom_banque,date_begin,etat_caution,montant_caution) 
                     VALUES (:id_offre,:nom_banque,:date_begin,:etat_caution,:montant_caution)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':id_offre', $id_offre);
    $sql->bindParam(':nom_banque', $nom_banque);
    $sql->bindParam(':date_begin', $date_begin);
    $sql->bindParam(':etat_caution', $etat_caution);
    $sql->bindParam(':montant_caution', $montant_caution);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Caution a été bien enregistrée.');
            window.location.href = 'details_offre?id=<?=$id_offre?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_offre?id=<?=$id_offre?>';
        </script>
        <?php

    }


}
?>
