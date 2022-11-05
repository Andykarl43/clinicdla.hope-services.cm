<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {



    $ref_certi_medi = $_POST['ref_certi_medi'];
    $id_patient = $_POST['id_patient'];
    $id_medecin = $_POST['id_medecin'];
    $date_debut = $_POST['date_debut'];
    //$date_debut= dateToFrench($date_debut, " j F Y");
    $date_fin = $_POST['date_fin'];
    //$date_fin= dateToFrench($date_fin, " j F Y");

    // Declare two dates
    $start_date = strtotime($date_debut);
    $end_date = strtotime($date_fin);

// Get the difference and divide into
// total no. seconds 60/60/24 to get
// number of days
    $nb_jour= ($end_date - $start_date)/60/60/24;
    if($nb_jour>0){
        if (strlen($nb_jour)<=1){
            $nb= '0'.$nb_jour;
            $nb_jour=intval($nb);
        }

        $date_certi_medi= date('Y-m-d');

        $sql = "INSERT INTO certi_medi (id_patient,ref_certi_medi,id_medecin,nb_jour,date_debut,date_fin,date_certi_medi)
                                  VALUES (?,?,?,?,?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($id_patient,$ref_certi_medi,$id_medecin,$nb_jour,$date_debut,$date_fin,$date_certi_medi));
    }else{
        ?>
        <script>
            // alert('Error.');
            window.location.href='<?=$certificat['option1_link']?>?witness=-2';
        </script>
        <?php
    }



    if($req)
    {
        ?>
        <script>
            // alert('Profession a été bien enregistrée.');
            window.location.href='<?=$certificat['option1_link']?>?witness=1';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            // alert('Error.');
            window.location.href='<?=$certificat['option1_link']?>?witness=-1';
        </script>
        <?php

    }




}
?>