<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_type_client'];


    $open_close = 1;

    $query1 = " UPDATE type_client SET  open_close=:open_close    
                    WHERE id_type_client = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Type client a été supprimé.');
            window.location.href = '<?=$liste['option1_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Type client n\'a pas été supprimé.');
            window.location.href = '<?=$liste['option1_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
