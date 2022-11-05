<?php
include('first.php');
include('php/db.php');
include("php/dbconnect.php");


if (isset($_REQUEST['id_type_hosp'])) {
    $id_type_hosp = $_REQUEST['id_type_hosp'];


    $query = "DELETE FROM type_hosp WHERE id_type_hosp='$id_type_hosp'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_type_hospitalisation.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_type_hospitalisation.php?witness=-1';
            </script>";
    }
}


?>