<?php
include('first.php');
include('php/db.php');
include("php/dbconnect.php");


if (isset($_REQUEST['id_type_ope'])) {
    $id_type_ope = $_REQUEST['id_type_ope'];


    $query = "DELETE FROM type_ope WHERE id_type_ope='$id_type_ope'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_type_operation.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_type_operation.php?witness=-1';
            </script>";
    }
}


?>