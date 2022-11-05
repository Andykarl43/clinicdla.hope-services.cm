<?php
include('first.php');
include('php/db.php');
include("php/dbconnect.php");


if (isset($_REQUEST['id_type_exa'])) {
    $id_type_exa = $_REQUEST['id_type_exa'];


    $query = "DELETE FROM type_exa WHERE id_type_exa='$id_type_exa'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_type_examen.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_type_examen.php?witness=-1';
            </script>";
    }
}


?>