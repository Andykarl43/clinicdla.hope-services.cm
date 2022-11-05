<?php

include("php/dbconnect.php");
include("php/db.php");


if (isset($_REQUEST['id_eco'])) {
    $id_eco = $_REQUEST['id_eco'];


//    $query = "DELETE FROM type_eco WHERE id_type_eco='$id_type_eco'";
//    $sql = $conn->query($query);

    $open_close = 1;

    $query1 = " UPDATE ecographie SET  open_close=:open_close    
                    WHERE id_eco = '$id_eco' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        echo "<script>
                window.location.href='liste_ecographie.php.php?witness=1';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_ecographie.php.php?witness=-1';
            </script>";
    }
}


?>