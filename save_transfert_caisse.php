<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

?>

<?php

if($_POST)
{


    /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
    $ids_s = $_POST['id_caisse_src'];
    $ids_c= $_POST['id_caisse_dst'];

    $id_caisse_src=$_POST['id_caisse_src'];
    $id_caisse_dst=$_POST['id_caisse_dst'];
    $quantite = $_POST['quantite'];

    /*--------------------------------- CAISSE SRC ET DEST---------------------------*/

    $sql="SELECT * FROM caisse where id_caisse='$id_caisse_src' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom_caisse_src=$table['caisse'];
        $id_perso_src=$table['id_perso'];
        $solde_src=$table['solde'];
    }

    $sql="SELECT * FROM caisse where id_caisse='$id_caisse_dst' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom_caisse_dst=$table['caisse'];
        $id_perso_dst=$table['id_perso'];
        $solde_dst=$table['solde'];

    }

    $quantite_final_src=$solde_src-$quantite;

    if($quantite_final_src>=0){

        $etat=0;
        $date_debut= date("Y-m-d");
        $date_valide='N/A';
        $query = " INSERT INTO transfert_caisse (id_caisse_src,nom_caisse_src,id_perso_src,id_caisse_dst,nom_caisse_dst,id_perso_dst,quantite,date_trans_caisse,etat) 
                     VALUES (:id_caisse_src,:nom_caisse_src,:id_perso_src,:id_caisse_dst,:nom_caisse_dst,:id_perso_dst,:quantite,:date_trans_caisse,:etat)";
        $sql = $db->prepare($query);

        // Bind parameters to statement
        $sql->bindParam(':id_caisse_src', $id_caisse_src);
        $sql->bindParam(':nom_caisse_src', $nom_caisse_src);
        $sql->bindParam(':id_perso_src', $id_perso_src);
        $sql->bindParam(':id_caisse_dst', $id_caisse_dst);
        $sql->bindParam(':nom_caisse_dst', $nom_caisse_dst);
        $sql->bindParam(':id_perso_dst', $id_perso_dst);
        $sql->bindParam(':quantite', $quantite);
        $sql->bindParam(':date_trans_caisse', $date_debut);
        $sql->bindParam(':etat', $etat);
        $sql->execute();

        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = 'liste_caisse.php?witness=1';
        </script>
        <?php

    }else{
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = 'liste_caisse.php?witness=-2';
        </script>
        <?php
    }





}
?>
