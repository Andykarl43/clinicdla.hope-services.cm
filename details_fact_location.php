<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_fact_location = $_REQUEST['id'];

$query = "SELECT * from fact_location where id_fact_location='" . $id_fact_location . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {
    $id_fact_location = $row['id_fact_location'];
    // /*-------------------- ETAT CIVILE --------------------*/
    $number_fact = $row['number_fact'];
    $id_engin = $row['id_engin'];
    $id_chantier = $row['id_chantier'];
    $montant = $row['montant'];
    $motif = $row['motif'];


    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Détails du facture de location : <?= $number_fact ?> </h1>
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
                                <b>
                                    <ul class="nav nav-pills" style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= $facture_location['option2_link'] ?>">
                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-cubes"></i>
                                                Détails
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu1">
                                                <i class="fas fa-users"></i>
                                                <?php

                                                $query = "SELECT DISTINCT count(id_engin) as total from fact_engin where id_fact_location='$id_fact_location' ";
                                                $q = $db->query($query);
                                                while ($row = $q->fetch()) {

                                                    echo ' Facture de location[' . $row['total'] . ']';
                                                }

                                                ?>

                                            </a>
                                        </li>
                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--********************************************DETAILS************************************************* -->
                                    <!-- Etat Civile-->
                                    <div class="tab-pane container active" id="home">
                                        <!-- infos civile-->

                                        <!-- <h5><b><u>NB:</u></b> Aucune information ne peut être modifier.</h5> -->

                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <form class="form-horizontal" action="#" method="POST">
                                                        <div class="card-header">
                                                            <!--  <i class="fas fa-scroll"></i>
                                     <b>L'ensemble des salles de campresj.</b>
                                                                  -->

                                                        </div>
                                                        <div class="card-body">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <table border="0"
                                                                           class="table  table-hover table-condensed"
                                                                           width="100%" cellspacing="0" id="myTable">
                                                                        <tbody>
                                                                        <tr>

                                                                            <td>
                                                                                <span class="help-block small-font">N°FACTURE:</span>
                                                                                <div class="col">
                                                                                    <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"
                                                                                           name="number_fact"
                                                                                           value="<?php echo $number_fact ?>"
                                                                                           readonly>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">ENGIN:</span>
                                                                                <div class="col">
                                                                                    <select name="id_engin" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                        <option value="<?php echo $id_engin ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from engin where id_engin = '$id_engin'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['number_chassis'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">CHANTIER:</span>
                                                                                <div class="col">
                                                                                    <select name="id_chantier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                        <option value="<?php echo $id_chantier ?>"
                                                                                                selected="">
                                                                                            <?php
                                                                                            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_chantier'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach ($tables as $table) {
                                                                                                echo $table['nom_chantier'];
                                                                                            }

                                                                                            ?>
                                                                                        </option>
                                                                                    </select>
                                                                                    </button>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <span class="help-block small-font">MONTANT:</span>
                                                                                <div class="col">
                                                                                    <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="montant"
                                                                                           value="<?php echo $montant ?>"
                                                                                           readonly>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-hover table-condensed"
                                                                           id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="help-block small-font">MOTIF:</span>
                                                                                <div class="col">
                                                                                    <!-- <textarea name="motif" class="form-control" style="width: 100%" disabled></textarea> -->
                                                                                    <input name="motif"
                                                                                           style="width: 100%"
                                                                                           value="<?php echo $motif ?>"
                                                                                           readonly>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="card-footer">

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--********************************************CLIENT************************************************* -->
                                    <div class="tab-pane container" id="menu1">
                                        <!-- infos civile-->

                                        <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->


                                        <div class="row">
                                            <hr/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-scroll"></i>
                                                        <b>L'ensemble de facture de location.</b>
                                                        <b>

                                                            <!-- Nav pills -->
                                                            <ul class="nav nav-pills" style="float: right;">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                       href="ajouter_facture_engin?id=<?php echo $id_fact_location ?>">
                                                                        <i class="fas fa-user"></i>
                                                                        Ajouter Engin
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
                                                                            <table class="table table-bordered table-hover"
                                                                                   id="dataTable" width="100%"
                                                                                   cellspacing="0">
                                                                                <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Code</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Fournisseurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Type
                                                                                            d'engin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Conducteurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Chantiers</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date
                                                                                            d'arrivée</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            depart</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php

                                                                                $sql = "SELECT DISTINCT * from fact_engin where id_fact_location = '$id_fact_location'";

                                                                                $stmt = $db->prepare($sql);
                                                                                $stmt->execute();

                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($tables as $table) {
                                                                                    $id_engin = $table['id_engin'];
                                                                                    $id_fact_engin = $table['id_fact_engin'];

                                                                                    $query = "SELECT * from engin where open_close!='1' and id_engin= '$id_engin' ";
                                                                                    $q = $db->query($query);
                                                                                    while ($row = $q->fetch()) {
                                                                                        $id_engin = $row['id_engin'];
                                                                                        $code = $row['code'];
                                                                                        $id_fournisseur = $row['id_cat_fournisseur'];
                                                                                        $id_cat_engin = $row['id_cat_engin'];
                                                                                        $id_personnel = $row['id_personnel'];
                                                                                        $id_chantier = $row['id_chantier'];
                                                                                        $date_begin = $row['date_begin'];
                                                                                        $date_arrived = $row['date_arrived'];
                                                                                        $number_chassis = $row['number_chassis'];


                                                                                        ?>

                                                                                        <tr>
                                                                                            <input name="id"
                                                                                                   type="hidden"
                                                                                                   value="<?php echo $id_engin; ?>"/>

                                                                                            <td align="center"> <?php echo $code; ?>   </td>
                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from fournisseur where id_fournisseur = '$id_fournisseur'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['raison_social_four'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>

                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from categorie_engin where id_cat_engin = '$id_cat_engin'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>
                                                                                            <td align="center">
                                                                                                <?php
                                                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {
                                                                                                    echo $table['nom'] . ' ' . $table['prenom'];
                                                                                                }

                                                                                                ?>
                                                                                            </td>
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
                                                                                            <td align="center"> <?php echo $date_arrived; ?>   </td>
                                                                                            <td align="center"> <?php echo $date_begin; ?>   </td>

                                                                                            <td align="center"
                                                                                                style="width: 18%"><a
                                                                                                        class="btn btn-primary"
                                                                                                        href="details_engin.php?id=<?php echo $id_engin; ?>"
                                                                                                        title="view"
                                                                                                        style="background-color: transparent">
                                                                                                    <i style="color: green"
                                                                                                       class="fas fa-eye"></i>
                                                                                                </a>

                                                                                                <!--
                         <a class="btn btn-warning" href="modifier_engin.php?id=<?//=$id;
                                                                                                ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> -->


                                                                                                <!--   <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_fact_engin<?= $id_fact_engin; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  -->


                                                                                                <?php
                                                                                                include("verifier_delete_fact_engin.php");
                                                                                                ?>


                                                                                            </td>


                                                                                        </tr>

                                                                                    <?php }
                                                                                } ?>
                                                                                </tbody>

                                                                                <tfoot>
                                                                                <tr class="bg-primary">
                                                                                    <th><p align="center"
                                                                                           style="color: white">Code</p>
                                                                                    </th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Fournisseurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Type
                                                                                            d'engin</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Conducteurs</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Chantiers</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date
                                                                                            d'arrivée</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">Date de
                                                                                            depart</p></th>
                                                                                    <th><p align="center"
                                                                                           style="color: white">
                                                                                            Options</p>
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--****************************************** ............************************************************ -->

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
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>