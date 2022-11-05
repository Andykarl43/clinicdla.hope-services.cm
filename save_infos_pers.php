<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {

    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_personnel'];
    $poste = $_POST['poste'];
    $date_embauche = $_POST['date_embauche'];
    $type_contrat = $_POST['type_contrat'];
    $statut = $_POST['statut'];
    $cout_h_sup = $_POST['cout_h_sup'];
    $cout_horaire = $_POST['cout_horaire'];
    $matricule = $_POST['matricule'];
    $number_cnps = $_POST['number_cnps'];
    $nom_banque = $_POST['nom_banque'];
    $number_card_bancaire = $_POST['number_card_bancaire'];
    $day_anciennete = $_POST['day_anciennete'];
    $month_anciennete = $_POST['month_anciennete'];
    $year_anciennete = $_POST['year_anciennete'];


    //   echo $id.'</br>';
    //  echo $poste.'</br>';
    // echo $date_embauche.'</br>';
    //  echo $type_contrat.'</br>';
    //  echo $statut.'</br>';
    // echo $cout_h_sup.'</br>';
    // echo $cout_horaire.'</br>';
    // echo $matricule.'</br>';
    // echo $number_cnps.'</br>';
    // echo $nom_banque.'</br>';
    // echo $number_card_bancaire.'</br>';
    // echo $day_anciennete.'</br>';
    // echo $month_anciennete.'</br>';
    // echo $year_anciennete.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/

    $query1 = " UPDATE personnel SET  poste=:poste, date_embauche=:date_embauche, 
                    type_contrat=:type_contrat, statut=:statut, cout_h_sup=:cout_h_sup, cout_horaire=:cout_horaire, matricule=:matricule, number_cnps=:number_cnps, nom_banque=:nom_banque, number_card_bancaire=:number_card_bancaire, day_anciennete=:day_anciennete, month_anciennete=:month_anciennete, year_anciennete=:year_anciennete  
                      WHERE id_personnel = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement;
    $sql1->bindParam(':poste', $poste);
    $sql1->bindParam(':date_embauche', $date_embauche);
    $sql1->bindParam(':type_contrat', $type_contrat);
    $sql1->bindParam(':statut', $statut);
    $sql1->bindParam(':cout_h_sup', $cout_h_sup);
    $sql1->bindParam(':cout_horaire', $cout_horaire);
    $sql1->bindParam(':matricule', $matricule);
    $sql1->bindParam(':number_cnps', $number_cnps);
    $sql1->bindParam(':nom_banque', $nom_banque);
    $sql1->bindParam(':number_card_bancaire', $number_card_bancaire);
    $sql1->bindParam(':day_anciennete', $day_anciennete);
    $sql1->bindParam(':month_anciennete', $month_anciennete);
    $sql1->bindParam(':year_anciennete', $year_anciennete);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Personnel a été bien enregistrée.');
            // window.location.href='<?=$personnel['option1_link']?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$personnel['option2_link']?>';
        </script>
        <?php

    }


}
?>
