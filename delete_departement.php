<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id_depart'])) {
    $id_depart = $_REQUEST['id_depart'];


    $query = "DELETE FROM departement WHERE id_depart='$id_depart'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_departement.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_departement.php?witness=-1';
            </script>";
    }
}


?>