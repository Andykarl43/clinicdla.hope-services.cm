<?php
//    session_start();
include 'php/dbconnect.php';
include 'php/db.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $pseudo = $_POST['username'];
    $password = $_POST['password'];

//        echo $pseudo.'<br/>';
//        echo $password.'<br/>';

    $query = "SELECT count(*) as total from users WHERE pseudo='$pseudo'";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {
        $total = $row["total"];
    }

    $query = "SELECT count(*) as totals from users_specialistes WHERE pseudo='$pseudo'";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {
        $totals = $row["total"];
    }

////check_user_patient
//    if($totals ==0 and $total ==0){
//        $query = "SELECT * from users_patients WHERE pseudo='$pseudo'";
//        $q = $conn->query($query);
//        while ($row = $q->fetch_assoc()) {
//            $true_password = $row["password"];
//            $lvl = $row['lvl'];
//            $id_perso_session = $row['id_patient'];
//            $statut = $row['statut'];
//            //                echo $lvl.'<br/>';
//        }
//    }


//        echo $total;
    $statut = "D";
    $chantier_user = 0;
    $cpt =0;

    if ($total == 0) {

        $query = "SELECT count(*) as total from users_specialistes WHERE pseudo='$pseudo'";
        $q = $conn->query($query);
        while ($row = $q->fetch_assoc()) {
            $total = $row["total"];
        }
        $cpt++;
    }

    if ($total == 0) {

        $query = "SELECT count(*) as total from users_patients WHERE pseudo='$pseudo'";
        $q = $conn->query($query);
        while ($row = $q->fetch_assoc()) {
            $total = $row["total"];
        }
        $cpt++;
    }

    if ($total == 1) {
        if ($cpt == 0){
            $query = "SELECT * from users WHERE pseudo='$pseudo'";
            $q = $conn->query($query);
            while ($row = $q->fetch_assoc()) {
                $true_password = $row["password"];
                $lvl = $row['lvl'];
                $id_perso_session = $row['id_perso'];
                $statut = $row['statut'];

                $query1 = "SELECT * from personnel WHERE id_personnel=$id_perso_session";
                $q1 = $db->query($query1);
                while ($row1 = $q1->fetch()) {
                    $chantier_user = $row1["id_chantier"];
                }
//                echo $lvl.'<br/>';
            }
        }elseif($cpt == 1){
            $query = "SELECT * from users_specialistes WHERE pseudo='$pseudo'";
            $q = $conn->query($query);
            while ($row = $q->fetch_assoc()) {
                $true_password = $row["password"];
                $lvl = $row['lvl'];
                $id_perso_session = $row['id_specialiste'];
                $statut = $row['statut'];
                //                echo $lvl.'<br/>';
            }

        }else{
            $query = "SELECT * from users_patients WHERE pseudo='$pseudo'";
        $q = $conn->query($query);
        while ($row = $q->fetch_assoc()) {
            $true_password = $row["password"];
            $lvl = $row['lvl'];
            $id_perso_session = $row['id_patient'];
            $statut = $row['statut'];
            //                echo $lvl.'<br/>';
        }
        }


//            global $lvl;
        $password = hash('sha256', $password);
//            echo 'True PW :'.$true_password.'<br/>';
//            echo 'PW :'.$password.'<br/>';

        if ($true_password === $password) {
            if ($statut === "A") {

                $_SESSION['rainbo_name'] = $pseudo;
                $_SESSION['rainbo_lvl'] = $lvl;
                $_SESSION['rainbo_id_perso'] = $id_perso_session;
                $_SESSION['rainbo_chantier'] = $chantier_user;

                //                $_SESSION['msg'] = 'bienvenue '.$pseudo.' !';
                //                echo $lvl;
                header('Location: index.php');
            } else header('Location: connexion.php?login_err=desactived');
        } else header('Location: connexion.php?login_err=password');
    } else header('Location: connexion.php?login_err=already');
} else header('Location: connexion.php');
?>
