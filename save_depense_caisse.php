<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

?>

<?php

if($_POST)
{


    /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
    $ref = $_POST['ref'];
    $id_caisse= $_POST['id_caisse'];

    $id_perso=$_POST['id_perso'];
    $motif=$_POST['motif'];
    $montant = $_POST['montant'];

    /*--------------------------------- CAISSE SRC ET DEST---------------------------*/

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

        $etat=0;
        $date_deps= date("Y-m-d");
        $date_valide='N/A';
        $query = " INSERT INTO depense_caisse (id_caisse,id_perso,ref,date_deps,montant,motif,etat) 
                     VALUES (:id_caisse,:id_perso,:refe,:date_deps,:montant,:motif,:etat)";
        $sql = $db->prepare($query);

        // Bind parameters to statement
        $sql->bindParam(':id_caisse', $id_caisse);
        $sql->bindParam(':id_perso', $id_perso);
        $sql->bindParam(':refe', $ref);
        $sql->bindParam(':date_deps', $date_deps);
        $sql->bindParam(':montant', $montant);
        $sql->bindParam(':motif', $motif);
        $sql->bindParam(':etat', $etat);
        $sql->execute();

        $query1 = "UPDATE caisse SET solde=:quantite where  id_caisse='$id_caisse'";

        $req = $db->prepare($query1);

        // Bind parameters to statement
        $req->bindParam(':quantite', $quantite_final_src);
        $req->execute();


        ?>
        <script>
            //alert('client a été bien enregistrée.');
               window.location.href = '<?=$depense_caisse['option2_link']?>?witness=1';
        </script>
        <?php

    }else{
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$depense_caisse['option2_link']?>?witness=-2';
        </script>
        <?php
    }





}
?>
