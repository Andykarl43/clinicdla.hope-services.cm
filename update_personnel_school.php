<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php

if ($_POST) {
    $id = $_POST['id_personnel'];
    $id_etat = $_POST['id_etat'];
    $diplome = $_POST['diplome'];
    $session = $_POST['session'];
    $ecole = $_POST['ecole'];
    $mention = $_POST['mention'];
    $statut = $_POST['statut'];

    if ($statut == 1) {

        // echo $id.'</br>';


        for ($j = 0; $j < 5; $j++) {
            echo $id_etat[$j] . '</br>';
            echo $diplome[$j] . '</br>';
            echo $session[$j] . '</br>';
            echo $ecole[$j] . '</br>';
            echo $mention[$j] . '</br>';

            // $sql = "INSERT INTO etat_academique (diplome, session, ecole, mention)
            //                       VALUES(:diplome,:session, :ecole, :mention)";

            $sql = "UPDATE etat_academique SET  diplome=:diplome, session=:session, ecole=:ecole, mention=:mention where id_perso = '$id'  and id_etat_academique = '$id_etat[$j]' ";


            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':diplome', $diplome[$j]);
            $req->bindParam(':session', $session[$j]);
            $req->bindParam(':ecole', $ecole[$j]);
            $req->bindParam(':mention', $mention[$j]);
            $req->execute();

        }


        if ($sql) {
            ?>
            <script>
                alert('Personnel a été bien enregistrée.');
                // window.location.href='<?=$personnel['option2_link']?>';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Personnel existe déjà.');
                window.location.href = '<?=$personnel['option2_link']?>';
            </script>
            <?php

        }


    } else {

        for ($j = 0; $j < 5; $j++) {
            // echo $diplome[$j].'</br>';
            // echo $session[$j].'</br>';
            // echo $ecole[$j].'</br>';
            // echo $mention[$j].'</br>';
            // echo $j.'</br>';

            $sql = "INSERT INTO etat_academique (id_perso, diplome, session, ecole, mention)
                                VALUES(:id,:diplome,:session, :ecole, :mention)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id', $id);
            $req->bindParam(':diplome', $diplome[$j]);
            $req->bindParam(':session', $session[$j]);
            $req->bindParam(':ecole', $ecole[$j]);
            $req->bindParam(':mention', $mention[$j]);
            // $req->bindParam(':rang', $j);
            $req->execute();
        }

        if ($sql) {
            ?>
            <script>
                alert('Personnel a été bien enregistrée.');
                // window.location.href='<?=$personnel['option2_link']?>';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Personnel existe déjà.');
                window.location.href = '<?=$personnel['option2_link']?>';
            </script>
            <?php

        }


    }


}
?>