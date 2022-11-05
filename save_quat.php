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


    $nom = ucfirst(strtolower($_POST['nom_quat']));
    $id_ville = $_POST['id_ville'];
    $open_close = 0;

    // echo $nom;
    // echo $id_ville;
    $query = "INSERT INTO quartier (nom,id_ville) VALUES (:nom,:id_ville)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':id_ville', $id_ville);
    $sql->execute();

    if($sql)
    {
        ?>
        <script>
            // alert('Quartier a été enregistré.');
            window.location.href='<?=$liste['option17_link']?>?witness=1';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Error.');
            window.location.href='<?=$liste['option17_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
