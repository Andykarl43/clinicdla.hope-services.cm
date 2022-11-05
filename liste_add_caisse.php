<?php
include("first.php");
include('php/main_side_navbar.php');
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Caisses</h1>
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
<!--                                            <a class="nav-link active" data-toggle="modal" data-target="#ajouterExamen"-->
<!--                                               href="#home">-->
<!--                                                <i class="fas fa-cubes"></i>-->
<!--                                                Nouvelle Caisse-->
<!--                                            </a>-->
                                            <a class="btn btn-primary" href="nouvelle_add_caisse.php">
                                                <i class="fas fa-cubes"></i>
                                                Nouvelle Caisse
                                            </a>
                                        </li>
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
                                                            <th><p align="center" style="color: white">Code</p></th>
                                                            <th><p align="center" style="color: white">Caisse</p></th>
                                                            <th><p align="center" style="color: white">caissière</p></th>
                                                            <th><p align="center" style="color: white">Solde</p></th>
                                                            <th><p align="center" style="color: white">Date</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php

                                                        $query = "SELECT * from caisse where open_close!='1'  order by date_caisse asc";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_caisse = $row['id_caisse'];
                                                            $code = $row['code'];
                                                            $caisse = $row['caisse'];
                                                            $id_perso = $row['id_perso'];
                                                            $date_caisse = $row['date_caisse'];
                                                            $solde = $row['solde'];


                                                            $sql = "SELECT * from personnel where id_personnel = '$id_perso'";

                                                            $stmt = $db->prepare($sql);
                                                            $stmt->execute();

                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach($tables as $table)
                                                            {
                                                                $nom=$table['nom'].' '.$table['prenom'];
                                                            }

                                                            ?>
                                                            <tr>
                                                                <input name="nom" type="hidden"
                                                                       value=""/>
                                                                <td align="center"><b><?=$code?></b></td>
                                                                <td align="center"><b><?=$caisse?></b></td>
                                                                <td align="center"><b><?=$nom?></b></td>
                                                                <td align="center"><b><?= number_format($solde)?></b></td>
                                                                <td align="center"><b><?=date("d-m-Y",strtotime($date_caisse))?></b></td>
                                                                <td align="center" style="width:18%">
                                                                    <a class="btn btn-warning" href="modifier_add_caisse.php?id=<?=$id_caisse;?>" title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>
                                                                    <a class="btn btn-danger"  href="delete_caisse.php?id=<?=$id_caisse;?>"   onclick="Supp(this.href); return(false);" style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>


                                                        </tbody>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Code</p></th>
                                                            <th><p align="center" style="color: white">Caisse</p></th>

                                                            <th><p align="center" style="color: white">caissière</p></th>
                                                            <th><p align="center" style="color: white">Solde</p></th>
                                                            <th><p align="center" style="color: white">Date</p></th>
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
    <div class="modal fade" id="ajouterExamen" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><i class="fas fa-map"></i> <b>Nouveau Type d'Examen</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="save_pays.php" name="form" method="post">
                        <div class="form-group">
                            <label>Code:</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nom Caisse:</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nom Caissière:</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Solde</label>
                            <div class="col-sm-12">
                                <input type="number" name="nom" class="form-control" value="0" disabled>
                            </div>
                        </div>
                            <div class="form-group">
                            <label>Date:</label>
                            <div class="col-sm-12">
                                <input type="date" name="nom" class="form-control">
                            </div>
                        </div>
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
    <script type="text/javascript">
        function Supp(link){
            if(confirm('Confirmer  la suppression de la caisse ?')){
                document.location.href = link;
            }
        }
    </script>

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
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Stock Insuffisant',
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