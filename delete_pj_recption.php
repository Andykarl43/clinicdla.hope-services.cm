<?php

include("php/dbconnect.php");


if (isset($_REQUEST['id'])) {
    $id_pj_rec = $_REQUEST['id'];
    $id_marche = $_REQUEST['id_marche'];
    // echo $id_personnel;

    $query = "DELETE FROM pj_reception WHERE id_pj_rec='$id_pj_rec'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='liste_pj_reception.php?id=<?=$id_rec_marche?>';
            </script>";
    } else {

        echo "<script>
                window.location.href='liste_pj_reception.php?id=<?=$id_rec_marche?>';
            </script>";
    }
}


?>
