<?php
include 'first.php';
// echo $_POST['username'].'<br/>';
//echo $_POST['email'].'<br/>';
//echo $_POST['password'].'<br/>';
//echo $_POST['password_retype'].'<br/>';

$id_medecin = $_POST['id_medecin'];
$id_chirugien = $_POST['id_chirugien'];
$id_laboratin = $_POST['id_laboratin'];
$id_nurse = $_POST['id_nurse'];

if (isset($_POST['pseudo']) && isset($_POST['password'])) {

   // $id_person = $_POST['id_person'];
    $pseudo = $_POST['pseudo'];
    // $secteur = $_POST['secteur'];
    $email = $_POST['email'];
    $password = $_POST['password'];
//            $password_retype = $_POST['password_retype'];



    $query = "SELECT COUNT(pseudo) AS totals FROM users_specialistes WHERE pseudo = '$pseudo'";
    $q = $conn->query($query);
    while ($row = $q->fetch_assoc()) {
        $totals = $row["totals"];
    }



    if($id_medecin!=0 and $id_chirugien==0 and $id_laboratin==0 and $id_nurse==0){
        $lvl = 5;
        $type_spe="M";


        if ( $totals == 0) {

            if (strlen($pseudo) <= 100) {
                // echo "pseudo: ".$pseudo.'<br/>';
                $password = hash('sha256', $password);
                $ip = $_SERVER['REMOTE_ADDR'];
                // $date_inscription = datetime("Y-m-d");
                // echo "Pass: ". $password.'<br/>';
                $sql = $conn->query("INSERT INTO users_specialistes (id_specialiste, pseudo, password, lvl, type_spe, email, ip, date)
                                                VALUES($id_medecin,'$pseudo', '$password', $lvl,'$type_spe', '$email','$ip', SYSDATE())");

                // echo 'sql: '.$sql.'<br/>';
                // echo 'sql1: '.$sql1.'<br/>';
                if ($sql) {
                    // echo 'temoin <br/>';
                    header('Location: nouveau_specialistes.php?reg_err=success');
                }
            } else header('Location: nouveau_specialistes.php?reg_err=pseudo_lenght');
        } else header('Location: nouveau_specialistes.php?reg_err=already');

    }elseif($id_medecin==0 and $id_chirugien!=0 and $id_laboratin==0 and $id_nurse==0){
        $lvl = 8;
        $type_spe="C";
        if ($totals == 0) {

            if (strlen($pseudo) <= 100) {
                // echo "pseudo: ".$pseudo.'<br/>';
                $password = hash('sha256', $password);
                $ip = $_SERVER['REMOTE_ADDR'];
                // $date_inscription = datetime("Y-m-d");
                // echo "Pass: ". $password.'<br/>';
                $sql = $conn->query("INSERT INTO users_specialistes (id_specialiste, pseudo, password, lvl, type_spe, email, ip, date)
                                                VALUES($id_chirugien,'$pseudo', '$password', $lvl,'$type_spe', '$email','$ip', SYSDATE())");

                // echo 'sql: '.$sql.'<br/>';
                // echo 'sql1: '.$sql1.'<br/>';
                if ($sql) {
                    // echo 'temoin <br/>';
                    header('Location: nouveau_specialistes.php?reg_err=success');
                }
            } else header('Location: nouveau_specialistes.php?reg_err=pseudo_lenght');
        } else header('Location: nouveau_specialistes.php?reg_err=already');

    }elseif($id_medecin==0 and $id_chirugien==0 and $id_laboratin!=0 and $id_nurse==0){
        $lvl = 9;
        $type_spe="L";
        if ($totals == 0) {

            if (strlen($pseudo) <= 100) {
                // echo "pseudo: ".$pseudo.'<br/>';
                $password = hash('sha256', $password);
                $ip = $_SERVER['REMOTE_ADDR'];
                // $date_inscription = datetime("Y-m-d");
                // echo "Pass: ". $password.'<br/>';
                $sql = $conn->query("INSERT INTO users_specialistes (id_specialiste, pseudo, password, lvl, type_spe, email, ip, date)
                                                VALUES($id_laboratin,'$pseudo', '$password', $lvl,'$type_spe', '$email','$ip', SYSDATE())");

                // echo 'sql: '.$sql.'<br/>';
                // echo 'sql1: '.$sql1.'<br/>';
                if ($sql) {
                    // echo 'temoin <br/>';
                    header('Location: nouveau_specialistes.php?reg_err=success');
                }
            } else header('Location: nouveau_specialistes.php?reg_err=pseudo_lenght');
        } else header('Location: nouveau_specialistes.php?reg_err=already');

    }elseif($id_medecin==0 and $id_chirugien==0 and $id_laboratin==0 and $id_nurse!=0){
        $lvl = 3;
        $type_spe="N";
        if ($totals == 0) {

            if (strlen($pseudo) <= 100) {
                // echo "pseudo: ".$pseudo.'<br/>';
                $password = hash('sha256', $password);
                $ip = $_SERVER['REMOTE_ADDR'];
                // $date_inscription = datetime("Y-m-d");
                // echo "Pass: ". $password.'<br/>';
                $sql = $conn->query("INSERT INTO users_specialistes (id_specialiste, pseudo, password, lvl, type_spe, email, ip, date)
                                                VALUES($id_nurse,'$pseudo', '$password', $lvl,'$type_spe', '$email','$ip', SYSDATE())");

                // echo 'sql: '.$sql.'<br/>';
                // echo 'sql1: '.$sql1.'<br/>';
                if ($sql) {
                    // echo 'temoin <br/>';
                    header('Location: nouveau_specialistes.php?reg_err=success');
                }
            } else header('Location: nouveau_specialistes.php?reg_err=pseudo_lenght');
        } else header('Location: nouveau_specialistes.php?reg_err=already');
    }


    // echo "Total: ".$total.'<br/>';


} else header('Location: nouveau_specialistes.php');
?>