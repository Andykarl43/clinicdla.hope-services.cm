<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    $nom = $_POST['nom'];

    $sql = "INSERT INTO pays (nom)
                                  VALUES (?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom));

    if($req)
    {
        ?>
        <script>
            // alert('Pays a été supprimé.');
            window.location.href='<?=$liste['option16_link']?>?witness=1';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Pays n\'a pas été ajouté.');
            window.location.href='<?=$liste['option16_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
