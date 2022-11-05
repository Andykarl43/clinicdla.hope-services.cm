<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");


if (isset($_REQUEST['id_cat_exa'])) {
    $id_cat_exa = $_REQUEST['id_cat_exa'];

//
//    $query = "DELETE FROM caisse WHERE id_caisse='$id_caisse'";
//    $sql1 = $conn->query($query);


    $open_close = 1;

    $query1 = " UPDATE cat_exa SET  open_close=:open_close    
                    WHERE id_ca_exa= '$id_ca_exa' ";
    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();





    if ($sql1)
    {
        echo "<script>
                window.location.href='liste_cat_type_exa.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_cat_type_exa.php?witness=-1';
            </script>";
    }
}
