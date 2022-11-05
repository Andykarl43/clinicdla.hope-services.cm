<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php


$id_patient=$_POST['id_patient'];
$id_medecin=$_POST['id_medecin'];
$id_pharmacien=$_POST['id_pharmacien'];
$date_ordo=date('Y-m-d');
$id_depart=1;

$year = (new DateTime())->format("Y");
$month = (new DateTime())->format("m");
$day = (new DateTime())->format("d");
$total_apt=0;
$query  = "SELECT count(id_ordo) as total from ordonnance";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_apt = $row["total"];
}
$id_app = $total_apt + 1;
$ref_medi= 'ORDO_'.$year.'_'.$month.'_'.$id_patient.'_'.$id_app;


$query  = "SELECT count(id_ordo) as total from ordonnance";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_apt = $row["total"];
}
$id_ordo = $total_apt + 1;





if(isset($_POST['id_medi']) and  isset($_POST['quantite']) and  isset($_POST['posologie']) and  isset($_POST['traitement'])  ){
    $id_medi=$_POST['id_medi'];
    $quantite=$_POST['quantite'];
    $posologie=$_POST['posologie'];
    $traitement=$_POST['traitement'];
}else{
    echo 'fooog';
   $id_medi[0]=0;
}



//echo $id = count($id_medi);
echo $id = count($id_medi);
//    echo $id.'</br>';
$cnt=0;
$total_somme=0;
$total_reduction=0;
$execute=0;
//if($id_medi[0]!=0 and abs($quantite[0])!=0){
    if($id!=0){
        $count = array();

        for ($j = 0; $j <$id; $j++) {
            $k=0;
            if($id_medi[$j]!=0){
                $sum_quant=0;
                $idcount=count($count);

                if($idcount>0){

                    for($i = 0; $i <$idcount; $i++){
                        if($count[$i]==$id_medi[$j]){ $k+=1;}

                    }
                }


                for($i = 0; $i <$id; $i++){
                    if($id_medi[$j]==$id_medi[$i]){ $sum_quant+=$quantite[$i]; $count[$i]=$id_medi[$i];}

                }
//                $query  = "SELECT * from medicament_ordo where ref_medi_ordo='$ref_medi' and id_medi='$id_medi'";
//                $q = $conn->query($query);
//                while($row = $q->fetch_assoc())
//                {
//                    $cnt+=1;
//                }
//
//                if($cnt==0){
//
//                }else{
//
//                    $query  = "SELECT * from medicament_ordo where ref_medi_ordo='$ref_medi' and id_medi='$id_medi'";
//                    $q = $conn->query($query);
//                    while($row = $q->fetch_assoc())
//                    {
//                        $ref_medi_ordo = $row["ref_medi_ordo"];
//                        $id_medi  = $row["id_medi "];
//                        $quantite_medi_ordo= $row["quantite_medi_ordo"];
//                    }
//
//
//                }
                    $tom=0;
                    $query  = "SELECT quantite from pharmacie where id_medi='$id_medi[$j]'";
                                        $q = $conn->query($query);
                                        while($row = $q->fetch_assoc())
                                        {
                                            $medoc_phar = $row["quantite"];
                                        }
                                        
                                        if($medoc_phar-$sum_quant<0){
                                        
                                            $tom++;
                                            
                                        }
                                        
                if($k==0 and $tom==0){
                    
                    if($execute==0){
                                    $query = " INSERT INTO ordonnance (ref_ordo,id_patient,id_medecin,id_depart,date_ordo,id_pharmacien) 
                                 VALUES (:ref_medi,:id_patient,:id_medecin,:id_depart,:date_ordo,:id_pharmacien)";
            
                                        $sql = $db->prepare($query);
                                        
                                        // Bind parameters to statement
                                        $sql->bindParam(':ref_medi', $ref_medi);
                                        $sql->bindParam(':id_patient', $id_patient);
                                        $sql->bindParam(':id_medecin', $id_medecin);
                                        $sql->bindParam(':id_depart', $id_depart);
                                        $sql->bindParam(':date_ordo', $date_ordo);
                                        $sql->bindParam(':id_pharmacien', $id_pharmacien);
                                        $sql->execute();
                                        $execute++;
                    }
                    
                 
                
                    
                    
                    

                    $query = " INSERT INTO medicament_ordo (ref_medi_ordo,id_medi,id_patient,id_medecin,id_depart,quantite_medi_ordo,date_medi_os_ordo,id_ordo,id_pharmacien,posologie,traitement) 
                     VALUES (:ref_medi,:id_medi,:id_patient,:id_medecin,:id_depart,:quantite_medi_ordo,:date_medi_os,:id_ordo,:id_pharmacien,:posologie,:traitement)";

                    $sql = $db->prepare($query);

                    // Bind parameters to statement

                    $sql->bindParam(':ref_medi', $ref_medi);
                    $sql->bindParam(':id_medi', $id_medi[$j]);
                    $sql->bindParam(':id_patient', $id_patient);
                    $sql->bindParam(':id_medecin', $id_medecin);
                    $sql->bindParam(':id_depart', $id_depart);
                    $sql->bindParam(':quantite_medi_ordo', $sum_quant);
                    $sql->bindParam(':date_medi_os', $date_ordo);
                    $sql->bindParam(':id_ordo', $id_ordo);
                    $sql->bindParam(':id_pharmacien', $id_pharmacien);
                    $sql->bindParam(':posologie', $posologie[$j]);
                    $sql->bindParam(':traitement', $traitement[$j]);
                    $sql->execute();

                    $query = "SELECT * from medicament where id_medi = '$id_medi[$j]'  ";
                    $q = $db->query($query);
                    while($row = $q->fetch()) {
                        $prix = $row['prix_u_v'];
                    }
                  $total_somme+=$prix*$sum_quant;

                }else{
                            ?>
                    <script>
                       // alert('Ordonnance effectuée.');
                      window.location.href='<?=$ordonnance['option2_link']?>?witness=-2';
                    </script>
                    <?php
                }




                }
                

            }
//        echo $ref_medi.'</br>';
//        echo $id_patient.'</br>';
//        echo $id_medecin.'</br>';
//        echo $total_somme.'</br>';
//        echo $date_ordo.'</br>';
        $ref_reg_ordo="N/A";
//        $sql = "INSERT INTO regler_ordo (ref_ordo,id_patient,id_medecin,somme,date_reg_ordo)
//                                  VALUES (?,?,?,?,?)";
//        $req = $db->prepare($sql);
//        $req->execute(array($ref_medi,$id_patient,$id_medecin,$total_somme,$date_ordo));

        $query = " INSERT INTO regler_ordo (ref_reg_ordo,ref_ordo,id_patient,id_medecin,somme,date_reg_ordo,id_ordo,id_pharmacien) 
                     VALUES (:ref_reg_ordo,:ref_medi,:id_patient,:id_medecin,:total_somme,:date_ordo,:id_ordo,:id_pharmacien)";

        $sql = $db->prepare($query);

        // Bind parameters to statement

        $sql->bindParam(':ref_reg_ordo', $ref_reg_ordo);
        $sql->bindParam(':ref_medi', $ref_medi);
        $sql->bindParam(':id_patient', $id_patient);
        $sql->bindParam(':id_medecin', $id_medecin);
        $sql->bindParam(':total_somme', $total_somme);
        $sql->bindParam(':date_ordo', $date_ordo);
        $sql->bindParam(':id_ordo', $id_ordo);
        $sql->bindParam(':id_pharmacien', $id_pharmacien);
        $sql->execute();

        }



if($sql)
{
    // $mailler = new mailsenderclass();

    // $subject = "Demande de d'equipement";
    // $body = "Demande d'equipement effectuee par "
    //         .strtoupper($nom_user)." le "
    //         .date("d/m/Y"). " à "
    //         .date("G:i")." pour la salle "
    //         .strtoupper($nom_salle)
    //         ."<br/>
    //          <a href='campresjonlline.net'>Voir les details</a>";

    // $from= 'supergoal@campresjonlline.net';
    // $from_name='CAMPREJ EQUIEPEMENT';
    // $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
    // while($row = $sql->fetch()){
    //     $to = $row['email'];
    //     $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
    // }
    // $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);






            ?>
            <script>
               // alert('Ordonnance effectuée.');
              window.location.href='<?=$ordonnance['option2_link']?>?witness=1';
            </script>
            <?php

}

else
{

            ?>
            <script>
                alert('Erreur lors du chargement.');
               window.location.href='<?=$ordonnance['option2_link']?>?witness=-1';
            </script>
            <?php

}
?>
