<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_eq'];
    $ref_eq = $_POST['ref_eq'];
    $design_eq = $_POST['design_eq'];
    $quant_eq = $_POST['quant_eq'];
    $id_cat_eq = $_POST['id_cat_eq'];
    $prix_unit_eq = $_POST['prix_unit_eq'];
    $alert_eq = $_POST['alert_eq'];


    // echo $id.'</br>';
    // echo $ref_materiel.'</br>';
    // echo $designation.'</br>';
    //  echo $quantite.'</br>';
    // echo $id_cat_materiel.'</br>';
    // echo $prix_unitaire.'</br>';
    // echo $prix_total.'</br>';
    // echo $alert.'</br>';

    $totaux = $prix_unit_eq * $quant_eq;


    if ($quant_eq >= $alert_eq) {

//--------------------------------- insertion un materiel -----------------------------------------//


        $query1 = " UPDATE equipement SET  ref_eq=:ref_eq, design_eq=:design_eq, 
                    quant_eq=:quant_eq, id_cat_eq=:id_cat_eq, prix_unit_eq=:prix_unit_eq, prix_t_eq=:prix_t_eq, alert_eq=:alert_eq    
                    WHERE id_eq = '$id' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':ref_eq', $ref_eq);
        $sql1->bindParam(':design_eq', $design_eq);
        $sql1->bindParam(':quant_eq', $quant_eq);
        $sql1->bindParam(':id_cat_eq', $id_cat_eq);
        $sql1->bindParam(':prix_unit_eq', $prix_unit_eq);
        $sql1->bindParam(':prix_t_eq', $totaux);
        $sql1->bindParam(':alert_eq', $alert_eq);
        $sql1->execute();


        if ($sql1) {
            ?>
            <script>
                alert('Equipement a été bien mis à jour.');
                window.location.href = '<?=$equipement['option2_link']?>?witness=1';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Equipement n\'a pas été mis à jour.');
                window.location.href = '<?=$equipement['option2_link']?>?witness=-1';
            </script>
            <?php

        }


    } else {
        ?>
        <script>
            alert('La quantité inférieur aux stock d\'alert.');
            window.location.href = '<?=$equipement['option2_link']?>?witness=-1';
        </script>
        <?php

    }

}
?>
