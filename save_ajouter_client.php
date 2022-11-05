<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_regle_client = $_POST['id_regle_client'];
    $id_client = $_POST['id_client'];

    $id = count($id_client);
    echo $id . '</br>';


    for ($j = 0; $j < $id; $j++) {
        // echo $diplome[$j].'</br>';
        // echo $session[$j].'</br>';
        // echo $ecole[$j].'</br>';
        // echo $mention[$j].'</br>';
        // echo $j.'</br>';
        if ($id_client[$j] != "") {
            $sql = "INSERT INTO regle_ajouter_client (id_regle_client, id_client)
                                VALUES(:id_regle_client,:id_client)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id_regle_client', $id_regle_client);
            $req->bindParam(':id_client', $id_client[$j]);
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
            alert('Client a été ajouter.');
            window.location.href = 'details_regle_client.php?id=<?=$id_regle_client?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_regle_client.php?id=<?=$id_regle_client?>';
        </script>
        <?php

    }


}
?>