<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterPays" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-map"></i> <b>Nouveau Pays</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="save_pays.php" name="form" method="post">
                    <div class="form-group">
                        <label>Nom du Pays:</label>
                        <div class="col-sm-12">
                            <input type="text" name="nom" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                                <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary"
                                       value="Créer">

                                <a href="liste_pays.php"><input type="text" style=" width:25% " name=""
                                                                class="btn btn-danger" value="Annuler"/></a></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>