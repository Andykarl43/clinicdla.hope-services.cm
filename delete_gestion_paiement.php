<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

if (isset($_POST['id_ges_paie'])) {
    $id_ges_paie = $_POST['id_ges_paie'];
    $id_marche = $_POST['id_marche'];
    // echo $id_personnel;

    $query = "DELETE FROM gestion_paie WHERE id_ges_paie='$id_ges_paie'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                    alert('Geston de paie a été supprimé.');
                window.location.href='details_marche.php?id=$id_marche&witness=1';
            </script>";
    } else {

        echo "<script>
                    alert('Geston de paie n\'a pas été supprimé.');
                window.location.href='details_marche.php?id=$id_marche&witness=-1';
            </script>";
    }
}


?>
