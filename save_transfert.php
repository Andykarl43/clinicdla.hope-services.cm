<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_chantier = $_POST['id_chantier'];
    $id_materiel = $_POST['id_materiel'];
    $quantite_chantier = $_POST['quantite_chantier'];
    $date_mag_chantier = $_POST['date_mag_chantier'];

    // echo $id_chantier.'</br>';
    // echo $id_materiel.'</br>';
    // echo $quantite_chantier.'</br>';
    // echo $date_mag_chantier.'</br>';

    $query = "SELECT * from materiel where id_materiel= '$id_materiel' ";
    $q = $db->query($query);
    while ($row = $q->fetch()) {
        // $id = $row['id_materiel'];
        // $ref_materiel = $row['ref_materiel'];
        // $designation = $row['designation'];
        $quantite = $row['quantite'];
        // $id_cat_materiel = $row['id_cat_materiel'];
        $prix_unitaire = $row['prix_unitaire'];
        // $prix_total = $row['prix_total'];


        $quantite_total = $quantite - $quantite_chantier;
        echo $quantite_total . '</br>';


        if ($quantite_total > 0) {

            $totaux = $quantite_total * $prix_unitaire;
            $query1 = "UPDATE materiel SET quantite=:quantite, prix_total=:prix_total where id_materiel = '$id_materiel' ";

            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':quantite', $quantite_total);
            $sql1->bindParam(':prix_total', $totaux);
            $sql1->execute();


            $prix_total = $quantite_chantier * $prix_unitaire;
            echo $prix_total . '</br>';

            $query = " INSERT INTO magasin_chantier (id_chantier,id_materiel,quantite_chantier,date_mag_chantier,prix_unitaire_mag_chantier,prix_total_mag_chantier) 
                    VALUES (:id_chantier,:id_materiel,:quantite_chantier,:date_mag_chantier,:prix_unitaire,:prix_total)";

            $sql = $db->prepare($query);

            // Bind parameters to statement
            $sql->bindParam(':id_chantier', $id_chantier);
            $sql->bindParam(':id_materiel', $id_materiel);
            $sql->bindParam(':quantite_chantier', $quantite_chantier);
            $sql->bindParam(':date_mag_chantier', $date_mag_chantier);
            $sql->bindParam(':prix_unitaire', $prix_unitaire);
            $sql->bindParam(':prix_total', $prix_total);
            $sql->execute();


        } elseif ($quantite_total < 0) {


            ?>
            <script>
                alert('stock insuffisant.');
                window.location.href = 'ajouter_materiel_chantier.php?id_materiel=1&witness=-2';
            </script>
            <?php


        } else {

            ?>
            <script>
                alert('stock du matériel épuiser.');
                window.location.href = 'ajouter_materiel_chantier.php?id_materiel=1&witness=2';
            </script>
            <?php


        }


    }


    if ($id_chantier) {
        ?>
        <script>
            alert('materiel a été bien transférer.');
            window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            // window.location.href='/ajouter_materiel_chantier.php?id_materiel=1&witness=-1';
        </script>
        <?php

    }


}
?>
