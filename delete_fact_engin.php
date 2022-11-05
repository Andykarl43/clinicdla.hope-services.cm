<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_fact_engin'];


    $open_close = 1;

    $query1 = " UPDATE fact_engin SET  open_close=:open_close    
                    WHERE id_fact_engin = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Facture liée à l\'engin  a été supprimé.');
            window.location.href = '<?=$chantier['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Facture liée à l\'engin  n\'a pas été supprimé.');
            window.location.href = '<?=$chantier['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
