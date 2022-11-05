<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_laboratin = $_REQUEST['id'];


//    $query = "DELETE FROM laboratin WHERE id_laboratin='$id_laboratin'";
//    $sql = $conn->query($query);

    $query1 = " UPDATE laboratin SET  open_close=:open_close    
                    WHERE id_laboratin='$id_laboratin'";
    $sql1 = $db->prepare($query1);


    if ($sql) {
        echo "<script>
                window.location.href='liste_laboratin.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_laboratin..php?wtness=-1';
            </script>";
    }
}


?>