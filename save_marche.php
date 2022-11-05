<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    // $ref_four = $_POST['ref_four'];
    // $id_offre = $_POST['id_offre'];
    // $date_begin_marche = $_POST['date_begin_marche'];
    // $ref_marche = $_POST['ref_marche'];
    // $objet_marche = $_POST['objet_marche'];
    // $date_lancement = $_POST['date_lancement'];
    // $montant_ttc = $_POST['montant_ttc'];
    // $montant_ht = $_POST['montant_ht'];
    // $irm = $_POST['irm'];
    // $date_open_prix = $_POST['date_open_prix'];
    // $date_approbation = $_POST['date_approbation'];
    // $garantie_bank = $_POST['garantie_bank'];
    // $tva = $_POST['tva'];
    // $day_marche = $_POST['day_marche'];
    // $month_marche = $_POST['month_marche'];
    // $remarque = $_POST['remarque'];
    // $moa = $_POST['moa'];
    // $ingenieur = $_POST['ingenieur'];
    // $open_close=0;

    $id_offre = $_POST['id_offre'];
    $date_begin_marche = date('Y-m-d');
    $ref_marche = $_POST['ref_marche'];
    $objet_marche = $_POST['objet_marche'];
    $date_lancement = date('Y-m-d');
    $montant_ttc = $_POST['montant_ttc'];
    $montant_ht = 0;
    $irm = 0;
    $date_open_prix = date('Y-m-d');
    $date_approbation = date('Y-m-d');
    $garantie_bank = "empty";
    $tva = 0;
    $day_marche = $_POST['day_marche'];
    $month_marche = $_POST['month_marche'];
    $remarque = $_POST['remarque'];
    $moa = $_POST['moa'];
    $moe = $_POST['moe'];
    $ingenieur = $_POST['ingenieur'];
    $entreprise = $_POST['entreprise'];
    $chef = $_POST['chef'];
    $open_close = 0;


    // echo $id_offre.'</br>';
    // echo $date_begin_marche.'</br>';
    // echo $ref_marche.'</br>';
    // echo $objet_marche.'</br>';
    // echo $date_lancement.'</br>';
    // echo $montant_ttc.'</br>';
    // echo $montant_ht.'</br>';
    // echo $irm.'</br>';
    // echo $date_open_prix.'</br>';
    // echo $date_approbation.'</br>';
    // echo $garantie_bank.'</br>';
    // echo $tva.'</br>';
    // echo $day_marche.'</br>';
    // echo $month_marche.'</br>';
    // echo $remarque.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//

    // $query = " INSERT INTO marche (id_offre,date_begin_marche,ref_marche,objet_marche,date_lancement,montant_ttc,montant_ht,irm,date_open_prix,date_approbation,garantie_bank,tva,day_marche,month_marche,remarque,moa,ingenieur,open_close)
    //    VALUES (:id_offre,:date_begin_marche,:ref_marche,:objet_marche,:date_lancement,:montant_ttc,:montant_ht,:irm,:date_open_prix,:date_approbation,:garantie_bank,:tva,:day_marche,:month_marche,:remarque,:moa,:ingenieur,:open_close)";

    //                 $sql = $db->prepare($query);

    //     // Bind parameters to statement
    //            $sql->bindParam(':id_offre', $id_offre);
    //            $sql->bindParam(':date_begin_marche', $date_begin_marche);
    //            $sql->bindParam(':ref_marche', $ref_marche);
    //            $sql->bindParam(':objet_marche', $objet_marche);
    //            $sql->bindParam(':date_lancement', $date_lancement);
    //            $sql->bindParam(':montant_ttc', $montant_ttc);
    //            $sql->bindParam(':montant_ht', $montant_ht);
    //            $sql->bindParam(':irm', $irm);
    //            $sql->bindParam(':date_open_prix', $date_open_prix);
    //            $sql->bindParam(':date_approbation', $date_approbation);
    //            $sql->bindParam(':garantie_bank', $garantie_bank);
    //            $sql->bindParam(':tva', $tva);
    //            $sql->bindParam(':day_marche', $day_marche);
    //            $sql->bindParam(':month_marche', $month_marche);
    //            $sql->bindParam(':remarque', $remarque);
    //            $sql->bindParam(':moa', $moa);
    //            $sql->bindParam(':ingenieur', $ingenieur);
    //            $sql->bindParam(':open_close', $open_close);
    //            $sql->execute();


    $query = " INSERT INTO marche (id_offre,date_begin_marche,ref_marche,objet_marche,date_lancement,montant_ttc,montant_ht,irm,date_open_prix,date_approbation,garantie_bank,tva,day_marche,month_marche,remarque,moa,moe,ingenieur,entreprise,chef,open_close) 
    VALUES (:id_offre,:date_begin_marche,:ref_marche,:objet_marche,:date_lancement,:montant_ttc,:montant_ht,:irm,:date_open_prix,:date_approbation,:garantie_bank,:tva,:day_marche,:month_marche,:remarque,:moa,:moe,:ingenieur,:entreprise,:chef,:open_close)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':id_offre', $id_offre);
    $sql->bindParam(':date_begin_marche', $date_begin_marche);
    $sql->bindParam(':ref_marche', $ref_marche);
    $sql->bindParam(':objet_marche', $objet_marche);
    $sql->bindParam(':date_lancement', $date_lancement);
    $sql->bindParam(':montant_ttc', $montant_ttc);
    $sql->bindParam(':montant_ht', $montant_ht);
    $sql->bindParam(':irm', $irm);
    $sql->bindParam(':date_open_prix', $date_open_prix);
    $sql->bindParam(':date_approbation', $date_approbation);
    $sql->bindParam(':garantie_bank', $garantie_bank);
    $sql->bindParam(':tva', $tva);
    $sql->bindParam(':day_marche', $day_marche);
    $sql->bindParam(':month_marche', $month_marche);
    $sql->bindParam(':remarque', $remarque);
    $sql->bindParam(':moa', $moa);
    $sql->bindParam(':moe', $moe);
    $sql->bindParam(':ingenieur', $ingenieur);
    $sql->bindParam(':entreprise', $entreprise);
    $sql->bindParam(':chef', $chef);
    $sql->bindParam(':open_close', $open_close);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Marche a été bien enregistrée.');
            window.location.href = '<?=$marche['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$marche['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
