<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_chirugien = $_REQUEST['id'];


//    $query = "DELETE FROM chirugien WHERE id_chirugien='$id_chirugien'";
//    $sql = $conn->query($query);

    $open_close = 1;

    $query1 = " UPDATE chirugien SET  open_close=:open_close    
                    WHERE id_chirugien='$id_chirugien' ";
    $sql1 = $db->prepare($query1);


    if ($sql1) {
        echo "<script>
                window.location.href='liste_chirugien.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_chirugien.php?witness=-1';
            </script>";
    }
}


?>