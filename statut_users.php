<?php
include('first.php');
include('php/main_side_navbar.php');


if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $statut = "";


    $query = "SELECT * FROM users WHERE id_users = $id_user";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {
        $statut = $row['statut'];
    }

//echo $statut;


    if ($statut === "A")
        $statut = "D";
    else
        $statut = "A";

    echo $statut;

    try {
        // Create prepared statement info project
        $query = "UPDATE users SET statut=:statut WHERE id_users =:id";

        $req = $db->prepare($query);

        // Bind parameters to statement
        $req->bindParam(':statut', $statut);
        $req->bindParam(':id', $id_user);

        $req->execute();

        if ($req) {
            echo "<script>
                window.location.href='liste_utilisateurs.php';
            </script>";

        } else {

            echo "<script>
                window.location.href='liste_utilisateurs.php';
            </script>";
        }


    } catch (PDOException $e) {
        die("ERROR: Could not able to execute. " . $e->getMessage());
    }
}


?>
