<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $nom = ucfirst(strtolower($_POST['nom']));
    $open_close = 0;

    $sql = "INSERT INTO profession (nom,open_close)
                                  VALUES (?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom, $open_close));

    if ($req) {
        ?>
        <script>
          //  alert('Profession a été bien enregistrée.');
            window.location.href = '<?=$liste['option18_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$liste['option18_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
