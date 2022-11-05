<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $partie = $_POST['partie'];
    $id_patient = $_POST['id_patient'];

    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");
    $query  = "SELECT max(id_exa) as total from examen";
    $q = $conn->query($query);
    while($row = $q->fetch_assoc())
    {
        $total_apt = $row["total"];
    }
    $id_app = $total_apt + 1;
    $ref_exa= 'EXAM_'.$year.'_'.$month.'_'.$id_patient.'_'.$id_app;

    if($partie==1){
        $id_medecin = $_POST['id_medecin'];
        $id_type_exa = $_POST['id_type_exa'];
        $date_exa = $_POST['date_exa'];
        $obs = $_POST['obs'];

        $query  = "SELECT prix_t_exa from type_exa where id_type_exa='$id_type_exa'";
        $q = $conn->query($query);
        while($row = $q->fetch_assoc())
        {
            $somme = $row["prix_t_exa"];
        }


        $query = " INSERT INTO examen (ref_exa,id_patient,id_medecin,id_type_exa,date_exa,obs) 
                     VALUES (:ref_exa,:id_patient,:id_medecin,:id_type_exa,:date_exa,:obs)";

        $sql = $db->prepare($query);
        // Bind parameters to statement
        $sql->bindParam(':ref_exa', $ref_exa);
        $sql->bindParam(':id_patient', $id_patient);
        $sql->bindParam(':id_medecin', $id_medecin);
        $sql->bindParam(':id_type_exa', $id_type_exa);
        $sql->bindParam(':date_exa', $date_exa);
        $sql->bindParam(':obs', $obs);
        $sql->execute();



        $sql = "INSERT INTO regler_examen (ref_reg_exa,id_exa,id_patient,somme,date_reg_exa,id_type_exa,id_medecin)
                                  VALUES (?,?,?,?,?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($ref_exa,$id_app,$id_patient,$somme,$date_exa,$id_type_exa,$id_medecin));


    }else{

        $id_lab = $_POST['id_laboratin'];
        $obs_exa = $_POST['obs_exa'];

        $query = " INSERT INTO examen (ref_exa,id_lab,id_patient,obs_exa) 
                     VALUES (:ref_exa,:id_lab,:id_patient,:obs_exa)";

        $sql = $db->prepare($query);
        // Bind parameters to statement
        $sql->bindParam(':ref_exa', $ref_exa);
        $sql->bindParam(':id_lab', $id_lab);
        $sql->bindParam(':id_patient', $id_patient);
        $sql->bindParam(':obs_exa', $obs_exa);
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
            window.location.href = '<?=$examen['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = '<?=$examen['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
