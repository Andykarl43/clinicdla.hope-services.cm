<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $partie = $_POST['partie'];
    $id_patient = $_POST['id_patient'];
    $id_anes = $_POST['id_anes'];
    $ref_anes = $_POST['ref_anes'];

//    $year = (new DateTime())->format("Y");
//    $month = (new DateTime())->format("m");
//    $day = (new DateTime())->format("d");
//    $query  = "SELECT max(id_exa) as total from examen";
//    $q = $conn->query($query);
//    while($row = $q->fetch_assoc())
//    {
//        $total_apt = $row["total"];
//    }
//    $id_app = $total_apt + 1;
//    $ref_exa= 'EXAM_'.$year.'_'.$month.'_'.$id_patient.'_'.$id_app;

    if($partie==1){
        $id_medecin = $_POST['id_medecin'];
        $id_type_anes = $_POST['id_type_anes'];
        $date_anes = $_POST['date_anes'];
        $obs = $_POST['obs'];

        $query  = "SELECT prix_t_anes from type_anes where id_type_anes='$id_type_anes'";
        $q = $conn->query($query);
        while($row = $q->fetch_assoc())
        {
             $somme = $row["prix_t_anes"];
        }


        $query = " INSERT INTO anesthesie (ref_anes,id_patient,id_medecin,id_type_anes,date_anes,obs) 
                     VALUES (:ref_anes,:id_patient,:id_medecin,:id_type_anes,:date_anes,:obs)";

        $sql = $db->prepare($query);
        // Bind parameters to statement
        $sql->bindParam(':ref_anes', $ref_anes);
        $sql->bindParam(':id_patient', $id_patient);
        $sql->bindParam(':id_medecin', $id_medecin);
        $sql->bindParam(':id_type_anes', $id_type_anes);
        $sql->bindParam(':date_anes', $date_anes);
        $sql->bindParam(':obs', $obs);
        $sql->execute();



        $sql = "INSERT INTO regler_anesthesie (id_anes,id_patient,somme,date_reg_anes,id_type_anes,id_medecin)
                                  VALUES (?,?,?,?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($id_anes,$id_patient,$somme,$date_anes,$id_type_anes,$id_medecin));


    }else{

        $id_chirugien = $_POST['id_chirugien'];
        $obs_anes = $_POST['obs_anes'];

        $query = " INSERT INTO anesthesie (ref_anes,id_chirugien,id_patient,obs_anes) 
                     VALUES (:ref_anes,:id_lab,:id_patient,:obs_anes)";

        $sql = $db->prepare($query);
        // Bind parameters to statement
        $sql->bindParam(':ref_anes', $ref_anes);
        $sql->bindParam(':id_lab', $id_chirugien);
        $sql->bindParam(':id_patient', $id_patient);
        $sql->bindParam(':obs_anes', $obs_anes);
        $sql->execute();
    }



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





    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$anesthesie['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = '<?=$anesthesie['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
