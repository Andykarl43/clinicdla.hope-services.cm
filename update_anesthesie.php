<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {
    $id_anes = $_POST['id_anes'];
    $partie = $_POST['partie'];
    $id_patient = $_POST['id_patient'];
    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    if($partie==1){
        $id_medecin = $_POST['id_medecin'];
        $id_type_anes = $_POST['id_type_anes'];
        $date_anes = $_POST['date_anes'];
        $obs = $_POST['obs'];

        $query1 = "UPDATE anesthesie SET  id_patient=:id_patient, id_medecin=:id_medecin, 
                     id_type_anes=:id_type_anes, date_anes=:date_anes, obs=:obs   
                    WHERE id_anes = '$id_anes' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_medecin', $id_medecin);
        $sql1->bindParam(':id_type_anes', $id_type_anes);
        $sql1->bindParam(':date_anes', $date_anes);
        $sql1->bindParam(':obs', $obs);
        $sql1->execute();
        
        $query1 = "UPDATE regler_anesthesie  SET  id_patient=:id_patient, id_medecin=:id_medecin, 
                     id_type_anes=:id_type_anes, date_reg_anes=:date_anes 
                    WHERE id_anes = '$id_anes' ";

        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_medecin', $id_medecin);
        $sql1->bindParam(':id_type_anes', $id_type_anes);
        $sql1->bindParam(':date_anes', $date_anes);
        $sql1->execute();



    }else{
        $id_lab = $_POST['id_chirugien'];
        $obs_anes = $_POST['obs_anes'];

        $query1 = "UPDATE anesthesie SET  id_chirugien=:id_lab, id_patient=:id_patient,  obs_anes=:obs_anes 
                    WHERE id_anes = '$id_anes' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_lab', $id_lab);
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':obs_anes', $obs_anes);
        $sql1->execute();
        
        
        $query1 = "UPDATE regler_anesthesie  SET  id_patient=:id_patient, id_chirugien=:id_chirugien
                    WHERE id_anes = '$id_anes' ";

        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_chirugien', $id_lab);
        $sql1->execute();
    }
    }



    if ($sql1) {
        ?>
        <script>
            //alert('Consulattion a été bien mis à jour.');
           window.location.href = '<?=$anesthesie['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //   alert('client n\'a pas été mis à jour.');
            window.location.href = '<?=$anesthesie['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
