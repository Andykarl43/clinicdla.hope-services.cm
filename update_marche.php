<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_marche'];
    $id_offre = $_POST['id_offre'];
    $date_begin_marche = $_POST['date_begin_marche'];
    $ref_marche = $_POST['ref_marche'];
    $objet_marche = $_POST['objet_marche'];
    $date_lancement = $_POST['date_lancement'];
    $montant_ttc = $_POST['montant_ttc'];
    $montant_ht = $_POST['montant_ht'];
    $irm = $_POST['irm'];
    $date_open_prix = $_POST['date_open_prix'];
    $date_approbation = $_POST['date_approbation'];
    $garantie_bank = $_POST['garantie_bank'];
    $day_marche = $_POST['day_marche'];
    $month_marche = $_POST['month_marche'];
    $remarque = $_POST['remarque'];
    $tva = $_POST['tva'];
    $moa = $_POST['moa'];

    $ingenieur = $_POST['ingenieur'];


    // echo $id.'</br>';
    // echo $id_offre.'</br>';
    // echo $secteur.'</br>';
    // echo $salle.'</br>';
    // echo $id_offre.'</br>';
    // echo $data_begin_marche.'</br>';
    //  echo $ref_marche.'</br>';
    //  echo $objet_marche.'</br>';
    // echo $date_lancement.'</br>';
    // echo $montant_ttc.'</br>';
    // echo $montant_ht.'</br>';
    // echo $irm.'</br>';
    // echo $date_open_prix.'</br>';
    // echo $date_approbation.'</br>';
    // echo $garantie_bank.'</br>';
    // echo $day_marche.'</br>';
    // echo $month_marche.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE marche SET  id_offre=:id_offre, date_begin_marche=:date_begin_marche, 
                    ref_marche=:ref_marche, objet_marche=:objet_marche, date_lancement=:date_lancement, montant_ttc=:montant_ttc, montant_ht=:montant_ht, irm=:irm, date_open_prix=:date_open_prix, date_approbation=:date_approbation, garantie_bank=:garantie_bank, day_marche=:day_marche, month_marche=:month_marche, remarque=:remarque, moa=:moa, ingenieur=:ingenieur, tva=:tva    WHERE id_marche = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':id_offre', $id_offre);
    $sql1->bindParam(':date_begin_marche', $date_begin_marche);
    $sql1->bindParam(':ref_marche', $ref_marche);
    $sql1->bindParam(':objet_marche', $objet_marche);
    $sql1->bindParam(':date_lancement', $date_lancement);
    $sql1->bindParam(':montant_ttc', $montant_ttc);
    $sql1->bindParam(':montant_ht', $montant_ht);
    $sql1->bindParam(':irm', $irm);
    $sql1->bindParam(':date_open_prix', $date_open_prix);
    $sql1->bindParam(':date_approbation', $date_approbation);
    $sql1->bindParam(':garantie_bank', $garantie_bank);
    $sql1->bindParam(':day_marche', $day_marche);
    $sql1->bindParam(':month_marche', $month_marche);
    $sql1->bindParam(':remarque', $remarque);
    $sql1->bindParam(':moa', $moa);
    $sql1->bindParam(':ingenieur', $ingenieur);
    $sql1->bindParam(':tva', $tva);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Marché a été bien mis à jour.');
            window.location.href = '<?=$marche['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Marché n\'a pas été mis à jour.');
            window.location.href = '<?=$marche['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
