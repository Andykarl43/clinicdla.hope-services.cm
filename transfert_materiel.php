<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterStock" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-map"></i> <b>TRANSFERT MATERIEL</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="save_transfert.php" name="form" method="post">
                    <!--                     <input type="hidden" name="id_chantier" value="<?= $id ?>">
                    <input type="hidden" name="id_materiel" value="<?= $id_materiel ?>"> -->
                    <div class="form-group">
                        <label>Quantitée(s):</label>
                        <div class="col-sm-12">
                            <input type="text" name="quantite_mag_chantier" class="form-control"
                                   required="Entrer la Quantitée">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date de transfert</label>
                        <div class="col-sm-12">
                            <input type="text" name="date_arrived_mag_chantier" class="form-control"
                                   required="Entrer la date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                                <input type="submit" style=" width:25% " class="btn btn-primary" value="Créer">

                                <input type="reset" data-dismiss="modal" style=" width:25% " class="btn btn-danger"
                                       value="Annuler"/></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 
