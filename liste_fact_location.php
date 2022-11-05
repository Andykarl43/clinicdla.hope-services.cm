<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des factures de location </h1>
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
                                <b>L'ensemble des factures de locations.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $facture_location['option1_link'] ?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouvelle facture
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
                                                            <th><p align="center" style="color: white">N° Facture</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Engin</p></th>
                                                            <th><p align="center" style="color: white">Montant</p></th>
                                                            <th><p align="center" style="color: white">Chantiers</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Motif</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from fact_location where open_close!='1'";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_fact_location = $row['id_fact_location'];
                                                            $number_fact = $row['number_fact'];
                                                            $id_engin = $row['id_engin'];
                                                            $montant = $row['montant'];
                                                            $id_chantier = $row['id_chantier'];
                                                            $motif = $row['motif'];


                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden"
                                                                       value="<?php //echo $row['id'];
                                                                       ?>"/>

                                                                <td align="center"> <?php echo $number_fact; ?>   </td>
                                                                <td align="center">
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT * from engin where id_engin = '$id_engin'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['number_chassis'];
                                                                    }

                                                                    ?>
                                                                </td>

                                                                <td align="center"> <?php echo $montant; ?> </td>
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
                                                                <td align="center"> <?php echo $motif; ?>  </td>

                                                                <td align="center" style="width: 18%"><a
                                                                            class="btn btn-primary"
                                                                            href="details_fact_location.php?id=<?php echo $id_fact_location; ?>"
                                                                            title="view"
                                                                            style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <a class="btn btn-warning"
                                                                       href="modifier_fact_location.php?id=<?= $id_fact_location; ?>"
                                                                       title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_fact_location<?= $id_fact_location; ?>"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>


                                                                    <?php
                                                                    include("verifier_delete_fact_location.php");
                                                                    ?>


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">N° Facture</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Engin</p></th>
                                                            <th><p align="center" style="color: white">Montant</p></th>
                                                            <th><p align="center" style="color: white">Chantiers</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Motif</p></th>
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