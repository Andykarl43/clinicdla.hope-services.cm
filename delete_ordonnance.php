<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_ordo = $_REQUEST['id'];


    $query = "DELETE FROM ordonnance WHERE id_ordo='$id_ordo'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_ordonnance.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_ordonnance.php?witness=-1';
            </script>";
    }
}


?>