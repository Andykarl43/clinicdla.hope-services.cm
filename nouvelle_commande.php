<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');


?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Bon de commande</h1>
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
                                            <a class="nav-link active" href="liste_commande.php">
                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-heartbeat"></i>
                                                Paramètres
                                            </a>
                                        </li>
<!--                                        <li class="nav-item">-->
<!--                                            <a class="nav-link" data-toggle="pill" href="#menu1">-->
<!--                                                <i class="fas fa-stethoscope"></i>-->
<!--                                                Rapport du Médecin-->
<!--                                            </a>-->
<!--                                        </li>-->
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
                                                                <form action="save_commande.php" method="POST">
                                                                <div class="col-lg-8 offset-lg-2">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Numéro de commande<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <div>
                                                                                        <input type="text"
                                                                                               class="form-control" name="ref_com" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Fournisseur <span
                                                                                                class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_four" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <?php

                                                                                        $iResult = $db->query("SELECT * FROM fournisseur ");

                                                                                        while ($data = $iResult->fetch()) {

                                                                                            $i = $data['id_four'];
                                                                                            echo '<option value ="' . $i . '">';
                                                                                            echo $data['raison_social_four'];
                                                                                            echo '</option>';

                                                                                        }

                                                                                        ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date de création<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control" name="date_c_com" value="<?=date('Y-m-d')?>">
<!--                                                                                        <input type="hidden"-->
<!--                                                                                               class="form-control" name="date_c_com" value="--><?//=date('Y-m-d')?><!--">-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date livraison<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control" name="date_l_com" value="<?=date('Y-m-d')?>" >
<!--                                                                                        <input type="hidden"-->
<!--                                                                                               class="form-control" name="date_l_com" value="--><?//=date('Y-m-d')?><!--">-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date règlement<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control" name="date_r_com" value="<?=date('Y-m-d')?>" >
                                                                                     </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Mode paiement<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="mode_paie" required>
                                                                                        <option value="0" selected="">
                                                                                            ...
                                                                                        </option>

                                                                                    <?php

                                                                                    $iResult = $db->query("SELECT * FROM mode_paie where open_close!=1 ");

                                                                                    while ($data = $iResult->fetch()) {

                                                                                        $i = $data['id_mode_paie'];
                                                                                        echo '<option value ="' . $i . '">';
                                                                                        echo $data['nom'];
                                                                                        echo '</option>';

                                                                                    }

                                                                                    ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>observation/commentaire</label>
                                                                            <textarea class="form-control" rows="3"
                                                                                      cols="30" name="obs"></textarea>
                                                                        </div>




                                                                </div>


                                                                <div class="card mb-4">
                                                                    <div class="card-header">
                                                                        <i class="fas fa-scroll"></i>
                                                                        <b>Liste des produits </b>
                                                                    </div>
                                                                </div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-border table-striped custom-table mb-0" id="TableID" >
                                                                            <thead>
                                                                            <tr>
                                                                                <th>...</th>
                                                                                <th>Produits</th>
                                                                                <th>quantité(s)</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td><input type="checkbox"  style=" width: 25px; height: 25px" name="id_mat"  multiple></td>
                                                                                <td><!--<input type="search" class="form-control" placeholder="barre de recherche..." id="searchBox">--> <select class="form-control" id="countries"
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
                                                                                <td><input type="number" class="form-control" style=" width: 80px; height: 25px" name="quantite[]" value="0" min="0"  multiple></td>
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
                                                                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                                        <a href="liste_commande.php" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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

    searchBox = document.querySelector("#searchBox");
    countries = document.querySelector("#countries");
    var when = "keyup"; //You can change this to keydown, keypress or change

    searchBox.addEventListener("keyup", function (e) {
        var text = e.target.value; //searchBox value
        var options = countries.options; //select options
        for (var i = 0; i < options.length; i++) {
            var option = options[i]; //current option
            var optionText = option.text; //option text ("Somalia")
            var lowerOptionText = optionText.toLowerCase(); //option text lowercased for case insensitive testing
            var lowerText = text.toLowerCase(); //searchBox value lowercased for case insensitive testing
            var regex = new RegExp("^" + text, "i"); //regExp, explained in post
            var match = optionText.match(regex); //test if regExp is true
            var contains = lowerOptionText.indexOf(lowerText) != -1; //test if searchBox value is contained by the option text
            if (match || contains) { //if one or the other goes through
                option.selected = true; //select that option
                return; //prevent other code inside this event from executing
            }
            searchBox.selectedIndex = 0; //if nothing matches it selects the default option
        }
    });
</script>
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