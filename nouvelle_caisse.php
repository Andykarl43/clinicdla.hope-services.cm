<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');


?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau Solde</h1>
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
                                            <a class="nav-link active" href="<?= $caisse['option1_link'] ?>">

                                                Retour
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#home">
                                                <i class="fas fa-file-medical-alt"></i>
                                                Nouveau Solde<!-- <?= $id_personnel ?> -->
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
                                                                    <form action="save_fournisseur.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>caisse <span
                                                                                                class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                            name="id_card_bank">
                                                                                        <option value="" selected="">
                                                                                            ...
                                                                                        </option>
                                                                                        <option >Caisse 1
                                                                                        </option>
                                                                                        
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Caissière<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <select class="form-control">
                                                                                        <option value="1">...</option>
                                                                                        <option value="2">caissière 1
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Solde <span
                                                                                                class="text-danger">*</span></label>
                                                                                    <input type="number"
                                                                                               class="form-control">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Date de solde</label>
                                                                                    <div>
                                                                                        <input type="date"
                                                                                               class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Fichiers<span
                                                                                                class="text-danger">*</span></label>
                                                                                    <input type="file" name="fichier[]"
                                                                                           style="width:100%"
                                                                                           class="form-control"
                                                                                           multiple="multiple">
                                                                                </div>
                                                                            </div> -->

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Résumé</label>
                                                                            <textarea class="form-control" rows="3"
                                                                                      cols="30"></textarea>
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
<?php
include('foot.php');
?>