<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo site_url('back_ctrl/Annonce_Ctrl/saveClient') ?>">
                        <div class="box-header">
                            <h3 class="box-title">Ajout client</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/Client') ?>">
                                    <span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Annuler
                                </a>
                                <button class="btn btn-sm btn-primary" id="btn-enregistrer-annonce">
                                    <span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Enregistrer
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nom" class="col-sm-2 control-label">Nom</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nom"  name="nom" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="col-sm-2 control-label">Prenom</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prenom"  name="prenom" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="col-sm-2 control-label">NIC</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nic"  name="nic" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel" class="col-sm-2 control-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tel" name="tel" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="e-mail" name="email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fax" class="col-sm-2 control-label">Fax</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fax" name="fax" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profession" class="col-sm-2 control-label">Profession</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="profession" name="profession" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
