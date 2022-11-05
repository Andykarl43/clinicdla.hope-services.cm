<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_ope = $_REQUEST['id'];


    $query = "DELETE FROM operation WHERE id_ope='$id_ope'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_operation.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_operation.php?witness=-1';
            </script>";
    }
}


?>