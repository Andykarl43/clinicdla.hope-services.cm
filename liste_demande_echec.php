<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-random" style="color: silver"></i> Liste des demandes de produits  en echec</h1>
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
                                    <a class="btn btn-primary" href="nouvelle_demande_produit.php">
                                        <i class="fas fa-user"></i>
                                        Nouvelle demande
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills" style="float: right; margin-right: 20px ;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="liste_demande_produit.php">
                                        <i class="fas fa-cubes"></i>
                                        Retour
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
                                    <th><p align="center">Salles</p></th>
                                    <th><p align="center" >Date de demande </p></th>
                                    <th><p align="center" >Date de validation </p></th>
                                    <th><p align="center" >Equipements</p></th>
                                    <th><p align="center" >Action</p></th>
                                    <!--                                    <th>Reference</th>-->
                                    <!--                                    <th>Bloc</th>-->
                                    <!--                                    <th>Auteur</th>-->
                                    <!--                                    <th>Date demande</th>-->
                                    <!--                                    <th>Date Validation</th>-->
                                    <!--                                    <th>Produits</th>-->
                                    <!--                                    <th class="text-right">Action</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if($lvl == 10)
                                    $query = "SELECT * from demande_materiel WHERE id_perso = '$id_perso_session' and etat_dst=-1   order by id_ask_medi desc";
                                else
                                    $query = "SELECT * from demande_materiel where etat_dst=-1   order by id_ask_medi desc";

                                $q = $db->query($query);
                                while($row = $q->fetch())
                                {
                                    $id_ask_medi = $row['id_ask_medi'];
                                    $nom_salle = $row['nom_salle'];
                                    $etat = $row['etat_dst'];
                                    $emetteur = $row['emetteur'];


                                    $sql = "SELECT DISTINCT * from demande_medicament where id_ask_medi = '$id_ask_medi'";

                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                    {

                                        $date_debut = $table['date_debut'];
                                        $date_valide = $table['date_valide'];
                                        $heure = $table['heure'];
                                    }

                                    ?>

                                    <tr>
                                        <td align="center"><a href="#" style="color: black"> <?php echo $nom_salle; ?>  </a></td>
                                        <td align="center"><a href="#" style="color: black"> <?php echo date("d-m-Y",strtotime($date_debut)); ?>  </a></td>
                                        <td align="center"><a href="#" style="color: black"> <?php if($date_valide=='N/A'){echo 'N/A';}else{echo date("d-m-Y",strtotime($date_valide)); echo ' ('.$heure.')';} ?>  </a></td>
                                        <td align="center" style="width: 18%">
                                            <a class="btn btn-primary"  href="details_demande_medi.php?id=<?php echo $id_ask_medi; ?>" title="view"
                                               style="background-color: transparent">
                                                <i  style="color: green" class="fas fa-eye"></i>
                                            </a>
                                        </td>

                                        <td align="center" style="width: 18%">
                                            <?php
                                            if($lvl == 4 || $lvl == 7 || $lvl == 6 || $lvl == 10){
                                                if($etat!=1){
                                                    if($lvl == 10 ){
                                                        echo' <a class="btn btn-primary" href="modifier_demande_eq.php?id='.$id_ask_medi.'"><i class="fa fa-pencil-alt"></i></a>';
                                                    }else{
                                                        echo' <a class="btn btn-primary" href="modifier_demande_eq.php?id='.$id_ask_medi.'"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="valider_demande.php?idi='.$id_ask_medi.'"><i class="fa fa-check"></i></a>';
                                                    }
                                                }else{
                                                    echo'<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                                                }

                                            }


                                            ?>
                                        </td>
                                    </tr>
                                <?php }?>

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