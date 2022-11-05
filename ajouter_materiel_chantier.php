<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
$id_materiel = $_REQUEST['id_materiel'];
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Chantiers </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble des Chantiers.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                               href="details_materiel.php?id=<?= $id_materiel ?>">
                                                <!-- <i class="fas fa-cubes"></i> -->
                                                Retour
                                            </a>
                                        </li>
                                    </ul>

                                    <!--                                 <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= $chantier['option1_link'] ?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouveau chantier 
                                        </a>
                                    </li>                                    
                                </ul> -->
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="">
                                                    <table class="table table-bordered table-hover" id="dataTable"
                                                           width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Nom du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Montant TTC</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Chef Chantier</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Pointeur</p></th>
                                                            <th><p align="center" style="color: white">Durée du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Options</p>
                                                            </td>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from chantier where open_close!='1' ";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id = $row['id_chantier'];
                                                            $ref_marche = $row['ref_marche'];
                                                            $nom_chantier = $row['nom_chantier'];
                                                            $montant_ttc_marche = $row['montant_ttc_marche'];
                                                            $id_personnel = $row['id_personnel'];
                                                            $id_pers_pointeur = $row['id_pers_pointeur'];
                                                            $dure_chantier = $row['dure_chantier'];


                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden" value="<?php //echo $id
                                                                ?>"/>

                                                                <td align="center"><?php echo $ref_marche ?>

                                                                </td>

                                                                <td align="center"><?php echo $nom_chantier ?>

                                                                </td>
                                                                <td align="center"> <?php echo number_format($montant_ttc_marche); ?>   </td>
                                                                <td align="center">
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['nom'] . ' ' . $table['prenom'];
                                                                    }

                                                                    ?>
                                                                </td>

                                                                <td align="center">
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_pointeur'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['nom'] . ' ' . $table['prenom'];
                                                                    }

                                                                    ?>
                                                                </td>
                                                                <td align="center"> <?php echo $dure_chantier; ?>   </td>

                                                                <td align="center" style="width: 18%">
                                                                    <!-- <a class="btn btn-primary"  href="details_chantier.php?id=<?php echo $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        
              
                         <a class="btn btn-warning" href="modifier_chantier.php?id=<? //=$id;
                                                                    ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_chantier<? //= $id;
                                                                    ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->


                                                                    <!--  <?php
                                                                    //include("verifier_delete_offre.php");
                                                                    ?> -->
                                                                    <a href="ajouter_transfert_chantier.php?id_materiel=<?= $id_materiel ?>&id_chantier=<?= $id ?>"
                                                                       style=" width:120px;" class="btn btn-primary">Ajouter

                                                                    </a>
                                                                    <!-- <a class="nav-link active"  data-toggle="modal" data-target="#ajouterStock" href="#home">
                                                                                       <i class="fas fa-cubes"></i>
                                                                                       Ajouter
                                                                                   </a> -->
                                                                    <?php
                                                                    // include("transfert_materiel.php");
                                                                    ?>


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Nom du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Montant TTC</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Chef Chantier</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Pointeur</p></th>
                                                            <th><p align="center" style="color: white">Durée du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Options</p>
                                                            </td>
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

        case '2';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Stock du matériel épuisé !',
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
                    icon: 'Erreur',
                    title: 'Stock Insuffisant',
                    text: 'L\'opération ne peut pas être éffectuée !',
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