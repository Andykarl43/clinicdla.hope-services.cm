<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

if (isset($_POST['id_phase_exe'])) {
    $id_phase_exe = $_POST['id_phase_exe'];
    $id_marche = $_POST['id_marche'];
    // echo $id_personnel;

    $query = "DELETE FROM phase_execution WHERE id_phase_exe='$id_phase_exe'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                    alert('Phase d\'exécution a été supprimé.');
                window.location.href='details_marche.php?id=$id_marche&witness=1';
            </script>";
    } else {

        echo "<script>
                    alert('Phase d\'exécution n\'a pas été supprimé.');
                window.location.href='details_marche.php?id=$id_marche&witness=-1';
            </script>";
    }
}


?>
