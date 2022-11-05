<?php

include ("php/dbconnect.php");


if (isset($_REQUEST['id_ask_medi']) and isset($_REQUEST['id_ask_mat'])  ) {
    $id_ask_medi = $_REQUEST['id_ask_medi'];
    $id_ask_mat = $_REQUEST['id_ask_mat'];
    // echo $id_personnel;

    $query = "DELETE FROM demande_materiel WHERE id_ask_mat='$id_ask_mat' and id_ask_medi='$id_ask_medi' ";
    $sql = $conn->query($query);


    if ($sql)
    {
        ?>
        <script>
            alert('Demande de médicament a été bien modifié.');
            window.location.href='modifier_demande_eq.php?id=<?=$id_ask_medi?>&witness=1';
        </script>
        <?php
    }
    else
    {

        ?>
        <script>
            alert('Demande de médicament n\'a été bien modifié.');
            window.location.href='modifier_demande_eq.php?id=<?=$id_ask_medi?>&witness=-1';
        </script>
        <?php
    }
}


?>
