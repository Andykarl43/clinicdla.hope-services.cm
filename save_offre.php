<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_offre = $_POST['ref_offre'];
    $id_card_bank = $_POST['id_card_bank'];
    $id_client = $_POST['id_client'];
    $objet = $_POST['objet'];
    $date_lancement = $_POST['date_lancement'];
    $montant_offre = $_POST['montant_offre'];
    $date_open_offre = $_POST['date_open_offre'];
    $month_offre = $_POST['month_offre'];
    $montant_dao = $_POST['montant_dao'];
    $soumis = $_POST['soumis'];
    $etat_projet = 3;
    $statut_interne = 0;
    $id_type = $_POST['id_type'];
    $open_close = 0;


    // echo $ref_offre.'</br>';
    // // echo $id_card_bank.'</br>';
    // // echo $id_client.'</br>';
    // echo $objet.'</br>';
    // echo $date_lancement.'</br>';
    // echo $montant_offre.'</br>';
    // echo $date_open_offre.'</br>';
    // echo $month_offre.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO appel_offre (ref_offre,id_card_bank,id_client,objet,date_lancement,montant_offre,date_open_offre,month_offre,montant_dao,soumissionaire,id_type,etat_projet,statut_interne,open_close) 
                     VALUES (:ref_offre,:id_card_bank,:id_client,:objet,:date_lancement,:montant_offre,:date_open_offre,:month_offre,:montant_dao,:soumis,:id_type,:etat_projet,:statut_interne,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_offre', $ref_offre);
    $sql->bindParam(':id_card_bank', $id_card_bank);
    $sql->bindParam(':id_client', $id_client);
    $sql->bindParam(':objet', $objet);
    $sql->bindParam(':date_lancement', $date_lancement);
    $sql->bindParam(':montant_offre', $montant_offre);
    $sql->bindParam(':date_open_offre', $date_open_offre);
    $sql->bindParam(':month_offre', $month_offre);
    $sql->bindParam(':montant_dao', $montant_dao);
    $sql->bindParam(':soumis', $soumis);
    $sql->bindParam(':id_type', $id_type);
    $sql->bindParam(':etat_projet', $etat_projet);
    $sql->bindParam(':statut_interne', $statut_interne);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('L\' Appel d\' offre a été bien enregistrée.');
            window.location.href = '<?=$offre['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$offre['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
