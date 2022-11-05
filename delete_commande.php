<?php

include("php/dbconnect.php");


if (isset($_REQUEST['idr'])) {
    $ref_com = $_REQUEST['idr'];
    $id_four = $_REQUEST['idf'];


    $query = "DELETE FROM commande WHERE id_four='$id_four' and ref_com='$ref_com'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_commande.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_commande.php?witness=-1';
            </script>";
    }
}else {

    echo "<script>
                window.location.href='liste_commande.php?witness=-1';
            </script>";
}


?>