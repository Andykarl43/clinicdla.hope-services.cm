<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_marche = $_POST['id_marche'];
    $id_partie = $_POST['id_partie'];
    $role = $_POST['role'];


//--------------------------------- insertion un materiel -----------------------------------------//


    $query = " INSERT INTO partenaire (id_marche,id_partie,role) 
                     VALUES (:id_marche,:id_partie,:role)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':id_marche', $id_marche);
    $sql->bindParam(':id_partie', $id_partie);
    $sql->bindParam(':role', $role);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('partennaire a été bien enregistrée.');
            window.location.href = 'details_marche?id=<?=$id_marche?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_marche?id=<?=$id_marche?>';
        </script>
        <?php

    }


}
?>
