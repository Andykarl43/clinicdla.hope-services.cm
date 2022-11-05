<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

if (isset($_REQUEST['id'])) {
    $id_maint_marche = $_REQUEST['id'];
    $id_marche = $_REQUEST['id_marche'];
    // echo $id_personnel;

    $query = "DELETE FROM maintenance_marche WHERE id_maint_marche='$id_maint_marche'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                    alert('Maintenance a été supprimé.');
                window.location.href='details_marche.php?id=$id_marche&witness=1';
            </script>";
    } else {

        echo "<script>
                    alert('Maintenance n\'a pas été supprimé.');
                window.location.href='details_marche.php?id=$id_marche&witness=-1';
            </script>";
    }
}


?>
