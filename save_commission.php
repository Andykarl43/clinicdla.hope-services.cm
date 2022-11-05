<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {

    $id_service = $_POST['id_service'];
    $comi = $_POST['com'];
    $id_medecin = $_POST['id_medecin'];
    $id_chirugien = $_POST['id_chirugien'];
    $id_laboratin = $_POST['id_laboratin'];
    $id_nurse = $_POST['id_nurse'];

    $year = (new DateTime())->format("Y");
    $month = (new DateTime())->format("m");
    $day = (new DateTime())->format("d");
    $heure= date('G:i:s');
    $date_comi=date('Y-m-d');

    $ref_comi= 'COMI_'.$year.'_'.$month.'_'.$day.'_'.$heure;



    if($id_medecin!=0 and $id_chirugien==0 and $id_laboratin==0 and $id_nurse==0){

        $sql = "SELECT count(id_comi) as total FROM commission where id_service='$id_service' and id_entite='$id_medecin' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $to = $table['total'];
        }

        if($to==0){
            $type="M";

            $query = " INSERT INTO commission (ref_comi,id_service,id_entite,comi,date_comi,type_entite)
                     VALUES (:ref_comi,:id_service,:id_entite,:comi,:date_comi,:type_entite)";
            $sql = $db->prepare($query);
            // Bind parameters to statement
            $sql->bindParam(':ref_comi', $ref_comi);
            $sql->bindParam(':id_service', $id_service);
            $sql->bindParam(':id_entite', $id_medecin);
            $sql->bindParam(':comi', $comi);
            $sql->bindParam(':date_comi', $date_comi);
            $sql->bindParam(':type_entite', $type);
            $sql->execute();
        }else{
            ?>
            <script>
                alert('commission existe déjà  !!!');
                window.location.href = '<?=$liste['option12_link']?>?witness=-1';
            </script>
            <?php
        }



    }elseif($id_medecin==0 and $id_chirugien!=0 and $id_laboratin==0 and $id_nurse==0){

        $sql = "SELECT count(id_comi) as total FROM commission where id_service='$id_service' and id_entite='$id_chirugien' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $to = $table['total'];
        }

    if($to==0){
        $type="C";

        $query = " INSERT INTO commission (ref_comi,id_service,id_entite,comi,date_comi,type_entite)
                     VALUES (:ref_comi,:id_service,:id_entite,:comi,:date_comi,:type_entite)";
        $sql = $db->prepare($query);
        // Bind parameters to statement
        $sql->bindParam(':ref_comi', $ref_comi);
        $sql->bindParam(':id_service', $id_service);
        $sql->bindParam(':id_entite', $id_chirugien);
        $sql->bindParam(':comi', $comi);
        $sql->bindParam(':date_comi', $date_comi);
        $sql->bindParam(':type_entite', $type);
        $sql->execute();
    }else{
        ?>
        <script>
            alert('commission existe déjà  !!!');
            window.location.href = '<?=$liste['option12_link']?>?witness=-1';
        </script>
        <?php
    }


    }elseif($id_medecin==0 and $id_chirugien==0 and $id_laboratin!=0 and $id_nurse==0){
        $sql = "SELECT count(id_comi) as total FROM commission where id_service='$id_service' and id_entite='$id_laboratin' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $to = $table['total'];
        }

        if($to==0){
            $type="L";

            $query = " INSERT INTO commission (ref_comi,id_service,id_entite,comi,date_comi,type_entite)
                     VALUES (:ref_comi,:id_service,:id_entite,:comi,:date_comi,:type_entite)";
            $sql = $db->prepare($query);
            // Bind parameters to statement
            $sql->bindParam(':ref_comi', $ref_comi);
            $sql->bindParam(':id_service', $id_service);
            $sql->bindParam(':id_entite', $id_laboratin);
            $sql->bindParam(':comi', $comi);
            $sql->bindParam(':date_comi', $date_comi);
            $sql->bindParam(':type_entite', $type);
            $sql->execute();
        }else{
            ?>
            <script>
                alert('commission existe déjà  !!!');
                window.location.href = '<?=$liste['option12_link']?>?witness=-1';
            </script>
            <?php
        }



    }elseif ($id_medecin==0 and $id_chirugien==0 and $id_laboratin==0 and $id_nurse!=0){

        $sql = "SELECT count(id_comi) as total FROM commission where id_service='$id_service' and id_entite='$id_nurse' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $to = $table['total'];
        }

        if($to==0){
            $type="I";

            $query = " INSERT INTO commission (ref_comi,id_service,id_entite,comi,date_comi,type_entite)
                     VALUES (:ref_comi,:id_service,:id_entite,:comi,:date_comi,:type_entite)";
            $sql = $db->prepare($query);
            // Bind parameters to statement
            $sql->bindParam(':ref_comi', $ref_comi);
            $sql->bindParam(':id_service', $id_service);
            $sql->bindParam(':id_entite', $id_nurse);
            $sql->bindParam(':comi', $comi);
            $sql->bindParam(':date_comi', $date_comi);
            $sql->bindParam(':type_entite', $type);
            $sql->execute();
        }else{
            ?>
            <script>
                alert('commission existe déjà  !!!');
                window.location.href = '<?=$liste['option12_link']?>?witness=-1';
            </script>
            <?php
        }

    }else{
        ?>
        <script>
            //alert('Error.');
               window.location.href = '<?=$liste['option12_link']?>?witness=-1';
        </script>
        <?php
    }

//    $year = (new DateTime())->format("Y");
//    $month = (new DateTime())->format("m");
//    $day = (new DateTime())->format("d");
//    $query  = "SELECT max(id_con) as total from consultation";
//    $q = $conn->query($query);
//    while($row = $q->fetch_assoc())
//    {
//        $total_apt = $row["total"];
//    }
//    $id_app = $total_apt + 1;
//    $ref_con= 'CON_'.$year.'_'.$month.'_'.$id_patient.'_'.$id_app;

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
//
//    $query  = "SELECT prix_t_consul from type_consul where id_type_consul='$id_type_consul'";
//    $q = $conn->query($query);
//    while($row = $q->fetch_assoc())
//    {
//        $somme = $row["prix_t_consul"];
//    }
//
//
//
//    $query = " INSERT INTO consultation (ref_con,id_patient,id_nurse,taille,poids,temp,date_con,pression,obs,id_depart,id_type_consul)
//                     VALUES (:ref_con,:id_patient,:id_nurse,:taille,:poids,:temp,:date_con,:pression,:obs,:id_depart,:id_type_consul)";
//
//    $sql = $db->prepare($query);
//    // Bind parameters to statement
//    $sql->bindParam(':ref_con', $ref_con);
//    $sql->bindParam(':id_patient', $id_patient);
//    $sql->bindParam(':id_nurse', $id_nurse);
//    $sql->bindParam(':taille', $taille);
//    $sql->bindParam(':poids', $poids);
//    $sql->bindParam(':temp', $temp);
//    $sql->bindParam(':date_con', $date_con);
//    $sql->bindParam(':pression', $pression);
//    $sql->bindParam(':obs', $obs);
//    $sql->bindParam(':id_depart', $id_depart);
//    $sql->bindParam(':id_type_consul', $id_type_consul);
//    $sql->execute();
//
//    $sql = "INSERT INTO regler_consul (id_con,id_patient,somme,date_reg_consul)
//                                  VALUES (?,?,?,?)";
//    $req = $db->prepare($sql);
//    $req->execute(array($id_app,$id_patient,$somme,$date_con));


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$liste['option12_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = '<?=$liste['option12_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
