<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php


if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id_chantier = $_POST['id_chantier'];
    $id = $_POST['id_etape'];
    $nom_etape = $_POST['nom_etape'];
    $cout_etape = $_POST['cout_etape'];
    $date_debut_etape = $_POST['date_debut_etape'];
    $date_fin_etape = $_POST['date_fin_etape'];
    $etat = $_POST['etat'];

    $idm = $_POST['idm'];


    // echo $id.'</br>';
    // echo $nom_etape.'</br>';
    // echo $secteur.'</br>';
    // echo $salle.'</br>';
    // echo $nom_etape.'</br>';
    // echo $cout_etape.'</br>';
    //  echo $date_debut_etape.'</br>';
    //  echo $date_fin_etape.'</br>';
    // echo $motif.'</br>';
    // echo $email_four.'</br>';
    // echo $pers_contact_four.'</br>';
    // echo $tel_contact_four.'</br>';
    // echo $nom_banque.'</br>';
    // echo $number_card_bancaire.'</br>';
    // echo $day_anciennete.'</br>';
    // echo $month_anciennete.'</br>';
    // echo $year_anciennete.'</br>';


    $query1 = " UPDATE etape SET  nom_etape=:nom_etape, cout_etape=:cout_etape, 
                    date_debut_etape=:date_debut_etape, date_fin_etape=:date_fin_etape, etat=:etat    
                    WHERE id_etape = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':nom_etape', $nom_etape);
    $sql1->bindParam(':cout_etape', $cout_etape);
    $sql1->bindParam(':date_debut_etape', $date_debut_etape);
    $sql1->bindParam(':date_fin_etape', $date_fin_etape);
    $sql1->bindParam(':etat', $etat);


    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('L\'etape a été bien mis à jour.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&idm=<?=$idm?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('L\'etape n\'a pas été mis à jour.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&witness=-1';
        </script>
        <?php

    }


}
?>
