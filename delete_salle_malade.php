<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id_sal_mal'])) {
    $id_sal_mal = $_REQUEST['id_sal_mal'];


    $query = "DELETE FROM salle_malade WHERE id_sal_mal='$id_sal_mal'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_salle_malade.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_salle_malade.php?witness=-1';
            </script>";
    }
}


?>