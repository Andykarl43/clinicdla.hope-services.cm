<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_chantier = $_POST['id_chantier'];
    $id_materiel = $_POST['id_materiel'];
    $quantite_chantier = $_POST['quantite_chantier'];
    $date_mag_chantier = $_POST['date_mag_chantier'];

    echo $id_chantier . '</br>';
    echo $id_materiel . '</br>';
    echo $quantite_chantier . '</br>';
    echo $date_mag_chantier . '</br>';

    if ($quantite_chantier >= 0) {

        $query = "SELECT * from materiel where id_materiel= '$id_materiel' ";
        $q = $db->query($query);
        while ($row = $q->fetch()) {
            // $id = $row['id_materiel'];
            // $ref_materiel = $row['ref_materiel'];
            // $designation = $row['designation'];
            $quantite = $row['quantite'];
            // $id_cat_materiel = $row['id_cat_materiel'];
            $prix_unitaire = $row['prix_unitaire'];
            // $prix_total = $row['prix_total'];


            $quantite_total = $quantite - $quantite_chantier;
            echo $quantite_total . '</br>';


            if ($quantite_total > 0) {

                $prix_total_f = $quantite_total * $prix_unitaire;

                $query1 = "UPDATE materiel SET quantite=:quantite, prix_total=:prix_total where id_materiel = '$id_materiel' ";

                $sql1 = $db->prepare($query1);

                // Bind parameters to statement
                $sql1->bindParam(':quantite', $quantite_total);
                $sql1->bindParam(':prix_total', $prix_total_f);
                $sql1->execute();


                $prix_total = $quantite_chantier * $prix_unitaire;
                echo $prix_total . '</br>';


                $sql3 = "SELECT DISTINCT count(id_chantier) as total from magasin_chantier where id_chantier = '$id_chantier' and id_materiel='$id_materiel' ";

                $stmt3 = $db->prepare($sql3);
                $stmt3->execute();

                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables3 as $tables) {

                    $total = $tables['total'];

                    if ($total != 1) {

                        $query = " INSERT INTO magasin_chantier (id_chantier,id_materiel,quantite_chantier,date_mag_chantier,prix_unitaire_mag_chantier,prix_total_mag_chantier) 
                    VALUES (:id_chantier,:id_materiel,:quantite_chantier,:date_mag_chantier,:prix_unitaire,:prix_total)";


                        $sql = $db->prepare($query);

                        // Bind parameters to statement
                        $sql->bindParam(':id_chantier', $id_chantier);
                        $sql->bindParam(':id_materiel', $id_materiel);
                        $sql->bindParam(':quantite_chantier', $quantite_chantier);
                        $sql->bindParam(':date_mag_chantier', $date_mag_chantier);
                        $sql->bindParam(':prix_unitaire', $prix_unitaire);
                        $sql->bindParam(':prix_total', $prix_total);
                        $sql->execute();

                        if ($quantite_total) {
                            ?>
                            <script>
                                alert('materiel a été bien transférer.');
                                window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=1';
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert('Stock épuisé.');
                                window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=-1';
                            </script>
                            <?php

                        }

                    } else {

                        $sql = "SELECT DISTINCT * from magasin_chantier where id_chantier = '$id_chantier'";

                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($tables as $table) {
                            // valaur initial
                            $quant_inital = $table['quantite_chantier'];
                            $date_initial = $table['date_mag_chantier'];
                            $prix_total_initial = $table['prix_total_mag_chantier'];

                            //valeur final
                            $quant_final = $quant_inital + $quantite_chantier;
                            // echo $quant_inital.'<br/>';
                            $date_final = $date_mag_chantier;
                            // echo $date_final.'<br/>';
                            $prix_total_final = $prix_total_initial + $prix_total;
                            // echo $prix_total_final.'<br/>';


                            $query = "UPDATE magasin_chantier SET  quantite_chantier=:quantite_chantier, date_mag_chantier=:date_mag_chantier, prix_total_mag_chantier=:prix_total_mag_chantier where id_materiel = '$id_materiel' ";

                            $sql = $db->prepare($query);

                            // Bind parameters to statement;
                            $sql->bindParam(':quantite_chantier', $quant_final);
                            $sql->bindParam(':date_mag_chantier', $date_final);
                            $sql->bindParam(':prix_total_mag_chantier', $prix_total_final);
                            $sql->execute();

                            if ($quantite_total) {
                                ?>
                                <script>
                                    alert('materiel a été bien transférer.');
                                    window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=1';
                                </script>
                                <?php
                            } else {
                                ?>
                                <script>
                                    alert('Stock épuisé.');
                                    window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=-1';
                                </script>
                                <?php

                            }


                        }

                    }


                }


            } elseif ($quantite_total < 0) {


                ?>
                <script>
                    alert('stock insuffisant.');
                    window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=-2';
                </script>
                <?php


            } else {

                ?>
                <script>
                    alert('stock du matériel épuiser.');
                    window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=2';
                </script>
                <?php


            }


        }


    } else {
        ?>
        <script>
            alert('Valeur Incorrect.');
            window.location.href = 'ajouter_materiel_chantier.php?id_materiel=<?=$id_materiel?>&witness=2';
        </script>
        <?php

    }


}
?>
