<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Entreprises </h1>
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
                                <b>L'ensemble des entreprises.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $entreprise['option1_link'] ?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouvelle entreprise
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
                                                            <th><p align="center" style="color: white">Tel</p></th>
                                                            <th><p align="center" style="color: white">Ville</p></th>
                                                            <th><p align="center" style="color: white">Tel contact</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Options</p>
                                                            </td>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from entreprises ";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_ent = $row['id_ent'];
                                                            $ref_ent = $row['ref_ent'];
                                                            $raison_social_ent = $row['raison_social_ent'];
                                                            $tel_ent = $row['tel_ent'];
                                                            $ville_ent = $row['ville_ent'];
                                                            $tel_contact_ent = $row['tel_contact'];


                                                            ?>

                                                            <tr>


                                                                <td align="center"> <?php echo $ref_ent; ?>  </td>
                                                                <td align="center"> <?php echo $raison_social_ent; ?> </td>
                                                                <td align="center"> <?php echo $tel_ent; ?> </td>
                                                                <td align="center"> <?php echo $ville_ent ?>  </td>
                                                                <td align="center"> <?php echo $tel_contact_ent; ?>  </td>

                                                                <td align="center" style="width: 18%">
                                                                    <a class="btn btn-primary"
                                                                       href="details_fournisseur.php?id=<?php echo $id_ent; ?>"
                                                                       title="view"
                                                                       style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <a class="btn btn-warning"
                                                                       href="modifier_fournisseur.php?id=<?php echo $id_ent; ?>"
                                                                       title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_fournisseur<?php echo $id_ent; ?>"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>


                                                                    <?php
                                                                  //  include("verifier_delete_fournisseur.php");
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