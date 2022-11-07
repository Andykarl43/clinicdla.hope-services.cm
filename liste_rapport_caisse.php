<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>


    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-tasks" style="color: silver"></i> Liste  des rapports de caisses</h1>
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
                                    <a class="btn btn-primary" href="nouveau_rapport_caisse.php">
                                        <i class="fas fa-donate"></i>
                                        Nouveau rapport
                                    </a>
                                </li>
                            </ul>
<!--                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">-->
<!--                                <li class="nav-item">-->
<!--                                    <a class="nav-link" href="liste_depense_succes.php"><i class="fas fa-donate"></i>-->
<!---->
<!--                                        --><?php
////                                        if($lvl == 12){
////                                            $query = "SELECT count(id_rap_caisse) as total from rapport_caisse where id_perso='$id_perso_session' ";
////                                        }else{
////                                            $query = "SELECT count(id_rap_caisse) as total from rapport_caisse ";
////                                        }
////
////                                        $q = $db->query($query);
////                                        while($row = $q->fetch())
////                                        {
////                                            echo ' Dépense accepter ['.$row['total'].']';
////
////                                        }
//
//                                        ?>
<!---->
<!---->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">-->
<!--                                <li class="nav-item">-->
<!--                                    <a class="nav-link" href="liste_depense_echec.php"><i class="fas fa-donate"></i>-->
<!---->
<!--                                        --><?php
////                                        if($lvl == 2){
////                                            $query = "SELECT count(id_deps_caisse) as total from depense_caisse where id_perso='$id_perso_session' and etat=-1 ";
////                                        }else{
////                                            $query = "SELECT count(id_deps_caisse) as total from depense_caisse where etat=-1 ";
////                                        }
////
////
////
////                                        $q = $db->query($query);
////                                        while($row = $q->fetch())
////                                        {
////                                            echo ' Dépense refuser ['.$row['total'].']';
////
////                                        }
//
//                                        ?>
<!---->
<!---->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->


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
                                    <th>ref</th>
                                    <th>Caisse</th>
                                    <th>Caissière</th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                    <th>Motif</th>
                                    <th>PDF</th>
                                    <th class="text-center">Action</th>
                                    <!--                                    <th>PDF</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($lvl == 12){
                                    $query = "SELECT * from rapport_caisse where id_perso='$id_perso_session' and open_close!='1' order by date_rap desc";
                                }else{
                                    $query = "SELECT * from rapport_caisse where  open_close!='1'  order by date_rap desc";
                                }

                                $q = $db->query($query);
                                while ($row = $q->fetch()) {
                                    $id_rap_caisse = $row['id_rap_caisse'];
                                    $ref_rap = $row['ref_rap'];
                                    //$id_caisse = $row['id_caisse'];
                                    $id_perso = $row['id_perso'];
                                    $date_rap = $row['date_rap'];
                                    $motif = $row['motif'];
                                    $montant = $row['montant'];
                                    $dixmilles = $row['dixmilles'];
                                    $cinqmilles = $row['cinqmilles'];
                                    $deuxmilles = $row['deuxmilles'];
                                    $mille = $row['mille'];
                                    $cinqcentnote = $row['cinqcentnote'];
                                    $cinqcentcoin = $row['cinqcentcoin'];
                                    $cent = $row['cent'];
                                    $cinquante = $row['cinquante'];
                                    $vingtcinq = $row['vingtcinq'];
                                    $dix = $row['dix'];
                                    $cinq = $row['cinq'];
                                    $deux = $row['deux'];
                                    $un = $row['un'];
                                    $etat = 1;
                                    // $sql = "SELECT * from caisse where id_caisse = '$id_caisse'";

                                    // $stmt = $db->prepare($sql);
                                    // $stmt->execute();

                                    // $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    // foreach($tables as $table)
                                    // {
                                    //     $caisse=$table['caisse'];
                                    // }

                                    $sql = "SELECT * from personnel where id_personnel = '$id_perso'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                    {
                                        $nom=$table['nom'].' '.$table['prenom'];
                                    }

                                    ?>

                                    <tr>
                                        <td><a href="#"><?=$ref_rap?></a></td>
                                        <td><a href="#"><?php //$caisse?>---</a></td>
                                        <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                                                                     class="rounded-circle m-r-5"
                                                                                                     alt=""><?=$nom?></a></td>
                                        <td><a href="#"><?= number_format($montant)?></a></td>
                                        <td><a href="#"><?=$date_rap?></a></td>
                                        <td>
                                            <a href="#" class="btn btn-warning" style="background-color: transparent" data-toggle="modal" data-target="#ajouters<?=$id_rap_caisse?>"><i style="color: orange" class="far fa-comment-dots"></i></a>

                                            <div class="modal fade" id="ajouters<?=$id_rap_caisse?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="padding:20px 50px;">
                                                            <h3 align="center"><i class="fas fa-comment-dots"></i> <b>Motif: <?=$ref_rap?></b></h3>
                                                            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                                                        </div>
                                                        <div class="modal-body" style="padding:40px 50px;">
                                                            <form class="form-horizontal" action="#" name="form" method="post">
                                                                <div class="form-group">
                                                                    <label>Commentaire :</label>
                                                                    <div class="col-sm-12">
                                                                        <textarea class="form-control" disabled><?=$motif?></textarea>
                                                                    </div>
                                                                </div>
                                                                <table>
                                                                  <tr>
                                                                    <th>Money</th>
                                                                    <th>Quantité(s)</th>
                                                                    <th>total</th>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>10.000</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$dixmilles?></td>
                                                                  </tr
                                                                  <tr>
                                                                    <td>5.000</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$cinqmilles?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>2.000</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$deuxmilles?></td>
                                                                  </tr><tr>
                                                                    <td>1.000</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$mille?></td>
                                                                  </tr><tr>
                                                                    <td>500(billets)</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$cinqcentnote?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>500(Pièces)</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$cinqcentcoin?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>100</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$cent?></td>
                                                                  </tr><tr>
                                                                    <td>50</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$cinquante?></td>
                                                                  </tr><tr>
                                                                    <td>25</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$vingtcinq?></td>
                                                                  </tr><tr>
                                                                    <td>10</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$dix?></td>
                                                                  </tr><tr>
                                                                    <td>5</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$cinq?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>2</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$deux?></td>
                                                                  </tr><tr>
                                                                    <td>1</td>
                                                                    <td>Brown</td>
                                                                    <td>$<?=$un?></td>
                                                                  </tr>
                                                                </table>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <center>
                                                                            <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                                                                   class="btn btn-primary" value="Ok"/></center>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td align="center"><a href="facture_cash.php?id_rap_caisse=<?=$id_rap_caisse?>" target="_blank">
                                                <i class='fa fa-print'></i>
                                            </a></td>
