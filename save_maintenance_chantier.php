<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $intitule = $_POST['intitule'];
    $date_begin = $_POST['date_begin'];
    $id_ = $_POST['id_chantier'];


//--------------------------------- insertion un materiel -----------------------------------------//


    $query = " INSERT INTO maintenance_marche (intitule,date_begin,id_chantier) 
                     VALUES (:libelle,:date_begin,:id_chantier)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':intitule', $intitule);
    $sql->bindParam(':date_begin', $date_begin);
    $sql->bindParam(':id_chantier', $id_chantier);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Maintenance a été bien enregistrée.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&witness=1';
        </script>
        <?php

    }


}
?>
