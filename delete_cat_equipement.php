<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_cat_eq = $_REQUEST['id'];


    $query = "DELETE FROM categorie_equipement WHERE id_cat_eq='$id_cat_eq'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_cat_equipement.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_cat_equipement.php?witness=-1';
            </script>";
    }
}


?>
