<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouvelle Demande d'équipement</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="save_demande_eq.php" method="POST">
                                <div class="card-header">
                                    <!--  <ul class="nav nav-pills">
                                     <li class="nav-item">
                                        <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                     </li>
                                 </ul> -->
                                </div>
                                <div class="card-body" >
                                    <fieldset>
                                        <div class="table-responsive">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Auteur</label>
                                                        <select class="form-control" disabled>
                                                            <option>...</option>
                                                            <option selected>Pharmacien 1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Date de demande</label>
                                                        <div>
                                                            <input type="date" class="form-control " disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr/>
                                                </div>
                                            </div>


                                            <div class="card mb-4" style="background-color: silver">
                                                <div class="card-header">
                                                    <i class="fas fa-scroll"></i>
                                                    <b>Liste des Produits </b>
                                                </div>

                                            </div>

                                            <table  style="background-color: ivory" class="table table-border table-striped custom-table mb-0" id="dataTable">
                                                <thead>
                                                <tr>
                                                    <th>Code Produit</th>
                                                    <th>Nom</th>
                                                    <th>Categorie</th>
                                                    <th>prix unitaire</th>
                                                    <th>Date Péremption</th>
                                                    <th class="text-right">Quantité(s)</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td><a href="#">cod111</a></td>
                                                    <td><a href="#"><img width="28" height="28" src="assetss/img/user.jpg"
                                                                         class="rounded-circle m-r-5" alt="">prod 1</a></td>
                                                    <td><a href="#">cat 1</a></td>
                                                    <td><a href="#">10000</a></td>
                                                    <td><a href="#">7-09-2021</a></td>
                                                    <td align="center">
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <input type="number"  style=" width: 50px; height: 25px" name="id_mat[]" value=""  >

                                                        </div>



                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    </fieldset>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="submit_etat_civil" class="btn btn-primary" >Enregistrer</button>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">

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

                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="" >

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


    <!--//Footer-->
<?php
include('foot.php');
?>