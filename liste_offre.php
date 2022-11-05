<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des offres </h1>
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
                                <b>L'ensemble des offres.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="etat_offre_excel.php" target="blank"
                                               style="margin-right: 20px"><i class="fas fa-download"></i>Exporter
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $offre['option1_link'] ?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouvelle offre
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
                                                    <table class="table table-bordered table-hover table-striped table-condensed table-responsive"
                                                           id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: black">References</p>
                                                            </th>
                                                            <th><p align="center" style="color: black">Maitre
                                                                    ouvrages</p></th>
                                                            <th><p align="center" style="color: black">Objets</p></th>
                                                            <th><p align="center" style="color: black">Date
                                                                    depouillement </p></th>
                                                            <th><p align="center" style="color: black">Projet
                                                                    interne</p></th>
                                                            <th><p align="center" style="color: black">Statut du
                                                                    projet</p></th>
                                                            <th><p align="center" style="color: black">Options</p></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from appel_offre where open_close !='1' ";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_offre = $row['id_offre'];
                                                            $id_client = $row['id_client'];
                                                            $ref_offre = $row['ref_offre'];
                                                            $objet = $row['objet'];
                                                            $date_lancement = $row['date_lancement'];
                                                            $montant_offre = $row['montant_offre'];
                                                            $month_offre = $row['month_offre'];
                                                            $statut_interne = $row['statut_interne'];
                                                            $etat_projet = $row['etat_projet'];
                                                            $commentaire = $row['commentaire'];
                                                            $observation = $row['observation'];

                                                            $id_card_bank = $row['id_card_bank'];
                                                            $montant_dao = $row['montant_dao'];
                                                            $soumis = $row['soumissionaire'];
                                                            $id_type = $row['id_type'];
                                                            $doc = $row['doc'];
                                                            $doc1 = $row['doc1'];
                                                            $doc2 = $row['doc2'];


                                                            $sql1 = "SELECT DISTINCT * from client where id_client = '$id_client'";

                                                            $q1 = $db->query($sql1);
                                                            while ($row1 = $q1->fetch()) {
                                                                $raison = $row1['raison_social_client'];
                                                            }
                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden"
                                                                       value="<?= $id_offre; ?>"/>

                                                                <td align="center"> <?php echo $ref_offre; ?>  </td>
                                                                <td align="center">
                                                                    <?php
                                                                    echo $raison;

                                                                    ?>
                                                                </td>

                                                                <td align="center"> <?php echo $objet; ?>  </td>
                                                                <td align="center"> <?php echo $date_lancement; ?>  </td>
                                                                <td align="center">  <?php
                                                                    if ($statut_interne == 0) {
                                                                        echo '
        <a href="modifier_statut_interne.php?id=' . $id_offre . '" style=" width:100px;" title="' . $observation . '" class="btn btn-warning" >En attente </a>
                                                        ';
                                                                    } elseif ($statut_interne == 2) {

                                                                        echo '
        <a href="modifier_statut_interne.php?id=' . $id_offre . '" style=" width:100px;" title="' . $observation . '" class="btn btn-danger" >Invalide</a>
                                                        ';

                                                                    } elseif ($statut_interne == 1) {

                                                                        echo '
        <a href="modifier_statut_interne.php?id=' . $id_offre . '" style=" width:100px;" title="' . $observation . '" class="btn btn-primary" >Valide</a>
                                                        ';
                                                                    } ?>  </td>

                                                                <td align="center">  <?php
                                                                    if ($etat_projet == 0) {

                                                                        echo '
        <a href="modifier_etat_projet.php?id=' . $id_offre . '" style=" width:100px;" title="' . $commentaire . '" class="btn btn-warning" >En attente</a>
                                                        ';
                                                                    } elseif ($etat_projet == 1) {

                                                                        echo '
        <a href="modifier_etat_projet.php?id=' . $id_offre . '" style=" width:100px;"  title="' . $commentaire . '" class="btn btn-primary" >Gagner</a>
                                                        ';

                                                                    } elseif ($etat_projet == 2) {

                                                                        echo '
        <a href="modifier_etat_projet.php?id=' . $id_offre . '" style=" width:100px;" title="' . $commentaire . '" class="btn btn-danger" >Perdu</a>
                                                        ';

                                                                    } else {
                                                                        echo '<a href="liste_offre.php" style=" width:100px;" class="btn btn-secondary" >-</a>';

                                                                    }

                                                                    ?>   </td>

                                                                <td align="center" style="width: 18%"><a
                                                                            class="btn btn-primary"
                                                                            href="details_offre.php?id=<?= $id_offre; ?>"
                                                                            title="view"
                                                                            style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <a class="btn btn-warning"
                                                                       href="modifier_offre.php?id=<?= $id_offre; ?>"
                                                                       title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <a class="btn btn-danger" type="button"
                                                                       data-toggle="modal"
                                                                       data-target="#verifier_delete_offre<?= $id_offre; ?>"
                                                                       title="supprimer"
                                                                       style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a>


                                                                    <?php
                                                                    include("verifier_delete_offre.php");
                                                                    ?>


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Maître
                                                                    d'ouvrages</p></th>
                                                            <th><p align="center" style="color: white">Objets</p></th>
                                                            <th><p align="center" style="color: white">Date
                                                                    depouillement</p></th>
                                                            <th><p align="center" style="color: white">Projet
                                                                    interne</p></th>
                                                            <th><p align="center" style="color: white">Statut du
                                                                    projet</p></th>
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