<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_app = $_REQUEST['id'];


    $query = "DELETE FROM appointment WHERE id_app='$id_app'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_appointment.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_appointment.php?witness=-1';
            </script>";
    }
}


?>