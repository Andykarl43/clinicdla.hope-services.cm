<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_REQUEST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_REQUEST['id_quat'];


    $open_close = 1;

    $query1 = " UPDATE quartier SET  open_close=:open_close    
                    WHERE id_quat = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
          //  alert('quartier a été supprimé.');
            window.location.href = '<?=$liste['option17_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('quartier n\'a pas été supprimé.');
            window.location.href = '<?=$liste['option17_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
