<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_fact_location'];
    $number_fact = $_POST['number_fact'];
    $id_engin = $_POST['id_engin'];
    $id_chantier = $_POST['id_chantier'];
    $montant = $_POST['montant'];
    $motif = $_POST['motif'];


    // echo $id.'</br>';
    // echo $number_fact.'</br>';
    // echo $secteur.'</br>';
    // echo $salle.'</br>';
    // echo $number_fact.'</br>';
    // echo $id_engin.'</br>';
    //  echo $id_chantier.'</br>';
    //  echo $montant.'</br>';
    // echo $motif.'</br>';
    // echo $email_four.'</br>';
    // echo $pers_contact_four.'</br>';
    // echo $tel_contact_four.'</br>';
    // echo $nom_banque.'</br>';
    // echo $number_card_bancaire.'</br>';
    // echo $day_anciennete.'</br>';
    // echo $month_anciennete.'</br>';
    // echo $year_anciennete.'</br>';


    $query1 = " UPDATE fact_location SET  number_fact=:number_fact, id_engin=:id_engin, 
                    id_chantier=:id_chantier, montant=:montant, motif=:motif    
                    WHERE id_fact_location = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':number_fact', $number_fact);
    $sql1->bindParam(':id_engin', $id_engin);
    $sql1->bindParam(':id_chantier', $id_chantier);
    $sql1->bindParam(':montant', $montant);
    $sql1->bindParam(':motif', $motif);

    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Facture de location a été bien mis à jour.');
            window.location.href = '<?=$facture_location['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Facture de location n\'a pas été mis à jour.');
            window.location.href = '<?=$facture_location['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
