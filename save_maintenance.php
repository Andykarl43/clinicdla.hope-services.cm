<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $intitule = $_POST['intitule'];
    $date_begin = $_POST['date_begin'];
    $id_marche = $_POST['id_marche'];


//--------------------------------- insertion un materiel -----------------------------------------//


    $query = " INSERT INTO maintenance_marche (intitule,date_begin,id_marche) 
                     VALUES (:intitule,:date_begin,:id_marche)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':intitule', $intitule);
    $sql->bindParam(':date_begin', $date_begin);
    $sql->bindParam(':id_marche', $id_marche);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Maintenance a été bien enregistrée.');
            window.location.href = 'details_marche.php?id=<?=$id_marche?>&witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_marche.php?id=<?=$id_marche?>&witness=1';
        </script>
        <?php

    }


}
?>
