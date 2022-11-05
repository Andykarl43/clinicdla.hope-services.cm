<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {
    $ref_ordo = $_POST['ref_ordo'];
    $id_reg_ordo = $_POST['id_reg_ordo'];
    $id_perso_session = $_POST['id_perso_session'];
    $payer = $_POST['payer'];
    $somme = $_POST['somme'];
    $remise = $_POST['remise'];
    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $payer_sum = 0;
    $remise_sum=0;
    $cnt = 0;
    $cnt_pers=0;
    $query  = "SELECT * from regler_ordo where id_reg_ordo='$id_reg_ordo' and ref_ordo='$ref_ordo'";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $payer_init = $row["payer"];
        $remise_init = $row["remise"];
        $id_patient = $row["id_patient"];
        $cnt+=1;
    }
    if( $lvl == 4 || $lvl == 7 || $lvl == 11){
        $id_caisse = $_POST['id_caisse'];

        $sql = "SELECT * FROM caisse where id_caisse='$id_caisse' and open_close!=1 ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $cnt_pers += 1;
        }

        $sql="SELECT * FROM caisse where id_caisse='$id_caisse' and open_close!=1 ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tables as $table)
        {
            $solde_src=$table['solde'];
            $id_caisse=$table['id_caisse'];
        }


    }else {
        $sql = "SELECT * FROM caisse where id_perso='$id_perso_session' and open_close!=1 ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $cnt_pers += 1;
        }


        $sql="SELECT * FROM caisse where id_perso='$id_perso_session' and open_close!=1 ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tables as $table)
        {
            $solde_src=$table['solde'];
            $id_caisse=$table['id_caisse'];
        }


    }
    if($cnt_pers==1)
    {
        if($cnt==0){
            if($somme-($payer+$remise)>=0){

                $query1 = "UPDATE regler_ordo SET  payer=:payer, id_perso=:id_perso, id_caisse=:id_caisse, remise=:remise
                    WHERE ref_ordo = '$ref_ordo'and id_reg_ordo='$id_reg_ordo'";


                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':payer', $payer);
                $sql1->bindParam(':id_perso', $id_perso_session);
                $sql1->bindParam(':id_caisse', $id_caisse);
                $sql1->bindParam(':remise', $remise);
                $sql1->execute();

                $quantite_final_src=$solde_src+$payer;
                $query1 = "UPDATE caisse SET  solde=:payer
                    WHERE  id_caisse='$id_caisse'";


                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':payer', $quantite_final_src);
                $sql1->execute();

                $ref_caisse='N/A';
                $id_beneficiaire=$id_caisse;
                $id_perso=$id_perso_session;
                $somme=$payer;
                $date_hist=date('Y-m-d');
                $statut='E';
                $type_beni='P';
                $service=4;

                $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_entre,date_hist,statut,type_beni,id_perso,service)
                      VALUES (?,?,?,?,?,?,?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($id_caisse,$ref_caisse,$id_patient,$somme,$date_hist,$statut,$type_beni,$id_perso,$service));


                if ($sql1) {
                    ?>
                    <script>
                        //alert('Consulattion a été bien mis à jour.');
                        window.location.href = 'liste_odornance_checker.php?witness=1';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        //   alert('client n\'a pas été mis à jour.');
                  /     window.location.href = 'liste_odornance_checker.php?witness=-1';
                    </script>
                    <?php

                }
            }else{
                ?>
                <script>
                    //  alert('client n\'a pas été mis à jour.');
                    window.location.href = 'liste_odornance_checker.php?witness=-1';
                </script>
                <?php

            }
        }else{
            $payer_sum=$payer_init+$payer;
            $remise_sum=$remise_init+$remise;
            if($somme-($payer_sum+$remise_sum) >=0){

                $query1 = "UPDATE regler_ordo SET  payer=:payer,  id_perso=:id_perso, id_caisse=:id_caisse, remise=:remise
                    WHERE ref_ordo = '$ref_ordo'and id_reg_ordo='$id_reg_ordo'";


                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':payer', $payer_sum);
                $sql1->bindParam(':id_perso', $id_perso_session);
                $sql1->bindParam(':id_caisse', $id_caisse);
                $sql1->bindParam(':remise', $remise_sum);
                $sql1->execute();

                $quantite_final_src=$solde_src+$payer;
                $query1 = "UPDATE caisse SET  solde=:payer
                    WHERE  id_caisse='$id_caisse'";


                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':payer', $quantite_final_src);
                $sql1->execute();

                $ref_caisse='N/A';
                $id_beneficiaire=$id_caisse;
                $id_perso=$id_perso_session;
                $somme=$payer;
                $date_hist=date('Y-m-d');
                $statut='E';
                $type_beni='P';
                $service=4;

                $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_entre,date_hist,statut,type_beni,id_perso,service)
                      VALUES (?,?,?,?,?,?,?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($id_caisse,$ref_caisse,$id_patient,$somme,$date_hist,$statut,$type_beni,$id_perso,$service));


                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':payer', $quantite_final_src);
                $sql1->execute();


                if ($sql1) {
                    ?>
                    <script>
                        //alert('Consulattion a été bien mis à jour.');
                        window.location.href = 'liste_ordonance_checker.php?witness=1';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        //   alert('client n\'a pas été mis à jour.');
                        window.location.href = 'liste_ordonance_checker.php?witness=-1';
                    </script>
                    <?php

                }
            }else{
                ?>
                <script>
                    //  alert('client n\'a pas été mis à jour.');
                    window.location.href = 'liste_ordonance_checker.php?witness=-1';
                </script>
                <?php

            }

        }
    }else{
        ?>
        <script>
            alert('Vous n\'avez pas de caisse.');
            window.location.href = 'liste_ordonance_checker.php?witness=-1';
        </script>
        <?php
    }










}
?>
