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

    $id_reg_ope = $_POST['id_reg_ope'];
    $id_caisse = $_POST['id_caisse'];
    $id_patient = $_POST['id_patient'];
    $id_ope = $_POST['id_ope'];
    $id_perso = $_POST['id_perso'];
    $somme = $_POST['somme'];
    $payer = abs($_POST['payer']);
    $date_reg_exa=date('Y-m-d');
    // $open_close=0;





    $sql="SELECT count(id_reg_ope) as total, ref_reg_ope as ref, somme, payer FROM regler_ope where id_reg_ope='$id_reg_ope' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $count=$table['total'];

        $payer_i=$table['payer'];
        $ref_reg_ope=$table['ref'];
    }
    if($count==0){
        ?>
        <script>
             alert(' ERROR.');
            window.location.href='liste_operation_checker.php?witness=-1';
        </script>
        <?php


    }elseif($count!=0 ){

        if($somme-$payer_i!=0){

            $totaux=$payer+$payer_i;
            if($somme-$totaux>=0){
                // $etat = 'OK';



                $query1 = " UPDATE regler_ope SET  id_caisse=:id_caisse, id_perso=:id_perso,payer=:totaux,date_reg_ope=:date_reg_ope    
                    WHERE id_reg_ope='$id_reg_ope' ";


                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':id_caisse', $id_caisse);
                $sql1->bindParam(':id_perso', $id_perso);
                $sql1->bindParam(':totaux', $totaux);
                $sql1->bindParam(':date_reg_ope', $date_reg_ope);

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
                        window.location.href='liste_operation_checker.php?witness=1';
                    </script>
                    <?php
                }

                else
                {
                    ?>
                    <script>
                        // alert('Error.');
                        window.location.href='liste_operation_checker.php?witness=-1';
                    </script>
                    <?php

                }


            }elseif($somme-$totaux<0){

                ?>
                <script>
                    alert('Payement exédant !!!!');
                    window.location.href='modifier_ope_checker.php?id=<?=$id_ope?>&witness=2';
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
