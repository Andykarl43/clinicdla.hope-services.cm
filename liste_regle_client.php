<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des règlements clients </h1>
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
                                <b>L'ensemble des règlements clients. ( A = appel d'offre - M = marché - C =
                                    chantier) </b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $reglement_client['option1_link'] ?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouveau règlement
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
                                                            <th><p align="center" style="color: white">Clients</p></th>
                                                            <th><p align="center" style="color: white">Réfrences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Avances</p></th>
                                                            <th><p align="center" style="color: white">Soldes</p></th>
                                                            <th><p align="center" style="color: white">Restes</p></th>
                                                            <th><p align="center" style="color: white">Date de
                                                                    transaction</p></th>
                                                            <th><p align="center" style="color: white">Types</p></th>
                                                            <th><p align="center" style="color: white">PDF</p>
                                                            </td></th>
                                                            <th><p align="center" style="color: white">Options</p></th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from regle_client where open_close!='1' ";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $color = 'bg-success';

                                                            $id_regle_client = $row['id_regle_client'];
                                                            $id_client = $row['id_client'];
                                                            $id_choix = $row['id_choix'];
                                                            $type = $row['type'];
                                                            $montant = $row['montant'];
                                                            $id_mode_paiement = $row['id_mode_paiement'];
                                                            $id_card_bank = $row['id_card_bank'];
                                                            $avance = $row['avance'];
                                                            $date_transaction = $row['date_transaction'];
                                                            $reste = $row['reste'];

                                                            $icon2 = "<i class='fa fa-print <?=$color?>'></i>";


                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden"
                                                                       value="<?php //echo $row['id'];
                                                                       ?>"/>

                                                                <td align="center">
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT * from client where id_client = '$id_client'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['raison_social_client'];
                                                                    }

                                                                    ?>
                                                                </td>
                                                                <td align="center">
                                                                    <?php
                                                                    if ($type == 'A') {
                                                                        $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_choix'";

                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($tables as $table) {
                                                                            echo $table['objet'];
                                                                        }

                                                                    } elseif ($type == 'M') {
                                                                        $sql = "SELECT DISTINCT * from marche where id_marche = '$id_choix'";

                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($tables as $table) {
                                                                            echo $table['objet_marche'];
                                                                        }


                                                                    } else {
                                                                        $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_choix'";

                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($tables as $table) {
                                                                            echo $table['nom_chantier'];
                                                                        }

                                                                    }


                                                                    ?>
                                                                </td>
                                                                <td align="center"> <?php echo number_format($avance); ?>  </td>
                                                                <td align="center"> <?php echo number_format($montant); ?>   </td>
                                                                <td align="center"> <?php echo number_format($reste); ?>  </td>
                                                                <td align="center"> <?php echo $date_transaction; ?>   </td>
                                                                <td align="center"> <?php echo $type; ?>   </td>
                                                                <td align="center">
                                                                    <a href="facture_regle_client.php?id=<?= $id_regle_client ?>"
                                                                       target="_blank">
                                                                        <?= $icon2 ?>
                                                                    </a>
                                                                </td>

                                                                <td align="center" style="width: 18%"><a
                                                                            class="btn btn-primary"
                                                                            href="details_regle_client.php?id=<?php echo $id_regle_client; ?>"
                                                                            title="view"
                                                                            style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <a class="btn btn-warning"
                                                                       href="modifier_regle_client.php?id=<?= $id_regle_client; ?>"
                                                                       title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_regle_client<?= $id_regle_client; ?>"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>


                                                                    <?php
                                                                    include("verifier_delete_regle_client.php");
                                                                    ?>


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Clients</p></th>
                                                            <th><p align="center" style="color: white">Réfrences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Avances</p></th>
                                                            <th><p align="center" style="color: white">Soldes</p></th>
                                                            <th><p align="center" style="color: white">Restes</p></th>
                                                            <th><p align="center" style="color: white">Date de
                                                                    transaction</p></th>
                                                            <th><p align="center" style="color: white">Types</p></th>
                                                            <th><p align="center" style="color: white">PDF</p>
                                                            </td></th>
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
<?php
if (isset($_GET['witnes'])) {
    $witnes = $_GET['witnes'];

    switch ($witnes) {
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Le montant ou l\'avance est incorrect !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;
        case '-3';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Le montant est incorrect !',
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