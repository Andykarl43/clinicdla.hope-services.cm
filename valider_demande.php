<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
//     include ('MailSender/mailsenderclass.php');
?>
<?php

$id_ask_medi=$_REQUEST['idi'];

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


$sql="SELECT * FROM demande_materiel where id_ask_medi='$id_ask_medi' ";
$stmt = $db->prepare($sql);
$stmt->execute();

$tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($tables as $table)
{
    $id_materiel=$table['id_medi'];
    $date_debut_mat=$table['date_debut_mat'];
    $nom_salle=$table['nom_salle'];
    $quantite_ask=$table['quantite'];
    // echo $id_materiel.'</br>';


    $sql = "SELECT * FROM magasin where id_medi='$id_materiel' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $quantite_mat = $table['qt_com'];
        $prix_unitaire = $table['prix_ht'];
    }

    echo $quantite_reste=$quantite_mat-$quantite_ask;
    $prix_total_f=$quantite_reste*$prix_unitaire;


///                                    if($quantite_reste>=0){
//                        $query1  = " UPDATE materiel  SET    quantite=:quantite, prix_total=:prix_total WHERE id_materiel = '$id_materiel' ";
//
//
//
//                         $sql1 = $db->prepare($query1);
//
//                                 // Bind parameters to statement
//                                $sql1->bindParam(':quantite', $quantite_reste);
//                                $sql1->bindParam(':prix_total', $prix_total_f);
//                                $sql1->execute();
//
//                    }else{

//                    $query1  = " UPDATE materiel  SET    mag=:mag  WHERE id_materiel = '$id_materiel' ";
//
//
//
//                         $sql1 = $db->prepare($query1);
//
//                                 // Bind parameters to statement
//                                $sql1->bindParam(':mag', $receveur);
//                                $sql1->execute();



//                    }


    // $id_sal=0;
    //    $query1  = " UPDATE materiel  SET   id_salles=:id_sal, quantite=:quantite, prix_total=:prix_total WHERE id_materiel = '$id_materiel' ";



    //         $sql1 = $db->prepare($query1);

    //                 // Bind parameters to statement
    //                $sql1->bindParam(':id_salles', $id_sal);
    //                $sql1->bindParam(':quantite', $quantite_reste);
    //                $sql1->bindParam(':prix_total', $prix_total_f);
    //                $sql1->execute();
}



$etat=1;
$date_valide=date('y-m-d');
$heure=date("G:i");
$query  = " UPDATE demande_medicament  SET   etat_src=:etat, date_valide=:date_valide, heure=:heure    
                                     WHERE id_ask_medi='$id_ask_medi' ";



$sql = $db->prepare($query);

// Bind parameters to statement
$sql->bindParam(':etat', $etat);
$sql->bindParam(':date_valide', $date_valide);
$sql->bindParam(':heure', $heure);
$sql->execute();

$etat=1;
$etat_t=0;
$post=0;
$query  = " UPDATE demande_materiel  SET   etat_src=:etat, etat_dst=:etat_t  WHERE id_ask_medi='$id_ask_medi'";

$sql = $db->prepare($query);

// Bind parameters to statement
$sql->bindParam(':etat', $etat);
$sql->bindParam(':etat_t', $etat_t);
$sql->execute();



if($sql)
{
//    $mailler = new mailsenderclass();
//
//    $subject = "Validation de demande de d'equipement";
//    $body = "Demande d'equipement effectuee le "
//        .date("d/m/Y",strtotime($date_debut_mat))
//        ." pour la salle "
//        .strtoupper($nom_salle)
//        ." a ete valide par "
//        .strtoupper($nom_user)
//        ."<br/>
//                                                          <a href='campresjonlline.net'>Voir les details</a>";
//
//    $from= 'supergoal@campresjonlline.net';
//    $from_name='CAMPREJ EQUIEPEMENT';
//    $sql = $db->query("select * from users where secteur = $id_secteur_user and lvl = 5 ");
//    while($row = $sql->fetch()){
//        $to = $row['email'];
//        $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
//    }
//    $sql = $db->query("select * from users where  lvl = 5 ");
//    while($row = $sql->fetch()){
//        $to = $row['email'];
//        $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
//    }
    ?>
    <script>
        alert('Demande valider.');
        window.location.href='liste_demande_produit.php?witness=1';
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert('Demande n\'a pas été valider.');
        window.location.href='liste_demande_produit.php?witness=-1';
    </script>
    <?php

}
?>
