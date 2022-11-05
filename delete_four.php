<?php

include("php/dbconnect.php");


if (isset($_REQUEST['ids'])) {
    $id_four = $_REQUEST['ids'];


    $query = "DELETE FROM fournisseur WHERE id_four='$id_four'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_four.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_four.php?witness=-1';
            </script>";
    }
}


?>