<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS PRIME -------------------------------------*/
    $id = $_POST['id_personnel'];
    $prime = $_POST['prime'];


    /*--------------------------------- SAVE DATA INFOS PRIME ---------------------------*/

    // $query1 = " INSERT INTO personnel (poste,date_embauche,type_contrat,statut,sal_base,sal_horaire,matricule,number_cnps,nom_banque,number_card_bancaire,day_anciennete,month_anciennete,year_anciennete)
    // VALUES
    // (:poste,:date_embauche,:type_contrat,:statut,:sal_base,:sal_horaire,:matricule,:number_cnps,:nom_banque,:number_card_bancaire,:day_anciennete,:month_anciennete,:year_anciennete)";

    $query1 = " UPDATE personnel SET prime=:prime WHERE id_personnel = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':prime', $prime);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Personnel a été bien enregistrée.');
            window.location.href = '<?=$personnel['option2_link']?>';
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
