<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

if (isset($_REQUEST['id'])) {
    $id_maint_marche = $_REQUEST['id'];
    $id_chantier = $_REQUEST['id_chantier'];
    // echo $id_personnel;

    $query = "DELETE FROM maintenance_chantier WHERE id_maint_chantier='$id_maint_chantier'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                    alert('Maintenance a été supprimé.');
                window.location.href='details_chantier.php?id=$id_chantier&witness=1';
            </script>";
    } else {

        echo "<script>
                    alert('Maintenance n\'a pas été supprimé.');
                window.location.href='details_chantier.php?id=$id_chantier&witness=-1';
            </script>";
    }
}


?>
