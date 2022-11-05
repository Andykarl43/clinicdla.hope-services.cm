<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_medi'];
    $nom_medi = $_POST['nom_medi'];
    $id_type_medi = $_POST['id_type_medi'];
    $prix_u_a = $_POST['prix_u_a'];
    $prix_u_v = $_POST['prix_u_v'];
    $date_medi = $_POST['date_medi'];
    $alert_prod = $_POST['alert_prod'];
    $date_fin = $_POST['date_fin'];
    $id_four = $_POST['id_four'];




    /*--------------------------------- SAVE DATA MEDOC---------------------------*/

    $query1 = " UPDATE medicament  SET  nom_medi=:nom_medi, ref_medi=:ref_medi, id_type_medi=:id_type_medi,  prix_unitaire=:prix_u_a, prix_u_v=:prix_u_v, date_medi=:date_medi, alert_prod=:alert_prod, date_fin=:date_fin, id_four=:id_four    
                    WHERE id_medi = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':nom_medi', $nom_medi);
    $sql1->bindParam(':ref_medi', $ref_medi);
    $sql1->bindParam(':id_type_medi', $id_type_medi);
    $sql1->bindParam(':prix_u_a', $prix_u_a);
    $sql1->bindParam(':prix_u_v', $prix_u_v);
    $sql1->bindParam(':date_medi', $date_medi);
    $sql1->bindParam(':alert_prod', $alert_prod);
    $sql1->bindParam(':date_fin', $date_fin);
    $sql1->bindParam(':id_four', $id_four);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert(' Médicament a été bien mis à jour.');
            window.location.href = 'liste_prod.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Médicament n\'a pas été mis à jour.');
            window.location.href = 'liste_prod.php?witness=-1';
        </script>
        <?php

    }


}
?>
