<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_nurse = $_REQUEST['id'];

//
//    $query = "DELETE FROM nurse WHERE id_nurse='$id_nurse'";
//    $sql = $conn->query($query);

    $open_close = 1;

    $query1 = " UPDATE nurse SET  open_close=:open_close    
                    WHERE id_nurse='$id_nurse' ";
    $sql1 = $db->prepare($query1);


    if ($sql1) {
        echo "<script>
                window.location.href='liste_nurse.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_nurse.php?witness=-1';
            </script>";
    }
}


?>