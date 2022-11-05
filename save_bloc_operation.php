<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    // strtoupper($_POST['nom_quat']);
    
    $nom1 = strtolower($_POST['nom']);
    $nom2 = ucwords($nom1);
    $open_close = 0;

    $sql = "INSERT INTO bloc_operatoire (nom)
                                  VALUES (?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom2));


    if ($req) {
        ?>
        <script>

                         window.location.href = 'liste_bloc_operation.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
                        window.location.href = 'liste_bloc_operation.php?witness=-1';
        </script>
        <?php

    }


}
?>