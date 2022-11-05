<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $idc = $_POST['idc'];
    $id_etape = $_POST['id_etape'];
    $id_chantier = $_POST['id_chantier'];
    $id_eq = $_POST['id_eq'];
    $quant_etape = $_POST['quant_etape'];
    $date_mag_etape_eq = $_POST['date_mag_etape_eq'];

    // echo $id_etape.'</br>';
    // echo $id_materiel.'</br>';
    // echo $quantite_etape.'</br>';
    // echo $date_mag_etape.'</br>';

    if ($quantite_etape >= 0) {
        $query = "SELECT * from magasin_chantier_eq where id_eq= '$id_eq' and id_chantier='$id_chantier' ";
        $q = $db->query($query);
        while ($row = $q->fetch()) {
            // $id = $row['id_materiel'];
            // $ref_materiel = $row['ref_materiel'];
            // $designation = $row['designation'];
            $quant_chantier = $row['quant_chantier'];
            // $id_cat_materiel = $row['id_cat_materiel'];
            $prix_uni_mag = $row['prix_unit_mag_chantier'];
            // $prix_total = $row['prix_total'];


            $quantite_total = $quant_chantier - $quant_etape;
            echo $quantite_total . '</br>';


            if ($quantite_total > 0) {

                $prix_total_f = $quantite_total * $prix_uni_mag;

                $query1 = "UPDATE magasin_chantier_eq SET quant_chantier=:quantite, prix_t_mag_chantier=:prix_total where id_eq = '$id_eq' and id_chantier= '$id_chantier' ";

                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':quantite', $quantite_total);
                $sql1->bindParam(':prix_total', $prix_total_f);
                $sql1->execute();


                $prix_total = $quant_etape * $prix_uni_mag;
                echo $prix_total . '</br>';


                $sql3 = "SELECT DISTINCT count(id_etape) as total from magasin_etape_eq where id_etape = '$id_etape' and id_eq='$id_eq'";

                $stmt3 = $db->prepare($sql3);
                $stmt3->execute();

                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables3 as $tables) {

                    $total = $tables['total'];

                    if ($total != 1) {

                        $query = " INSERT INTO magasin_etape_eq (id_chantier,id_etape,id_eq,quant_etape,date_mag_etape_eq,prix_unit_mag_etape,prix_t_mag_etape) 
                    VALUES (:id_chantier,:id_etape,:id_eq,:quant_etape,:date_mag_etape_eq,:prix_unitaire,:prix_total)";


                        $sql = $db->prepare($query);

                        // Bind parameters to statement
                        $sql->bindParam(':id_chantier', $id_chantier);
                        $sql->bindParam(':id_etape', $id_etape);
                        $sql->bindParam(':id_eq', $id_eq);
                        $sql->bindParam(':quant_etape', $quant_etape);
                        $sql->bindParam(':date_mag_etape_eq', $date_mag_etape_eq);
                        $sql->bindParam(':prix_unitaire', $prix_uni_mag);
                        $sql->bindParam(':prix_total', $prix_total);
                        $sql->execute();

                        if ($quantite_total > 0) {
                            ?>
                            <script>
                                alert('Equipement a été bien transférer.');
                                window.location.href = 'ajouter_etape_materiel_eq.php?id=<?=$id_etape?>&idc=<?=$idc?>&witness=1';
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert('Stock est épuisé.');
                                window.location.href = 'ajouter_etape_materiel_eq.php?id=<?=$id_etape?>&idc=<?=$idc?>&witness=-1';
                            </script>
                            <?php

                        }

                    } else {

                        $sql = "SELECT DISTINCT * from magasin_etape_eq where id_etape = '$id_etape' and id_eq='$id_eq' ";

                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($tables as $table) {
                            // valaur initial
                            $quant_inital = $table['quant_etape'];
                            $date_initial = $table['date_mag_etape_eq'];
                            $prix_total_initial = $table['prix_t_mag_etape'];

                            //valeur final
                            $quant_final = $quant_inital + $quant_etape;
                            // echo $quant_inital.'<br/>';
                            $date_final = $date_mag_etape_eq;
                            // echo $date_final.'<br/>';
                            $prix_total_final = $prix_total_initial + $prix_total;
                            // echo $prix_total_final.'<br/>';


                            $query = "UPDATE magasin_etape_eq SET  quant_etape=:quant_etape, date_mag_etape_eq=:date_mag_etape_eq, prix_t_mag_etape=:prix_total_final where id_eq = '$id_eq' and id_etape = '$id_etape' ";

                            $sql = $db->prepare($query);

                            // Bind parameters to statement;
                            $sql->bindParam(':quant_etape', $quant_final);
                            $sql->bindParam(':date_mag_etape_eq', $date_final);
                            $sql->bindParam(':prix_total_final', $prix_total_final);
                            $sql->execute();

                            if ($quantite_total > 0) {
                                ?>
                                <script>
                                    alert('Equipement a été bien transférer.');
                                    window.location.href = 'ajouter_etape_materiel_eq.php?id=<?=$id_etape?>&idc=<?=$idc?>&witness=1';
                                </script>
                                <?php
                            } else {
                                ?>
                                <script>
                                    alert('Stock est épuisé.');
                                    window.location.href = 'ajouter_etape_materiel_eq.php?id=<?=$id_etape?>&idc=<?=$idc?>&witness=-1';
                                </script>
                                <?php

                            }


                        }

                    }


                }


            } else {


                ?>
                <script>
                    alert('stock insuffisant.');
                    window.location.href = 'ajouter_etape_materiel_eq.php?id=<?=$id_etape?>&idc=<?=$idc?>&witness=-2';
                </script>
                <?php


            }


        }
    } else {

        ?>
        <script>
            alert('Valeur incorrect.');
            window.location.href = 'ajouter_etape_materiel_eq.php?id=<?=$id_etape?>&idc=<?=$idc?>&witness=2';
        </script>
        <?php

    }


}
?>
