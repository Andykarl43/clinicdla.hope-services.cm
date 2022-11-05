<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_offre = $_POST['id_offre'];
    $nom_groupe = $_POST['nom_groupe'];
    $date_begin = $_POST['date_begin'];
    $statut = 0;


//--------------------------------- insertion un materiel -----------------------------------------//


    $query = " INSERT INTO groupement (id_offre,nom_groupe,date_begin,statut) 
                     VALUES (:id_offre,:nom_groupe,:date_begin,:statut)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':id_offre', $id_offre);
    $sql->bindParam(':nom_groupe', $nom_groupe);
    $sql->bindParam(':date_begin', $date_begin);
    $sql->bindParam(':statut', $statut);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Groupement a été bien enregistrée.');
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
