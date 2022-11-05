<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_engin'];

    $open_close = 1;

    $query1 = " UPDATE engin SET  open_close=:open_close    
                    WHERE id_engin = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Engin a été supprimé.');
            window.location.href = '<?=$engin['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Engin n\'a pas été supprimé.');
            window.location.href = '<?=$engin['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
