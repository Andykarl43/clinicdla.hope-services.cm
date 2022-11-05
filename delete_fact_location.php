<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_fact_location'];


    $open_close = 1;

    $query1 = " UPDATE fact_location SET  open_close=:open_close    
                    WHERE id_fact_location = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Facture de location a été supprimé.');
            window.location.href = '<?=$facture_location['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Facture de location n\'a pas été supprimé.');
            window.location.href = '<?=$facture_location['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
