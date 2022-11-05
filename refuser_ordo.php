<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
//     include ('MailSender/mailsenderclass.php');
?>
<?php

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

//
//    $query = "DELETE FROM caisse WHERE id_caisse='$id_caisse'";
//    $sql1 = $conn->query($query);


    $etat= -1;

    $query1 = " UPDATE ordonnance SET  etat=:etat    
                    WHERE id_ordo= '$id' ";
    $sql1 = $db->prepare($query1);

// Bind parameters to statement
    $sql1->bindParam(':etat', $etat);
    $sql1->execute();


    $query1 = " UPDATE medicament_ordo SET  etat=:etat    
                    WHERE id_ordo= '$id' ";
    $sql1 = $db->prepare($query1);

// Bind parameters to statement
    $sql1->bindParam(':etat', $etat);
    $sql1->execute();

    $query1 = " UPDATE regler_ordo SET  etat=:etat    
                    WHERE id_ordo= '$id' ";
    $sql1 = $db->prepare($query1);

// Bind parameters to statement
    $sql1->bindParam(':etat', $etat);
    $sql1->execute();



    if($sql1)
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
            //alert('Demande valider.');
            window.location.href='liste_ordonnance_suite.php?witness=1';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            //  alert('Demande n\'a pas été valider.');
            window.location.href='liste_ordonnance_suite.php?witness=-1';
        </script>
        <?php

    }
}
?>
