<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_marche = $_POST['id_marche'];
    $numero_attache = $_POST['numero_attache'];
    $date_begin = $_POST['date_begin'];
    $montant_paie_ht = $_POST['montant_paie_ht'];

    $query = "SELECT * from marche where id_marche= '$id_marche' ";
    $q = $db->query($query);
    while ($row = $q->fetch()) {

        $montant_ttc = $row['montant_ttc'];


        $montant_paie = $montant_ttc - $montant_paie_ht;


        if ($montant_paie >= 0) {

            $query = " INSERT INTO gestion_paie (id_marche,numero_attache,date_begin,montant_paie_ht,montant_paie_ttc) 
                     VALUES (:id_marche,:numero_attache,:date_begin,:montant_paie_ht,:montant_paie_ttc)";

            $sql = $db->prepare($query);

            // Bind parameters to statement
            $sql->bindParam(':id_marche', $id_marche);
            $sql->bindParam(':numero_attache', $numero_attache);
            $sql->bindParam(':date_begin', $date_begin);
            $sql->bindParam(':montant_paie_ht', $montant_paie_ht);
            $sql->bindParam(':montant_paie_ttc', $montant_paie);
            $sql->execute();

            if ($sql) {
                ?>
                <script>
                    alert('Gestion de paie a été bien enregistrée.');
                    window.location.href = 'details_marche.php?id=<?=$id_marche?>';
                </script>
                <?php
            }

        } elseif ($montant_paie < 0) {

            ?>
            <script>
                alert('Somme inssufisante.');
                window.location.href = 'details_marche.php?id=<?=$id_marche?>';
            </script>
            <?php

        } else {


            ?>
            <script>
                alert('Error.');
                window.location.href = 'details_marche.php?id=<?=$id_marche?>';
            </script>
            <?php

        }


    }


}
?>
