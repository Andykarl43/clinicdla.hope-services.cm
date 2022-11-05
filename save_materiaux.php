<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_materiel = $_POST['ref_materiel'];
    $designation = $_POST['designation'];
    $quantite = $_POST['quantite'];
    $id_cat_materiel = $_POST['id_cat_materiel'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $prix_total = $_POST['prix_total'];
    $alert = $_POST['alert'];
    $open_close = 0;

    $totaux = $prix_unitaire * $quantite;


    if ($quantite >= $alert) {

//--------------------------------- insertion un materiel -----------------------------------------//
        if ($prix_total == $totaux) {

            $query = " INSERT INTO materiel (ref_materiel,designation,quantite,id_cat_materiel,prix_unitaire,prix_total,alert,open_close) 
                     VALUES (:ref_materiel,:designation,:quantite,:id_cat_materiel,:prix_unitaire,:prix_total,:alert,:open_close)";

            $sql = $db->prepare($query);

            // Bind parameters to statement
            $sql->bindParam(':ref_materiel', $ref_materiel);
            $sql->bindParam(':designation', $designation);
            $sql->bindParam(':quantite', $quantite);
            $sql->bindParam(':id_cat_materiel', $id_cat_materiel);
            $sql->bindParam(':prix_unitaire', $prix_unitaire);
            $sql->bindParam(':prix_total', $prix_total);
            $sql->bindParam(':alert', $alert);
            $sql->bindParam(':open_close', $open_close);
            $sql->execute();


            if ($sql) {
                ?>
                <script>
                    alert('materiel a été bien enregistrée.');
                    window.location.href = '<?=$materiaux['option2_link']?>?witness=1';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Error.');
                    window.location.href = '<?=$materiaux['option2_link']?>?witness=-1';
                </script>
                <?php

            }
        } else {

            ?>
            <script>
                alert('Le prix total est incorrect.');
                window.location.href = '<?=$materiaux['option2_link']?>?witness=-1';
            </script>
            <?php


        }


    } else {
        ?>
        <script>
            alert('La valeur du stock alert est incorrect.');
            window.location.href = '<?=$materiaux['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
