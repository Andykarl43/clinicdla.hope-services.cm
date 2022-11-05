<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

// $query  = "SELECT id_personnel as total from personnel";
// $q = $conn->query($query);
// while($row = $q->fetch_assoc())
// {
//     $total = $row["total"];
// }
// $id_personnel = $total;

?>
<?php
//$ido=$_REQUEST['id'];
//$query  = "SELECT count(id_personnel) as total from personnel where salle=\"SALLE MIMBOMAN\"";
//$q = $conn->query($query);
//while($row = $q->fetch_assoc())
//{
//    $total = $row["total"];
//}
//$totat_personnel = $total;

?>
<?php
$ref_ordo=$_REQUEST['ref_ordo'];

$query  = "SELECT * from ordonnance where ref_ordo='".$ref_ordo."'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $id_ordo = $row['id_ordo'];
    /*-------------------- ETAT CIVILE --------------------*/
    $id_patient=$row['id_patient'];
    $id_medecin=$row['id_medecin'];
    $id_depart = $row['id_depart'];
    $date_ordo = $row['date_ordo'];
    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails  Orodonnace :  <?php echo $ref_ordo?> </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <b>
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="liste_ordonnance.php">
                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-cubes"></i>
                                                Détails
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                                <i class="fas fa-cubes"></i>
                                                <?php

                                                $query = "SELECT  count( DISTINCT id_medi) as total from medicament_ordo where   ref_medi_ordo='$ref_ordo'  ";
                                                $q = $db->query($query);
                                                while($row = $q->fetch())
                                                {

                                                    echo ' Medicaments['.$row['total'].']';
                                                }

                                                ?>

                                            </a>
                                        </li>

                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--********************************************ETAT CIVILE************************************************* -->
                                    <!-- Etat Civile-->
                                    <div class="tab-pane container active" id="home">
                                        <!-- infos civile-->

                                        <!-- <h5><b><u>NB:</u></b> Aucune information ne peut être modifier.</h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="#" method="POST">
                                                        <div class="card-header">
                                                            <!--  <i class="fas fa-scroll"></i>
                                     <b>L'ensemble des salles de campresj.</b>
                                                                  -->

                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table class="table  table-hover table-condensed" id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font" >Patient:</span>
                                                                                <div class="col">
                                                                                    <select name="id_four" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                        <option value="<?=$id_patient?>"selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from patient where id_patient= '$id_patient'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                echo strtoupper($table['nom_p'].' '.$table['prenom_p']);
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                            </td>

                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font" >Medecin:</span>
                                                                                <div class="col">
                                                                                    <select name="id_four" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                        <option value="<?=$id_medecin?>"selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from medecin where id_medecin= '$id_medecin'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                echo strtoupper($table['nom_m'].' '.$table['prenom_m']);
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 50%">
                                                                                <span class="help-block small-font" >Departement:</span>
                                                                                <div class="col">
                                                                                    <select name="id_four" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                        <option value="<?=$id_depart?>"selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from departement where id_depart= '$id_depart'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                echo strtoupper($table['nom']);
                                                                                            }

                                                                                            ?>

                                                                                        </option>
                                                                                    </select>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font" >DATE ORDONNANCE:</span>
                                                                                <div class="col">
                                                                                    <input type="date"
                                                                                           class="form-control" name="date_r_com" value="<?=$date_ordo?>" disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************INFO RH************************************************* -->



                                    <div class="tab-pane container" id="menu2">
                                        <!-- infos civile-->

                                        <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->




                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble des medicaments.</b>

                                                    </div>
                                                    <div class="card-body">
                                                        <div class="well bs-component">
                                                            <form class="form-horizontal">
                                                                <fieldset>
                                                                    <div class="table-responsive">
                                                                        <form method="post" action="" >
                                                                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <!-- <th><p align="center">Matricule </p></th> -->
                                                                                    <th><p align="center" style="color: white">Medicaments</p></th>
                                                                                    <th><p align="center" style="color: white">Infos traitement</p></th>
                                                                                    <th><p align="center" style="color: white">Type de medicament</p></th>
                                                                                    <th><p align="center" style="color: white">Quanités</p></th>
                                                                                    <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                                                    <th><p align="center" style="color: white">Prix Total</p></th>
