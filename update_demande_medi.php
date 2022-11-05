<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php
//$user = $_SESSION['rainbo_name'];
//$email_user = $_SESSION['rainbo_email'];

//$id_session = $_SESSION['rainbo_id_perso'];
$id_perso=$_POST['id_perso'];
$id_ask_medi=$_POST['id_ask_medi'];


$query = "SELECT * from personnel where id_personnel = $id_perso";
$q = $db->query($query);
while($row = $q->fetch()) {
    $nom_session = $row['nom'].' '.$row['prenom'];
    $email_user_session = $row['email'];
}


// $cout=$_POST['cout'];
$date_debut=$_POST['date_debut'];
//  $cout=$_POST['prix'];

if(isset($_POST['id_medi']) and  isset($_POST['quantite'])  ){
    $id_materiel=$_POST['id_medi'];
    $quantite=$_POST['quantite'];
}else{
    $id_materiel[0]=0;
    ?>
    <script>
        alert('Erreur lors du chargement.');
        window.location.href='liste_demande_produit.php?witness=-1';
    </script>
    <?php

}


//                                        echo $total;




//                                        $items = [];
$designation = "";
$ref_materiel = "";




//print_r($id_materiel);
$id = count($id_materiel);
//   echo $id.'</br>';

//if($id_materiel[0]!=0 and abs($quantite[0])!=0){
if($id!=0){

    $etat=0;
    $date_valide='N/A';
    $heure_debut=date("G:i");

    $query = "UPDATE demande_medicament SET  date_debut=:date_debut  
                    WHERE id_ask_medi = '$id_ask_medi' ";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':date_debut', $date_debut);
    $sql->execute();


    foreach($id_materiel as $cle => $data_item)
    {
        echo $cle .' => '.$data_item;


        if($id_materiel[$cle]!=0){




            $sql = "SELECT * FROM magasin where id_medi='$id_materiel[$cle]' ";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tables as $table) {
                $quantite_mat = $table['qt_com'];
                $prix_unitaire = $table['prix_ht'];
            }


            $quantite_reste=$quantite_mat-$quantite[$cle];

            if ($quantite_reste>=0){


//                    $sql="SELECT * FROM salles where id_salles='$id_salles' ";
//                    $stmt = $db->prepare($sql);
//                    $stmt->execute();
//
//                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//                    foreach($tables as $table)
//                    {
//                        $nom_salle=$table['nom'];
//                    }

//                    $emetteur=$mag;
//                    $receveur='S';
                $cnts=0;
                $sql="SELECT count(id_ask_mat)  as tos, quantite FROM demande_materiel where id_ask_medi='id_ask_medi' and id_medi='$id_materiel[$cle]'  ";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($tables as $table)
                {
                    $cnts=$table['tos'];
                    $qt_ask_mat=$table['quantite'];
                }


                // $prix_total_f=$quantite_reste*$prix_unitaire;
                if($cnts!=0){
                    $qt_total=$qt_ask_mat+$quantite[$cle];

                    $query1 = "UPDATE demande_materiel SET quantite=:qt_com where id_ask_medi='id_ask_medi' and id_medi='$id_materiel[$cle]'";

                    $sql = $db->prepare($query1);

                    // Bind parameters to statement
                    $sql->bindParam(':qt_com',$qt_total );
                    $sql->execute();


                }else{
                    $etat=0;

                    $sql = "INSERT INTO demande_materiel ( id_medi,date_debut_mat,id_ask_medi,quantite,etat_src,responsable,id_perso)
                                VALUES(:id_materiel,:date_debut,:id_ask_eq,:quantite,:etat,:resp,:id_perso)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_materiel', $id_materiel[$cle]);
                    $req->bindParam(':date_debut', $date_debut);
                    $req->bindParam(':id_ask_eq', $id_ask_medi);
                    $req->bindParam(':quantite', $quantite[$cle]);
                    $req->bindParam(':etat', $etat);
                    $req->bindParam(':resp', $nom_session);
                    $req->bindParam(':id_perso', $id_perso);
                    $req->execute();
                }


                //     $query1 = "UPDATE materiel SET quantite=:quantite, prix_total=:prix_total where id_materiel = '$id_materiel[$j]' ";

                // $sql1 = $db->prepare($query1);

                //      // Bind parameters to statement
                //     $sql1->bindParam(':quantite', $quantite_reste);
                //     $sql1->bindParam(':prix_total', $prix_total_f);
                //     $sql1->execute();

                if($sql)
                {
//                        $mailler = new mailsenderclass();
//
//                        $subject = "Demande de d'equipement";
//                        $body = "Demande d'equipement effectuee par "
//                            .strtoupper($user)." le "
//                            .date("d/m/Y"). " A "
//                            .date("G:i")." pour la salle "
//                            .strtoupper($nom_salle)
//                            ."<br/>
//                                                         <a href='campresjonlline.net'>Voir les details</a>";
//
//                        $from= 'supergoal@campresjonlline.net';
//                        $from_name='CAMPREJ EQUIEPEMENT';
//                        $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
//                        while($row = $sql->fetch()){
//                            $to = $row['email'];
//                            $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
//                        }
//
//                        $sql = $db->query("select * from users where (lvl = 5 or lvl = 6 )");
//                        while($row = $sql->fetch()){
//                            $to = $row['email'];
//                            $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
//                        }
//
//                        $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
                    ?>
                    <script>
                        alert('Opération effectuée.');
                        window.location.href='liste_demande_produit.php?witness=1';
                    </script>
                    <?php
                }

                else
                {
                    ?>
                    <script>
                        alert('Erreur lors du chargement.');
                        window.location.href='modifier_demande_eq.php?id=<?=$id_ask_medi?>&witness=-1';
                    </script>
                    <?php

                }


            }else{

                ?>
                <script>
                    alert(' Stock Insuffisant !!!');
                    window.location.href='modifier_demande_eq.php?id=<?=$id_ask_medi?>&witness=-1';
                </script>
                <?php


            }





//             $query = "SELECT * from materiel where id_materiel = '$id_materiel[$j]' ";
//             $q = $db->query($query);
//             while($row = $q->fetch()) {
//                 $ref_materiel = $row['ref_materiel'];
//                 $designation = $row['designation'];
//             }
//             $items[] = [$ref_materiel, $designation];
        }

    }


