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
$id=$_REQUEST['id'];

$query  = "SELECT * from demande_medicament where id_ask_medi='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $id_ask_medi = $row['id_ask_medi'];
    /*-------------------- ETAT CIVILE --------------------*/
    $nom_salle=$row['nom_salle'];
    $date_debut=$row['date_debut'];
    $date_valide=$row['date_valide'];
    $heure=$row['heure'];
    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails  de la demande : <?php echo 'REF_DEMANDE_'.$id_ask_medi; ?> </h1>
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
                                            <a class="nav-link active" href="liste_demande_produit.php">
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

                                                $query = "SELECT DISTINCT count(id_medi) as total from demande_materiel where id_ask_medi='$id_ask_medi' ";
                                                $q = $db->query($query);
                                                while($row = $q->fetch())
                                                {

                                                    echo ' Médicaments['.$row['total'].']';
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
                                                                                <span class="help-block small-font" >Destinataire:</span>
                                                                                <div class="col">
                                                                                    <input type="text" name="nom_salle" value="Pharmacy" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font" >Date de demande:</span>
                                                                                <div class="col">
                                                                                    <?php  echo'<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_debut" value="'.date("d-m-Y",strtotime($date_debut)).'"disabled>';
                                                                                    ?>
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
                                                        <b>L'ensemble des médicaments.</b>
                                                        <ul class="nav nav-pills" style="float: right;">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" href="ajouter_ask_medi.php?id_ask_medi=<?=$id_ask_medi?>">
                                                                    <i class="fas fa-cubes"></i>
                                                                    Ajouter médicament
                                                                </a>
                                                            </li>

                                                        </ul>

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
                                                                                    <th><p align="center" style="color: white">Code Produit</p></th>
                                                                                    <th><p align="center" style="color: white">Désignations</p></th>
                                                                                    <th><p align="center" style="color: white">Quanités</p></th>
                                                                                    <th><p align="center" style="color: white">Destinataires</p></th>
                                                                                    <th><p align="center" style="color: white">Catégorie</p></th>
                                                                                    <th><p align="center" style="color: white">Date de demande </p></th>
                                                                                    <th><p align="center" style="color: white">Date de validation </p></th>
                                                                                    <th><p align="center" style="color: white">Options</p></th>

                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php

                                                                                $sql = "SELECT DISTINCT * from demande_materiel where  id_ask_medi='$id_ask_medi'  ";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach($tables as $table)
                                                                                {
                                                                                    $id_medi= $table['id_medi'];
                                                                                    $quantite= $table['quantite'];
                                                                                    $id_ask_mat= $table['id_ask_mat'];




                                                                                    $query = "SELECT * from medicament where id_medi = '$id_medi'  ";
                                                                                    $q = $db->query($query);
                                                                                    while($row = $q->fetch())
                                                                                    {
                                                                                        $id = $row['id_medi'];
                                                                                        $ref_medi = $row['ref_medi'];
                                                                                        $nom_medi = $row['nom_medi'];
                                                                                        $id_type_medi= $row['id_type_medi'];



                                                                                        ?>

                                                                                        <tr>
                                                                                            <input name="id" type="hidden" value="<?php //echo $row['id'];?>" />

                                                                                            <td align="center"> <?php echo $ref_medi; ?>   </td>
                                                                                            <td align="center"> <?php echo $nom_medi; ?>   </td>
                                                                                            <td align="center"><?php echo number_format($quantite) ?>  </td>
                                                                                            <td align="center"> <?php echo $nom_salle; ?>   </td>
                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from type_medi where id_type_medi = '$id_type_medi'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach($tables as $table)
                                                                                                {
                                                                                                    echo $table['nom'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>
                                                                                            <td align="center"><?php echo date("d-m-Y",strtotime($date_debut)); ?></td>
                                                                                            <td align="center"> <?php if($date_valide=='N/A'){echo 'N/A';}else{echo $date_valide; echo ' ('.$heure.')';} ?></td>
                                                                                            <td align="center" style="width: 18%">
                                                                                                <a class="btn btn-danger"  href="delete_ask_medi.php?id_ask_medi=<?php echo $id_ask_medi; ?>&id_ask_mat=<?=$id_ask_mat?>" title="view"
                                                                                                   style="background-color: transparent">
                                                                                                    <i  style="color: red" class="fas fa-trash"></i>
                                                                                                </a>

                                                                                            </td>
                                                                                        </tr>

                                                                                    <?php }
                                                                                } ?>
                                                                                </tbody>




                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center" style="color: white">Code Produit</p></th>
                                                                                    <th><p align="center" style="color: white">Désignations</p></th>
                                                                                    <th><p align="center" style="color: white">Quanités</p></th>
                                                                                    <th><p align="center" style="color: white">Destinataires</p></th>
                                                                                    <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                    <th><p align="center" style="color: white">Date de demande </p></th>
                                                                                    <th><p align="center" style="color: white">Date de validation </p></th>
                                                                                    <th><p align="center" style="color: white">Options</p></th>

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
                    icon: 'Stock Insuffisant',
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