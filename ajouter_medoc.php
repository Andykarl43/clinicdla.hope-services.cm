
<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterMedoc<?= $id_medi; ?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-plus"></i>  <b>Ajouter Medicament</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="save_ordo_medoc.php" name="form" method="post">
                    <div class="form-group">
                        <label>Medicament</label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id_medi" value="<?=$id_medi?>" class="form-control">
<!--                            <input type="hidden" name="id_patient" value="--><?//=$id_patient?><!--" class="form-control">-->
<!--                            <input type="hidden" name="id_medecin" value="--><?//=$id_medecin?><!--" class="form-control">-->
                            <input type="text" name="nom" value="<?=$nom_medi?>" class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Quantité(s)</label>
                        <div class="col-sm-12">
                            <input type="number" name="quantite" min="0" max="<?=$quantite?>" class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                                <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                       value="Créer">

                                <input type="reset" data-dismiss="modal" style=" width:25% " class="btn btn-danger"
                                       value="Annuler"/></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>