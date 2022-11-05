<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_regle_four'];
    $id_fournisseur = $_POST['id_fournisseur'];
    $id_card_bank = $_POST['id_card_bank'];
    $date_transaction = $_POST['date_transaction'];
    $id_chantier = $_POST['id_chantier'];
    $date_echeance = $_POST['date_echeance'];
    $montant = $_POST['montant'];
    $avance = $_POST['avance'];
    $reste = $_POST['reste'];
    $cheque = $_POST['cheque'];
    $id_mode_paiement = $_POST['id_mode_paiement'];

    //---------------------- OPERATION DE VERIFICATION -------------------------//
    $somme = $avance + $reste;
    $difference = $montant - $somme;


    // echo $id_fournisseur.'</br>';
    // echo $data_begin_marche.'</br>';
    //  echo $date_transaction.'</br>';
    //  echo $id_chantier.'</br>';
    // echo $date_echeance.'</br>';
    // echo $montant.'</br>';
    // echo $avance.'</br>';
    // echo $reste.'</br>';
    // echo $cheque.'</br>';
    // echo $id_mode_paiement.'</br>';


    if ($difference == 0) {

        /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


        $query1 = " UPDATE regle_fournisseur SET  id_fournisseur=:id_fournisseur, id_card_bank=:id_card_bank, 
                    date_transaction=:date_transaction, id_chantier=:id_chantier, date_echeance=:date_echeance, montant=:montant, avance=:avance, reste=:reste, cheque=:cheque, id_mode_paiement=:id_mode_paiement WHERE id_regle_four = '$id' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_fournisseur', $id_fournisseur);
        $sql1->bindParam(':id_card_bank', $id_card_bank);
        $sql1->bindParam(':date_transaction', $date_transaction);
        $sql1->bindParam(':id_chantier', $id_chantier);
        $sql1->bindParam(':date_echeance', $date_echeance);
        $sql1->bindParam(':montant', $montant);
        $sql1->bindParam(':avance', $avance);
        $sql1->bindParam(':reste', $reste);
        $sql1->bindParam(':cheque', $cheque);
        $sql1->bindParam(':id_mode_paiement', $id_mode_paiement);
        $sql1->execute();


        if ($sql1) {
            ?>
            <script>
                alert('Règlement fournisseur a été bien mis à jour.');
                window.location.href = '<?=$reglement_fournisseur['option2_link']?>?witness=1';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Règlement fournisseur n\'a pas été mis à jour.');
                window.location.href = '<?=$reglement_fournisseur['option2_link']?>?witness=-1';
            </script>
            <?php

        }
    } elseif ($difference > 0) {
        ?>
        <script>
            alert('L\'avance ou le reste est incorrect.');
            window.location.href = '<?=$reglement_fournisseur['option2_link']?>?witnes=-2';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Le montant est incorrect.');
            window.location.href = '<?=$reglement_fournisseur['option2_link']?>?witnes=-3';
        </script>
        <?php
    }


}
?>
