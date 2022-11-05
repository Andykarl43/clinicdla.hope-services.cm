<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_cat_engin'];
    // echo $id;

    $open_close = 1;

    $query1 = " UPDATE categorie_engin SET  open_close=:open_close    
                    WHERE id_cat_engin= '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Catégorie d\'engin a été supprimé.');
            window.location.href = '<?=$liste['option8_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Catégorie d\'engin n\'a pas été supprimé.');
            window.location.href = '<?=$liste['option8_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
