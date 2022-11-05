<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_app = $_POST['ref_app'];
    $id_patient = $_POST['id_patient'];
    $id_depart = $_POST['id_depart'];
    $id_medecin = $_POST['id_medecin'];
    $date_app = $_POST['date_app'];
    $time_app = $_POST['time_app'];
    $sms_app = $_POST['sms_app'];

////---------------------------- date de création --------------------------------////
    $query = "SELECT date(now()) as date_apt";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {
        $date_apt = $row["date_apt"]; 
    }
        $time_apt=date("G:i");



        $iResult = $db->query("SELECT * FROM patient where id_patient= '" . $id_patient . "'");

        while ($data = $iResult->fetch()) {

            $patient_email = $data['email_p'];
            $patient_phone = $data['phone_p'];
        
        }
                                                                                   


    ////---------------------------- create fournisseur --------------------------------////


    $query = " INSERT INTO appointment (ref_app,id_patient,id_depart,id_medecin,date_app,time_app,patient_email,patient_phone,message,date_apt,time_apt) 
                     VALUES (:ref_app,:id_patient,:id_depart,:id_medecin,:date_app,:time_app,:patient_email,:patient_phone,:message,:date_apt,:time_apt)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_app', $ref_app);
    $sql->bindParam(':id_patient', $id_patient);
    $sql->bindParam(':id_depart', $id_depart);
    $sql->bindParam(':id_medecin', $id_medecin);
    $sql->bindParam(':date_app', $date_app);
    $sql->bindParam(':time_app', $time_app);
    $sql->bindParam(':patient_email', $patient_email);
    $sql->bindParam(':patient_phone', $patient_phone);
    $sql->bindParam(':message', $sms_app);
    $sql->bindParam(':date_apt', $date_apt);
    $sql->bindParam(':time_apt', $time_apt);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
           // alert('Patient a été bien enregistrée.');
                window.location.href = '<?=$appointment['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           // alert('Error.');
             window.location.href = '<?=$appointment['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}

    // $nom1 = strtolower($_POST['nom']);
    // $nom2 = ucwords($nom1);

 // $a=date("d-m-Y", strtotime($date_aniv));
 // echo $a;
 // $b=date("Y-m-d", strtotime($a));
 // echo $b;

//  $query = "SELECT round( DATEDIFF( now(), :date_aniv) / 365) as ager";
//  $sql = $db->prepare($query);
//  $sql->bindParam(':date_aniv', $date_aniv);
//  $sql->execute();
//  while ($row = $sql->fetch()) {
//      $ager = $row["ager"];
// }

   // $age = round(Datediff(now(), str_to_date($date_aniv, '%d/%m/%Y')) / 365);
    //$age = Datediff(day,2021/12/03, $date_aniv) ;
  
      // echo $ager;
    
  // $a=date("d-m-Y", strtotime($date_begin_chantier));

?>
