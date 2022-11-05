<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_pj_marche = $_REQUEST['id'];
    $id_marche = $_REQUEST['id_marche'];
    // echo $id_personnel;

    $query = "DELETE FROM pj_marche WHERE id_pj_marche='$id_pj_marche'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='details_marche.php?id=$id_marche';
            </script>";
    } else {

        echo "<script>
                window.location.href='details_marche.php?id=$id_marche';
            </script>";
    }
}


?>
