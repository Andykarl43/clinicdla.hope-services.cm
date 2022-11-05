<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if ($_POST) {


    $ref_four = ucwords(strtolower($_POST['ref_four']));
    $raison_social_four = ucwords(strtolower($_POST['raison_social_four']));
    $email_four = $_POST['email'];
    $pays_four = $_POST['pays'];
    $ville_four = $_POST['ville'];
    $tel_four = $_POST['tel'];

////---------------------------- date de création --------------------------------////
    $query = "SELECT date(now()) as date_four";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {
        $date_four = $row["date_four"];
    }




    ////---------------------------- create fournisseur --------------------------------////


    $query = " INSERT INTO fournisseur (ref_four,raison_social_four,email_four,pays_four,ville_four,tel_four,date_four) 
                     VALUES (:ref_four,:raison_social_four,:email_four,:pays_four,:ville_four,:tel_four,:date_four)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':ref_four', $ref_four);
    $sql->bindParam(':raison_social_four', $raison_social_four);
    $sql->bindParam(':email_four', $email_four);
    $sql->bindParam(':pays_four', $pays_four);
    $sql->bindParam(':ville_four', $ville_four);
    $sql->bindParam(':tel_four', $tel_four);
    $sql->bindParam(':date_four', $date_four);
    $sql->execute();


    if ($sql) {
        ?>
        <script>
           // alert('Patient a été bien enregistrée.');
              window.location.href = '<?=$fournisseur['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
           // alert('Error.');
             window.location.href = '<?=$fournisseur['option2_link']?>?witness=-1';
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
