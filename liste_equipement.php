<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des équipements </h1>
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
                                <b>L'ensemble des équiepements.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $equipement['option1_link'] ?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouveau équipements
                                            </a>
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
                                                            <th><p align="center" style="color: white">Réferences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Désignations</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Quantites</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Catégorie
                                                                    d'équiepements</p></th>
                                                            <th><p align="center" style="color: white">Prix unitaire</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Prix total</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Options</p>
                                                            </td>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from equipement where open_close!='1' ";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_eq = $row['id_eq'];
                                                            $id_equipe = $row['id_eq'];
                                                            $ref_eq = $row['ref_eq'];
                                                            $design_eq = $row['design_eq'];
                                                            $quant_eq = $row['quant_eq'];
                                                            $id_cat_eq = $row['id_cat_eq'];
                                                            $prix_unit_eq = $row['prix_unit_eq'];
                                                            $prix_t_eq = $row['prix_t_eq'];
                                                            $alert_eq = $row['alert_eq'];


                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden"
                                                                       value="<?php echo $id_eq; ?>"/>

                                                                <td align="center"> <?php echo $ref_eq; ?>   </td>
                                                                <td align="center"> <?php echo $design_eq; ?>   </td>


                                                                <?php
                                                                if ($quant_eq <= $alert_eq) {

                                                                    echo '<td align="center" style=" background-color: orange">' . number_format($quant_eq) . '</td>';
                                                                } else {

                                                                    echo '<td align="center">' . number_format($quant_eq) . '</td>';
                                                                }


                                                                ?>


                                                                <td align="center">
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT * from categorie_equipement where id_cat_eq = '$id_cat_eq'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['nom'];
                                                                    }

                                                                    ?>
                                                                </td>

                                                                <td align="center"> <?php echo number_format($prix_unit_eq); ?> </td>
                                                                <td align="center"> <?php echo number_format($prix_t_eq); ?> </td>

                                                                <td align="center" style="width: 18%"><a
                                                                            class="btn btn-primary"
                                                                            href="details_equipement.php?id=<?php echo $id_eq; ?>"
                                                                            title="view"
                                                                            style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <a class="btn btn-warning"
                                                                       href="modifier_equipement.php?id=<?= $id_eq; ?>"
                                                                       title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_equipement<?= $id_equipe; ?>"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>


                                                                    <?php
                                                                    include("verifier_delete_equipement.php");
                                                                    ?>


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Désignations</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Quantites</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Catégorie
                                                                    d'équiepements</p></th>
                                                            <th><p align="center" style="color: white">Prix unitaire</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Prix total</p>
                                                            </th>
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