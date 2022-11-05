<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
//strtolower(); // ecrire en miniscule
//strtouppor(); // ecrire en majiscule
//ucfirst(strtolower()): // ecrire first word en majiscule
?>

<?php

if ($_POST) {

    $ref_patient = $_POST['ref_patient'];
    $nom = strtoupper($_POST['nom']);
    $prenom = ucfirst(strtolower($_POST['prenom']));
    $username = 'N/A';
    $email = $_POST['email'];
    $password = 'N/A';
    $check_password = 'N/A';
    $date_aniv = $_POST['date_aniv'];
    $gender = $_POST['gender'];
    $adresse = $_POST['adresse'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $id_ent= 0;
    $id_ass = 0;
//    $region = $_POST['region'];
//    $code_postal = $_POST['code_postal'];
    $phone = $_POST['phone'];
    $biography = $_POST['biography'];
//    $status = $_POST['status'];
    $open_close = 0;


    // echo $nom.'</br>';
    // echo $prenom.'</br>';
    // echo $username.'</br>';
    // echo $email.'</br>';
    // echo $password.'</br>';
    // echo $check_password.'</br>';
    //$date_aniv.'</br>';
    // echo $gender.'</br>';
    // echo $adresse.'</br>';
    // echo $pays.'</br>';
    // echo $ville.'</br>';
    // echo $region.'</br>';
    // echo $code_postal.'</br>';
    // echo $phone.'</br>';
    // echo $biography.'</br>';
    // echo $status.'</br>';

    ////---------------------------- create user --------------------------------////

//   $query = "SELECT DATEDIFF( now(), $date_aniv) as ager";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $ager = $row["ager"];
// }

 // $a=date("d-m-Y", strtotime($date_aniv));
 // echo $a;
 // $b=date("Y-m-d", strtotime($a));
 // echo $b;

 $query = "SELECT round( DATEDIFF( now(), :date_aniv) / 365) as ager";
 $sql = $db->prepare($query);
 $sql->bindParam(':date_aniv', $date_aniv);
 $sql->execute();
 while ($row = $sql->fetch()) {
     $ager = $row["ager"];
}

   // $age = round(Datediff(now(), str_to_date($date_aniv, '%d/%m/%Y')) / 365);
    //$age = Datediff(day,2021/12/03, $date_aniv) ;
  
      echo $ager;
    
  // $a=date("d-m-Y", strtotime($date_begin_chantier));
   

    $query = " INSERT INTO patient (ref_patient,nom_p,prenom_p,age_p,username_p,email_p,password_p,check_password_p,date_aniv_p,genre_p, adresse_p,pays_p,ville_p,phone_p,biography_p,id_ent,id_ass) 
                     VALUES (:ref_patient,:nom,:prenom,:age,:username,:email,:password,:check_password,:date_aniv,:gender,:adresse,:pays,:ville,:phone,:biography,:id_ent,:id_ass)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_patient', $ref_patient);
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':prenom', $prenom);
    $sql->bindParam(':age', $ager);
    $sql->bindParam(':username', $username);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':password', $password);
    $sql->bindParam(':check_password', $check_password);
    $sql->bindParam(':date_aniv', $date_aniv);
    $sql->bindParam(':gender', $gender);
    $sql->bindParam(':adresse', $adresse);
    $sql->bindParam(':pays', $pays);
    $sql->bindParam(':ville', $ville);
//    $sql->bindParam(':region', $region);
//    $sql->bindParam(':code_postal', $code_postal);
    $sql->bindParam(':phone', $phone);
    $sql->bindParam(':biography', $biography);
    $sql->bindParam(':id_ent', $id_ent);
    $sql->bindParam(':id_ass', $id_ass);
//    $sql->bindParam(':status', $status);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
           // alert('Patient a été bien enregistrée.');
             window.location.href = '<?=$patient['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           // alert('Error.');
             window.location.href = '<?=$patient['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
