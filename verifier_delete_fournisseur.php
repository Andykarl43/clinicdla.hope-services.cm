<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="verifier_delete_fournisseur<?= $id_fournisseur; ?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-alert"></i> <b>Warning</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="delete_fournisseur.php" name="form" method="post">
                    <div class="form-group">
                        <label>Vous êtes sur de vouloir supprimer le fournisseur:
                            </br><b style="color :red"><?= $ref_four ?></b>
                            </br><b style="color :red"><?= $raison_social_four ?></b>
                        </label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id_fournisseur" value="<?= $id_fournisseur; ?>"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                                <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                       value="Ok">

                                <input type="reset" data-dismiss="modal" style=" width:25% " class="btn btn-danger"
                                       value="Annuler"/>
                            </center>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>