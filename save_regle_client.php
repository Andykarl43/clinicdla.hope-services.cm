<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {

    if (!empty(($_POST['id_choix1']))) {

        $id_choix = $_POST['id_choix1'];
        $type = "A";

    } elseif (!empty(($_POST['id_choix2']))) {

        $id_choix = $_POST['id_choix2'];
        $type = "M";

    } elseif (!empty(($_POST['id_choix3']))) {
        $id_choix = $_POST['id_choix3'];
        $type = "C";

    }


    $id_client = $_POST['id_client'];
    $id_card_bank = $_POST['id_card_bank'];
    $date_transaction = $_POST['date_transaction'];

    $date_echeance = $_POST['date_echeance'];
    $montant = $_POST['montant'];
    $avance = $_POST['avance'];
    $id_mode_paiement = $_POST['id_mode_paiement'];
    $cheque = $_POST['cheque'];
    $open_close = 0;

    // echo $id_client.'</br>';
    // echo $id_card_bank.'</br>';
    // echo $date_transaction.'</br>';
    // echo $id_chantier.'</br>';
    // echo $date_echeance.'</br>';
    // echo $montant.'</br>';
    // echo $avance.'</br>';
    // echo $id_mode_paiement.'</br>';
    // echo $reste.'</br>';
    // echo $cheque.'</br

    //---------------------- OPERATION DE VERIFICATION -------------------------//

    $reste = $montant - $avance;


    if ($reste >= 0) {
//--------------------------------- insertion un fournisseur -----------------------------------------//


        $query = " INSERT INTO regle_client (id_client,id_card_bank,date_transaction,id_choix,type,date_echeance,montant,avance,id_mode_paiement,reste,cheque,open_close) 
                     VALUES (:id_client,:id_card_bank,:date_transaction,:id_choix,:type,:date_echeance,:montant,:avance,:id_mode_paiement,:reste,:cheque,:open_close)";

        $sql = $db->prepare($query);

        // Bind parameters to statement
        $sql->bindParam(':id_client', $id_client);
        $sql->bindParam(':id_card_bank', $id_card_bank);
        $sql->bindParam(':date_transaction', $date_transaction);
        $sql->bindParam(':id_choix', $id_choix);
        $sql->bindParam(':type', $type);
        $sql->bindParam(':date_echeance', $date_echeance);
        $sql->bindParam(':montant', $montant);
        $sql->bindParam(':avance', $avance);
        $sql->bindParam(':id_mode_paiement', $id_mode_paiement);
        $sql->bindParam(':reste', $reste);
        $sql->bindParam(':cheque', $cheque);
        $sql->bindParam(':open_close', $open_close);
        $sql->execute();


        if ($sql) {
            ?>
            <script>
                alert('Règlement client a été bien enregistrée.');
                window.location.href = '<?=$reglement_client['option2_link']?>?witness=1';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Error.');
                window.location.href = '<?=$reglement_client['option2_link']?>?witness=-1';
            </script>
            <?php

        }
    } elseif ($reste < 0) {
        ?>
        <script>
            alert('L\'avance ou le montant est incorrect.');
            window.location.href = '<?=$reglement_client['option2_link']?>?witnes=-2';
        </script>
        <?php
    }


}
?>
