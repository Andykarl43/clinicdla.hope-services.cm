<?php

include("php/dbconnect.php");


if (isset($_POST['id'])) {
    $id_pj = $_POST['id'];
    echo $id_pj;

    $query = "DELETE FROM pj_etat_academique WHERE id_pj='$id_pj'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_pj_aca.php';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_pj_aca.php';
            </script>";
    }
}


?>
