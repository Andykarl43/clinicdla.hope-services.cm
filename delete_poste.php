<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_poste'];
    // echo $id;

    $open_close = 1;

    $query1 = " UPDATE poste SET  open_close=:open_close    
                    WHERE id_poste= '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Poste a été supprimé.');
            window.location.href = '<?=$liste['option5_link']?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Poste n\'a pas été supprimé.');
            window.location.href = '<?=$liste['option5_link']?>';
        </script>
        <?php

    }


}
?>
