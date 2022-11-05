<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_hosp = $_REQUEST['id'];


    $query = "DELETE FROM hospitalisation WHERE id_hosp='$id_hosp'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_hospitalisation.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_hospitalisation.php?witness=-1';
            </script>";
    }
}


?>