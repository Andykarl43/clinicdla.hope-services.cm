<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $id_rec = $_POST['id_rec'];
    $date_begin = $_POST['date_begin'];
    $id_marche = $_POST['id_marche'];

    if ($id_rec == 1) {
        $nom_rec = "Reception Provisoire";

    } elseif ($id_rec == 2) {
        $nom_rec = "Reception Definitive";
    } else {
        $nom_rec = "Reception Technique";
    }


//--------------------------------- insertion un materiel -----------------------------------------//


    $query = " INSERT INTO reception_marche (id_rec,nom_rec,date_begin,id_marche) 
                     VALUES (:id_rec,:nom_rec,:date_begin,:id_marche)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':id_rec', $id_rec);
    $sql->bindParam(':nom_rec', $nom_rec);
    $sql->bindParam(':date_begin', $date_begin);
    $sql->bindParam(':id_marche', $id_marche);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            alert('Reception a été bien enregistrée.');
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
