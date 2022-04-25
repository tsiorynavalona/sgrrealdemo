<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" >
                        <div class="box-header">
                            <h3 class="box-title">Estimation bien</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-primary" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "", site_url('back_ctrl/Estimationbien')) ?>">
                                    <span class="glyphicon glyphicon-backward"></span>&nbsp;Retour
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nom" class="col-sm-2 control-label">Nom complet</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nom"  value="<?php echo $estimation->getNom_prenom() ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="e-mail"  value="<?php echo $estimation->getEmail(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail" class="col-sm-2 control-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="e-mail"  value="<?php echo $estimation->getTel(); ?>" disabled>
                                    </div>
                                </div>    <div class="form-group">
                                    <label for="e-mail" class="col-sm-2 control-label">Fax</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="e-mail" name="email" value="<?php echo $estimation->getFax(); ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="fax" class="col-sm-2 control-label">Type de bien</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fax" value="<?php echo $estimation->getType_bien(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Localisation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo $estimation->getLocalisation(); ?>" disabled >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Surface</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo $estimation->getSurface(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Nombre de pieces</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo $estimation->getNbre_piece(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Remarque</label>
                                    <div class="col-sm-10">
                                        <textarea disabled><?php echo $estimation->getRemarque(); ?></textarea>
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
