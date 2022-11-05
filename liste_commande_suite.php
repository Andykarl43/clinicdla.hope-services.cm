<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des Commandes en cours</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">

                                <?php
                                  if( $lvl != 11  ){
                                ?>
                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouvelle_commande.php">
                                        <i class="fas fa-cubes"></i>
                                        Nouvelle commande
                                    </a>
                                </li>
                            </ul>
                        </b>
                        <?php
                                  }
                                ?>


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
                                    <th>N° Com</th>
                                    <th>Fournissuer</th>
                                    <th>Nombre de produit</th>
                                    <th>observation</th>
                                    <th>Date</th>
                                    <th>Produits</th>
                                    <th>PDF</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = "SELECT DISTINCT ref_com,etat,obs from commande where etat=0";
                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $ref_com = $row['ref_com'];
                                    $etat = $row['etat'];
                                    $obs = $row['obs'];





                                    $sql = "SELECT  count(DISTINCT id_medi) as total, id_com,id_four,frais,date_c_com,etat from commande where ref_com = '$ref_com'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $total= $table['total'];
                                        $id_four = $table['id_four'];
                                        $date_c_com = $table['date_c_com'];
                                        $id_com = $table['id_com'];


                                    $sql = "SELECT DISTINCT * from fournisseur where id_four = '$id_four'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $nom_four= $table['raison_social_four'];
                                    }

                                    if(empty($id_four)){
                                        $nom_four='N/A';
                                    }

                                    ?>

                                    <tr>
                                        <td><a href="#"><?=$ref_com?></a></td>
                                        <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                             class="rounded-circle m-r-5" alt=""><?=$nom_four?></a></td>
                                        <td><a href="#"><?=number_format($total)?></a></td>
                                        <td><a href="#"><?=$obs?></a></td>
                                        <td><a href="#"><?=$date_c_com?></a></td>
                                        <td align="center"><a
                                                class="btn btn-primary"
                                                href="liste_commande_prod_suite.php?ref_com=<?=$ref_com?>"
                                                title="view"
                                                style="background-color: transparent">
                                                <i style="color: green" class="fas fa-eye"></i>
                                            </a></td>
                                        <td align="center"><a href="facture_bon_commande.php?ref_com=<?=$ref_com?>" target="_blank">
                                                <i class="fa fa-print"></i>
                                            </a></td>
                                        <td style="width: 15%">
                                            
                                 
                                
                                            <?php
                                             if( $lvl != 11  ){

                                                if($etat!=1){

                                                    echo' <a class="btn btn-warning" href="modifier_commande.php?ref_com='.$ref_com.'">
                                                         <i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="valider_commande.php?idr='.$ref_com.'&idf='.$id_four.'">
                                                         <i class="fa fa-check"></i></a>||<a class="btn btn-danger"  onclick="Supp(this.href); return(false);" href="delete_commande.php?idr='.$ref_com.'&idf='.$id_four.'" >
                                                         <i class="fa fa-trash"></i></a>';

                                                }else{
                                                    echo'<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                                                }
                                             }



                                            ?>
                                        </td>

                                    </tr>
                                    <?php }
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
            if(confirm('Confirmer  la suppression de la commande ?')){
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