<!--                                                                                    <th><p align="center" style="color: white">Remise unitaire</p></th>-->
<!--                                                                                    <th><p align="center" style="color: white">Remise Total</p></th>-->


                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php
                                                                                $totaux=0;
                                                                                $totaux_r=0;
                                                                                $cnt=0;

                                                                                $sql = "SELECT  * from medicament_ordo where  ref_medi_ordo='$ref_ordo' ";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach($tables as $table)
                                                                                {
                                                                                    $id_medi= $table['id_medi'];
                                                                                    $quantite= $table['quantite_medi_ordo'];
                                                                                    $posologie= $table['posologie'];
                                                                                    $traitement= $table['traitement'];
                                                                                    $id_medi_ordo= $table['id_medi_ordo'];




                                                                                    $query = "SELECT * from medicament where id_medi = '$id_medi'  ";
                                                                                    $q = $db->query($query);
                                                                                    while($row = $q->fetch())
                                                                                    {
                                                                                        $id = $row['id_medi'];
                                                                                        $ref_medi = $row['ref_medi'];
                                                                                        $designation = $row['nom_medi'];
                                                                                        $id_type_medi= $row['id_type_medi'];
                                                                                        $prix= $row['prix_u_v'];

                                                                                        $sql = "SELECT DISTINCT * from type_medi where id_type_medi = '$id_type_medi'";

                                                                                        $stmt = $db->prepare($sql);
                                                                                        $stmt->execute();

                                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                        foreach ($tables as $table) {
                                                                                            $type_medi= $table['nom'];
                                                                                        }
                                                                                        if(empty($id_type_medi)){
                                                                                            $type_medi='N/A';
                                                                                        }



                                                                                        ?>

                                                                                        <tr>
                                                                                            <input name="id" type="hidden" value="<?php //echo $row['id'];?>" />
                                                                                            <td align="center"> <?php echo $designation; ?>   </td>
                                                                                            <td align="center"> <a
                                                                                                        class="btn btn-primary"
                                                                                                       data-toggle="modal" data-target="#posologie<?=$id_medi_ordo?>"
                                                                                                        title="view"
                                                                                                        style="background-color: transparent">
                                                                                                    <i style="color: green" class="fas fa-eye"></i>
                                                                                                </a>   
                                                                                            </td>
                                                                                            <td align="center"><?=$type_medi?> </td>
                                                                                            <td align="center"><?php echo number_format($quantite);
                                                                                            $cnt+=$quantite?>  </td>
                                                                                            <td align="center"><?php echo number_format($prix) ?>  </td>
                                                                                            <td align="center"><?php echo number_format($prix*$quantite);
                                                                                                $totaux+=$prix*$quantite;
                                                                                                ?>  </td>
<!--                                                                                            <td align="center">--><?php //echo number_format($reduction);
//                                                                                                ?><!--  </td>-->
<!--                                                                                            <td align="center">--><?php //echo number_format($reduction*$quantite);
//                                                                                                $totaux_r+=$reduction*$quantite;
//                                                                                                ?><!--  </td>-->
                                                                                            <td class="text-right">
                                                                                            
                                                                                            <div class="modal fade" id="posologie<?=$id_medi_ordo?>" role="dialog">
                                                                                                <div class="modal-dialog">
                                                                                                    <!-- Modal content-->
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header" style="padding:20px 50px;">
                                                                                                            <h3 align="center"><i class="fas fa-map"></i> <b>Posolosgie: <?=$designation?></b></h3>
                                                                                                            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                                                                                                        </div>
                                                                                                        <div class="modal-body" style="padding:40px 50px;">
                                                                                                            <form class="form-horizontal" action="#" name="form" method="#">
                                                                                                                
                                                                                                                <div class="form-group">
                                                                                                                    <label>Posologie:</label>
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <textarea class="form-control" rows="5"  cols="70"><?=$posologie?></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label>Traitement:</label>
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <textarea class="form-control" rows="5"  cols="70"><?=$traitement?></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <center>
                                                                                                                            <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                                                                                                                   value="Payer">
                                                
                                                                                                                            <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                                                                                                                   class="btn btn-danger" value="Annuler"/></center>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                          </td>
                                                                                        </tr>

                                                                                    <?php }
                                                                                } ?>
                                                                                </tbody>




                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center" style="color: white">Medicaments</p></th>
                                                                                    <th><p align="center" style="color: white">Infos traitement</p></th>
                                                                                    <th><p align="center" style="color: white">Type de medicament</p></th>
                                                                                    <th><p align="center" style="color: white"><?=number_format($cnt) ?>
                                                                                        </p></th>
                                                                                    <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                                                    <th><p align="center" style="color: white"><?=number_format($totaux)?></p></th>
<!--                                                                                    <th><p align="center" style="color: white">Remise unitaire</p></th>-->
<!--                                                                                    <th><p align="center" style="color: white">--><?//=number_format($totaux_r)?><!--</p></th>-->

                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody></tbody>
                                                                            </table>
                                                                        </form>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--****************************************** ............************************************************ -->






                                    <!--****************************************** ............************************************************ -->

                                </div>
                            </div>
                            <div class="card-footer">


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <?php
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>