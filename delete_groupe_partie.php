<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

if ($_REQUEST) {
    $id_groupe_partie = $_REQUEST['id'];
    $id_groupe = $_REQUEST['id_g'];
    // echo $id_personnel;

    $query = "DELETE FROM groupe_partie WHERE id_groupe_partie='$id_groupe_partie'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                    alert('Partie a été supprimé.');
                window.location.href='details_groupement.php?id=$id_groupe';
            </script>";
    } else {

        echo "<script>
                    alert('Partie n\'a pas été supprimé.');
                window.location.href='details_groupement.php?id=$id_groupe';
            </script>";
    }
}


?>
