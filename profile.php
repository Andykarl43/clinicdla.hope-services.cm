<?php

include('first.php');
include('php/main_side_navbar.php');

$error = '';
if (isset($_POST['save_password'])) {

    $ancient_password = $_POST['oldpassword'];

    $nouveau_password = $_POST['newpassword'];

    $confirmpassword = $_POST['confirmpassword'];


    $query = "SELECT * from users WHERE pseudo='$user'";
    $q = $conn->query($query);

    while ($row = $q->fetch_assoc()) {
        $true_password = $row["password"];

//        echo $lvl.'<br/>';
    }

    if ($nouveau_password === $confirmpassword) {
        if ($nouveau_password !== $ancient_password) {
            $ancient_password = hash('sha256', $ancient_password);
//            echo 'old '.$ancient_password.'<br/>';
//            echo 'True '.$true_password.'<br/>';
            if ($true_password === $ancient_password) {

                $nouveau_password = hash('sha256', $nouveau_password);
                if ($true_password !== $nouveau_password) {

                    $sql = $conn->query("UPDATE users SET password='$nouveau_password' WHERE pseudo='$user'");
                    header('Location: profile.php?password_err=success');
                } else header('Location: profile.php?password_err=anotherpassword');
            } else header('Location: profile.php?password_err=not_oldpassword');
        } else header('Location: profile.php?password_err=samepassword_entered');
    } else header('Location: profile.php?password_err=passeword_retype');

}

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Mon Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?= strtoupper($nom_user); ?>, il est <?= date("G:i"); ?> en ce jour
                        du <?= dateToFrench("now", "l j F Y"); ?>.
                    </li>
                </ol>

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="mt-4">Modifier mon mot de passe</h1>

                                <?php
                                if (isset($_GET['password_err'])) {
                                    $err = $_GET['password_err'];

                                    switch ($err) {
                                        case 'passeword_retype';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> Veillez resaisir vos mots de passe en faisant
                                                attention à la confirmation du nouveau mot de passe
                                            </div>
                                            <?php
                                            break;
                                        case 'samepassword_entered';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> Vaillez saisir un mot de passe différent de
                                                l'ancien
                                            </div>
                                            <?php
                                            break;
                                        case 'not_oldpassword';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> Mot de passe incorret
                                            </div>
                                            <?php
                                            break;
                                        case 'anotherpassword';
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Erreur : </strong> Vaillez saisir un nouveau mot de passe
                                            </div>
                                            <?php
                                            break;
                                        case 'success';
                                            ?>
                                            <div class="alert alert-success">
                                                <strong>Succès : </strong> Mot de passe changé !
                                            </div>
                                            <?php
                                            break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /. ROW  -->
                        <div class="row">

                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Veillez remplir ce formulaire pour changer votre ancien mot de passe
                                    </div>
                                    <form action="profile.php" method="post" id="signupForm1" class="form-horizontal">
                                        <div class="panel-body">
                                            <br/>

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label" for="Old">Ancien mot de
                                                    passe</label>
                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="oldpassword"
                                                           name="oldpassword"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-12 control-label" for="Password"> Nouveau mot de
                                                    passe</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" name="newpassword" id="newpassword"
                                                           type="password">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-12 control-label" for="Confirm">Confirmation
                                                    nouveau mot de passe</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" name="confirmpassword" type="password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9 col-sm-offset-4">
                                                    <button type="submit" name="save_password" class="btn btn-primary">
                                                        Mettre à jour
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                        <!-- /. ROW  -->
                    </div>
                </div>


            </div>
        </main>
    </div>

    <!--//Footer-->
<?php
include('foot.php');
?>