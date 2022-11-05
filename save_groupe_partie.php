<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_groupe = $_POST['id_groupe'];
    $id_offre = $_POST['id_offre'];
    $id_partie = $_POST['id_partie'];
    $role = $_POST['role'];
    $statut = 1;


    $id = count($id_partie);
    $nb = count($role);
    // echo $id.'</br>';

    $query1 = "UPDATE groupement SET statut=:statut where id_groupe = '$id_groupe' ";

    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':statut', $statut);
    $sql1->execute();


    for ($j = 0; $j < $id; $j++) {
        // echo $diplome[$j].'</br>';
        // echo $session[$j].'</br>';
        // echo $ecole[$j].'</br>';
        // echo $mention[$j].'</br>';
        // echo $j.'</br>';
        if ($id_partie[$j] != "") {

            $sql = "SELECT DISTINCT count(id_partie) as total from groupe_partie where id_partie = '$id_partie[$j]'";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tables as $table) {
                $total = $table['total'];

                if ($total != 1) {

                    $sql = "INSERT INTO groupe_partie (id_groupe, id_partie,role)
                                VALUES(:id_groupe,:id_partie,:role)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_groupe', $id_groupe);
                    $req->bindParam(':id_partie', $id_partie[$j]);
                    $req->bindParam(':role', $role[$j]);
                    // $req->bindParam(':session', $session[$j]);
                    // $req->bindParam(':ecole', $ecole[$j]);
                    // $req->bindParam(':mention', $mention[$j]);
                    // $req->bindParam(':rang', $j);
                    $req->execute();

                    if ($id_groupe) {
                        ?>
                        <script>
                            alert('Partie a été ajouter.');
                            window.location.href = 'details_offre.php?id=<?=$id_offre?>';
                        </script>
                        <?php
                    }

                } else {

                    ?>
                    <script>
                        alert('Partie prenante existe déjà ! ');
                        window.location.href = 'details_offre.php?id=<?=$id_offre?>';
                    </script>
                    <?php


                }
            }


            //        $query1 = "UPDATE engin SET id_regle_client=:id_regle_client where id_engin = '$id_client[$j]' ";

            // $sql1 = $db->prepare($query1);

            //      // Bind parameters to statement
            //     $sql1->bindParam(':id_regle_client', $id_regle_client);
            //     $sql1->execute();


        }


    }


}
?>