<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-users" style="color: silver"></i> Liste des types d'examens </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .

                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">
                        <b>

                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="modal" data-target="#ajouterExamen"
                                       href="#home">
                                        <i class="fas fa-cubes"></i>
                                        Nouveau Type d'Examen
                                    </a>
                                </li>
                            </ul>
                        </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
                <!--                Main Body              -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th><p align="center">Catégorie d'examen</p></th>
                                    <th><p align="center" >Type d'examen</p></th>
                                    <th><p align="center" >Prix</p></th>
                                    <th><p align="center" >Options</p></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = "SELECT * from type_exa where open_close!=1 order by nom asc  ";
                                $q = $db->query($query);
                                while($row = $q->fetch())
                                {
                                    $nom  =$row['nom'];
                                    $prix_t_exa  =$row['prix_t_exa'];
                                    $id_type_exa  =$row['id_type_exa'];
                                    $id_cat_exa  =$row['id_cat_exa'];

                                    $sql = "SELECT DISTINCT * from cat_exa where id_cat_exa = '$id_cat_exa'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($tables as $table) {
                                        $cat_exa= $table['nom'] ;
                                    }
                                    if(empty($id_cat_exa)){
                                        $cat_exa='N/A';
                                    }

                                    ?>

                                    <tr>
                                        <td align="center"><b><?=$cat_exa?></b></td>
                                        <td align="center"><b><?=$nom?></b></td>
                                        <td align="center"><b><?php echo number_format($prix_t_exa); ?></b></td>
                                        <td style="text-align: center">
                                            <?php
                                                echo '<a class="btn btn-warning" data-toggle="modal" data-target="#ajouterExa' . $id_type_exa . '"  style="background-color: transparent"><i  style="color: orange" class="fas fa-pen"></i></a>';
                                            ?>
                                            <a class="btn btn-danger"  href="delete_type_examen.php?id_type_exa=<?=$id_type_exa?>"  style="background-color: transparent; margin-right: 10px;">
                                                <i style="color: red" class="fas fa-trash"></i></a>
                                        </td>
                                        <td class="text-right">
                                            <div class="modal fade" id="ajouterExa<?= $id_type_exa ?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="padding:20px 50px;">
                                                            <h3 align="center"><i class="fas fa-map"></i>
                                                                <b>Modifier</b></h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    title="Close">&times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="padding:40px 50px;">
                                                            <form class="form-horizontal" action="update_type_examen.php"
                                                                  name="form" method="post">
                                                                <div class="form-group">
                                                                    <label>Nom :</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="id_type_exa" value="<?=$id_type_exa?>">
                                                                        <input type="text" name="nom" class="form-control" value="<?=$nom?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Prix :</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="number" name="prix_t_exa" class="form-control" value="<?=$prix_t_exa?>">
                                                                    </div>
                                                                </div>

                                                                    <div class="form-group">
                                                                        <label>Catégorie d'examen<span
                                                                                    class="text-danger">*</span></label>
                                                                        <div class="col-sm-12">
                                                                            <select class="form-control"
                                                                                    name="id_cat_exa">
                                                                                <option value="<?=$id_cat_exa?>" selected="">
                                                                                    <?=$cat_exa?>
                                                                                </option>
                                                                                <?php

                                                                                $iResult = $db->query("SELECT * FROM cat_exa where open_close!=1 ");

                                                                                while ($data = $iResult->fetch()) {

                                                                                    $i = $data['id_cat_exa'];
                                                                                    echo '<option value ="' . $i . '">';
                                                                                    echo $data['nom'];
                                                                                    echo '</option>';

                                                                                }

                                                                                ?>

                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <center>
                                                                            <input type="submit" style=" width:25% "
                                                                                   name="submit_cs"
                                                                                   class="btn btn-primary"
                                                                                   value="Payer">

                                                                            <input data-dismiss="modal" type="text"
                                                                                   style=" width:25% " name=""
                                                                                   class="btn btn-danger"
                                                                                   value="Annuler"/></center>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--                End Body              -->

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <div class="modal fade" id="ajouterExam" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><i class="fas fa-map"></i> <b>Reglement</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form class="form-horizontal" action="save_pays.php" name="form" method="post">
                        <div class="form-group">
                            <label>Montant Recue</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Montant total</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom" class="form-control" value="1.500.000" disabled="">
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
    <div class="modal fade" id="ajouterExamen" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-map"></i> <b>Nouveau Type d'Examen</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="save_type_examen.php" name="form" method="post">
                    <div class="form-group">
                        <label>Catégorie d'examen : <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-12">
                            <select class="form-control"
                                    name="id_cat_exa">
                                <option value="0" selected="">
                                    ...
                                </option>
                                <?php

                                $iResult = $db->query("SELECT * FROM cat_exa where open_close!=1 ");

                                while ($data = $iResult->fetch()) {

                                    $i = $data['id_cat_exa'];
                                    echo '<option value ="' . $i . '">';
                                    echo $data['nom'];
                                    echo '</option>';

                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nom :</label>
                        <div class="col-sm-12">
                            <input type="text" name="nom" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Prix :</label>
                        <div class="col-sm-12">
                            <input type="number" name="prix_t_exa" class="form-control">
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