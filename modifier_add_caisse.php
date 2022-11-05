<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

$id=$_REQUEST['id'];

$query  = "SELECT * from caisse where id_caisse='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $id_caisse = $row['id_caisse'];
    /*-------------------- ETAT CIVILE --------------------*/
    $id_perso = $row['id_perso'];
    $solde = $row['solde'];
    $date_caisse = $row['date_caisse'];
    $code = $row['code'];
    $caisse = $row['caisse'];

    $sql = "SELECT * from personnel where id_personnel = '$id_perso'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom=$table['nom'].' '.$table['prenom'];
    }
    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"> <i class="fas fa-building" style="color: silver"></i>Modifier caisse: <?=$caisse?> </h1>
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
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">

                                    </ul>
                                </b>
                            </div>

                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Etat Civile-->


                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <form action="update_add_caisse.php" method="POST">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Nom Caisse</label>
                                                            <input  type="hidden" name="id_caisse" value="<?=$id_caisse?>">
                                                            <input class="form-control" type="text" name="caisse" value="<?=$caisse?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Responsable</label>
                                                            <select class="form-control" name="id_personnel">
                                                                <option value="<?=$id_perso?>" selected=""><?=$nom?></option>
                                                                <?php

                                                                $iResult = $db->query("SELECT * FROM personnel");

                                                                while ($data = $iResult->fetch()) {

                                                                    $i = $data['id_personnel'];
                                                                    echo '<option value ="' . $i . '">';
                                                                    echo $data['nom'].' '.$data['prenom'];
                                                                    echo '</option>';

                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Code:</label>
                                                            <input class="form-control" type="text" name="code" value="<?=$code?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label> Solde</label>
                                                            <input class="form-control"  type="number" name="solde"  value="<?=$solde?>" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label> Date</label>
                                                            <input class="form-control" type="date" name="date_caisse" value="<?=$date_caisse?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="liste_add_caisse.php" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


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

    <?php
}
?>
    <!--//Footer-->
<?php
include('foot.php');
?>