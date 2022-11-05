<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $number_fact = $_POST['number_fact'];
    $id_engin = $_POST['id_engin'];
    $id_chantier = $_POST['id_chantier'];
    $montant = $_POST['montant'];
    $motif = $_POST['motif'];
    $open_close = 0;

    if ($montant < 0) {
        $montant = $montant * -1;
    }


    // echo $number_fact.'</br>';
    // echo $id_engin.'</br>';
    // echo $id_chantier.'</br>';
    // echo $montant.'</br>';
    // echo $motif.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO fact_location (number_fact,id_engin,id_chantier,montant,motif,open_close) 
                     VALUES (:number_fact,:id_engin,:id_chantier,:montant,:motif,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':number_fact', $number_fact);
    $sql->bindParam(':id_engin', $id_engin);
    $sql->bindParam(':id_chantier', $id_chantier);
    $sql->bindParam(':montant', $montant);
    $sql->bindParam(':motif', $motif);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Facture de location a été bien enregistrée.');
            window.location.href = '<?=$facture_location['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$facture_location['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
