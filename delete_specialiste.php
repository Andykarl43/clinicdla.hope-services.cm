<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id_spe'])) {
    $id_spe = $_REQUEST['id_spe'];


    $query = "DELETE FROM specialiste WHERE id_spe='$id_spe'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_specialiste.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_specialiste.php?witness=-1';
            </script>";
    }
}


?>