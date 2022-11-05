<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {





    $id_patient = $_POST['id_patient'];
    $id_medecin = $_POST['id_medecin'];
 //   $taille = $_POST['taille'];
    $id_type_ope = $_POST['id_type_ope'];
    $date_ope = $_POST['date_ope'];
    $resume = $_POST['resume'];
    $time_first = $_POST['time_first'];
    $time_last = $_POST['time_last'];
   $id_depart = $_POST['id_depart'];




    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");

    $query  = "SELECT max(id_ope) as total from operation";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $total_apt = $row["total"];
    }
    $id_app = $total_apt + 1;
    $ref_ope= 'OPE_'.$year.'_'.$month.'_'.$id_patient.'_'.$id_app;

    $query  = "SELECT prix_t_ope from type_ope where id_type_ope='$id_type_ope'";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $somme = $row["prix_t_ope"];
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


    $query = " INSERT INTO operation (ref_ope,id_patient,id_medecin,id_type_ope,date_ope,resume,id_depart,time_first,time_last) 
                     VALUES (:ref_ope,:id_patient,:id_medecin,:id_type_ope,:date_ope,:resume,:id_depart,:time_first,:time_last)";

    $sql = $db->prepare($query);
    // Bind parameters to statement
    $sql->bindParam(':ref_ope', $ref_ope);
    $sql->bindParam(':id_patient', $id_patient);
    $sql->bindParam(':id_medecin', $id_medecin);
    $sql->bindParam(':id_type_ope', $id_type_ope);
    $sql->bindParam(':date_ope', $date_ope);
    $sql->bindParam(':resume', $resume);
    $sql->bindParam(':id_depart', $id_depart);
    $sql->bindParam(':time_first', $time_first);
    $sql->bindParam(':time_last', $time_last);
    $sql->execute();


    $sql = "INSERT INTO regler_ope (id_ope,id_patient,somme,date_reg_ope,id_type_ope,id_medecin)
                                  VALUES (?,?,?,?,?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($id_app,$id_patient,$somme,$date_ope,$id_type_ope,$id_medecin));


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
