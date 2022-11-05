<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_regle_four'];


    $open_close = 1;

    $query1 = " UPDATE regle_fournisseur SET  open_close=:open_close    
                    WHERE id_regle_four = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Règlement fournisseur a été supprimé.');
            window.location.href = '<?=$reglement_fournisseur['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Règlement fournisseur n\'a pas été supprimé.');
            window.location.href = '<?=$reglement_fournisseur['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