//-------------------------------------------------------------------------------------
//        for ($j = 0; $j <$id; $j++) {
//
//            echo $id_materiel[$j].'</br>';
//            if($id_materiel[$j]!=0){
//
//
//
//
//                $sql = "SELECT * FROM magasin where id_medi='$id_materiel[$j]' ";
//                $stmt = $db->prepare($sql);
//                $stmt->execute();
//
//                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//                foreach ($tables as $table) {
//                    $quantite_mat = $table['qt_com'];
//                    $prix_unitaire = $table['prix_ht'];
//                }
//
//
//                $quantite_reste=$quantite_mat-$quantite[$j];
//
//                if ($quantite_reste>=0){
//
//
////                    $sql="SELECT * FROM salles where id_salles='$id_salles' ";
////                    $stmt = $db->prepare($sql);
////                    $stmt->execute();
////
////                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
////
////                    foreach($tables as $table)
////                    {
////                        $nom_salle=$table['nom'];
////                    }
//
////                    $emetteur=$mag;
////                    $receveur='S';
//
//
//
//                    $sql="SELECT id_ask_medi as total FROM demande_medicament  ";
//                    $stmt = $db->prepare($sql);
//                    $stmt->execute();
//
//                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//                    foreach($tables as $table)
//                    {
//                        $to=$table['total'];
//                    }
//                    $total=$to;
//
//
//                    // $prix_total_f=$quantite_reste*$prix_unitaire;
//                    $etat=0;
//
//                    $sql = "INSERT INTO demande_materiel ( id_medi,date_debut_mat,id_ask_medi,quantite,etat_src,responsable,id_perso)
//                                VALUES(:id_materiel,:date_debut,:id_ask_eq,:quantite,:etat,:resp,:id_perso)";
//                    $req = $db->prepare($sql);
//
//                    // Bind parameters to statement
//                    $req->bindParam(':id_materiel', $id_materiel[$j]);
//                    $req->bindParam(':date_debut', $date_debut);
//                    $req->bindParam(':id_ask_eq', $total);
//                    $req->bindParam(':quantite', $quantite[$j]);
//                    $req->bindParam(':etat', $etat);
//                    $req->bindParam(':resp', $nom_session);
//                    $req->bindParam(':id_perso', $id_perso);
//                    $req->execute();
//
//
//                    //     $query1 = "UPDATE materiel SET quantite=:quantite, prix_total=:prix_total where id_materiel = '$id_materiel[$j]' ";
//
//                    // $sql1 = $db->prepare($query1);
//
//                    //      // Bind parameters to statement
//                    //     $sql1->bindParam(':quantite', $quantite_reste);
//                    //     $sql1->bindParam(':prix_total', $prix_total_f);
//                    //     $sql1->execute();
//
//                    if($sql)
//                    {
////                        $mailler = new mailsenderclass();
////
////                        $subject = "Demande de d'equipement";
////                        $body = "Demande d'equipement effectuee par "
////                            .strtoupper($user)." le "
////                            .date("d/m/Y"). " A "
////                            .date("G:i")." pour la salle "
////                            .strtoupper($nom_salle)
////                            ."<br/>
////                                                         <a href='campresjonlline.net'>Voir les details</a>";
////
////                        $from= 'supergoal@campresjonlline.net';
////                        $from_name='CAMPREJ EQUIEPEMENT';
////                        $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
////                        while($row = $sql->fetch()){
////                            $to = $row['email'];
////                            $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
////                        }
////
////                        $sql = $db->query("select * from users where (lvl = 5 or lvl = 6 )");
////                        while($row = $sql->fetch()){
////                            $to = $row['email'];
////                            $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
////                        }
////
////                        $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
//                        ?>
    <!--                        <script>-->
    <!--                            alert('Opération effectuée.');-->
    <!--                            window.location.href='liste_demande_produit.php?witness=1';-->
    <!--                        </script>-->
    <!--                        --><?php
