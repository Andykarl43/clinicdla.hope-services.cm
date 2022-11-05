<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    $nom = ucfirst(strtolower($_POST['nom']));
    $id_pays = $_POST['id_pays'];
    $open_close = 0;

    // echo $nom;
    // echo $id_pays;
    $query = "INSERT INTO ville (nom,id_pays) VALUES (:nom,:id_pays)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':id_pays', $id_pays);
    $sql->execute();

    if($sql)
    {
        ?>
        <script>
            // alert('Vile a été enregistrée.');
            window.location.href='<?=$liste['option15_link']?>?witness=1';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Error.');
            window.location.href='<?=$liste['option15_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
