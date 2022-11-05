<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    // $ref_four = $_POST['ref_four'];
    $id_chantier = $_POST['id_chantier'];
    $objet_chantier = $_POST['objet_chantier'];
    $date_begin_chantier = $_POST['date_begin_chantier'];
    $montant_ttc_chantier = $_POST['montant_ttc_chantier'];
    $nom_etape = $_POST['nom_etape'];
    $cout_etape = $_POST['cout_etape'];
    $date_debut_etape = $_POST['date_debut_etape'];
    $date_fin_etape = $_POST['date_fin_etape'];
    $open_close = 0;
    $etat = 0;


    // echo $id_chantier.'</br>';
    // echo $objet_chantier.'</br>';
    // echo $date_begin_chantier.'</br>';
    // echo $montant_ttc_chantier.'</br>';
    // echo $nom_etape.'</br>';
    // echo $cout_etape.'</br>';
    // echo $date_debut_etape.'</br>';
    // echo $date_fin_etape.'</br>';
    // echo $date_open_prix.'</br>';
    // echo $date_approbation.'</br>';
    // echo $garantie_bank.'</br>';
    // echo $tva.'</br>';
    // echo $day_marche.'</br>';
    // echo $month_marche.'</br>';
    // echo $remarque.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//


    $query = " INSERT INTO etape (id_chantier,objet_chantier,date_begin_chantier,montant_ttc_chantier,nom_etape,cout_etape,date_debut_etape,date_fin_etape,etat,open_close) 
    VALUES (:id_chantier,:objet_chantier,:date_begin_chantier,:montant_ttc_chantier,:nom_etape,:cout_etape,:date_debut_etape,:date_fin_etape,:etat,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':id_chantier', $id_chantier);
    $sql->bindParam(':objet_chantier', $objet_chantier);
    $sql->bindParam(':date_begin_chantier', $date_begin_chantier);
    $sql->bindParam(':montant_ttc_chantier', $montant_ttc_chantier);
    $sql->bindParam(':nom_etape', $nom_etape);
    $sql->bindParam(':cout_etape', $cout_etape);
    $sql->bindParam(':date_debut_etape', $date_debut_etape);
    $sql->bindParam(':date_fin_etape', $date_fin_etape);
    $sql->bindParam(':etat', $etat);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Etape a été bien enregistrée.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&witness=-1';
        </script>
        <?php

    }


}
?>
