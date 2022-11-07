<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

<?php

$year = (new DateTime())->format("Y");
$month = (new DateTime())->format("m");
$day = (new DateTime())->format("d");
$query  = "SELECT count(id_rap_caisse) as total from rapport_caisse";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_apt = $row["total"];
}
$id_app = $total_apt + 1;
$ref_app = 'RAP_'.$year.'_'.$month.'_'.$day.'_'.$id_app;

$style='style="width: 80px;"';
?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color: coral;}
        :root {
            --primary-color: rgb(11, 78, 179);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
        /* Global Stylings */
        label {
            display: block ;
            margin-bottom: 0.5rem;
        }

        input {
            display: block;
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        .width-50 {
            width: 50%;
        }

        .ml-auto {
            margin-left: auto;
        }

        .text-centers {
            text-align: center;
        }

        /* Progressbar */
        .progressbars {
            position: relative;
            display: flex;
            justify-content: space-between;
            counter-reset: step;
            margin: 2rem 0 4rem;
        }

        .progressbars::before,
        .progresss {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            background-color: #dcdcdc;
            z-index: -1;
        }

        .progresss {
            background-color: var(--primary-color);
            width: 0%;
            transition: 0.3s;
        }

        .progress-steps {
            width: 2.1875rem;
            height: 2.1875rem;
            background-color: #dcdcdc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .progress-steps::before {
            counter-increment: step;
            content: counter(step);
        }

        .progress-steps::after {
            content: attr(data-title);
            position: absolute;
            top: calc(100% + 0.5rem);
            font-size: 0.85rem;
            color: #666;
        }

        .progress-step-actives {
            background-color: var(--primary-color);
            color: #f3f3f3;
        }

        /* Form */
        .forms {
        //  width: clamp(320px, 30%, 430px);
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 0.35rem;
            padding: 1.5rem;
        }

        .form-steps {
            display: none;
            transform-origin: top;
            animation: animate 0.5s;
        }

        .form-step-actives {
            display: block;
        }

        .input-groups {
            margin: 2rem 0;
        }

        @keyframes animate {
            from {
                transform: scale(1, 0);
                opacity: 0;
            }
            to {
                transform: scale(1, 1);
                opacity: 1;
            }
        }

        /* Button */
        .btns-groups {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .btns {
            padding: 0.75rem;
            display: block;
            text-decoration: none;
            background-color: var(--primary-color);
            color: #f3f3f3;
            text-align: center;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .btns:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }

    </style>


    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau rapport caisse</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <form action="save_rapport_caisse.php" class="forms" method="post" enctype="multipart/form-data">
                    <h1 class="text-centers">Registration Form</h1>
                    <!-- Progress bar -->
                    <div class="progressbars">
                        <div class="progresss" id="progresss"></div>

                        <div
                            class="progress-steps progress-step-actives"
                            data-title="CASH"
                        ></div>
                        <div
                            class="progress-steps"
                            data-title="ORANGE MONEY"
                        ></div>
                        <div
                                class="progress-steps"
                                data-title="MTM MONEY"
                        ></div>
                    </div>

                    <!-- Steps -->
                    <div class="form-steps form-step-actives">

                            <div class="col-lg-8 offset-lg-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ref:</label>

                                            <?php
                                            echo '<input class="form-control" name="ref_rap" type="hidden" value="'.$ref_app.'">';
                                            echo '<input class="form-control"  class="form-control form-control-lg" value="'.$ref_app.'" disabled >';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Persosnnel :</label>
                                            <select class="form-control" name="id_perso">

                                                <?php
                                                if($lvl == 12){
                                                    $iResult = $db->query("SELECT * FROM personnel where id_personnel= $id_perso_session");
                                                }else{
                                                    $iResult = $db->query("SELECT * FROM personnel where open_close!=1");
                                                    echo'<option value="0" selected="">....</option>';
                                                }


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

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Montant :</label>
                                            <div>
                                                <input type="number" class="form-control" name="montant_cash">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label>Comment :</label>
                                        <textarea cols="120" rows="4" class="form-control" name="motif_cash"></textarea>
                                    </div>

                                </div>
                                <table>
                                    <tr>
                                        <th>Money(FCFA)</th>
                                        <th>Quantité(s)</th>
                                    </tr>
                                    <tr>
                                        <td>10.000</td>
                                        <td><input type="number" class="form-control" name="dixmilles" value="0" <?=$style?> ></td>
                                    </tr
                                    <tr>
                                        <td>5.000</td>
                                        <td><input type="number" class="form-control" name="cinqmilles" value="0" <?=$style?> ></td>
                                    </tr>
                                    <tr>
                                        <td>2.000</td>
                                        <td><input type="number" class="form-control" name="deuxmilles" value="0" <?=$style?> ></td>
                                    </tr><tr>
                                        <td>1.000</td>
                                        <td><input type="number" class="form-control" name="mille" value="0" <?=$style?> ></td>
                                    </tr><tr>
                                        <td>500(billets)</td>
                                        <td><input type="number" class="form-control" name="cinqcentnote" value="0" <?=$style?> ></td>
                                    </tr>
                                    <tr>
                                        <td>500(Pièces)</td>
                                        <td><input type="number" class="form-control" name="cinqcentcoin" value="0" <?=$style?> ></td>
                                    </tr>
                                    <tr>
                                        <td>100</td>
                                        <td><input type="number" class="form-control" name="cent" value="0" <?=$style?> ></td>
                                    </tr><tr>
                                        <td>50</td>
                                        <td><input type="number" class="form-control" name="cinquante" value="0" <?=$style?> ></td>
                                    </tr><tr>
                                        <td>25</td>
                                        <td><input type="number" class="form-control" name="vingtcinq" value="0"  <?=$style?> ></td>
                                    </tr><tr>
                                        <td>10</td>
                                        <td><input type="number" class="form-control" name="dix" value="0" <?=$style?> ></td>
                                    </tr><tr>
                                        <td>5</td>
                                        <td><input type="number" class="form-control" name="cinq" value="0" <?=$style?> ></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="number" class="form-control" name="deux" value="0" <?=$style?> ></td>
                                    </tr><tr>
                                        <td>1</td>
                                        <td><input type="number" class="form-control" name="un" value="0" <?=$style?> ></td>
                                    </tr>
                                </table>


                            </div>


                        <div class="" style="margin-top: 20px">
                            <a href="#" class="btns btn-nexts width-50 ml-auto">Next</a>
                        </div>
                    </div>
                    <div class="form-steps">
                        <div class="input-groups">
                            <label for="position">Numéro de téléphone (OM): </label>
                            <input type="text" name="number_momo" id="position" />
                        </div>
                        <div class="input-groups">
                            <label for="position">Montant: </label>
                            <input type="number" name="montant_momo" id="position" />
                        </div>
                        <div class="input-groups">
                            <label for="position">Solde de commpte: </label>
                            <input type="number" name="solde_momo" id="position" />
                        </div>
                        <div class="btns-groups">
                            <a href="#" class="btns btn-prevs">Previous</a>
                            <a href="#" class="btns btn-nexts">Next</a>
                        </div>
                    </div>
                    <div class="form-steps">
                        <div class="input-groups">
                            <label for="position">Numéro de téléphone (OM): </label>
                            <input type="text" name="number_om" id="position" />
                        </div>
                        <div class="input-groups">
                            <label for="position">Montant: </label>
                            <input type="number" name="montant_om" id="position" />
                        </div>
                        <div class="input-groups">
                            <label for="position">Solde de commpte: </label>
                            <input type="number" name="solde_om" id="position" />
                        </div>
                        <div class="btns-groups">
                            <a href="#" class="btns btn-prevs">Previous</a>
                            <input type="submit" value="Submit" class="btns" />
                        </div>
                    </div>
                </form>
                <!--                Main Body-->

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

            </div>
        </main>
    </div>





    <!--    Modal pour ajouter Categorie Contrat-->



    <!--//Footer-->
    <script>
        var acc = document.getElementsByClassName("accord");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("activ");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
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
    <script>
        function addRow(tableIDs) {


            var table = document.getElementById(tableIDs);

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

        function deleteRow(tableIDs) {
            try {
                var table = document.getElementById(tableIDs);
                var rowCount = table.rows.length;

                for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                        if(rowCount <= 2) {
                            addRow(tableIDs);
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