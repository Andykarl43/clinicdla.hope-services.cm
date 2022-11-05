<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_etape = $_POST['id_etape'];
    $id_personnel = $_POST['id_personnel'];
    $idc = $_POST['idc'];

    $id = count($id_personnel);
    echo $id . '</br>';


    for ($j = 0; $j < $id; $j++) {
        // echo $diplome[$j].'</br>';
        // echo $session[$j].'</br>';
        // echo $ecole[$j].'</br>';
        // echo $mention[$j].'</br>';
        // echo $j.'</br>';
        if ($id_personnel[$j] != "") {
            $sql = "INSERT INTO personnel_etape (id_etape, id_personnel)
                                VALUES(:id_etape,:id_personnel)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id_etape', $id_etape);
            $req->bindParam(':id_personnel', $id_personnel[$j]);
            // $req->bindParam(':session', $session[$j]);
            // $req->bindParam(':ecole', $ecole[$j]);
            // $req->bindParam(':mention', $mention[$j]);
            // $req->bindParam(':rang', $j);
            $req->execute();

            $query1 = "UPDATE personnel SET id_etape=:id_etape where id_personnel = '$id_personnel[$j]' ";

            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':id_etape', $id_etape);
            $sql1->execute();


        }


    }

    if ($id) {
        ?>
        <script>
            alert('Personnel a été bien affecté à cette etape.');
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