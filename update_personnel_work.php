<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php

if ($_POST) {
    $id = $_POST['id_personnel'];
    $id_etat = $_POST['id_etat'];
    $entreprise = $_POST['entreprise'];
    $reference = $_POST['reference'];
    $fonction = $_POST['fonction'];
    $date_arrive = $_POST['date_arrive'];
    $date_depart = $_POST['date_arrive'];
    $statut = $_POST['statut'];


    // echo $id.'</br>';

    if ($statut == 1) {


        for ($j = 0; $j < 5; $j++) {
            echo $id_etat[$j] . '</br>';
            echo $entreprise[$j] . '</br>';
            echo $reference[$j] . '</br>';
            echo $fonction[$j] . '</br>';
            echo $date_arrive[$j] . '</br>';
            echo $date_depart[$j] . '</br>';

            // $sql = "INSERT INTO etat_academique (diplome, session, ecole, mention)
            //                       VALUES(:diplome,:session, :ecole, :mention)";

            $sql = "UPDATE etat_professionnel SET  entreprise=:entreprise, reference=:reference, fonction=:fonction, date_arrive=:date_arrive, date_depart=:date_depart where id_perso = '$id'  and id_etat_professionnel = '$id_etat[$j]' ";


            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':entreprise', $entreprise[$j]);
            $req->bindParam(':reference', $reference[$j]);
            $req->bindParam(':fonction', $fonction[$j]);
            $req->bindParam(':date_arrive', $date_arrive[$j]);
            $req->bindParam(':date_depart', $date_depart[$j]);
            $req->execute();

        }


        if ($sql) {
            ?>
            <script>
                alert('Personnel a été bien mis à jour.');
                window.location.href = '<?=$personnel['option2_link']?>';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Error.');
                window.location.href = '<?=$personnel['option2_link']?>';
            </script>
            <?php

        }

    } else {

        for ($j = 0; $j < 5; $j++) {
            echo $entreprise[$j] . '</br>';
            echo $reference[$j] . '</br>';
            echo $fonction[$j] . '</br>';
            echo $date_arrive[$j] . '</br>';
            echo $date_depart[$j] . '</br>';
            // echo $j.'</br>';

            $sql = "INSERT INTO etat_professionnel (id_perso,entreprise, reference, fonction, date_arrive, date_depart)
                                VALUES(:id,:entreprise,:reference, :fonction, :date_arrive, :date_depart)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id', $id);
            $req->bindParam(':entreprise', $entreprise[$j]);
            $req->bindParam(':reference', $reference[$j]);
            $req->bindParam(':fonction', $fonction[$j]);
            $req->bindParam(':date_arrive', $date_arrive[$j]);
            $req->bindParam(':date_depart', $date_depart[$j]);
            // $req->bindParam(':rang', $j);
            $req->execute();
        }


        if ($sql) {
            ?>
            <script>
                alert('Personnel a été bien mis à jour.');
                window.location.href = '<?=$personnel['option2_link']?>';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Error.');
                window.location.href = '<?=$personnel['option2_link']?>';
            </script>
            <?php

        }


    }
}


?>