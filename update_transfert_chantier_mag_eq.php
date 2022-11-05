<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_chantier = $_POST['id_chantier'];
    $id_eq = $_POST['id_eq'];
    $idm = $_POST['idm'];
    $quant_chantier_mag = $_POST['quant_chantier_mag'];
    $date_chantier_mag = $_POST['date_chantier_mag'];

    //echo $id_chantier.'</br>';
    // echo $id_eq.'</br>';
    // echo $quantite_chantier.'</br>';
    // echo $date_mag_chantier.'</br>';

    if ($quant_chantier_mag >= 0) {

        $query = "SELECT * from magasin_chantier_eq  where id_chantier = '$id_chantier' and id_eq='$id_eq' ";
        $q = $db->query($query);
        while ($row = $q->fetch()) {
            // $id = $row['id_materiel'];
            // $ref_materiel = $row['ref_materiel'];
            // $designation = $row['designation'];
            $quant_chantier = $row['quant_chantier'];
            // $id_cat_materiel = $row['id_cat_materiel'];
            $prix_unit_mag_chantier = $row['prix_unit_mag_chantier'];
            // $prix_total = $row['prix_total'];


            $quantite_total = $quant_chantier - $quant_chantier_mag;
            //    echo $quantite_total.'</br>';


            if ($quantite_total > 0) {

                $prix_total_f = $quantite_total * $prix_unit_mag_chantier;

                $query1 = "UPDATE magasin_chantier_eq SET quant_chantier=:quant_chantier, prix_t_mag_chantier=:prix_total, date_mag_chantier_eq=:date_mag  where id_chantier = '$id_chantier' and id_eq='$id_eq' ";

                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':quant_chantier', $quantite_total);
                $sql1->bindParam(':prix_total', $prix_total_f);
                $sql1->bindParam(':date_mag', $date_chantier_mag);
                $sql1->execute();


                $prix_total = $quant_chantier_mag * $prix_unit_mag_chantier;
                //  echo $prix_total.'</br>';


                $sql3 = "SELECT DISTINCT count(id_eq) as total from equipement where  id_eq='$id_eq' ";

                $stmt3 = $db->prepare($sql3);
                $stmt3->execute();

                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables3 as $tables) {

                    $total = $tables['total'];

                    if ($total != 1) {

                        //      $query = " INSERT INTO equipement (id_eq,quant_chantier,date_mag_chantier_eq,prix_unit_mag_chantier,prix_t_mag_chantier)
                        //             VALUES (:id_eq,:quant_chantier,:date_mag_chantier_eq,:prix_unitaire,:prix_total)";


                        // $sql = $db->prepare($query);

                        //      // Bind parameters to statement
                        //     $sql->bindParam(':id_chantier', $id_chantier);
                        //     $sql->bindParam(':id_eq', $id_eq);
                        //     $sql->bindParam(':quant_chantier', $quant_chantier);
                        //     $sql->bindParam(':date_mag_chantier_eq', $date_mag_chantier_eq);
                        //     $sql->bindParam(':prix_unitaire', $prix_unit_eq);
                        //     $sql->bindParam(':prix_total', $prix_total);
                        //     $sql->execute();


                    } else {

                        $sql = "SELECT DISTINCT * from equipement where id_eq = '$id_eq'";

                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($tables as $table) {
                            // valaur initial
                            $quant_inital = $table['quant_eq'];
                            // $date_initial=$table['date_mag_chantier_eq'];
                            $prix_total_initial = $table['prix_t_eq'];

                            //valeur final
                            $quant_final = $quant_inital + $quant_chantier_mag;
                            // echo $quant_inital.'<br/>';
                            // $date_final=$date_mag_chantier_eq;
                            // echo $date_final.'<br/>';
                            $prix_total_final = $prix_total_initial + $prix_total;
                            // echo $prix_total_final.'<br/>';


                            $query = "UPDATE equipement SET  quant_eq=:quant_eq,  prix_t_eq=:prix_t_eq where id_eq = '$id_eq' ";

                            $sql = $db->prepare($query);

                            // Bind parameters to statement;
                            $sql->bindParam(':quant_eq', $quant_final);
                            $sql->bindParam(':prix_t_eq', $prix_total_final);
                            $sql->execute();


                        }

                    }


                    //----------------------------------- sauvegarde la transaction-------------------------------//

                    $id_arrive = 0;
                    $quant_out = 0;
                    $date_move_eq = date('Y-m-d');


                    $query = " INSERT INTO mouvement_eq (id_depart,id_arrive,id_eq,quant_in,quant_out,prix_unit_move_eq,prix_t_move_eq,date_move_eq) 
                                VALUES (:id_depart,:id_arrive,:id_eq,:quant_in,:quant_out,:prix_unit_move_eq,:prix_t_move_eq,:date_move_eq)";


                    $sql = $db->prepare($query);

                    // Bind parameters to statement
                    $sql->bindParam(':id_depart', $id_chantier);
                    $sql->bindParam(':id_arrive', $id_arrive);
                    $sql->bindParam(':id_eq', $id_eq);
                    $sql->bindParam(':quant_in', $quant_chantier_mag);
                    $sql->bindParam(':quant_out', $quant_out);
                    $sql->bindParam(':prix_unit_move_eq', $prix_unit_mag_chantier);
                    $sql->bindParam(':prix_t_move_eq', $prix_total);
                    $sql->bindParam(':date_move_eq', $date_move_eq);
                    $sql->execute();
//-------------------------------- end transaction -----------------------------------//


                    if ($quantite_total) {
                        ?>
                        <script>
                            alert('Equipement a été bien transférer.');
                            window.location.href = 'details_chantier.php?id=<?=$id_chantier?>&idm=<?=$idm?>';
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert('Stock épuisé.');
                            window.location.href = 'details_chantier.php?id=<?=$id_chantier?>&idm=<?=$idm?>';
                        </script>
                        <?php

                    }


                }


            } elseif ($quantite_total < 0) {


                ?>
                <script>
                    alert('stock insuffisant.');
                    window.location.href = 'details_chantier.php?id=<?=$id_chantier?>&idm=<?=$idm?>';
                </script>
                <?php


            } else {

                ?>
                <script>
                    alert('stock du l\'équipement épuiser.');
                    window.location.href = 'details_chantier.php?id=<?=$id_chantier?>&idm=<?=$idm?>';
                </script>
                <?php


            }


        }


    } else {
        ?>
        <script>
            alert('Valeur Incorrect.');
            window.location.href = 'details_chantier.php?id=<?=$id_chantier?>&idm=<?=$idm?>';
        </script>
        <?php

    }


}
?>
