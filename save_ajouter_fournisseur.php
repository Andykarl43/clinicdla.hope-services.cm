<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_regle_four = $_POST['id_regle_four'];
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
            $sql = "INSERT INTO regle_ajouter_fournisseur (id_regle_four, id_fournisseur)
                                VALUES(:id_regle_four,:id_fournisseur)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id_regle_four', $id_regle_four);
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
            window.location.href = 'details_regle_fournisseur.php?id=<?=$id_regle_four?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_regle_fournisseur.php?id=<?=$id_regle_four?>';
        </script>
        <?php

    }


}
?>