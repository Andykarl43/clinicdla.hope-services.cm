<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id_offre = $_POST['id_offre'];
    $ref_offre = $_POST['ref_offre'];
    $id_card_bank = $_POST['id_card_bank'];
    $id_client = $_POST['id_client'];
    $objet = $_POST['objet'];
    $date_lancement = $_POST['date_lancement'];
    $montant_offre = $_POST['montant_offre'];
    $date_open_offre = $_POST['date_open_offre'];
    $id_type = $_POST['id_type'];


    //    echo $id_offre.'</br>';
    //    echo $ref_offre.'</br>';
    //  echo $id_card_bank.'</br>';
    // echo $id_client.'</br>';
    //  echo $objet.'</br>';
    //  echo $date_lancement.'</br>';
    //   echo $montant_offre.'</br>';
    //   echo $date_open_offre.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE appel_offre SET  ref_offre=:ref_offre, id_card_bank=:id_card_bank, 
                    id_client=:id_client, objet=:objet, date_lancement=:date_lancement, montant_offre=:montant_offre, date_open_offre=:date_open_offre, id_type=:id_type   WHERE id_offre = '$id_offre' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':ref_offre', $ref_offre);
    $sql1->bindParam(':id_card_bank', $id_card_bank);
    $sql1->bindParam(':id_client', $id_client);
    $sql1->bindParam(':objet', $objet);
    $sql1->bindParam(':date_lancement', $date_lancement);
    $sql1->bindParam(':montant_offre', $montant_offre);
    $sql1->bindParam(':date_open_offre', $date_open_offre);
    $sql1->bindParam(':id_type', $id_type);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Offre a été bien mis à jour.');
            window.location.href = '<?=$offre['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Offre n\'a pas été mis à jour.');
            window.location.href = '<?=$offre['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
