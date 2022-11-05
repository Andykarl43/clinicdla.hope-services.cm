<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

?>

<?php

if($_REQUEST)
{


    /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
    $id_deps_caisse=$_REQUEST['id_deps_caisse'];
    $id_caisse=$_REQUEST['id_caisse'];
    $montant = $_REQUEST['montant'];


    /*--------------------------------- SALLE SRC ET DEST---------------------------*/

    $sql="SELECT * FROM caisse where id_caisse='$id_caisse' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom_caisse_src=$table['caisse'];
        $solde_src=$table['solde'];
    }


    $quantite_final_src=$solde_src-$montant;

    if($quantite_final_src>=0){
        $query1 = "UPDATE caisse SET solde=:quantite where  id_caisse='$id_caisse'";

        $req = $db->prepare($query1);

        // Bind parameters to statement
        $req->bindParam(':quantite', $quantite_final_src);
        $req->execute();


        $etat=-1;
        $date_valide=date('Y-m-d');
        $heure=date("G:i");
        $query  = " UPDATE depense_caisse  SET   etat=:etat, date_valide=:date_valide, heure=:heure
                                     WHERE  id_deps_caisse='$id_deps_caisse' ";

        $sql = $db->prepare($query);

// Bind parameters to statement
        $sql->bindParam(':etat', $etat);
        $sql->bindParam(':date_valide', $date_valide);
        $sql->bindParam(':heure', $heure);
        $sql->execute();

        ?>
        <script>
            //alert('Demande n\'a pas été valider.');
            window.location.href='liste_depense_caisse_suite.php?witness=1';
        </script>
        <?php


    }else{
        ?>
        <script>
            //alert('Demande n\'a pas été valider.');
            window.location.href='liste_depense_caisse_suite.php?witness=-1';
        </script>
        <?php
    }






}
?>
