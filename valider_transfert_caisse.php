<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

?>

<?php

if($_REQUEST)
{


    /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
    $id_trans_caisse=$_REQUEST['id_trans_caisse'];
    $id_caisse_src=$_REQUEST['id_caisse_src'];
    $id_caisse_dst=$_REQUEST['id_caisse_dst'];
    $quantite = $_REQUEST['quantite'];


    /*--------------------------------- SALLE SRC ET DEST---------------------------*/

    $sql="SELECT * FROM caisse where id_caisse='$id_caisse_src' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom_caisse_src=$table['caisse'];
        $solde_src=$table['solde'];
    }

    $sql="SELECT * FROM caisse where id_caisse='$id_caisse_dst' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom_caisse_dst=$table['caisse'];
        $solde_dst=$table['solde'];

    }

    $quantite_final_src=$solde_src-$quantite;

    if($quantite_final_src>=0){
        $query1 = "UPDATE caisse SET solde=:quantite where  id_caisse='$id_caisse_src'";

        $req = $db->prepare($query1);

        // Bind parameters to statement
        $req->bindParam(':quantite', $quantite_final_src);
        $req->execute();

        $quantite_final_dst=$solde_dst+$quantite;

        $query1 = "UPDATE caisse SET solde=:quantite where  id_caisse='$id_caisse_dst'";

        $req = $db->prepare($query1);

        // Bind parameters to statement
        $req->bindParam(':quantite', $quantite_final_dst);
        $req->execute();

        $etat=1;
        $date_valide=date('Y-m-d');
        $heure=date("G:i");
        $query  = " UPDATE transfert_caisse  SET   etat=:etat, date_valide=:date_valide, heure=:heure
                                     WHERE  id_trans_caisse='$id_trans_caisse' ";

        $sql = $db->prepare($query);

// Bind parameters to statement
        $sql->bindParam(':etat', $etat);
        $sql->bindParam(':date_valide', $date_valide);
        $sql->bindParam(':heure', $heure);
        $sql->execute();

        $ref_caisse='N/A';
        $id_beneficiaire=$id_caisse_dst;
        $id_perso=$id_perso_session;
        $somme=$quantite;
        $date_hist=$date_valide;
        $statut='E';

        $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_entre,date_hist,statut)
                      VALUES (?,?,?,?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($id_caisse_dst,$ref_caisse,$id_caisse_src,$somme,$date_hist,$statut));


        $statut='S';

        $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,id_perso,montant_sortie,date_hist,statut)
                      VALUES (?,?,?,?,?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($id_caisse_src,$ref_caisse,$id_beneficiaire,$id_perso,$somme,$date_hist,$statut));


        ?>
        <script>
            //alert('Demande n\'a pas été valider.');
           window.location.href='liste_transfert_caisse_suite.php?witness=1';
        </script>
        <?php


    }else{
        ?>
        <script>
            //alert('Demande n\'a pas été valider.');
            window.location.href='liste_transfert_caisse_suite.php?witness=-1';
        </script>
        <?php
    }






}
?>
