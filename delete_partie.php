<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

if (isset($_REQUEST['id'])) {
    $id_part = $_REQUEST['id'];
    $id_marche = $_REQUEST['id_m'];
    // echo $id_personnel;

    $query = "DELETE FROM partenaire WHERE id_part='$id_part'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                    alert('Partenaire a été supprimé.');
                window.location.href='details_marche.php?id=$id_marche';
            </script>";
    } else {

        echo "<script>
                    alert('Partenaire n\'a pas été supprimé.');
                window.location.href='details_marche.php?id=$id_marche';
            </script>";
    }
}


?>
