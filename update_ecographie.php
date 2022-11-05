<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {
    $id_eco = $_POST['id_eco'];
    $partie = $_POST['partie'];
    $id_patient = $_POST['id_patient'];
    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    if($partie==1){
        $id_medecin = $_POST['id_medecin'];
        $id_type_eco = $_POST['id_type_eco'];
        $date_eco = $_POST['date_eco'];
        $obs = $_POST['obs'];

        $query1 = "UPDATE ecographie SET  id_patient=:id_patient, id_medecin=:id_medecin, 
                     id_type_eco=:id_type_eco, date_eco=:date_eco, obs=:obs   
                    WHERE id_eco = '$id_eco' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_medecin', $id_medecin);
        $sql1->bindParam(':id_type_eco', $id_type_eco);
        $sql1->bindParam(':date_eco', $date_eco);
        $sql1->bindParam(':obs', $obs);
        $sql1->execute();

    }else{
        $id_lab = $_POST['id_medecin2'];
        $obs_eco = $_POST['obs_eco'];

        $query1 = "UPDATE ecographie SET  id_medecin2=:id_lab, id_patient=:id_patient,  obs_eco=:obs_eco 
                    WHERE id_eco = '$id_eco' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_lab', $id_lab);
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':obs_eco', $obs_eco);
        $sql1->execute();
    }



    if ($sql1) {
        ?>
        <script>
            //alert('Consulattion a été bien mis à jour.');
                window.location.href = '<?=$ecographie['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //   alert('client n\'a pas été mis à jour.');
            window.location.href = '<?=$ecographie['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
