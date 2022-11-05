<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {
    $id_exa = $_POST['id_exa'];
    $partie = $_POST['partie'];
    $id_patient = $_POST['id_patient'];
    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    if($partie==1){
        $id_medecin = $_POST['id_medecin'];
        $id_type_exa = $_POST['id_type_exa'];
        $date_exa = $_POST['date_exa'];
        $obs = $_POST['obs'];

        $query1 = "UPDATE examen SET  id_patient=:id_patient, id_medecin=:id_medecin, 
                     id_type_exa=:id_type_exa, date_exa=:date_exa, obs=:obs   
                    WHERE id_exa = '$id_exa' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':id_medecin', $id_medecin);
        $sql1->bindParam(':id_type_exa', $id_type_exa);
        $sql1->bindParam(':date_exa', $date_exa);
        $sql1->bindParam(':obs', $obs);
        $sql1->execute();

    }else{
        $id_lab = $_POST['id_laboratin'];
        $obs_exa = $_POST['obs_exa'];

        $query1 = "UPDATE examen SET  id_lab=:id_lab, id_patient=:id_patient,  obs_exa=:obs_exa 
                    WHERE id_exa = '$id_exa' ";


        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':id_lab', $id_lab);
        $sql1->bindParam(':id_patient', $id_patient);
        $sql1->bindParam(':obs_exa', $obs_exa);
        $sql1->execute();
    }



    if ($sql1) {
        ?>
        <script>
            //alert('Consulattion a été bien mis à jour.');
            window.location.href = '<?=$examen['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //   alert('client n\'a pas été mis à jour.');
            window.location.href = '<?=$examen['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
