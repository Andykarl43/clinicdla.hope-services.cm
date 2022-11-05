<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des etapes </h1>
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
                                <b>L'ensemble des etapes.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <!-- <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= $etape['option1_link'] ?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouvelle etape 
                                        </a>
                                    </li>                                    
                                </ul> -->
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
                                                            <!-- <th><p align="center" style="color: white">R</p></th> -->

                                                            <th><p align="center" style="color: white">Nom du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Nom de
                                                                    l'étape</p></th>
                                                            <th><p align="center" style="color: white">Obje du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Coût de
                                                                    l'étape</p></th>
                                                            <th><p align="center" style="color: white">Date du debut</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Date de fin</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">PHASES</p></th>
                                                            <th><p align="center" style="color: white">Options</p>
                                                            </td>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from etape where open_close!='1' ";
                                                        $q = $db->query($query);
                                                        while ($row = $q->fetch()) {
                                                            $id_etape = $row['id_etape'];
                                                            $id_chantier = $row['id_chantier'];
                                                            $nom_etape = $row['nom_etape'];
                                                            $objet_chantier = $row['objet_chantier'];
                                                            $cout_etape = $row['cout_etape'];
                                                            $date_debut_etape = $row['date_debut_etape'];
                                                            $date_fin_etape = $row['date_fin_etape'];
                                                            $cout_etape = $row['cout_etape'];
                                                            $etat = $row['etat'];


                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden" value="<?php //echo $id;
                                                                ?>"/>

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

                                                                <td align="center"> <?php echo $nom_etape; ?>  </td>
                                                                <td align="center"> <?php echo $objet_chantier; ?>  </td>
                                                                <td align="center"> <?php echo $cout_etape; ?>  </td>

                                                                <td align="center"> <?php echo $date_debut_etape; ?>  </td>
                                                                <td align="center"> <?php echo $date_fin_etape; ?>  </td>
                                                                <?php
                                                                if ($etat == 1) {

                                                                    echo '<td align="center">
        <a href="#" style=" width:100px;" class="btn btn-secondary" >Achevé</a>
                                                        </td>';
                                                                } else {

                                                                    echo '<td align="center">
        <a href="#" style=" width:100px;" class="btn btn-primary" >En cours</a>
                                                        </td>';

                                                                }


                                                                ?>

                                                                <td align="center" style="width: 8%"><a
                                                                            class="btn btn-primary"
                                                                            href="details_etape.php?id=<?php echo $id_etape; ?>&idc=0"
                                                                            title="view"
                                                                            style="background-color: transparent">
                                                                        <i style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <!--                          <a class="btn btn-warning" href="modifier_etape.php?id=<?= $id_etape; ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_etape<?= $id_etape; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->


                                                                    <!--   <?php
                                                                    // include("verifier_delete_etape.php");
                                                                    ?> -->


                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">

                                                            <th><p align="center" style="color: white">Nom du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Nom de
                                                                    l'étape</p></th>
                                                            <th><p align="center" style="color: white">Obje du
                                                                    chantier</p></th>
                                                            <th><p align="center" style="color: white">Coût de
                                                                    l'étape</p></th>
                                                            <th><p align="center" style="color: white">Date du debut</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">Date de fin</p>
                                                            </th>
                                                            <th><p align="center" style="color: white">PHASES</p></th>
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