<!--                                        <td class="text-right">-->
<!--                                            <div class="dropdown dropdown-action">-->
<!--                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"-->
<!--                                                   aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>-->
<!--                                                <div class="dropdown-menu dropdown-menu-right">-->
<!---->
<!--                                                    <a class="dropdown-item" href="depense_caisse.php?id_caisse=--><?//=$id_deps_caisse?><!--"><i-->
<!--                                                            class="fa fa-random"></i> Transfert</a>-->
<!--                                                    <a class="dropdown-item" href="edit-patient.html"><i-->
<!--                                                            class="fas fa-pen"></i> Edit</a>-->
<!--                                                    <a class="dropdown-item" href="#" data-toggle="modal"-->
<!--                                                       data-target="#delete_patient"><i class="fa fa-trash"></i>-->
<!--                                                        Delete</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </td>-->
                                        <td class="text-center">
                                            <?php

                                            if($etat!=1){

                                                echo' <a class="btn btn-warning" href="modifier_depense_caisse.php?id_deps_caisse='.$id_deps_caisse.'">
                                                         <i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="valider_depense_caisse.php?id_caisse='.$id_caisse.'&montant='.$montant.'$&id_deps_caisse='.$id_deps_caisse.'">
                                                         <i class="fa fa-check"></i></a>||<a class="btn btn-danger"  onclick="Supp(this.href); return(false);" href="delete_depense_caisse.php?id_caisse='.$id_caisse.'&montant='.$montant.'$&id_deps_caisse='.$id_deps_caisse.'" >
                                                         <i class="fa fa-trash"></i></a>';

                                            }else{
                                                echo'<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                                            }



                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>


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
            if(confirm('Confirmer  le refus de la dépense ?')){
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
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Solde Insuffisant !!!',
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