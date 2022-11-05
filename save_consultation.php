<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {





    $id_patient = $_POST['id_patient'];
    $id_nurse = $_POST['id_nurse'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $temp = $_POST['temp'];
    $pression = $_POST['pression'];
    $id_depart = $_POST['id_depart'];
    $id_type_consul = $_POST['id_type_consul'];

    $date_con = $_POST['date_con'];
    $obs = $_POST['obs'];
  //  $remise = $_POST['remise'];

    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");
    $query  = "SELECT max(id_con) as total from consultation";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $total_apt = $row["total"];
    }
    $id_app = $total_apt + 1;
    $ref_con= 'CON_'.$year.'_'.$month.'_'.$id_patient.'_'.$id_app;

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

    $query  = "SELECT prix_t_consul from type_consul where id_type_consul='$id_type_consul'";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $somme = $row["prix_t_consul"];
    }



    $query = " INSERT INTO consultation (ref_con,id_patient,id_nurse,taille,poids,temp,date_con,pression,obs,id_depart,id_type_consul) 
                     VALUES (:ref_con,:id_patient,:id_nurse,:taille,:poids,:temp,:date_con,:pression,:obs,:id_depart,:id_type_consul)";

    $sql = $db->prepare($query);
    // Bind parameters to statement
    $sql->bindParam(':ref_con', $ref_con);
    $sql->bindParam(':id_patient', $id_patient);
    $sql->bindParam(':id_nurse', $id_nurse);
    $sql->bindParam(':taille', $taille);
    $sql->bindParam(':poids', $poids);
    $sql->bindParam(':temp', $temp);
    $sql->bindParam(':date_con', $date_con);
    $sql->bindParam(':pression', $pression);
    $sql->bindParam(':obs', $obs);
    $sql->bindParam(':id_depart', $id_depart);
    $sql->bindParam(':id_type_consul', $id_type_consul);
    $sql->execute();

    $sql = "INSERT INTO regler_consul (ref_reg_consul,id_con,id_patient,somme,date_reg_consul,id_type_consul)
                                  VALUES (?,?,?,?,?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($ref_con,$id_app,$id_patient,$somme,$date_con,$id_type_consul));


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$consultation['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = '<?=$consultation['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
