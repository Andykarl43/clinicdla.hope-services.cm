<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {





    $id_patient = $_POST['id_patient'];
    $id_medecin = $_POST['id_medecin'];
    $id_medi = $_POST['id_medi'];
    $date_ordo_medi = date('Y-m-d');
    $quantite = $_POST['quantite'];

    $query  = "SELECT count(id_ordo) as total from orodonnance";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $total_apt = $row["total"];
    }
    $id_ordo=$total_apt+1;





    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");

//    $query  = "SELECT max(id_ope) as total from operation";
//    $q = $conn->query($query);
//    while($row = $q->fetch_assoc())
//    {
//        $total_apt = $row["total"];
//    }

    $ref_ordo_medi= 'ORDO_MEDI_'.$year.'_'.$month.'_'.$id_ordo;



    $query = " INSERT INTO ordo_medi (ref_ordo_medi,id_patient,id_medecin,id_ordo,id_medi,qt_ordo_medi,date_ordo_medi) 
                     VALUES (:ref_ordo_medi,:id_patient,:id_medecin,:id_ordo,:id_medi,:quantite,:date_ordo_medi)";

    $sql = $db->prepare($query);
    // Bind parameters to statement
    $sql->bindParam(':ref_ordo_medi', $ref_ordo_medi);
    $sql->bindParam(':id_patient', $id_patient);
    $sql->bindParam(':id_medecin', $id_medecin);
    $sql->bindParam(':id_ordo', $id_ordo);
    $sql->bindParam(':id_medi', $id_medi);
    $sql->bindParam(':quantite', $quantite);
    $sql->bindParam(':date_ordo_medi', $date_ordo_medi);


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$operation['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = '<?=$operation['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
