<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_etape'];
    $id_chantier = $_POST['id_chantier'];
    // echo $id;

    $open_close = 1;

    $query1 = " UPDATE etape SET  open_close=:open_close    
                    WHERE id_etape= '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Etape a été supprimé.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_chantier?id=<?=$id_chantier?>&witness=-1';
        </script>
        <?php

    }


}
?>
