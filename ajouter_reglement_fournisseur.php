<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>
<?php
$id_regle_four = $_REQUEST['id'];

$query = "SELECT * from regle_fournisseur where id_regle_four='" . $id_regle_four . "'";
$q = $db->query($query);
while ($row = $q->fetch()) {

    // /*-------------------- DETAILS --------------------*/
    // ------------ infos sur le marché
    $id_regle_four = $row['id_regle_four'];

    // $prime=$row['prime'];


    ?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des fournisseurs</h1>
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
                            <form action="save_ajouter_fournisseur.php" method="post">
                                <div class="card-header">
                                    <b>
                                        <input type="hidden" name="id_regle_four" value="<?= $id_regle_four ?>">
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills" style="float: right;">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?= $fournisseur['option1_link'] ?>">
                                                    <i class="fas fa-user"></i>
                                                    Nouveau fournisseur
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <button type="submit" style=" width:150px;" name="submit_salle"
                                                        class="btn btn-primary">Enregistrer
                                                </button>
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
                                                                <th><p align="center" style="color: white">
                                                                        Réferences</p></th>
                                                                <th><p align="center" style="color: white">Raison
                                                                        Sociale</p></th>
                                                                <th><p align="center" style="color: white">Tel</p></th>
                                                                <th><p align="center" style="color: white">Contact</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Tel
                                                                        contact</p></th>
                                                                <th><p align="center" style="color: white">Options</p>
                                                                </td>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php

                                                            $query = "SELECT * from fournisseur where open_close!='1'";
                                                            $q = $db->query($query);
                                                            while ($row = $q->fetch()) {
                                                                $id = $row['id_fournisseur'];
                                                                $ref_four = $row['ref_four'];
                                                                $raison_social_four = $row['raison_social_four'];
                                                                $tel_four = $row['tel_four'];
                                                                $pers_contact_four = $row['pers_contact_four'];
                                                                $tel_contact_four = $row['tel_contact_four'];


                                                                ?>

                                                                <tr>


                                                                    <td align="center"> <?php echo $ref_four; ?>  </td>
                                                                    <td align="center"> <?php echo $raison_social_four; ?> </td>
                                                                    <td align="center"> <?php echo $tel_four; ?> </td>
                                                                    <td align="center"> <?php echo $pers_contact_four ?>  </td>
                                                                    <td align="center"> <?php echo $tel_contact_four; ?>  </td>

                                                                    <td align="center" style="width: 18%">
                                                                        <!-- <a class="btn btn-primary"  href="details_fournisseur.php?id=<?php echo $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        
              
                         <a class="btn btn-warning" href="modifier_fournisseur.php?id=<? //=$id;
                                                                        ?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a> 
                     
                   
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_fournisseur<? //= $id;
                                                                        ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>   -->
                                                                        <div class="btn-group mr-2" role="group"
                                                                             aria-label="First group">
                                                                            <input type="checkbox"
                                                                                   style=" width: 25px; height: 25px"
                                                                                   name="id_fournisseur[]"
                                                                                   value="<?= $id ?>">
                                                                        </div>


                                                                        <!--  <?php
                                                                        //include("verifier_delete_client.php");
                                                                        ?> -->


                                                                    </td>


                                                                </tr>

                                                            <?php } ?>
                                                            </tbody>

                                                            <tfoot>
                                                            <tr class="bg-primary">
                                                                <th><p align="center" style="color: white">
                                                                        Réferences</p></th>
                                                                <th><p align="center" style="color: white">Raison
                                                                        Sociale</p></th>
                                                                <th><p align="center" style="color: white">Tel</p></th>
                                                                <th><p align="center" style="color: white">Contact</p>
                                                                </th>
                                                                <th><p align="center" style="color: white">Tel
                                                                        contact</p></th>
                                                                <th style="width: 18%"><p align="center"
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
                                <div class="card-footer">

                                </div>
                            </form>
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