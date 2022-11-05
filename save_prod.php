<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {





    $nom = $_POST['nom'];
    $id_type_medi = $_POST['id_type_medi'];
    $prix_u_a = $_POST['prix_u_a'];
    $prix_u_v = $_POST['prix_u_v'];
    $date_medi = $_POST['date_medi'];
    $alert_prod = $_POST['alert_prod'];
    $date_fin = $_POST['date_fin'];
    $date_medi_os=date('Y-m-d');

    $id_four = $_POST['id_four'];

    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");
    $query  = "SELECT max(id_medi) as total from medicament";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $total_apt = $row["total"];
    }
    $id_app = $total_apt + 1;
    $ref_medi= 'MEDOC_'.$year.'_'.$month.'_'.$id_app;

    // $open_close = 0;
    // echo $ref_client.'</br>';
    // echo $raison_social_client.'</br>';
    // echo $id_type_client.'</br>';
    // echo $ville_client.'</br>';
    // echo $email_client.'</br>';
    // echo $pers_contact_client.'</br>';
    // echo $tel_contact_client.'</br>';


//--------------------------------- insertion un fournisseur -----------------------------------------//

    // $query = " INSERT INTO medecin (nom_m,prenom_m,user_m,email_m)
    //                  VALUES (:nom_m,:prenom_m,:user_m,:email_m)";


    $query = " INSERT INTO medicament (ref_medi,nom_medi,id_type_medi,date_medi,date_medi_os,prix_unitaire,prix_u_v,id_four,date_fin,alert_prod) 
                     VALUES (:ref_medi,:nom,:id_type_medi,:date_medi,:date_medi_os,:prix_u_a,:prix_u_v,:id_four,:date_fin,:alert_prod)";

    $sql = $db->prepare($query);
    // Bind parameters to statement
    $sql->bindParam(':ref_medi', $ref_medi);
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':id_type_medi', $id_type_medi);
    $sql->bindParam(':date_medi', $date_medi_os);
    $sql->bindParam(':date_medi_os', $date_medi_os);
    $sql->bindParam(':prix_u_a', $prix_u_a);
    $sql->bindParam(':prix_u_v', $prix_u_v);
    $sql->bindParam(':id_four', $id_four);
    $sql->bindParam(':date_fin', $date_fin);
    $sql->bindParam(':alert_prod', $alert_prod);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = 'liste_prod.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = 'liste_prod.php?witness=-1';
        </script>
        <?php

    }


}
?>
