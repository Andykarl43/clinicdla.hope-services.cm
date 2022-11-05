<?php
include("first.php");
include('php/main_side_navbar.php');
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Types d'écographie</h1>
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

                                <!-- Nav pills -->

                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="modal" data-target="#ajouterEcographie"
                                               href="#home">
                                                <i class="fas fa-cubes"></i>
                                                Nouveau Type d'écographie
                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <form method="post" action="">
                                                <table class="table table-bordered table-hover" id="dataTable"
                                                       width="100%" cellspacing="0">
                                                    <thead>
                                                    <tr class="bg-primary">
                                                        <th><p align="center" style="color: white">Type d'écrographie</p></th>
                                                        <th><p align="center" style="color: white">Prix</p></th>
                                                        <th><p align="center" style="color: white">Options</p></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php

                                                    $query = "SELECT * from type_eco where open_close!=1 order by nom desc  ";
                                                    $q = $db->query($query);
                                                    while($row = $q->fetch())
                                                    {
                                                        $nom  =$row['nom'];
                                                        $prix_t_eco  =$row['prix_t_eco'];
                                                        $id_type_eco  =$row['id_type_eco'];

                                                        ?>

                                                        <tr>
                                                            <input name="nom" type="hidden"
                                                                   value=""/>
                                                            <td align="center"><b><?=$nom?></b></td>
                                                            <td align="center"><b><?php echo number_format($prix_t_eco); ?></b></td>
                                                            <td align="center"><a class="btn btn-danger"  href="delete_type_ecographie.php?id_type_eco=<?=$id_type_eco?>"  style="background-color: transparent">
                                                                    <i style="color: red" class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php }?>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr class="bg-primary">
                                                        <th><p align="center" style="color: white">Type d'examen</p></th>
                                                        <th><p align="center" style="color: white">Prix</p></th>
                                                        <th><p align="center" style="color: white">Options</p></th>
                                                    </tr>
                                                    </tfoot>

                                                </table>
                                            </form>
                                        </div>
                                    </fieldset>

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
    <!--    Modal pour ajouter Categorie Contrat-->
    <div class="modal fade" id="ajouterEcographie" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><i class="fas fa-map"></i> <b>Nouveau Type d'écographie</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="save_type_ecographie.php" name="form" method="post">
                        <div class="form-group">
                            <label>Nom :</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Prix :</label>
                            <div class="col-sm-12">
                                <input type="number" name="prix_t_eco" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center>
                                    <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                           value="Créer">

                                    <input data-dismiss="modal" type="text" style=" width:25% " name=""
                                           class="btn btn-danger" value="Annuler"/></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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