<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
$id_chantier = $_REQUEST['id'];

$query = "SELECT * from chantier where id_chantier='" . $id_chantier . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    // ------------ infos sur le marché
    $id_chantier = $row['id_chantier'];

    // $prime=$row['prime'];


    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des engins</h1>
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
                            <form action="save_engin_chantier.php" method="post">
                                <div class="card-header">
                                    <b>
                                        <input type="hidden" name="id_chantier" value="<?= $id_chantier ?>">
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills" style="float: right;">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?= $engin['option1_link'] ?>">
                                                    <i class="fas fa-user"></i>
                                                    Nouveau engin
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <button type="submit" style=" width:150px;" name="submit_salle"
                                                        class="btn btn-primary">Enregistrer
                                                </button>
                                            </li>
                                        </ul>
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
                                                                <th><p align="center" style="color: white">Code</p></th>
                                                                <th><p align="center" style="color: white">
                                                                        Fournisseurs</p></th>
                                                                <th><p align="center" style="color: white">Type
                                                                        d'engin</p></th>
                                                                <th><p align="center" style="color: white">
                                                                        Conducteurs</p></th>
                                                                <th><p align="center" style="color: white">Chantiers</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Date
                                                                        d'arrivée</p></th>
                                                                <th><p align="center" style="color: white">Date de
                                                                        depart</p></th>
                                                                <th><p align="center" style="color: white">Options</p>
                                                                </td>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php

                                                            $query = "SELECT * from engin where oen_close!='1' and id_chantier!='$id_chantier' ";
                                                            $q = $db->query($query);
                                                            while ($row = $q->fetch()) {
                                                                $id = $row['id_engin'];
                                                                $code = $row['code'];
                                                                $id_fournisseur = $row['id_cat_fournisseur'];
                                                                $id_type_engin = $row['id_type_engin'];
                                                                $id_personnel = $row['id_personnel'];
                                                                $id_chantier = $row['id_chantier'];
                                                                $date_begin = $row['date_begin'];
                                                                $date_arrived = $row['date_arrived'];


                                                                ?>

                                                                <tr>
                                                                    <input name="id" type="hidden"
                                                                           value="<?php echo $id; ?>"/>

                                                                    <td align="center"> <?php echo $code; ?>   </td>
                                                                    <td align="center">
                                                                        <?php
                                                                        $sql = "SELECT DISTINCT * from fournisseur where id_fournisseur = '$id_fournisseur'";

                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($tables as $table) {
                                                                            echo $table['raison_social_four'];
                                                                        }

                                                                        ?>
                                                                    </td>

                                                                    <td align="center">
                                                                        <?php
                                                                        $sql = "SELECT DISTINCT * from type_engin where id_type_engin = '$id_type_engin'";

                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($tables as $table) {
                                                                            echo $table['nom'];
                                                                        }

                                                                        ?>
                                                                    </td>
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
                                                                        $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($tables as $table) {
                                                                            echo $table['nom_chantier'];
                                                                        }

                                                                        ?>
                                                                    </td>
                                                                    <td align="center"> <?php echo $date_arrived; ?>   </td>
                                                                    <td align="center"> <?php echo $date_begin; ?>   </td>

                                                                    <td align="center" style="width: 18%">
                                                                        <!-- <a class="btn btn-primary"  href="details_engin.php?id=<?php echo $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        
              
                         <a class="btn btn-warning" href="modifier_engin.php?id=<? //=$id;
                                                                        ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_engin<? //= $id;
                                                                        ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  -->
                                                                        <div class="btn-group mr-2" role="group"
                                                                             aria-label="First group">
                                                                            <input type="checkbox"
                                                                                   style=" width: 25px; height: 25px"
                                                                                   name="id_engin[]" value="<?= $id ?>">
                                                                        </div>


                                                                        <!--  <?php
                                                                        //include("verifier_delete_offre.php");
                                                                        ?> -->


                                                                    </td>


                                                                </tr>

                                                            <?php } ?>
                                                            </tbody>

                                                            <tfoot>
                                                            <tr class="bg-primary">
                                                                <th><p align="center" style="color: white">Code</p></th>
                                                                <th><p align="center" style="color: white">
                                                                        Fournisseurs</p></th>
                                                                <th><p align="center" style="color: white">Type
                                                                        d'engin</p></th>
                                                                <th><p align="center" style="color: white">
                                                                        Conducteurs</p></th>
                                                                <th><p align="center" style="color: white">Chantiers</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Date
                                                                        d'arrivée</p></th>
                                                                <th><p align="center" style="color: white">Date de
                                                                        depart</p></th>
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
                            </form>
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

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>