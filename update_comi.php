<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")

?>

<?php

if ($_POST) {
    $id_reg = $_POST['id_reg'];
    $id_service = $_POST['id_service'];
    $id_spe = $_POST['id_spe'];
    $id_perso = $_POST['id_perso'];
    $type_spe = $_POST['type_spe'];
    $date_reg_comi = date('Y-m-d');
    $somme = $_POST['somme_comi'];
    $payer = $_POST['payer_comi'];

    switch ($type_spe){
        case 'M';
            $nom_lien="liste_commission_solde.php";
            break;
        case 'C';
            $nom_lien="liste_commission_chirugien.php";
            break;
        case 'L';
            $nom_lien="liste_commission_laborantin.php";
            break;
        case 'I';
            $nom_lien="liste_commission_nurse.php";
            break;
    }



    /*--------------------------------- ETAT INFOS RH -------------------------------------*/

    switch ($id_service){
        case '1';
            $nom_table="regler_comi_consul";
            break;
        case '2';
            $nom_table="regler_comi_exa";
            break;
        case '3';
            $nom_table="regler_comi_hosp";
            break;
        case '5';
            $nom_table="regler_comi_ope";
            break;
        case '6';
            $nom_table="regler_comi_anes";
            break;
        case '7';
            $nom_table="regler_comi_eco";
            break;
    }

    $payer_sum=0;
    $remise_sum=0;
    $cnt=0;
    $cnt_pers=0;
    $query  = "SELECT * from ".$nom_table." where id_spe='$id_spe' and id_reg_comi='$id_reg' and type_spe='$type_spe' ";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $payer_init = $row["payer_comi"];
        $somme_init = $row["somme_comi"];
       // $id_patient = $row["id_patient"];
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

    if($cnt_pers==1 )
    {
        if($cnt==0){
            if($somme-($payer)>=0){

//                $query1 = "UPDATE regler_comi_consul SET  payer=:payer, remise=:remise
//                    WHERE id_reg_comi_consul = '$id_reg'and id_spe='$id_spe' and type_spe='M'";
//
//
//                $sql1 = $db->prepare($query1);
//
//                // Bind parameters to statement
//                $sql1->bindParam(':payer', $payer);
//                $sql1->bindParam(':remise', $remise);
//                $sql1->execute();
                $date_reg=date('Y-m-d');

                $query = " INSERT INTO ".$nom_table."(id_service,id_spe,type_spe,somme_comi,payer_comi,id_caisse,id_perso,date_reg_comi) 
                     VALUES (:id_service,:id_spe,:type_spe,:somme_comi,:payer_comi,:id_caisse,:id_perso,:date_reg)";

                $sql = $db->prepare($query);
                // Bind parameters to statement
                $sql->bindParam(':id_service', $id_service);
                $sql->bindParam(':id_spe', $id_spe);
                $sql->bindParam(':type_spe', $type_spe);
                $sql->bindParam(':somme_comi', $somme);
                $sql->bindParam(':payer_comi', $payer);
                $sql->bindParam(':id_caisse', $id_caisse);
                $sql->bindParam(':id_perso', $id_perso);
                $sql->bindParam(':date_reg', $date_reg);
                $sql->execute();




                $quantite_final_src=$solde_src-$payer;
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
                $statut='S';
                if($type_spe=='C'){
                    $type_spe='CH';
                }
                $type_beni=$type_spe;


                $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_sortie,date_hist,statut,type_beni,id_perso,service)
                      VALUES (?,?,?,?,?,?,?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($id_caisse,$ref_caisse,$id_spe,$somme,$date_hist,$statut,$type_beni,$id_perso,$id_service));




                if ($sql1) {
                    ?>
                    <script>
                        //alert('Consulattion a été bien mis à jour.');
                        window.location.href = '<?=$nom_lien?>?id=<?=$id_spe?>';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        //   alert('client n\'a pas été mis à jour.');
                        window.location.href = '<?=$nom_lien?>?id=<?=$id_spe?>&witness=-1';
                    </script>
                    <?php

                }
            }else{
                ?>
                <script>
                    //  alert('client n\'a pas été mis à jour.');
                    window.location.href = '<?=$nom_lien?>?id=<?=$id_spe?>&witness=-1';
                </script>
                <?php

            }
        }else{
            $payer_sum=$payer_init+$payer;
            $somme_sum=$somme_init+$somme;
          //  $remise_sum=$remise_init+$remise;
            if($somme_sum-$payer_sum>=0){

                $query1 = "UPDATE $nom_table  SET  payer_comi=:payer, somme_comi=:somme
                    WHERE id_reg_comi = '$id_reg'and id_spe='$id_spe' and type_spe='M'";


                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':payer', $payer_sum);
                $sql1->bindParam(':somme', $somme_sum);
                $sql1->execute();

                $quantite_final_src=$solde_src-$payer;
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
                $statut='S';
                if($type_spe=='C'){
                    $type_spe='CH';
                }
                $type_beni=$type_spe;



                $sql = "INSERT INTO historique_caisse (id_caisse,ref_caisse,id_beneficiaire,montant_sortie,date_hist,statut,type_beni,id_perso,service)
                      VALUES (?,?,?,?,?,?,?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($id_caisse,$ref_caisse,$id_spe,$somme,$date_hist,$statut,$type_beni,$id_perso,$id_service));



                if ($sql1) {
                    ?>
                    <script>
                        //alert('Consulattion a été bien mis à jour.');
                        window.location.href = '<?=$nom_lien?>?id=<?=$id_spe?>&witness=1';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        //   alert('client n\'a pas été mis à jour.');
                       window.location.href = '<?=$nom_lien?>?id=<?=$id_spe?>&witness=-1';
                    </script>
                    <?php

                }
            }else{
                ?>
                <script>
                    //  alert('client n\'a pas été mis à jour.');
                    window.location.href ='<?=$nom_lien?>?id=<?=$id_spe?>&witness=-2';
                </script>
                <?php

            }

        }
    }else{
        ?>
        <script>
            alert('Vous n\'avez pas de caisse.');
            window.location.href = '<?=$nom_lien?>?id=<?=$id_spe?>';
        </script>
        <?php
    }










}
?>
