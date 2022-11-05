<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');


?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Fiche d'Ordonnance</h1>
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
                                <ul class="nav nav-pills" style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= $ordonnance['option2_link'] ?>">

                                            Retour
                                        </a>
                                    </li>
                                </ul>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">
                                            <i class="fas fa-file-medical-alt"></i>
                                            Examination<!-- <?= $id_personnel ?> -->
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-file-medical"></i>
                                            Observations
                                        </a>
                                    </li>
                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">

                                                <div class="card-header">

                                                </div>
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="table-responsive">
                                                            <div class="col-lg-8 offset-lg-2">
                                                                <form action="save_ordonnance.php" method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <hr/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-sm-6">
<!--                                                                            <div class="form-group">-->
<!--                                                                                <label>Patient <span-->
<!--                                                                                            class="text-danger">*</span></label>-->
<!--                                                                                <select class="form-control"-->
<!--                                                                                        name="id_patient">-->
<!--                                                                                    <option value="0" selected="">-->
<!--                                                                                        ...-->
<!--                                                                                    </option>-->
<!--                                                                                    --><?php
//
//                                                                                    $iResult = $db->query("SELECT * FROM patient where open_close!=1 ");
//
//                                                                                    while ($data = $iResult->fetch()) {
//
//                                                                                        $i = $data['id_patient'];
//                                                                                        echo '<option value ="' . $i . '">';
//                                                                                     //   echo $data['nom_p'] . ' ' . $data['prenom_p'];
//                                                                                        echo $data['ref_patient'];
//                                                                                        echo '</option>';
//
//                                                                                    }
//
//                                                                                    ?>
<!---->
<!--                                                                                </select>-->
<!--                                                                            </div>-->
                                                                            <div class="col">
                                                                                <div class="form-group">

                                                                                        <div class="col">
                                                                                            <ul class="nav nav-pills">
                                                                                                <li class="nav-item">
                                                                                                    <a class="nav-link active" data-toggle="tab" href="#b1">
                                                                                                        <i class="fas fa-user-md"></i>
                                                                                                        Patient
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                            <div class="tab-content">
                                                                                                <div class="tab-pane  active" id="b1">
                                                                                                    <span class="help-block small-font" >Patient :</span>
                                                                                                    <div class="col">
                                                                                                        <select name="id_patient"   style="width:75%;
                                                                                                            border-top: 0; border-left: 0;
                                                                                                            border-right: 0;
                                                                                                            background: transparent;" >
                                                                                                            <option value="0" selected>...</option>
                                                                                                            <?php

                                                                                                            $iResult = $db->query('SELECT * FROM patient where   open_close!=1');

                                                                                                            while($data = $iResult->fetch()){

                                                                                                                $i = $data['id_patient'];
                                                                                                                echo '<option value ="' . $i . '">';
                                                                                                             //   echo $data['nom_p'] . ' ' . $data['prenom_p'];
                                                                                                                echo $data['ref_patient'];
                                                                                                                echo '</option>';

                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                        <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_patient.php"><i class="fas fa-plus"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>


                                                                                     </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="col">
                                                                            <div class="form-group">
                                                                                <?php if($lvl == 5){ ?>
                                                                                <input type="hidden" class="form-control" name="id_pharmacien" value="0">
                                                                                <label>Médecin<span
                                                                                            class="text-danger">*</span></label>
                                                                                <select class="form-control" name="id_medecin">
                                                                                    <?php

                                                                                    if ($lvl == 5) {
                                                                                        $iResult = $db->query("SELECT * FROM  medecin where id_medecin='$id_perso_session'");
                                                                                    } else {
                                                                                        echo '<option value="0" selected="">....</option>';
                                                                                        $iResult = $db->query("SELECT * FROM  medecin");
                                                                                    }

                                                                                    while ($data = $iResult->fetch()) {

                                                                                        $i = $data['id_medecin'];
                                                                                        echo '<option value ="' . $i . '">';
                                                                                        echo $data['nom_m'] . ' ' . $data['prenom_m'];
                                                                                        echo '</option>';

                                                                                    }

                                                                                    ?>
                                                                                </select>
                                                                                <?php }elseif($lvl == 10){ ?>
                                                                                <input type="hidden" class="form-control" name="id_medecin" value="0">
                                                                                <label>Pharmacien<span
                                                                                            class="text-danger">*</span></label>
                                                                                <select class="form-control" name="id_pharmacien">
                                                                                    <?php

                                                                                    if ($lvl == 10) {
                                                                                        $iResult = $db->query("SELECT * FROM  users where id_perso='$id_perso_session' and statut='A'");
                                                                                    } else {
                                                                                        echo '<option value="0" selected="">....</option>';
                                                                                        $iResult = $db->query("SELECT * FROM  users where lvl=10 and statut='A' ");
                                                                                    }

                                                                                    while ($data = $iResult->fetch()) {

                                                                                         $id_perso = $data['id_perso'];
                                                                                        // echo '<option value ="' . $i . '">';
                                                                                        // echo $data['nom'] . ' ' . $data['prenom'];
                                                                                        // echo '</option>';
                                                                                        
                                                                                        $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_perso'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();
                                                            
                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                            
                                                                                            foreach ($tables as $table) {
                                                                                               $i = $id_perso;
                                                                                               echo '<option value ="' . $i . '">';
                                                                                               echo $table['nom'] . ' ' . $table['prenom'];
                                                                                               echo '</option>';
                                                                                            }

                                                                                    }

                                                                                    ?>
                                                                                </select>
                                                                                
                                                                                <?php }else{?>
                                                                                <div class="col">
                                                                                    
                                                                                        <ul class="nav nav-pills">
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link active" data-toggle="tab" href="#a1">
                                                                                                    <i class="fas fa-user-md"></i>
                                                                                                    Médecin
                                                                                                </a>
                                                                                            </li>
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link" data-toggle="tab" href="#a2">
                                                                                                    <i class="fas fa-id-card-alt"></i>
                                                                                                    Pharmacien
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div class="tab-content">
                                                                                            <div class="tab-pane  active" id="a1">
                                                                                                <span class="help-block small-font" >Médecin :</span>
                                                                                                <div class="col">
                                                                                                    <select name="id_medecin"   style="width:75%;
                                                                                                            border-top: 0; border-left: 0;
                                                                                                            border-right: 0;
                                                                                                            background: transparent;" >
                                                                                                        <option value="0" selected>...</option>
                                                                                                        <?php
                                                                                                        $ext="E";
                                                                                                        $iResult = $db->query('SELECT * FROM medecin where   open_close!=1');
                            
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
                                                                                                <span class="help-block small-font" >Pharmacien :</span>
                                                                                                <div class="col">
                                                                                                    <select name="id_pharmacien" style="width:75%;
                                                                                                            border-top: 0; border-left: 0;
                                                                                                            border-right: 0;
                                                                                                            background: transparent;">
                                                                                                        <option value="0" selected>...</option>
                                                                                                        <?php
                            
                                                                                                        $iResult = $db->query("SELECT * FROM  users where lvl=10 and statut='A' ");
                                                                                                            
                                                                                                            while ($data = $iResult->fetch()) {
                        
                                                                                                                 $id_perso = $data['id_perso'];
                                                                                                                // echo '<option value ="' . $i . '">';
                                                                                                                // echo $data['nom'] . ' ' . $data['prenom'];
                                                                                                                // echo '</option>';
                                                                                                                
                                                                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_perso'";
                        
                                                                                                                    $stmt = $db->prepare($sql);
                                                                                                                    $stmt->execute();
                                                                                    
                                                                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                                    
                                                                                                                    foreach ($tables as $table) {
                                                                                                                       $i = $table['id_perso'];
                                                                                                                       echo '<option value ="' . $i . '">';
                                                                                                                       echo $table['nom'] . ' ' . $table['prenom'];
                                                                                                                       echo '</option>';
                                                                                                                    }
                        
                                                                                                            }
                                                                                                        ?>
                                                                                                    </select>
                                                                                                    <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_personnel.php.php"><i class="fas fa-plus"></i></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                  
                                                                                </div>
                                                                                            
                                                                                
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <hr/>
                                                                            <hr/>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    

                                                            </div>
                                                            <div class="card mb-4">
                                                                            <div class="card-header">
                                                                                <i class="fas fa-scroll"></i>
                                                                                <b>Liste des medicaments </b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-border table-striped custom-table mb-0" id="TableID" >
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>...</th>
                                                                                    <th>medicaments</th>
                                                                                    <th>Posologie(indicatif)</th>
                                                                                    <th>quantité(s)</th>
                                                                                    <th>Durée traitement(indicatif)</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td><input type="checkbox"  style=" width: 25px; height: 25px" name="id_mat"  multiple></td>
                                                                                    <td> <select class="form-control"
                                                                                                 name="id_medi[]" >
                                                                                            <?php
                                                                                            $query = "SELECT * from pharmacie  order by nom_medi asc";
                                                                                            $q = $db->query($query);
                                                                                            while ($row = $q->fetch()) {
                                                                                                $id_medi = $row['id_medi'];
                                                                                                $quantite = $row['quantite'];


                                                                                                $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi' ";

                                                                                                $stmt = $db->prepare($sql);
                                                                                                $stmt->execute();

                                                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                                foreach ($tables as $table) {

                                                                                                    $i = $table['id_medi'];
                                                                                                    $prix_u_v = $table['prix_u_v'];
                                                                                                    echo '<option value ="' . $i . '">';
                                                                                                    echo $table['nom_medi'].' ('.$prix_u_v.') FCFA';
                                                                                                    echo '</option>';

                                                                                                }
                                                                                            }

                                                                                            ?>

                                                                                        </select></td>
                                                                                       <td><textarea class="form-control" rows="2" name="posologie[]"
                                                                                  cols="20"></textarea></td>
                                                                                  <td><textarea class="form-control" rows="2" name="posologie[]"
                                                                                  cols="20"></textarea></td>
                                                                                    
                                                                                    
                                                                                    
                                                                                    <td><input type="number" class="form-control" style=" width:80px; height: 25px" name="quantite[]" value="0" min="0" ></td>
                                                                                    <td><textarea class="form-control" rows="2" name="traitement[]"
                                                                                  cols="20"></textarea></td>
<!--                                                                                    <td><input type="number" class="form-control" style=" width: 200px; height: 25px" name="prix[]" value="--><?//?><!--" min="0"  multiple></td>-->

                                                                                    <td>
                                                                                        <a type="button"  onclick="addRow('TableID')"
                                                                                           class="btn btn-primary"
                                                                                           title="view"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: green" class="fas fa-plus"></i>
                                                                                        </a>
                                                                                        <a class="btn btn-danger" type="button" onclick="deleteRow('TableID')"
                                                                                           title="supprimer"
                                                                                           style="background-color: transparent">
                                                                                            <i style="color: red" class="fas fa-trash"></i>
                                                                                        </a>

                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>



                                                            <div class="m-t-20 text-center">
                                                                <button class="btn btn-primary submit-btn">
                                                                    Enregistrer
                                                                </button>
                                                                <a href="liste_ordonnance.php" style=" width:150px;"
                                                                   class="btn btn-danger"><font>Annuler</font></a>
                                                            </div>

                                                            </form>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="card-footer">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--ETAT ACADEMIQUE -->
                                <div class="tab-pane container" id="menu1">
                                    <!-- infos civile-->

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">

                                                <div class="card-header">

                                                </div>
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="table-responsive">
                                                            <div class="col-lg-8 offset-lg-2">
                                                                <form action="save_fournisseur.php" method="POST">
                                                                    <div class="row">


                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Fichier<span
                                                                                            class="text-danger">*</span></label>
                                                                                <input type="file" name="fichier[]"
                                                                                       style="width:100%"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>observation<span
                                                                                    class="text-danger">*</span></label>
                                                                        <textarea class="form-control" rows="20"
                                                                                  cols="70"></textarea>
                                                                    </div>


                                                                    <div class="m-t-20 text-center">

                                                                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                                        <a href="<?=$ordonnance['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>


                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="card-footer">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- information RH -->

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


<!-- <?php


//include("ajouter_profession.php");


?> -->
<!--//Footer-->
    <script>
        function addRow(tableID) {


            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;

            for(var i=0; i<colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                        newcell.childNodes[0].value = "";
                        break;
                    case "checkbox":
                        newcell.childNodes[0].checked = false;
                        break;
                    case "select-one":
                        newcell.childNodes[0].selectedIndex = 0;
                        break;
                }
            }
        }

        function deleteRow(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                        if(rowCount <= 2) {
                            addRow(tableID);
                            // alert("Attention la 1ère ligne n'est pas supprimable. La quantité est initialisée à 0");
                            //  break;
                        }
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }


                }
            }catch(e) {
                alert(e);
            }
        }

        function testValue(selection) {
            if (selection.value == "Dawn") {
                // do something
            }
            else if (selection.value == "Noon") {
                // do something
            }
            else if (selection.value == "Dusk") {
                // do something
            }
            else {
                // do something
            }
        }

    </script>
<?php
include('foot.php');
?>