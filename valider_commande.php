<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
//     include ('MailSender/mailsenderclass.php');
?>
<?php

echo $ref_com=$_REQUEST['idr'];
echo $id_four=$_REQUEST['idf'];



//$sql="SELECT count(ref_com) as total FROM commande where ref_com='$ref_com'  and id_four='$id_four' ";
//$stmt = $db->prepare($sql);
//$stmt->execute();
//
//$tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//foreach($tables as $table)
//{
//    $total=$table['total'];
//}


$etat=1;
$date_valide=date('Y-m-d');
$heure=date("G:i");
$query  = " UPDATE commande  SET   etat=:etat, date_valide=:date_valide, heure=:heure
                                     WHERE  ref_com='$ref_com'  and id_four='$id_four' ";

$sql = $db->prepare($query);

// Bind parameters to statement
$sql->bindParam(':etat', $etat);
$sql->bindParam(':date_valide', $date_valide);
$sql->bindParam(':heure', $heure);
$sql->execute();


$sql="SELECT *  FROM commande where ref_com='$ref_com'  and id_four='$id_four'and etat=1 ";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($tables as $table)
            {

                $qt=$table['qt_com'];
                $prix=$table['prix_ht'];
                $date_c_com = $table['date_c_com'];
                $date_l_com = $table['date_l_com'];
                $date_r_com = $table['date_r_com'];
                $id_medi = $table['id_medi'];

                $sql="SELECT count(id_medi) as total, qt_com FROM magasin where id_medi='$id_medi' ";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($tables as $table)
            {
                $to=$table['total'];
                $quantite=$table['qt_com'];
            }
            $total=$to;


                //
            if($total!=0){
              $qt_total=$quantite+$qt;

                $query1 = "UPDATE magasin SET qt_com=:qt_com where id_medi = '$id_medi'";

                $sql = $db->prepare($query1);

                // Bind parameters to statement
                $sql->bindParam(':qt_com',$qt_total );
                $sql->execute();
            }else{


                $query = " INSERT INTO magasin (id_four,ref_com,id_medi,qt_com,prix_ht,date_c_com,date_l_com,date_r_com)
                     VALUES (:id_four,:ref_com,:id_medi,:qt_com,:prix_ht,:date_c_com,:date_l_com,:date_r_com)";

                $sql = $db->prepare($query);

                // Bind parameters to statement
                $sql->bindParam(':id_four', $id_four);
                $sql->bindParam(':ref_com', $ref_com);
                $sql->bindParam(':id_medi', $id_medi);
                $sql->bindParam(':qt_com', $qt);
                $sql->bindParam(':prix_ht', $prix);
                $sql->bindParam(':date_c_com', $date_c_com);
                $sql->bindParam(':date_l_com', $date_l_com);
                $sql->bindParam(':date_r_com', $date_r_com);
                $sql->execute();
            }



            }






if($sql)
{
   ?>
    <script>
      //  alert('Demande valider.');
      window.location.href='liste_commande.php?witness=1';
    </script>
    <?php
}

else
{
    ?>
    <script>
        //alert('Demande n\'a pas été valider.');
        window.location.href='liste_commande.php?witness=-1';
    </script>
    <?php

}
?>
