<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_marque_engin'];
    // echo $id;

    $open_close = 1;

    $query1 = " UPDATE marque_engin SET  open_close=:open_close    
                    WHERE id_marque_engin= '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Marque d\'engin a été supprimé.');
            window.location.href = '<?=$liste['option9_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Marque d\'engin n\'a pas été supprimé.');
            window.location.href = '<?=$liste['option9_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
