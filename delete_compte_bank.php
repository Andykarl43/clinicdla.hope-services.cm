<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_card_bank'];


    $open_close = 1;

    $query1 = " UPDATE compte_bank SET  open_close=:open_close    
                    WHERE id_card_bank = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Compte bancaire a été supprimé.');
            window.location.href = '<?=$liste['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Compte bancaire n\'a pas été supprimé.');
            window.location.href = '<?=$liste['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
