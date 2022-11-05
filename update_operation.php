<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {
    $id_ope = $_POST['id_ope'];
    $partie = $_POST['partie'];
    $id_patient = $_POST['id_patient'];
    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    if($partie==1){
        $id_medecin = $_POST['id_medecin'];
        $id_type_ope = $_POST['id_type_ope'];
        $date_ope = $_POST['date_ope'];
        $resume = $_POST['resume'];
        $time_first = $_POST['time_first'];
        $time_last = $_POST['time_last'];
        $id_depart = $_POST['id_depart'];

        $query1 = "UPDATE operation SET  id_patient=:id_patient, id_medecin=:id_medecin, 
                     resume=:resume, time_first=:time_first, time_last=:time_last, id_depart=:id_depart, date_ope=:date_ope   
                    WHERE id_ope = '$id_ope' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_medecin', $id_medecin);
        $sql1->bindParam(':resume', $resume);
        $sql1->bindParam(':time_first', $time_first);
        $sql1->bindParam(':time_last', $time_last);
        $sql1->bindParam(':id_depart', $id_depart);
        $sql1->bindParam(':date_ope', $date_ope);
        $sql1->execute();

    }else{
        $id_inter = $_POST['id_inter'];
        $obs_ope = $_POST['obs_ope'];

        $query1 = "UPDATE operation SET  id_inter=:id_inter, id_patient=:id_patient,  obs_ope=:obs_ope 
                    WHERE id_ope = '$id_ope' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_inter', $id_inter);
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':obs_ope', $obs_ope);
        $sql1->execute();
        
        $query1 = "UPDATE regler_ope SET  id_chirugien=:id_inter  
            WHERE id_ope = '$id_ope' ";

        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_inter', $id_inter);
        $sql1->execute();
    }




    if ($sql1) {
        ?>
        <script>
            //alert('Consulattion a été bien mis à jour.');
            window.location.href = '<?=$operation['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //   alert('client n\'a pas été mis à jour.');
            window.location.href = '<?=$operation['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