//                    }
//
//                    else
//                    {
//                        ?>
    <!--                        <script>-->
    <!--                            alert('Erreur lors du chargement.');-->
    <!--                           window.location.href='liste_demande_produit.php?witness=-1';-->
    <!--                        </script>-->
    <!--                        --><?php
//
//                    }
//
//
//                }else{
//
//                    ?>
    <!--                    <script>-->
    <!--                        alert(' Stock Insuffisant !!!');-->
    <!--                        window.location.href='liste_demande_produit.php?witness=-1';-->
    <!--                    </script>-->
    <!--                    --><?php
//
//
//                }
//
//
//
//
//
////             $query = "SELECT * from materiel where id_materiel = '$id_materiel[$j]' ";
////             $q = $db->query($query);
////             while($row = $q->fetch()) {
////                 $ref_materiel = $row['ref_materiel'];
////                 $designation = $row['designation'];
////             }
////             $items[] = [$ref_materiel, $designation];
//            }
//
//        }
//-------------------------------------------------------------------------------------
}
//}else{
//    ?>
<!--    <script>-->
<!--        alert('Incorrect : Une des quantités vaut 0.');-->
<!--        window.location.href='liste_demande_produit.php?witness=-1';-->
<!--    </script>-->
<!--    --><?php
//
//}
//echo '<b>Items list</b> <br/>';
//echo print_r($items).'<br/>';
//echo '<hr/>';
//echo $items[0][0].'<br/>';
//echo $items[0][1].'<br/>';
//echo '<hr/>';
//echo count($items).'<br/>';
//echo '<hr/>';
////table
//
//$bodyHTML = '<html>
//
//            <table border="3"  align="center">
//            <thead style="text-align: center">
//            <tr>
//
//            <th>
//            Num.
//            </th>
//
//            <th>
//            Ref.
//            </th>
//
//            <th>
//            Désignation
//            </th>
//
//            </tr>
//
//            </thead>
//            <tbody>' +
//
//for($k=0; $k<count($items); $k++){
//
//        +  '<tr>
//
//            <td>'
//            .($k+1).
//    echo \'</td>\'\;
//
//    echo \'<td>\'\;
//    echo $items[$k][0]\;
//    echo \'</td>\'\;
//
//    echo \'<td>\'\;
//    echo $items[$k][1]\;
//    echo \'</td>\'\;
//
//    echo \'</tr>\'\;
//}
//echo \'</tbody>
//        </table>\'\;
//        </html>';




?>
