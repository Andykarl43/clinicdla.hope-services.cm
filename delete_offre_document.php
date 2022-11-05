<?php

include("first.php");
include('php/navbar_links.php');
include("php/db.php");


if (isset($_REQUEST['id'])) {
    $id_pj = $_REQUEST['id'];
    $id_offre = $_REQUEST['id_offre'];
    $statut = $_REQUEST['statut'];
    // echo $id_personnel;

    if ($statut == 0) {
        $doc = 0;
        $query = "UPDATE appel_offre SET doc=:doc WHERE id_offre ='$id_offre'";

        $req = $db->prepare($query);

        // Bind parameters to statement
        $req->bindParam(':doc', $doc);
        $req->execute();

    } elseif ($statut == 1) {

        $doc1 = 0;
        $query = "UPDATE appel_offre SET doc1=:doc1 WHERE id_offre ='$id_offre'";

        $req = $db->prepare($query);

        // Bind parameters to statement
        $req->bindParam(':doc1', $doc1);
        $req->execute();

    } else {

        $doc2 = 0;
        $query = "UPDATE appel_offre SET doc2=:doc2 WHERE id_offre ='$id_offre'";

        $req = $db->prepare($query);

        // Bind parameters to statement
        $req->bindParam(':doc2', $doc2);
        $req->execute();


    }


    $query = "DELETE FROM pj_offre_document WHERE id_pj='$id_pj'";
    $sql = $conn->query($query);


    if ($sql) {
        echo "<script>
                window.location.href='details_offre.php?id=$id_offre';
            </script>";
    } else {

        echo "<script>
                window.location.href='details_offre.php?id=$id_offre';
            </script>";
    }
}


?>
