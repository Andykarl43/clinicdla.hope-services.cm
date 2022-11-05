<?php

include ("php/dbconnect.php");


if (isset($_REQUEST['ref_com']) and isset($_REQUEST['id_medi'])) {
    $ref_com = $_REQUEST['ref_com'];
    $id_medi = $_REQUEST['id_medi'];
    // echo $id_personnel;

    $query = "DELETE FROM commande WHERE ref_com='$ref_com' and id_medi='$id_medi' ";
    $sql = $conn->query($query);


    if ($sql)
    {
        ?>
        <script>
            alert('Commande a été bien modifié.');
            window.location.href='modifier_commande.php?ref_com=<?=$ref_com?>';
        </script>
        <?php
    }
    else
    {

        ?>
        <script>
            alert('Commande a été bien modifié.');
            window.location.href='modifier_commande.php?ref_com=<?=$ref_com?>';
        </script>
        <?php
    }
}


?>
