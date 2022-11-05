<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterCompte_bank" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-home"></i> <b> Compte Bancaire</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="save_compte_bank.php" name="form" method="post">
                    <div class="form-group">
                        <label>CODE GUICHET:</label>
                        <div class="col-sm-12">
                            <input type="text" name="code_guichet" class="form-control">
                        </div>
                        <label>N° DE LA BANQUE:</label>
                        <div class="col-sm-12">
                            <input type="text" name="numero_bank" class="form-control">
                        </div>
                        <label>N°COMPTE:</label>
                        <div class="col-sm-12">
                            <input type="text" name="numero_compte" class="form-control">
                        </div>
                        <label>CLE DU COMPTE:</label>
                        <div class="col-sm-12">
                            <input type="text" name="cle_compte" class="form-control">
                        </div>
                        <label>PROPRIETE DU COMPTE:</label>
                        <div class="col-sm-12">
                            <input type="text" name="propriete_compte" class="form-control">
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