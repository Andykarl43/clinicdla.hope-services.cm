<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_chantier = $_POST['id_chantier'];
    $id_eq = $_POST['id_eq'];
    $quant_chantier = $_POST['quant_chantier'];
    $date_mag_chantier_eq = $_POST['date_mag_chantier_eq'];

    // echo $id_chantier.'</br>';
    // echo $id_materiel.'</br>';
    // echo $quantite_chantier.'</br>';
    // echo $date_mag_chantier.'</br>';

    if ($quant_chantier >= 0) {

        $query = "SELECT * from equipement where id_eq= '$id_eq' ";
        $q = $db->query($query);
        while ($row = $q->fetch()) {
            // $id = $row['id_materiel'];
            // $ref_materiel = $row['ref_materiel'];
            // $designation = $row['designation'];
            $quant_eq = $row['quant_eq'];
            // $id_cat_materiel = $row['id_cat_materiel'];
            $prix_unit_eq = $row['prix_unit_eq'];
            // $prix_total = $row['prix_total'];


            $quantite_total = $quant_eq - $quant_chantier;
            echo $quantite_total . '</br>';


            if ($quantite_total > 0) {

                $prix_total_f = $quantite_total * $prix_unit_eq;

                $query1 = "UPDATE equipement SET quant_eq=:quant_eq, prix_t_eq=:prix_t_eq where id_eq = '$id_eq' ";

                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':quant_eq', $quantite_total);
                $sql1->bindParam(':prix_t_eq', $prix_total_f);
                $sql1->execute();


                $prix_total = $quant_chantier * $prix_unit_eq;
                echo $prix_total . '</br>';


                $sql3 = "SELECT DISTINCT count(id_chantier) as total from magasin_chantier_eq where id_chantier = '$id_chantier' and id_eq='$id_eq' ";

                $stmt3 = $db->prepare($sql3);
                $stmt3->execute();

                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables3 as $tables) {

                    $total = $tables['total'];

                    if ($total != 1) {

                        $query = " INSERT INTO magasin_chantier_eq (id_chantier,id_eq,quant_chantier,date_mag_chantier_eq,prix_unit_mag_chantier,prix_t_mag_chantier) 
                    VALUES (:id_chantier,:id_eq,:quant_chantier,:date_mag_chantier_eq,:prix_unitaire,:prix_total)";


                        $sql = $db->prepare($query);

                        // Bind parameters to statement
                        $sql->bindParam(':id_chantier', $id_chantier);
                        $sql->bindParam(':id_eq', $id_eq);
                        $sql->bindParam(':quant_chantier', $quant_chantier);
                        $sql->bindParam(':date_mag_chantier_eq', $date_mag_chantier_eq);
                        $sql->bindParam(':prix_unitaire', $prix_unit_eq);
                        $sql->bindParam(':prix_total', $prix_total);
                        $sql->execute();

                    } else {

                        $sql = "SELECT DISTINCT * from magasin_chantier_eq where id_chantier = '$id_chantier'";

                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($tables as $table) {
                            // valaur initial
                            $quant_inital = $table['quant_chantier'];
                            $date_initial = $table['date_mag_chantier_eq'];
                            $prix_total_initial = $table['prix_t_mag_chantier'];

                            //valeur final
                            $quant_final = $quant_inital + $quant_chantier;
                            // echo $quant_inital.'<br/>';
                            $date_final = $date_mag_chantier_eq;
                            // echo $date_final.'<br/>';
                            $prix_total_final = $prix_total_initial + $prix_total;
                            // echo $prix_total_final.'<br/>';


                            $query = "UPDATE magasin_chantier_eq SET  quant_chantier=:quant_chantier, date_mag_chantier_eq=:date_mag_chantier_eq, prix_t_mag_chantier=:prix_t_mag_chantier where id_eq = '$id_eq' ";

                            $sql = $db->prepare($query);

                            // Bind parameters to statement;
                            $sql->bindParam(':quant_chantier', $quant_final);
                            $sql->bindParam(':date_mag_chantier_eq', $date_final);
                            $sql->bindParam(':prix_t_mag_chantier', $prix_total_final);
                            $sql->execute();


                        }

                    }

//----------------------------------- sauvegarde la transaction-------------------------------//

                    $id_depart = 0;
                    $quant_in = 0;
                    $date_move_eq = date('Y-m-d');


                    $query = " INSERT INTO mouvement_eq (id_depart,id_arrive,id_eq,quant_in,quant_out,prix_unit_move_eq,prix_t_move_eq,date_move_eq) 
                                VALUES (:id_depart,:id_arrive,:id_eq,:quant_in,:quant_out,:prix_unit_move_eq,:prix_t_move_eq,:date_move_eq)";


                    $sql = $db->prepare($query);

                    // Bind parameters to statement
                    $sql->bindParam(':id_depart', $id_depart);
                    $sql->bindParam(':id_arrive', $id_chantier);
                    $sql->bindParam(':id_eq', $id_eq);
                    $sql->bindParam(':quant_in', $quant_in);
                    $sql->bindParam(':quant_out', $quant_chantier);
                    $sql->bindParam(':prix_unit_move_eq', $prix_unit_eq);
                    $sql->bindParam(':prix_t_move_eq', $prix_total);
                    $sql->bindParam(':date_move_eq', $date_move_eq);
                    $sql->execute();
//-------------------------------- end transaction -----------------------------------//


                    if ($quantite_total) {
                        ?>
                        <script>
                            alert('Equipement a été bien transférer.');
                            window.location.href = 'ajouter_materiel_chantier_eq.php?id_eq=<?=$id_eq?>&witness=1';
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert('Stock épuisé.');
                            window.location.href = 'ajouter_materiel_chantier_eq.php?id_eq=<?=$id_eq?>&witness=-1';
                        </script>
                        <?php

                    }


                }


            } elseif ($quantite_total < 0) {


                ?>
                <script>
                    alert('stock insuffisant.');
                    window.location.href = 'ajouter_materiel_chantier_eq.php?id_eq=<?=$id_eq?>&witness=-2';
                </script>
                <?php


            } else {

                ?>
                <script>
                    alert('stock du l\'équipement épuiser.');
                    window.location.href = 'ajouter_materiel_chantier_eq.php?id_eq=<?=$id_eq?>&witness=2';
                </script>
                <?php


            }


        }


    } else {
        ?>
        <script>
            alert('Valeur Incorrect.');
            window.location.href = 'ajouter_materiel_chantier_eq.php?id_eq=<?=$id_eq?>&witness=2';
        </script>
        <?php

    }


}
?>
