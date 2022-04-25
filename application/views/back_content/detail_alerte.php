<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" >
                        <div class="box-header">
                            <h3 class="box-title">Alerte email</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-primary" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "", site_url('back_ctrl/Alertemail')) ?>">
                                    <span class="glyphicon glyphicon-backward"></span>&nbsp;Retour
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nom" class="col-sm-2 control-label">Nom</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nom"  name="nom" value="<?php echo $alerte->getNom_prenom() ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="e-mail" name="email" value="<?php echo $alerte->getEmail(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fax" class="col-sm-2 control-label">Type de bien</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="fax" value="<?php echo $alerte->getType_bien()->getVal(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profession" class="col-sm-2 control-label">Statut</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="profession" value="<?php echo $alerte->getStatut()->getVal(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Localisation</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo $alerte->getSous_region()->getVal(); ?>" disabled >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Surface minimum</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo (int) $alerte->getSurf_min(); ?>" disabled>
                                    </div>
                                    <label class="col-sm-1">m2</label>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Surface maximum</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo (int) $alerte->getSurf_max(); ?>" disabled>
                                    </div>
                                    <label class="col-sm-1">m2</label>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Nombre de pieces</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo $alerte->getNbre_piece(); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Prix minimum</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo (int) $alerte->getPrix_min(); ?>" disabled>
                                    </div>
                                    <label class="col-sm-1">MUR</label>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Prix maximum</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="adresse" value="<?php echo (int) $alerte->getPrix_max(); ?>" disabled>
                                    </div>
                                    <label class="col-sm-1">MUR</label>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Remarque</label>
                                    <div class="col-sm-4">
                                        <textarea disabled><?php echo $alerte->getRemarque(); ?></textarea>
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
