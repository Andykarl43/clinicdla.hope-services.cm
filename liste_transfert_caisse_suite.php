<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des transferts de solde en cours</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">


                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="liste_caisse.php">
                                        <i class="fas fa-cubes"></i>
                                        Retour
                                    </a>
                                </li>
                            </ul>
                        </b>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
                <!--                Main Body              -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Caisse source</th>
                                    <th>Caisse destinatiare</th>
                                    <th>Solde</th>
                                    <th>Date transfert</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($lvl == 2)
                                    $query = "SELECT *from transfert_caisse where etat=0 and (id_perso_src='$id_perso_session' || id_perso_dst='$id_perso_session')";
                                    else
                                $query = "SELECT *from transfert_caisse where etat=0 ";


                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_trans_caisse = $row['id_trans_caisse'];
                                    $id_caisse_src = $row['id_caisse_src'];
                                    $nom_caisse_src = $row['nom_caisse_src'];

                                    $nom_caisse_dst = $row['nom_caisse_dst'];
                                    $id_caisse_dst = $row['id_caisse_dst'];

                                    $id_perso_dst = $row['id_perso_dst'];
                                    $etat = $row['etat'];
                                    $quantite = $row['quantite'];
                                    $date_trans_caisse = $row['date_trans_caisse'];


                                        ?>

                                        <tr>
                                            <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                                 class="rounded-circle m-r-5" alt=""><?=$nom_caisse_src?></a></td>
                                            <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                                 class="rounded-circle m-r-5" alt=""><?=$nom_caisse_dst?></a></td>
                                            <td><a href="#"><?=number_format($quantite)?></a></td>
                                            <td><a href="#"><?=$date_trans_caisse?></a></td>
                                            <td>
                                                <?php
                                                if($lvl==2){
                                                    if($id_perso_session == $id_perso_dst) {
                                                        if ($etat != 1) {

                                                            echo ' <a class="btn btn-warning" href="modifier_transfert_caisse.php?id_trans_caisse=' . $id_trans_caisse . '">
                                                         <i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="valider_transfert_caisse.php?id_caisse_src=' . $id_caisse_src . '&id_caisse_dst=' . $id_caisse_dst . '&quantite=' . $quantite . '&id_trans_caisse=' . $id_trans_caisse . '">
                                                         <i class="fa fa-check"></i></a>||<a class="btn btn-danger"  onclick="Supp(this.href); return(false);" href="delete_transfert_caisse.php?idr=' . $id_trans_caisse . '" >
                                                         <i class="fa fa-trash"></i></a>';

                                                        } else {
                                                            echo '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                                                        }
                                                    }else{
                                                        echo'
                                                    <button  style=" width:140px;"    class="btn btn-warning" >En cours...
                                                            </button>
                                                ';
                                                    }
                                                    }
                                                else{
                                                    if($id_perso_session ==$id_perso_session) {
                                                        if ($etat != 1) {

                                                            echo ' <a class="btn btn-warning" href="modifier_transfert_caisse.php?id_trans_caisse=' . $id_trans_caisse . '">
                                                         <i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="valider_transfert_caisse.php?id_caisse_src=' . $id_caisse_src . '&id_caisse_dst=' . $id_caisse_dst . '&quantite=' . $quantite . '&id_trans_caisse=' . $id_trans_caisse . '">
                                                         <i class="fa fa-check"></i></a>||<a class="btn btn-danger"  onclick="Supp(this.href); return(false);" href="delete_transfert_caisse.php?idr=' . $id_trans_caisse . '" >
                                                         <i class="fa fa-trash"></i></a>';

                                                        } else {
                                                            echo '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                                                        }
                                                    }else{
                                                        echo'
                                                    <button  style=" width:140px;"    class="btn btn-warning" >En cours...
                                                            </button>
                                                ';
                                                    }
                                                   }






                                                ?>
                                            </td>

                                        </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--                End Body              -->

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <script type="text/javascript">
        function Supp(link){
            if(confirm('Confirmer  la suppression du transfert de solde ?')){
                document.location.href = link;
            }
        }
    </script>
<?php
if (isset($_GET['witness'])) {
    $witness = $_GET['witness'];

    switch ($witness) {
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>