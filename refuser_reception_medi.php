<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php


//$id_ask_mat=$_REQUEST['id_ask_mat'];
$id_ask_medi=$_REQUEST['id_ask_medi'];
//echo $id_salles;
//$cout=$_POST['cout'];
// $date_debut=$_POST['date_debut'];




//--------------------------code pour email ------------------------------//
// $result="";
//       require "PHPMailer/PHPMailerAutoload.php";

//              $to ='mboningdany@gmail.com';
//              $from= 'supergoal@campresjonlline.net';
//              $from_name='CAMPREJ EQUIEPEMENT';
//              $subject='OBJET TEST';


//            $mail = new PHPMailer();
//            $mail->IsSMTP();
//            $mail->SMTPAuth = true;

//            $mail->SMTPSecure = 'ssl';
//            $mail->Host = 'mail.campresjonlline.net';
//            $mail->Port= '465';
//            $mail->Username = 'supergoal@campresjonlline.net';
//            $mail->Password = 'Y@)W@LPSDLaP';

//            $mail->IsHTML(true);
//            $mail->From="supergoal@campresjonlline.net";
//            $mail->FromName=$from_name;
//            $mail->Sender=$from;
//            $mail->AddReplyTo($from, $from_name);
//            $mail->Subject = $subject;
//            $mail->Body = '<h1 align=center>Name: ' .$from_name. '<br>Email: ' .$from. '<br>Message: ' .$subject. '</h1>';
//            $mail->AddAddress($to);
//            if(!$mail->Send())
//                {
//                    $result= "Please try later";
//                        // echo $result;
//                 }else{
//                   $result="Thanks you!!";
//                          // echo $result;
//                }

//-----------------------------------------------------------------------//


    $etat=-1;
    $query  = " UPDATE demande_materiel  SET   etat_dst=:etat WHERE  id_ask_medi='$id_ask_medi'";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':etat', $etat);
    $sql->execute();

    $etat=-1;
    $query  = " UPDATE demande_medicament  SET   etat_dst=:etat    
                                     WHERE id_ask_medi='$id_ask_medi' ";



    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':etat', $etat);
    $sql->execute();



if($sql)
{
    ?>
    <script>
        alert('Equipement pas recue.');
        window.location.href='liste_demande_traitement.php>';
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert('Error.');
        window.location.href='liste_demande_traitement.php';
    </script>
    <?php

}
?>
