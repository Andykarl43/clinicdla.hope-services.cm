<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Commissions</h1>
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
                            <form class="form-horizontal" action="save_commission.php" method="POST">
                                <div class="card-header">
                                    Formulaire
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font">Services<span class="text-danger">*</span></span>
                                                        <div class="col">
                                                            <select name="id_service" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                <option value="" selected>...</option>
                                                                <?php

                                                                $iResult = $db->query('SELECT * FROM service where open_close!=1 order by nom asc ');

                                                                while($data = $iResult->fetch()){

                                                                    $i = $data['id_service'];
                                                                    echo '<option value ="'.$i.'">';
                                                                    echo $data['nom'];
                                                                    echo '</option>';

                                                                }
                                                                ?>

                                                               </select>
                                                            <button type="button" style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                                        <a href="liste_service.php"><i
                                                                                                    class="fas fa-plus"></i></a>
                                                                                    </button>

                                                        </div>
                                                    </td>

                                                    <td style="width: 50%">
                                                        <span class="help-block small-font">Commission en %<span class="text-danger">*</span></span>
                                                        <div class="col">
                                                            <input type="number" min="0" max="100" name="com" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col">
                                                            <ul class="nav nav-pills">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-toggle="tab" href="#a1">
                                                                        <i class="fas fa-user-md"></i>
                                                                        Médecin Externe
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="tab" href="#a2">
                                                                        <i class="fas fa-id-card-alt"></i>
                                                                        Chirugien
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="tab" href="#a3">
                                                                        <i class="fa fa-address-card"></i>
                                                                        Laborantin
                                                                    </a>
                                                                </li>
                                                                <!--<li class="nav-item">-->
                                                                <!--    <a class="nav-link" data-toggle="tab" href="#a4">-->
                                                                <!--        <i class="fa fa-address-card"></i>-->
                                                                <!--        Infimière(ier)-->
                                                                <!--    </a>-->
                                                                <!--</li>-->
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div class="tab-pane  active" id="a1">
                                                                    <span class="help-block small-font" >Médecin :</span>
                                                                    <div class="col">
                                                                        <select name="id_medecin"  style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                            <option value="0" selected>...</option>
                                                                            <?php
                                                                            $ext="E";
                                                                            $iResult = $db->query('SELECT * FROM medecin where type_m="E" and  open_close!=1');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_medecin'];
                                                                                echo '<option value ="'.$i.'">';
                                                                                echo $data['nom_m'].' '.$data['prenom_m'];
                                                                                echo '</option>';

                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_medecin.php"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane " id="a2">
                                                                    <span class="help-block small-font" >Chirugien :</span>
                                                                    <div class="col">
                                                                        <select name="id_chirugien" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                            <option value="0" selected>...</option>
                                                                            <?php

                                                                            $iResult = $db->query('SELECT * FROM chirugien where open_close!=1  ');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_chirugien'];
                                                                                echo '<option value ="'.$i.'">';
                                                                                echo $data['nom_c'].' '.$data['prenom_c'];
                                                                                echo '</option>';

                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_chirugien.php"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane " id="a3">
                                                                    <span class="help-block small-font" >Laborantin :</span>
                                                                    <div class="col">
                                                                        <select name="id_laboratin" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                            <option value="0" selected>...</option>
                                                                            <?php

                                                                            $iResult = $db->query('SELECT * FROM laboratin where open_close!=1');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_laboratin'];
                                                                                echo '<option value ="'.$i.'">';
                                                                                echo $data['nom_l'].' '.$data['prenom_l'];
                                                                                echo '</option>';

                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_laboratin.php"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane " id="a4">
                                                                    <span class="help-block small-font" >Infirmière :</span>
                                                                    <div class="col">
                                                                        <select name="id_nurse" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                            <option value="0" selected>...</option>
                                                                            <?php

                                                                            $iResult = $db->query('SELECT * FROM nurse where open_close!=1');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_nurse'];
                                                                                echo '<option value ="'.$i.'">';
                                                                                echo $data['nom_n'].' '.$data['prenom_n'];
                                                                                echo '</option>';

                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_nurse.php"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>-</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"
                                         style="float: right;">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="submit_etat_civil" class="btn btn-primary">
                                                Enregistrer
                                            </button>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                        </div>
                                    </div>
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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Liste des Commissions</b>
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="">
                                                    <table class="table table-bordered" id="dataTable" width="100%"
                                                           cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">Services</p></th>
                                                            <th><p align="center">Commissions(%)</p></th>
                                                            <th><p align="center">Spécialistes</p></th>
                                                            <th><p align="center">Options</p></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                    <?php

                                                    $query = "SELECT * from commission where open_close!=1";
                                                    $q = $db->query($query);
                                                    while ($row = $q->fetch()) {
                                                        $id_comi = $row['id_comi'];
                                                        $ref_comi = $row['ref_comi'];
                                                        $id_service = $row['id_service'];
                                                        $id_entite = $row['id_entite'];
                                                        $type_entite = $row['type_entite'];
                                                        $comi = $row['comi'];
                                                        $date_comi = $row['date_comi'];


                                                        $sql = "SELECT DISTINCT * from service where id_service = '$id_service'";

                                                        $stmt = $db->prepare($sql);
                                                        $stmt->execute();

                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($tables as $table) {
                                                            $service=$table['nom'];
                                                        }
                                                        if($type_entite=="M"){
                                                            $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_entite'";

                                                            $stmt = $db->prepare($sql);
                                                            $stmt->execute();

                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach ($tables as $table) {
                                                                $entite=$table['nom_m'].' '.$table['prenom_m'];
                                                            }

                                                        }elseif ($type_entite=="C"){
                                                            $sql = "SELECT DISTINCT * from chirugien where id_chirugien = '$id_entite'";

                                                            $stmt = $db->prepare($sql);
                                                            $stmt->execute();

                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach ($tables as $table) {
                                                                $entite=$table['nom_c'].' '.$table['prenom_c'];
                                                            }

                                                        }else{
                                                            $sql = "SELECT DISTINCT * from laboratin where id_laboratin = '$id_entite'";

                                                            $stmt = $db->prepare($sql);
                                                            $stmt->execute();

                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach ($tables as $table) {
                                                                $entite=$table['nom_l'].' '.$table['prenom_l'];
                                                            }

                                                        }


                                                        ?>
                                                        
                                                            <tr>
                                                                <td align="center"><?=$service?>  </td>
                                                                <td align="center">
                                                                    <?php echo number_format($comi) ?>
                                                                </td>
                                                                <td align="center">
                                                                    <?=$entite?>
                                                                </td>
                                                                <td align="center"><a class="btn btn-danger"  href="delete_commission.php?id_comi=<?=$id_comi ?>"   onclick="Supp(this.href); return(false);" style="background-color: transparent">
                                                                        <i style="color: red" class="fas fa-trash"></i>
                                                                    </a></td>
                                                                
                                                            </tr>

                                                    <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">Services</p></th>
                                                            <th><p align="center">Commissions(%)</p></th>
                                                            <th><p align="center">Spécialistes</p></th>
                                                            <th><p align="center">Options</p></th>
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

            </div>
        </main>
    </div>
    <script type="text/javascript">
        function Supp(link){
            if(confirm('Confirmer  la suppression du la commission ?')){
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
                    icon: 'Solde Insuffisant !!!',
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