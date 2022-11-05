<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_materiel = $_POST['id_materiel'];
    $id_fournisseur = $_POST['id_fournisseur'];

    $id = count($id_fournisseur);
    echo $id . '</br>';


    for ($j = 0; $j < $id; $j++) {
        // echo $diplome[$j].'</br>';
        // echo $session[$j].'</br>';
        // echo $ecole[$j].'</br>';
        // echo $mention[$j].'</br>';
        // echo $j.'</br>';
        if ($id_fournisseur[$j] != "") {
            $sql = "INSERT INTO fournisseur_materiel (id_materiel, id_fournisseur)
                                VALUES(:id_materiel,:id_fournisseur)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id_materiel', $id_materiel);
            $req->bindParam(':id_fournisseur', $id_fournisseur[$j]);
            // $req->bindParam(':session', $session[$j]);
            // $req->bindParam(':ecole', $ecole[$j]);
            // $req->bindParam(':mention', $mention[$j]);
            // $req->bindParam(':rang', $j);
            $req->execute();

            //        $query1 = "UPDATE engin SET id_regle_client=:id_regle_client where id_engin = '$id_client[$j]' ";

            // $sql1 = $db->prepare($query1);

            //      // Bind parameters to statement
            //     $sql1->bindParam(':id_regle_client', $id_regle_client);
            //     $sql1->execute();


        }


    }

    if ($id) {
        ?>
        <script>
            alert('Fournisseur a été ajouter.');
            window.location.href = 'details_materiel.php?id=<?=$id_materiel?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_materiel.php?id=<?=$id_materiel?>';
        </script>
        <?php

    }


}
?>