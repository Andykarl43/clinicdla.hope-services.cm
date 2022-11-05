<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {
    $id_con = $_POST['id_con'];
    $partie = $_POST['partie'];
    $id_patient = $_POST['id_patient'];
    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    if($partie==1){
        $id_nurse = $_POST['id_nurse'];
        $taille = $_POST['taille'];
        $poids = $_POST['poids'];
        $temp = $_POST['temp'];
        $pression = $_POST['pression'];
        $id_depart = $_POST['id_depart'];
        $date_con = $_POST['date_con'];
        $obs = $_POST['obs'];
        $id_type_consul = $_POST['id_type_consul'];

        $query1 = "UPDATE consultation SET  id_patient=:id_patient, id_nurse=:id_nurse, 
                     taille=:taille, poids=:poids, temp=:temp, obs=:obs, pression=:pression, id_depart=:id_depart, date_con=:date_con, id_type_consul=:id_type_consul   
                    WHERE id_con = '$id_con' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_nurse', $id_nurse);
        $sql1->bindParam(':taille', $taille);
        $sql1->bindParam(':poids', $poids);
        $sql1->bindParam(':temp', $temp);
        $sql1->bindParam(':obs', $obs);
        $sql1->bindParam(':pression', $pression);
        $sql1->bindParam(':id_depart', $id_depart);
        $sql1->bindParam(':date_con', $date_con);
        $sql1->bindParam(':id_type_consul', $id_type_consul);
        $sql1->execute();


        $query1 = "UPDATE regler_consul SET  id_patient=:id_patient, id_nurse=:id_nurse, 
                     date_reg_consul=:date_con, id_type_consul=:id_type_consul   
                    WHERE id_con = '$id_con' ";

        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_nurse', $id_nurse);
        $sql1->bindParam(':date_con', $date_con);
        $sql1->bindParam(':id_type_consul', $id_type_consul);
        $sql1->execute();



    }else{
        $id_medecin = $_POST['id_medecin'];
        $obs_medecin = $_POST['obs_medecin'];

        $query1 = "UPDATE consultation SET  id_medecin=:id_medecin, id_patient=:id_patient,  obs_medecin=:obs_medecin 
                    WHERE id_con = '$id_con' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_medecin', $id_medecin);
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':obs_medecin', $obs_medecin);
        $sql1->execute();

        $query1 = "UPDATE regler_consul SET  id_medecin=:id_medecin, id_patient=:id_patient
                    WHERE id_con = '$id_con' ";

        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_medecin', $id_medecin);
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->execute();
    }




    if ($sql1) {
        ?>
        <script>
            //alert('Consulattion a été bien mis à jour.');
            window.location.href = 'liste_consultation.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
         //   alert('client n\'a pas été mis à jour.');
            window.location.href = 'liste_consultation.php?witness=-1';
        </script>
        <?php

    }


}
?>
