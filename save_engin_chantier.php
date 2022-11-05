<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_chantier = $_POST['id_chantier'];
    $id_engin = $_POST['id_engin'];
    $idm = $_POST['idm'];

    $id = count($id_engin);
    echo $id . '</br>';


    for ($j = 0; $j < $id; $j++) {
        // echo $diplome[$j].'</br>';
        // echo $session[$j].'</br>';
        // echo $ecole[$j].'</br>';
        // echo $mention[$j].'</br>';
        // echo $j.'</br>';
        if ($id_engin[$j] != "") {
            $sql = "INSERT INTO personnel_engin (id_chantier, id_engin)
                                VALUES(:id_chantier,:id_engin)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id_chantier', $id_chantier);
            $req->bindParam(':id_engin', $id_engin[$j]);
            // $req->bindParam(':session', $session[$j]);
            // $req->bindParam(':ecole', $ecole[$j]);
            // $req->bindParam(':mention', $mention[$j]);
            // $req->bindParam(':rang', $j);
            $req->execute();

            $query1 = "UPDATE engin SET id_chantier=:id_chantier where id_engin = '$id_engin[$j]' ";

            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':id_chantier', $id_chantier);
            $sql1->execute();

            $nul = 0;

            $query2 = "UPDATE engin SET id_etape=:nul where id_engin = '$id_engin[$j]' ";

            $sql2 = $db->prepare($query2);

            // Bind parameters to statement
            $sql2->bindParam(':nul', $nul);
            $sql2->execute();

        }


    }

    if ($id) {
        ?>
        <script>
            alert('Engin a été bien affecté dans le chantier.');
            window.location.href = 'details_chantier.php?id=<?=$id_chantier?>&idm=<?=$idm?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_chantier.php?id=<?=$id_chantier?>&idm=<?=$idm?>';
        </script>
        <?php

    }


}
?>