<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {




    $id_patient = $_POST['id_patient'];
    $id_nurse = $_POST['id_nurse'];
    //$id_service = $_POST['id_service'];
    $id_medecin = $_POST['id_medecin'];
    $chambre = $_POST['chambre'];
    $id_type_hosp = $_POST['id_type_hosp'];
    $lit = $_POST['lit'];
    $nb_jour = $_POST['nb_jour'];
    $date_hosp = $_POST['date_hosp'];

    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");
    $query  = "SELECT max(id_hosp) as total from hospitalisation";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $total_apt = $row["total"];
    }
    $id_app = $total_apt + 1;
    $ref_hosp= 'HOSP_'.$year.'_'.$month.'_'.$day.'_'.$id_app;

    $query  = "SELECT prix_t_hosp from type_hosp where id_type_hosp='$id_type_hosp'";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $somme = $row["prix_t_hosp"];
    }


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
//    $query = " INSERT INTO hospitalisation (ref_hosp,id_service,chambre,id_type_hosp,date_hosp,lit,nb_jour,id_patient,id_nurse)
//                     VALUES (:ref_hosp,:id_service,:chambre,:id_type_hosp,:date_hosp,:lit,:nb_jour,:id_patient,:id_nurse)";

//    $sql = $db->prepare($query);
//    //    Bind parameters to statement
//    $sql->bindParam(':ref_hosp', $ref_hosp);
//    $sql->bindParam(':id_service', $id_service);
//    $sql->bindParam(':chambre', $chambre);
//    $sql->bindParam(':id_type_hosp', $id_type_hosp);
//    $sql->bindParam(':date_hosp', $date_hosp);
//    $sql->bindParam(':lit', $lit);
//    $sql->bindParam(':nb_jour', $nb_jour);
//    $sql->bindParam(':id_patient', $id_patient);
//    $sql->bindParam(':id_nurse', $id_nurse);
//    $sql->execute();

    $query = " INSERT INTO hospitalisation (ref_hosp,id_medecin,chambre,id_type_hosp,date_hosp,lit,nb_jour,id_patient,id_nurse)
                     VALUES (:ref_hosp,:id_medecin,:chambre,:id_type_hosp,:date_hosp,:lit,:nb_jour,:id_patient,:id_nurse)";





    $sql = $db->prepare($query);
 //    Bind parameters to statement
    $sql->bindParam(':ref_hosp', $ref_hosp);
    $sql->bindParam(':id_medecin', $id_medecin);
    $sql->bindParam(':chambre', $chambre);
    $sql->bindParam(':id_type_hosp', $id_type_hosp);
    $sql->bindParam(':date_hosp', $date_hosp);
   $sql->bindParam(':lit', $lit);
    $sql->bindParam(':nb_jour', $nb_jour);
    $sql->bindParam(':id_patient', $id_patient);
  $sql->bindParam(':id_nurse', $id_nurse);
    $sql->execute();


    $sql = "INSERT INTO regler_hosp (ref_reg_hosp,id_hosp,id_patient,somme,date_reg_hosp,id_type_hosp,id_medecin)
                                  VALUES (?,?,?,?,?,?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($ref_hosp,$id_app,$id_patient,$somme,$date_hosp,$id_type_hosp,$id_medecin));


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
           window.location.href = '<?=$hospitalisation['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = '<?=$hospitalisation['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
