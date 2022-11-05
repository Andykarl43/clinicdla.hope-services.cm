<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    $nom = $_POST['nom'];

    $sql = "INSERT INTO type_engin (nom)
                                  VALUES (?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom));

    if ($req) {
        ?>
        <script>
            alert('Type d\' engin a été bien enregistrée.');
            window.location.href = 'liste_type_engin.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'liste_type_engin.php';
        </script>
        <?php

    }


}
?>