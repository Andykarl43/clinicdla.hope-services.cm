<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_etape = $_POST['id_etape'];
    $id_engin = $_POST['id_engin'];
    $idc = $_POST['idc'];

    $id = count($id_engin);
    echo $id . '</br>';


    for ($j = 0; $j < $id; $j++) {
        // echo $diplome[$j].'</br>';
        // echo $session[$j].'</br>';
        // echo $ecole[$j].'</br>';
        // echo $mention[$j].'</br>';
        // echo $j.'</br>';
        if ($id_engin[$j] != "") {
            $sql = "INSERT INTO engin_etape (id_etape, id_engin)
                                VALUES(:id_etape,:id_engin)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id_etape', $id_etape);
            $req->bindParam(':id_engin', $id_engin[$j]);
            // $req->bindParam(':session', $session[$j]);
            // $req->bindParam(':ecole', $ecole[$j]);
            // $req->bindParam(':mention', $mention[$j]);
            // $req->bindParam(':rang', $j);
            $req->execute();

            $query1 = "UPDATE engin SET id_etape=:id_etape where id_engin = '$id_engin[$j]' ";

            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':id_etape', $id_etape);
            $sql1->execute();


        }


    }

    if ($id) {
        ?>
        <script>
            alert('Engin a été bien affecté à l\'étape.');
            window.location.href = 'details_etape.php?id=<?=$id_etape?>&idc=<?=$idc?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_etape.php?id=<?=$id_etape?>&idc=<?=$idc?>';
        </script>
        <?php

    }


}
?>