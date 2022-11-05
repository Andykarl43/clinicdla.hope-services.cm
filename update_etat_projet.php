<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_offre'];
    $statut = $_POST['statut'];
    $commentaire = $_POST['commentaire'];

    echo $id . '</br>';
    echo $statut . '</br>';
    echo $commentaire . '</br>';

    // echo $id.'</br>';
    //  echo $type_contrat.'</br>';
    // echo $statut.'</br>';
    // echo $sal_base.'</br>';
    // echo $sal_horaire.'</br>';
    // echo $matricule.'</br>';
    // echo $number_cnps.'</br>';
    // echo $nom_banque.'</br>';
    // echo $number_card_bancaire.'</br>';
    // echo $day_anciennete.'</br>';
    // echo $month_anciennete.'</br>';
    // echo $year_anciennete.'</br>';
    // echo $garant.'</br>';
    // echo $parrain_interne.'</br>';
    // echo $parrain_externe.'</br>';


    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/

    // $query1 = " INSERT INTO personnel (poste,date_embauche,type_contrat,statut,sal_base,sal_horaire,matricule,number_cnps,nom_banque,number_card_bancaire,day_anciennete,month_anciennete,year_anciennete)
    // VALUES
    // (:poste,:date_embauche,:type_contrat,:statut,:sal_base,:sal_horaire,:matricule,:number_cnps,:nom_banque,:number_card_bancaire,:day_anciennete,:month_anciennete,:year_anciennete)";


    switch ($statut) {
        case '0';
            // $statut="POSTULANT";
            // $attribut="N/A";
            //--------POSTULANT-------//

            $query1 = " UPDATE appel_offre SET etat_projet=:statut, commentaire=:commentaire    WHERE id_offre = '$id' ";


            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':statut', $statut);
            $sql1->bindParam(':commentaire', $commentaire);
            $sql1->execute();


            if ($sql1) {
                ?>
                <script>
                    alert(' Projet en attente.');
                    //    window.location.href='liste_offre.php';
                </script>
                <?php
            } else {
                ?>
                <script>

                    window.location.href = 'modifier_offre.php';
                </script>
                <?php

            }

            //----------FIN POSTULANT-----//
            break;
        case '1';

            $query1 = " UPDATE appel_offre SET etat_projet=:statut, commentaire=:commentaire    WHERE id_offre = '$id' ";


            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':statut', $statut);
            $sql1->bindParam(':commentaire', $commentaire);
            $sql1->execute();


            if ($sql1) {
                ?>
                <script>
                    alert('Projet a été gagné.');
                    window.location.href = 'liste_offre.php';
                </script>
                <?php
            } else {
                ?>
                <script>

                    window.location.href = 'modifier_offre.php';
                </script>
                <?php

            }
            break;
        case '2';

            $query1 = " UPDATE appel_offre SET etat_projet=:statut, commentaire=:commentaire    WHERE id_offre = '$id' ";


            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':statut', $statut);
            $sql1->bindParam(':commentaire', $commentaire);
            $sql1->execute();


            if ($sql1) {
                ?>
                <script>
                    alert('projet a été perdu.');
                    window.location.href = 'liste_offre.php';
                </script>
                <?php
            } else {
                ?>
                <script>

                    window.location.href = 'modifier_offre.php';
                </script>
                <?php

            }
            break;

    }

}
?>
