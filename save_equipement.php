<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_eq = $_POST['ref_eq'];
    $design_eq = $_POST['design_eq'];
    $quant_eq = $_POST['quant_eq'];
    $id_cat_eq = $_POST['id_cat_eq'];
    $prix_unit_eq = $_POST['prix_unit_eq'];
    $alert_eq = $_POST['alert_eq'];
    $open_close = 0;

    $totaux = $prix_unit_eq * $quant_eq;


    if ($quant_eq >= $alert_eq) {

//--------------------------------- insertion un materiel -----------------------------------------//


        $query = " INSERT INTO equipement (ref_eq,design_eq,quant_eq,id_cat_eq,prix_unit_eq,prix_t_eq,alert_eq,open_close) 
                     VALUES (:ref_eq,:design_eq,:quant_eq,:id_cat_eq,:prix_unit_eq,:prix_t_eq,:alert_eq,:open_close)";

        $sql = $db->prepare($query);

        // Bind parameters to statement
        $sql->bindParam(':ref_eq', $ref_eq);
        $sql->bindParam(':design_eq', $design_eq);
        $sql->bindParam(':quant_eq', $quant_eq);
        $sql->bindParam(':id_cat_eq', $id_cat_eq);
        $sql->bindParam(':prix_unit_eq', $prix_unit_eq);
        $sql->bindParam(':prix_t_eq', $totaux);
        $sql->bindParam(':alert_eq', $alert_eq);
        $sql->bindParam(':open_close', $open_close);
        $sql->execute();


        if ($sql) {
            ?>
            <script>
                alert('equipement a été bien enregistrée.');
                window.location.href = '<?=$equipement['option2_link']?>?witness=1';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Error.');
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
