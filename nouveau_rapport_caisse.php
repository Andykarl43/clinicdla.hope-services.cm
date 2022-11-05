<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php

// $total_apt = 0;
// $today = date("Y-m-d");
// $today = date("t", strtotime($today));

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
$ref_app = 'DEC_'.$year.'_'.$month.'_'.$day.'_'.$id_app;

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
</style>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau rapport caisse</h1>
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
                                            <form action="save_rapport_caisse.php" method="POST">
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
                                                                <input type="number" class="form-control" name="montant">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                            <label>Comment :</label>
                                                            <textarea cols="120" rows="4" class="form-control" name="motif"></textarea>
                                                        </div>

                                                </div>
                                                <table>
                                                                  <tr>
                                                                    <th>Money(FCFA)</th>
                                                                    <th>Quantité(s)</th>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>10.000</td>
                                                                    <td><input type="number" class="form-control" name="dixmilles" <?=$style?> ></td>
                                                                  </tr
                                                                  <tr>
                                                                    <td>5.000</td>
                                                                    <td><input type="number" class="form-control" name="cinqmilles" <?=$style?> ></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>2.000</td>
                                                                    <td><input type="number" class="form-control" name="deuxmilles" <?=$style?> ></td>
                                                                  </tr><tr>
                                                                    <td>1.000</td>
                                                                    <td><input type="number" class="form-control" name="mille" <?=$style?> ></td>
                                                                  </tr><tr>
                                                                    <td>500(billets)</td>
                                                                    <td><input type="number" class="form-control" name="cinqcentnote" <?=$style?> ></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>500(Pièces)</td>
                                                                    <td><input type="number" class="form-control" name="cinqcentcoin" <?=$style?> ></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>100</td>
                                                                    <td><input type="number" class="form-control" name="cent" <?=$style?> ></td>
                                                                  </tr><tr>
                                                                    <td>50</td>
                                                                    <td><input type="number" class="form-control" name="cinquante" <?=$style?> ></td>
                                                                    </tr><tr>
                                                                    <td>25</td>
                                                                    <td><input type="number" class="form-control" name="vingtcinq"  <?=$style?> ></td>
                                                                  </tr><tr>
                                                                    <td>10</td>
                                                                    <td><input type="number" class="form-control" name="dix" <?=$style?> ></td>
                                                                  </tr><tr>
                                                                    <td>5</td>
                                                                    <td><input type="number" class="form-control" name="cinq" <?=$style?> ></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>2</td>
                                                                    <td><input type="number" class="form-control" name="deux" <?=$style?> ></td>
                                                                  </tr><tr>
                                                                    <td>1</td>
                                                                    <td><input type="number" class="form-control" name="un" <?=$style?> ></td>
                                                                  </tr>
                                                                </table>

                                                <div class="m-t-20 text-center">
                                                    <button class="btn btn-primary submit-btn">Enregistrer</button>
                                                    <a href="<?=$rapport_caisse['option2_link']?>" style=" width:150px;" class="btn btn-danger"><font>Annuler</font></a>
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


    <!--//Footer-->
<?php
include('foot.php');
?>