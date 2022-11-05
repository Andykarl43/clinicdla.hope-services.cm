<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_REQUEST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_REQUEST['id'];
    // echo $id;

    $open_close = 1;

    $query1 = " UPDATE type_medi SET  open_close=:open_close    
                    WHERE id_type_medi= '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            //alert('Catégorie matériel a été bien enregistrée.');
            window.location.href = 'liste_cat_prod.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //   alert('Error.');
            window.location.href = 'liste_cat_prod.php?witness=-1';
        </script>
        <?php

    }


}
?>
