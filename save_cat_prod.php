<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    $nom = strtoupper($_POST['nom']);
    $open_close = 0;


    $sql = "INSERT INTO type_medi (nom,open_close)
                                  VALUES (?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom, $open_close));

    if ($req) {
        ?>
        <script>
            //alert('Catégorie matériel a été bien enregistrée.');
            window.location.href = 'liste_cat_prod.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
         //   alert('Error.');
            window.location.href = 'liste_cat_prod.php?witness=-1';
        </script>
        <?php

    }


}
?>