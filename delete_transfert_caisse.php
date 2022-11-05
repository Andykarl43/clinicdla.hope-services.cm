<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");


if (isset($_REQUEST['id_trans_caisse'])) {
    $id_trans_caisse = $_REQUEST['id_trans_caisse'];

//
//    $query = "DELETE FROM caisse WHERE id_caisse='$id_caisse'";
//    $sql1 = $conn->query($query);


    $open_close = 1;

    $query1 = " UPDATE transfert_caisse SET  open_close=:open_close    
                    WHERE id_trans_caisse= '$id_trans_caisse' ";
    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();





    if ($sql1)
    {
        echo "<script>
                window.location.href='liste_add_caisse.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_add_caisse.php?witness=-1';
            </script>";
    }
}
