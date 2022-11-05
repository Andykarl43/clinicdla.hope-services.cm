<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_materiel'];
    // echo $id;

    $open_close = 1;

    $query1 = " UPDATE materiel SET  open_close=:open_close    
                    WHERE id_materiel= '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('materiel a été supprimé.');
            window.location.href = '<?=$materiaux['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$materiaux['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
