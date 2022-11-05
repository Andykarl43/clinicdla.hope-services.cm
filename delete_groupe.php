<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

if (isset($_REQUEST['id'])) {
    $id_groupe = $_REQUEST['id'];
    $id_offre = $_REQUEST['id_offre'];
    // echo $id_personnel;

    $query = "DELETE FROM groupement WHERE id_groupe='$id_groupe'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                    alert('Groupe a été supprimé.');
                window.location.href='details_offre.php?id=$id_offre';
            </script>";
    } else {

        echo "<script>
                    alert('Groupe n\'a pas été supprimé.');
                window.location.href='details_offre.php?id=$id_offre';
            </script>";
    }
}


?>
