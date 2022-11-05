<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


//    if(!empty($_POST['genre_c'])){
//        ?>
    <!--        <script>-->
    <!--            Toast.fire({-->
    <!--                icon: 'warning',-->
    <!--                title: 'vous n\'avez définit le genre'-->
    <!--            })-->
    <!--            window.location.href = '--><?//=$chirugien['option2_link']?>//?witness=-1';
    //        </script>
    //        <?php
//        $genre_c = $_POST['genre_c'];
//    }

    $ref_con = $_POST['ref_con'];
   $id_patient = $_POST['id_patient'];
    $id_medecin = $_POST['id_medecin'];
    $obs_medecin = $_POST['obs_medecin'];
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




    $query1 = " UPDATE consultation SET  id_medecin=:id_medecin, obs_medecin=:obs_medecin,  date_obs_med=:date_obs_med   
                    WHERE id_patient = '$id_patient' and ref_con='$ref_con'";


    $sql = $db->prepare($query1);
    // Bind parameters to statement
    $sql->bindParam('$:id_medecin', $id_medecin);
    $sql->bindParam('$:obs_medecin', $obs_medecin);
    $sql->bindParam(':date_obs_med', $date_obs_med);
    $sql->bindParam('$:id_patient', $id_patient);
    $sql->bindParam('$:ref_con', $ref_con);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
            //alert('client a été bien enregistrée.');
            window.location.href = '<?=$consultation['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            //alert('Error.');
            window.location.href = '<?=$consultation['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
