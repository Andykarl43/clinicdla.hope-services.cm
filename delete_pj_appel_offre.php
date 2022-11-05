<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_pj_offre = $_REQUEST['id'];
    $id_offre = $_REQUEST['id_offre'];
    // echo $id_personnel;

    $query = "DELETE FROM pj_appel_offre WHERE id_pj_offre='$id_pj_offre'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='details_offre.php?id=$id_offre';
            </script>";
    } else {

        echo "<script>
                window.location.href='details_offre.php?id=$id_offre';
            </script>";
    }
}


?>
