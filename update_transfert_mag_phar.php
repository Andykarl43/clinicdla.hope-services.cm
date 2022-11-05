<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
if ($_POST) {
    $id_medi = $_POST['id_medi'];
    $quantite = $_POST['quantite'];
    $date_phar=date('Y-m-d');
    $heure=date("G:i");

    $query = "SELECT * from medicament where id_medi= '$id_medi' ";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table) {
        $nom_medi = $table['nom_medi'];
    }

    $query = "SELECT * from magasin where id_medi= '$id_medi' ";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table) {
        $quantite_in = $table['qt_com'];
    }
    $quantite_final=$quantite_in-$quantite;

    if($quantite_final>=0){
        $query1 = "UPDATE magasin SET qt_com=:quantite where  id_medi='$id_medi'";

        $req = $db->prepare($query1);

        // Bind parameters to statement
        $req->bindParam(':quantite', $quantite_final);
        $req->execute();

        $sql = "SELECT count(id_medi) as total, quantite FROM pharmacie where id_medi='$id_medi' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $to = $table['total'];
            $quantite_init = $table['quantite'];
        }



        if ($to != 0) {
            $qt_total = $quantite_init + $quantite;

            $query1 = "UPDATE pharmacie SET quantite=:quantite where id_medi='$id_medi'";

            $sql = $db->prepare($query1);

            // Bind parameters to statement
            $sql->bindParam(':quantite', $qt_total);
            $sql->execute();
        } else {


            $query = " INSERT INTO pharmacie (id_medi,mon_medi,quantite,date_phar) 
                     VALUES (:id_medi,:nom_medi,:quantite,:date_phar)";

            $sql = $db->prepare($query);
            // Bind parameters to statement
            $sql->bindParam(':id_medi', $id_medi);
            $sql->bindParam(':nom_medi', $nom_medi);
            $sql->bindParam(':quantite', $quantite);
            $sql->bindParam(':date_phar', $date_phar);
            $sql->execute();
        }


    }else{
        ?>
        <script>
            //alert('Error.');
            window.location.href = 'liste_mag_centrale.php?witness=-2';
        </script>
        <?php

    }



    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = 'liste_mag_centrale.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = 'liste_mag_centrale.php?witness=-1';
        </script>
        <?php

    }

}
?>

