<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT CIVILE -------------------------------------*/
    $id = $_POST['id_personnel'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $id_card_number = $_POST['id_card_number'];
    $id_card_validity = $_POST['id_card_validity'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $nom_pere = $_POST['nom_pere'];
    $nom_mere = $_POST['nom_mere'];
    $date_naissance = $_POST['date_naissance'];
    $lieu_naissance = $_POST['lieu_naissance'];
    $profession = $_POST['profession'];
    $situation_matrimoniale = $_POST['situation_matrimoniale'];
    $nombre_enfants = $_POST['nombre_enfants'];
    $genre = $_POST['genre'];
    $id_quartier = $_POST['id_quartier'];
    $id_ville = $_POST['id_ville'];

    $sql = "SELECT * FROM ville where id_ville='$id_ville' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $id_pays = $table['id_pays'];
    }

    // echo $nom.'</br>';
    // echo $prenom.'</br>';
    // echo $id_card_number.'</br>';
    // echo $id_card_validity.'</br>';
    // echo $tel.'</br>';
    // echo $email.'</br>';
    //  echo $nom_pere.'</br>';
    //  echo $nom_mere.'</br>';
    // echo $date_naissance.'</br>';
    // echo $lieu_naissance.'</br>';
    // echo $profession.'</br>';
    // echo $situation_matrimoniale.'</br>';
    // echo $nombre_enfants.'</br>';
    // echo $genre.'</br>';


    /*--------------------------------- SAVE DATA CIVIL STATE ---------------------------*/

    $query1 = "UPDATE personnel SET nom=:nom, prenom=:prenom, id_card_number=:id_card_number, id_card_validity=:id_card_validity, tel=:tel, email=:email, nom_pere=:nom_pere, nom_mere=:nom_mere, date_naissance=:date_naissance, lieu_naissance=:lieu_naissance, profession=:profession, situation_matrimoniale=:situation_matrimoniale, nombre_enfants=:nombre_enfants, genre=:genre, id_quartier=:id_quartier, id_ville=:id_ville, id_pays=:id_pays where id_personnel = '$id' ";

    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':nom', $nom);
    $sql1->bindParam(':prenom', $prenom);
    $sql1->bindParam(':id_card_number', $id_card_number);
    $sql1->bindParam(':id_card_validity', $id_card_validity);
    $sql1->bindParam(':tel', $tel);
    $sql1->bindParam(':email', $email);
    $sql1->bindParam(':nom_pere', $nom_pere);
    $sql1->bindParam(':nom_mere', $nom_mere);
    $sql1->bindParam(':date_naissance', $date_naissance);
    $sql1->bindParam(':lieu_naissance', $lieu_naissance);
    $sql1->bindParam(':profession', $profession);
    $sql1->bindParam(':situation_matrimoniale', $situation_matrimoniale);
    $sql1->bindParam(':nombre_enfants', $nombre_enfants);
    $sql1->bindParam(':genre', $genre);
    $sql1->bindParam(':id_quartier', $id_quartier);
    $sql1->bindParam(':id_ville', $id_ville);
    $sql1->bindParam(':id_pays', $id_pays);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            alert('Personnel a été bien modifié.');
            window.location.href = 'modifier_personnel.php?id=<?=$id?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Personnel n\'a pas été modifié.');
            window.location.href = 'modifier_personnel.php?id=<?=$id?>';
        </script>
        <?php

    }


}
?>
