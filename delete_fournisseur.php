<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_fournisseur'];


    $open_close = 1;

    $query1 = " UPDATE fournisseur SET  open_close=:open_close    
                    WHERE id_fournisseur = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Fournisseur a été supprimé.');
            window.location.href = 'liste_fournisseur.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Fournisseur n\'a pas été supprimé.');
            window.location.href = 'liste_fournisseur.php?witness=-1';
        </script>
        <?php

    }


}
?>
