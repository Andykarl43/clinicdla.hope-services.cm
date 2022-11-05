<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_offre'];


    $open_close = 1;

    $query1 = " UPDATE appel_offre SET  open_close=:open_close    
                    WHERE id_offre = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('L\'appel d\'offre a été supprimé.');
            window.location.href = '<?=$offre['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Fournisseur n\'a pas été supprimé.');
            window.location.href = '<?=$offre['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
