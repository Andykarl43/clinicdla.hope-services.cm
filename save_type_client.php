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

    $sql = "INSERT INTO type_client (nom,open_close)
                                  VALUES (?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom, $open_close));

    if ($req) {
        ?>
        <script>
            alert('Type Client a été bien enregistrée.');
            window.location.href = '<?=$liste['option1_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$liste['option1_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>