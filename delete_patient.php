<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_app = $_REQUEST['id'];


    $query = "DELETE FROM patient WHERE id_app='$id_app'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_patient.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_patient.php?witness=-1';
            </script>";
    }
}


?>