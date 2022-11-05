<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php

//$id_session = $_SESSION['rainbo_id_perso'];
//$user = $_SESSION['rainbo_name'];
//$email_user = $_SESSION['rainbo_email'];
//$nom_user = "";
//$query = "SELECT * from personnel where id_personnel = $id_session";
//$q = $db->query($query);
//while($row = $q->fetch()) {
//    $nom_session = $row['prenom'] .' '.$row['nom'];
//    $email_user_session = $row['email'];
//}


echo'<br>'.$id_four=$_POST['id_four'];
//$id_medi=$_POST['id_medi'];
//$quantite=$_POST['quantite'];
//$prix=$_POST['prix'];
echo'<br>'.$ref_com=$_POST['ref_com'];
//echo'<br>'.$date_c_com=$_POST['date_c_com'];
echo'<br>'.$date_l_com=$_POST['date_l_com'];
echo'<br>'.$date_r_com=$_POST['date_r_com'];
echo'<br>'.$obs=$_POST['obs'];
//echo'<br>'.$moment=$_POST['moment'];
//echo'<br>'.$mode_paie=$_POST['mode_paie'];
echo'<br>'.$frais=$_POST['frais'];
echo'<br>'.$obs=$_POST['obs'];



if(isset($_POST['id_medi']) and  isset($_POST['quantite']) and isset($_POST['prix']) ){
    $id_medi=$_POST['id_medi'];
    $quantite=$_POST['quantite'];
    $prix=$_POST['prix'];
}else{
    $id_medi[0]=0;
    ?>
    <script>
        alert('Erreur lors du chargement.');
        window.location.href='liste_commande.php?witness=-1';
    </script>
    <?php

}


echo'<br>'.$id = count($id_medi);
//    echo $id.'</br>';

if($id_medi[0]!=0 ){
    if($id!=0) {

        for ($j = 0; $j < $id; $j++) {

            if ($id_medi[$j] != 0) {
                echo'<br>'.$id_medi[0];
                echo'<br>'.$quantite[0];
                echo'<br>'.$prix[0];

                $query = " INSERT INTO commande (id_four,ref_com,id_medi,qt_com,prix_ht,date_c_com,date_l_com,date_r_com,frais,moment,mode_paie,obs) 
                     VALUES (:id_four,:ref_com,:id_medi,:qt_com,:prix_ht,:date_c_com,:date_l_com,:date_r_com,:frais,:moment,:mode_paie,:obs)";

                $sql = $db->prepare($query);

                // Bind parameters to statement
                $sql->bindParam(':id_four', $id_four);
                $sql->bindParam(':ref_com', $ref_com);
                $sql->bindParam(':id_medi', $id_medi[$j]);
                $sql->bindParam(':qt_com', $quantite[$j]);
                $sql->bindParam(':prix_ht', $prix[$j]);
                $sql->bindParam(':date_c_com', $date_c_com);
                $sql->bindParam(':date_l_com', $date_l_com);
                $sql->bindParam(':date_r_com', $date_r_com);
                $sql->bindParam(':frais', $frais);
                $sql->bindParam(':moment', $moment);
                $sql->bindParam(':mode_paie', $mode_paie);
                $sql->bindParam(':obs', $obs);
                $sql->execute();
            }

//            $sql="SELECT count(id_medi) as total, qt_com FROM magasin where id_medi='$id_medi[$j]' ";
//            $stmt = $db->prepare($sql);
//            $stmt->execute();
//
//            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//            foreach($tables as $table)
//            {
//                $to=$table['total'];
//                $qt=$table['qt_com'];
//            }
//            $total=$to;
//
//            if($total==0){
//                $query = " INSERT INTO magasin (id_four,ref_com,id_medi,qt_com,prix_ht,date_c_com,date_l_com,date_r_com)
//                     VALUES (:id_four,:ref_com,:id_medi,:qt_com,:prix_ht,:date_c_com,:date_l_com,:date_r_com)";
//
//                $sql = $db->prepare($query);
//
//                // Bind parameters to statement
//                $sql->bindParam(':id_four', $id_four);
//                $sql->bindParam(':ref_com', $ref_com);
//                $sql->bindParam(':id_medi', $id_medi[$j]);
//                $sql->bindParam(':qt_com', $quantite[$j]);
//                $sql->bindParam(':prix_ht', $prix[$j]);
//                $sql->bindParam(':date_c_com', $date_c_com);
//                $sql->bindParam(':date_l_com', $date_l_com);
//                $sql->bindParam(':date_r_com', $date_r_com);
//                $sql->execute();
//            }else{
//                $qt_total=$quantite[$j]+$qt;
//
//                $query1 = "UPDATE magasin SET qt_com=:qt_com where id_medi = '$id_medi[$j]' and id_four='$id_four' and  ref_com = '$ref_com' ";
//
//                $sql = $db->prepare($query);
//
//                // Bind parameters to statement
//                $sql->bindParam(':qt_com',$qt_total );
//                $sql->execute();
//            }






        }

        if($sql)
        {

            ?>
            <script>
                alert('Opération effectuée.');
                window.location.href='liste_commande.php?witness=1';
            </script>
            <?php

        }else{

            ?>
            <script>
                alert('Synthax Error!!!');
                window.location.href='liste_commande.php?witness=-1';
            </script>
            <?php


        }

    }
}else{

    ?>
    <script>
        alert(' Error');
        window.location.href='liste_commande.php?witness=-1';
    </script>
    <?php

}











?>
