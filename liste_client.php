<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Clients </h1>
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
                                <b>L'ensemble des clients.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $client['option1_link'] ?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouveau client
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
                                                            <th><p align="center" style="color: white">Raison
                                                                    Sociale</p></th>
                                                            <th><p align="center" style="color: white">Type de
                                                                    client</p></th>
                                                            <th><p align="center" style="color: white">Tel</p></th>
                                                            <th><p align="center" style="color: white">Contact</p></th>
                                                            <th><p align="center" style="color: white">Tel contact</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Options</p>
                                                            </td>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from client where open_close!=1";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_client = $row['id_client'];
                                                            $ref_client = $row['ref_client'];
                                                            $raison_social_client = $row['raison_social_client'];
                                                            $id_type_client = $row['id_type_client'];
                                                            $tel_client = $row['tel_client'];
                                                            $pers_contact_client = $row['pers_contact_client'];
                                                            $tel_contact_client = $row['tel_contact_client'];


                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden" value="<?php //echo $id;
                                                                ?>"/>


                                                                <td align="center"> <?php echo $ref_client; ?>  </td>
                                                                <td align="center"> <?php echo $raison_social_client; ?> </td>
                                                                <td align="center">
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT * from type_client where nom = '$id_type_client'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($tables as $table) {
                                                                        echo $table['nom'];
                                                                    }

                                                                    ?>
                                                                </td>
                                                                <td align="center"> <?php echo $tel_client; ?>  </td>
                                                                <td align="center"> <?php echo $pers_contact_client ?>   </td>
                                                                <td align="center"> <?php echo $tel_contact_client; ?>   </td>

                                                                <td align="center" style="width: 18%"><a
                                                                            class="btn btn-primary"
                                                                            href="details_client.php?id=<?php echo $id_client; ?>"
                                                                            title="view"
                                                                            style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <a class="btn btn-warning"
                                                                       href="modifier_client.php?id=<?= $id_client; ?>"
                                                                       title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_client<?= $id_client; ?>"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>


                                                                    <?php
                                                                    include("verifier_delete_client.php");
                                                                    ?>


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Raison
                                                                    Sociale</p></th>
                                                            <th><p align="center" style="color: white">Type de
                                                                    client</p></th>
                                                            <th><p align="center" style="color: white">Tel</p></th>
                                                            <th><p align="center" style="color: white">Contact</p></th>
                                                            <th><p align="center" style="color: white">Tel contact</p>
                                                            </th>
                                                            <th style="width: 18%"><p align="center"
                                                                                      style="color: white">Options</p>
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