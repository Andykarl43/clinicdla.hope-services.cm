<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Marchés </h1>
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
                                <b>L'ensemble des marchés.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item" style="margin-right: 20px">
                                            <a class="nav-link active" href="liste_marche_excel.php">
                                                <i class="fas fa-down"></i>
                                                lien d'exportation
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $marche['option1_link'] ?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouveau marché
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
                                                            <th><p align="center" style="color: black">Réference du
                                                                    marché</p></th>
                                                            <th><p align="center" style="color: black">L'appel
                                                                    d'offre</p></th>
                                                            <th><p align="center" style="color: black">Objet</p></th>
                                                            <th><p align="center" style="color: black">Maître
                                                                    d'ouvrage</p></th>
                                                            <th><p align="center" style="color: black">Maître
                                                                    d'oeuvre</p></th>
                                                            <th><p align="center" style="color: black">Coût</p></th>
                                                            <th><p align="center" style="color: black">Options</p>
                                                            </td>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from marche where open_close!='1'";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_marche = $row['id_marche'];
                                                            $ref_marche = $row['ref_marche'];
                                                            $id_offre = $row['id_offre'];
                                                            $objet_marche = $row['objet_marche'];
                                                            $date_lancement = $row['date_lancement'];
                                                            $moa = $row['moa'];
                                                            $moe = $row['moe'];
                                                            $montant_ttc = $row['montant_ttc'];
                                                            $remarque = $row['remarque'];


                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden"
                                                                       value="<?= $id_marche; ?>"/>

                                                                <td align="center"> <?php echo $ref_marche; ?>   </td>
                                                                <td align="center">
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_offre'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['ref_offre'];
                                                                    }

                                                                    ?>   </td>

                                                                <td align="center"> <?php echo $objet_marche; ?>   </td>
                                                                <td align="center"> <?php
                                                                    $sql = "SELECT DISTINCT * from client where id_client = '$moe'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['raison_social_client'];
                                                                    }

                                                                    ?>  </td>
                                                                <td align="center">  <?php
                                                                    $sql = "SELECT DISTINCT * from client where id_client = '$moa'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['raison_social_client'];
                                                                    }

                                                                    ?>   </td>
                                                                <td align="center"> <?php echo number_format($montant_ttc) ?>   </td>

                                                                <td align="center" style="width: 18%"><a
                                                                            class="btn btn-primary"
                                                                            href="details_marche.php?id=<?php echo $id_marche; ?>"
                                                                            title="view"
                                                                            style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <a class="btn btn-warning"
                                                                       href="modifier_marche.php?id=<?= $id_marche; ?>"
                                                                       title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_marche<?= $id_marche; ?>"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>


                                                                    <?php
                                                                    include("verifier_delete_marche.php");
                                                                    ?>


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réference du
                                                                    marché</p></th>
                                                            <th><p align="center" style="color: white">L'appel
                                                                    d'offre</p></th>
                                                            <th><p align="center" style="color: white">Objet</p></th>
                                                            <th><p align="center" style="color: white">Maître
                                                                    d'ouvrage</p></th>
                                                            <th><p align="center" style="color: white">Maître
                                                                    d'oeuvre</p></th>
                                                            <th><p align="center" style="color: white">Coût</p></th>
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