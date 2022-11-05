<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
?>
<?php
$ref_ordo=$_REQUEST['ref_ordo'];

$query  = "SELECT * from ordonnance where ref_ordo='".$ref_ordo."'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $id_ordo = $row['id_ordo'];
    /*-------------------- ETAT CIVILE --------------------*/
    $id_patient=$row['id_patient'];
    $id_medecin=$row['id_medecin'];
    $id_depart = $row['id_depart'];
    $date_ordo = $row['date_ordo'];
    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier d'Ordonnance: </h1>
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
                                                                    <form action="save_ordonnance.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <hr/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Patient <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_patient">
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM patient  where open_close!=1");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_patient'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                         //   echo $data['nom_p'] . ' ' . $data['prenom_p'];
                                                                                            echo $data['ref_patient'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Médecin<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control" name="id_medecin">
                                                                                        <option>...</option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM medecin ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_medecin'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['nom_m'] . ' ' . $data['prenom_m'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date de l'ordonnance</label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control" name="date_ordo">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <hr/>
                                                                                <hr/>
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
                                                                                        <th>quantité(s)</th>
                                                                                        <!--                                                                                    <th>prix unitaire</th>-->
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td><input type="checkbox"  style=" width: 25px; height: 25px" name="id_mat"  multiple></td>
                                                                                        <td> <select class="form-control"
                                                                                                     name="id_medi[]" >
                                                                                                <?php

                                                                                                $iResult = $db->query("SELECT * FROM medicament ");

                                                                                                while ($data = $iResult->fetch()) {

                                                                                                    $i = $data['id_medi'];
                                                                                                    echo '<option value ="' . $i . '">';
                                                                                                    echo $data['nom_medi'];
                                                                                                    echo '</option>';

                                                                                                }

                                                                                                ?>

                                                                                            </select></td>
                                                                                        <td><input type="number" class="form-control" style=" width: 50px; height: 25px" name="quantite[]" value="0" min="0"  multiple></td>
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
                                                                        </div>

                                                                </div>



                                                                <div class="m-t-20 text-center">
                                                                    <button class="btn btn-primary submit-btn">
                                                                        Enregistrer
                                                                    </button>
                                                                    <a href="liste_ordonnance.php.php" style=" width:150px;"
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

                                                                            <button class="btn btn-primary submit-btn">
                                                                                Enregistrer
                                                                            </button>
                                                                            <button class="btn btn-danger submit-btn">
                                                                                Annuler
                                                                            </button>

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
}
    ?>
<?php
include('foot.php');
?>