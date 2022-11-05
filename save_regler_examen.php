<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if($_POST)
{


    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");

    $id_reg_exa = $_POST['id_reg_exa'];
    $id_caisse = $_POST['id_caisse'];
    $id_patient = $_POST['id_patient'];
    $id_exa = $_POST['id_exa'];
    $id_perso = $_POST['id_perso'];
    $somme = $_POST['somme'];
    $payer = abs($_POST['payer']);
    $date_reg_exa=date('Y-m-d');
   // $open_close=0;





    $sql="SELECT count(id_reg_exa) as total, ref_reg_exa as ref, somme, payer FROM regler_examen where id_reg_exa='$id_reg_exa' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $count=$table['total'];

        $payer_i=$table['payer'];
        $ref_reg_exa=$table['ref'];
    }
    if($count==0){

        //$ref_reg_exa='REF_2021'.$id_ing;

        if($somme-$payer==0){
           // $etat = 'OK';

            $sql = "INSERT INTO regler_examen (id_caisse,id_perso,id_exa,id_patient,somme,payer,date_reg_exa)
                                  VALUES (?,?,?,?,?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($id_caisse,$id_perso,$id_exa,$id_patient,$somme,$payer,$date_reg_exa));




            $sql="SELECT solde as total FROM caisse where id_caisse='$id_caisse'  ";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($tables as $table)
            {
                $solde=$table['total'];

            }

            $somme=$payer+$solde;

            $query1 = "UPDATE caisse SET  solde=:payer where id_caisse = '$id_caisse' ";
            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':payer', $somme);
            $sql1->execute();


            $ref_caisse='N/A';
            $id_beneficiaire=$id_patient;
            $somme=$payer;
            $date_hist=date('Y-m-d');
            $sum_sortie=0;


            $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_entre,montant_sortie,date_hist)
                      VALUES (?,?,?,?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($id_caisse,$ref_caisse,$id_beneficiaire,$somme,$sum_sortie,$date_hist));


            if($sql1)
            {
                ?>
                <script>
                    // alert('Profession a été bien enregistrée.');
                    window.location.href='liste_examen_checker.php?witness=1';
                </script>
                <?php
            }

            else
            {
                ?>
                <script>
                    // alert('Error.');
                    window.location.href='liste_examen_checker.php?witness=-1';
                </script>
                <?php

            }


        }elseif($somme-$payer<0){

            ?>
            <script>
                // alert('Personnel a été bien modifié.');
                window.location.href='modifier_examen_checker.php?id=<?=$id_exa?>&witness=2';
            </script>
            <?php


        }else{

            $sql = "INSERT INTO regler_examen (id_caisse,id_perso,id_exa,id_patient,somme,payer,date_reg_exa)
                                  VALUES (?,?,?,?,?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($id_caisse,$id_perso,$id_exa,$id_patient,$somme,$payer,$date_reg_exa));

            $sql="SELECT solde as total FROM caisse where id_caisse='$id_caisse'  ";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($tables as $table)
            {
                $solde=$table['total'];

            }

            $somme=$payer+$solde;

            $query1 = "UPDATE caisse SET  solde=:payer where id_caisse = '$id_caisse' ";
            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':payer', $somme);
            $sql1->execute();

            $ref_caisse='N/A';
            $id_beneficiaire=$id_patient;
            $somme=$payer;
            $date_hist=date('Y-m-d');
            $sum_sortie=0;


            $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_entre,montant_sortie,date_hist)
                      VALUES (?,?,?,?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($id_caisse,$ref_caisse,$id_beneficiaire,$somme,$sum_sortie,$date_hist));

            if($sql1)
            {
                ?>
                <script>
                    // alert('Profession a été bien enregistrée.');
                    window.location.href='liste_examen_checker.php?witness=1';
                </script>
                <?php
            }

            else
            {
                ?>
                <script>
                    // alert('Error.');
                    window.location.href='liste_examen_checker.php?witness=-1';
                </script>
                <?php

            }

        }
    }elseif($count!=0 ){

        if($somme-$payer_i!=0){

            $totaux=$payer+$payer_i;
        if($somme-$totaux>=0){
            // $etat = 'OK';



            $query1 = " UPDATE regler_examen SET  id_caisse=:id_caisse, id_perso=:id_perso,payer=:totaux,date_reg_exa=:date_reg_exa    
                    WHERE id_reg_exa='$id_reg_exa' ";


            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':id_caisse', $id_caisse);
            $sql1->bindParam(':id_perso', $id_perso);
            $sql1->bindParam(':totaux', $totaux);
            $sql1->bindParam(':date_reg_exa', $date_reg_exa);

            $sql1->execute();




            $sql="SELECT solde as total FROM caisse where id_caisse='$id_caisse'  ";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($tables as $table)
            {
                $solde=$table['total'];

            }

            $somme=$payer+$solde;

            $query1 = "UPDATE caisse SET  solde=:payer where id_caisse = '$id_caisse' ";
            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':payer', $somme);
            $sql1->execute();


            $ref_caisse='N/A';
            $id_beneficiaire=$id_patient;
            $somme=$payer;
            $date_hist=date('Y-m-d');
            $sum_sortie=0;


            $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_entre,montant_sortie,date_hist)
                      VALUES (?,?,?,?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($id_caisse,$ref_caisse,$id_beneficiaire,$somme,$sum_sortie,$date_hist));


            if($sql1)
            {
                ?>
                <script>
                  //   alert(' a été bien enregistrée.');
                    window.location.href='liste_examen_checker.php?witness=1';
                </script>
                <?php
            }

            else
            {
                ?>
                <script>
                    // alert('Error.');
                    window.location.href='liste_examen_checker.php?witness=-1';
                </script>
                <?php

            }


        }elseif($somme-$totaux<0){

            ?>
            <script>
                alert('Payement exédant !!!!');
                window.location.href='modifier_examen_checker.php?id=<?=$id_exa?>&witness=2';
            </script>
            <?php


        }






    }else{
            ?>
            <script>
                 alert('Payement régler !!! ');
                window.location.href='liste_examen_checker.php?witness=-1';
            </script>
            <?php
        }
    }







}
?>
