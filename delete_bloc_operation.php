<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id_bloc_ope'])) {
    $id_bloc_ope = $_REQUEST['id_bloc_ope'];


    $query = "DELETE FROM bloc_operatoire WHERE id_bloc_ope='$id_bloc_ope'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_bloc_operation.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_bloc_operation.php?witness=-1';
            </script>";
    }
}


?>