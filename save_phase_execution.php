<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $libelle = $_POST['libelle'];
    $date_begin = $_POST['date_begin'];
    $day_delai = $_POST['day_delai'];
    $month_delai = $_POST['month_delai'];
    $id_marche = $_POST['id_marche'];


//--------------------------------- insertion un materiel -----------------------------------------//


    $query = " INSERT INTO phase_execution (libelle,date_begin,day_delai,month_delai,id_marche) 
                     VALUES (:libelle,:date_begin,:day_delai,:month_delai,:id_marche)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':libelle', $libelle);
    $sql->bindParam(':date_begin', $date_begin);
    $sql->bindParam(':day_delai', $day_delai);
    $sql->bindParam(':month_delai', $month_delai);
    $sql->bindParam(':id_marche', $id_marche);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Phase d\'exécution a été bien enregistrée.');
            window.location.href = 'details_marche?id=<?=$id_marche?>&witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_marche?id=<?=$id_marche?>&witness=1';
        </script>
        <?php

    }


}
?>
