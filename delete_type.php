<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_type = $_REQUEST['id'];


    $query = "DELETE FROM type WHERE id_type='$id_type'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_type.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_type.php?witness=-1';
            </script>";
    }
}


?>
