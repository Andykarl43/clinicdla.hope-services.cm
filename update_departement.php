<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    // strtoupper($_POST['nom_quat']);
    echo $id_depart = $_POST['id_depart'];
    echo '</br>'.$id_depart = $_POST['id_depart'];
    echo $nomB = $_POST['nom'];
    echo $nom = ucwords($nomB);
    $open_close = 0;


    $query = "UPDATE departement SET nom=:nom WHERE id_depart ='$id_depart'";

    $req = $db->prepare($query);

    // Bind parameters to statement
    $req->bindParam(':nom', $nomB);
    $req->execute();


    if ($req) {
        ?>
        <script>
            window.location.href = 'liste_departement.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            window.location.href = 'liste_departement.php?witness=-1';
        </script>
        <?php

    }


}
?>