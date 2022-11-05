<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    // strtoupper($_POST['nom_quat']);
    $nom = strtoupper($_POST['nom']);
    $open_close = 0;

    $sql = "INSERT INTO type (nom_type)
                                  VALUES (?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom));


    if ($req) {
        ?>
        <script>
            alert('Type d\'appel d\'offre a été bien enregistrée.');
            window.location.href = 'liste_type.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'liste_type.php?witness=-1';
        </script>
        <?php

    }


}
?>