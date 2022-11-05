<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id= $_POST['id_app'];
    $ref_app = $_POST['ref_app'];
    $id_patient= $_POST['id_patient'];
    $id_depart= $_POST['id_depart'];
    $id_medecin= $_POST['id_medecin'];
    $date_app= $_POST['date_app'];
    $time_app= $_POST['time_app'];
    $message = $_POST['sms_app'];
    $statut_app = $_POST['statut_app'];

    $iResult = $db->query("SELECT * FROM patient where id_patient= '" . $id_patient . "'");

    while ($data = $iResult->fetch()) {

        $patient_email = $data['email_p'];
        $patient_phone = $data['phone_p'];

    }
    ////---------------------------- date de l'édition --------------------------------////
    $query = "SELECT date(now()) as date_apt";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {
        $date_apt = $row["date_apt"];
    }
    $time_apt=date("G:i");



    /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/


    $query1 = " UPDATE appointment SET  ref_app=:ref_app, id_patient=:id_patient, id_depart=:id_depart, id_medecin=:id_medecin, 
        date_app=:date_app, time_app=:time_app, patient_email=:patient_email, patient_phone=:patient_phone, message=:message, statut_app=:statut_app, date_apt=:date_apt, time_apt=:time_apt WHERE id_app = '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':ref_app', $ref_app);
    $sql1->bindParam(':id_patient', $id_patient);
    $sql1->bindParam(':id_depart', $id_depart);
    $sql1->bindParam(':id_medecin', $id_medecin);
    $sql1->bindParam(':date_app', $date_app);
    $sql1->bindParam(':time_app', $time_app);
    $sql1->bindParam(':patient_email', $patient_email);
    $sql1->bindParam(':patient_phone', $patient_phone);
    $sql1->bindParam(':message', $message);
    $sql1->bindParam(':statut_app', $statut_app);
    $sql1->bindParam(':date_apt', $date_apt);
    $sql1->bindParam(':time_apt', $time_apt);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            //  alert('Chirugien a été bien mis à jour.');
            window.location.href = '<?=$appointment['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //  alert('Chirugien n\'a pas été mis à jour.');
            window.location.href = '<?=$appointment['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
