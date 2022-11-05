<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id_sal_soin'])) {
    $id_sal_soin = $_REQUEST['id_sal_soin'];


    $query = "DELETE FROM salle_soin WHERE id_sal_soin='$id_sal_soin'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_salle_soin.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_salle_soin.php?witness=-1';
            </script>";
    }
}


?>