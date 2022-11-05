//----- details_offre -----//
<?php

$query = "SELECT count(ref_marche) as total from marche where id_offre='$id_offre' and open_close!='1' ";
$q = $db->query($query);
while ($row = $q->fetch()) {

    echo ' Marchés[' . $row['total'] . ']';
}

?>
//------------------------------------------------------- ----------------------------------------------//

vérifier la^position du bouton annuler dans la page modifier_etape.php
copier le fichier save_pers_chantier.php
copier le fichier save_engin.php

//------------------------------------------------------- ---------------------------------------------//

//----------------- details_chantier-----------------------//
<?php

$query = "SELECT DISTINCT count(id_engin) as total from engin where   id_chantier='$id_chantier' ";
$q = $db->query($query);
while ($row = $q->fetch()) {

    echo ' Engins[' . $row['total'] . ']';
}

?>
//------------------------------------------------------- -------------------------------------------//
rétirer de la requete d'affichage des engins dans la page ajouter_engin_etape.php :

BON:    <?php $query = "SELECT * from engin where id_chantier ='$id_chantier'  and open_close!='1'  "; ?>

//----------------------- details_etape.php -------------------------//
<?php

$query = "SELECT DISTINCT count(id_engin) as total from engin where id_etape='$id_etape' ";
$q = $db->query($query);
while ($row = $q->fetch()) {

    echo ' Engins[' . $row['total'] . ']';
}

?>

