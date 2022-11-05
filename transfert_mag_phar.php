<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

<?php
$id_medi=$_REQUEST['id_medi'];
//$id_materiel=$_REQUEST['id_materiel'];
//$quantite=$_REQUEST['qt'];
//$id_ask_mat=$_REQUEST['id_ask_mat'];
$iResult = $db->query("SELECT * FROM magasin where id_medi='$id_medi'");

while($data = $iResult->fetch()){

    $id_medi = $data['id_medi'];
    $qt_com = $data['qt_com'];

    $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $nom_medi= $table['nom_medi'];
    }

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nouveau transfert</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
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
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->



                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <!--  <form class="form-horizontal" action="#" method="POST"> -->
                                                <div class="card-header">

                                                </div>
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="table-responsive">

                                                            <button class="accord">Medicaments</button>
                                                            <div class="panelle">
                                                                <form class="form-horizontal" action="update_transfert_mag_phar.php" method="POST">

                                                                    <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" >
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 45%">

                                                                                <span class="help-block small-font" >Medicament:</span>
                                                                                <div class="col">
                                                                                    <select name="id_medi" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                        <option value="<?=$id_medi?>" selected=""><?=$nom_medi?></option>

                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td style="width: 35%">

                                                                                <span class="help-block small-font" >Quantité:</span>
                                                                                <div class="col">
                                                                                    <input type="number" name="quantite" min="1" max="<?=$qt_com?>" style="width:75%" value="<?=$qt_com?>">

                                                                                </div>

                                                                            </td>

                                                                            <td>

                                                                                <button type="submit" style=" width:150px; float: right; margin-top: 10px"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                                                            </td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="card-footer">
                                                    <center><a href="#" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a></center>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- </form> -->
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
    <?php
}
    ?>
<?php
include('foot.php');
?>