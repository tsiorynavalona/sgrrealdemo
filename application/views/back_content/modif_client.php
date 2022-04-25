<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/updateClient')) ?>">
                        <input type="hidden" class="form-control" id="id_client"  name="id_client" value="<?php echo $client->getId_client(); ?>">
                        <div class="box-header">
                            <h3 class="box-title">Modifier client</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/Client')) ?>">
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
                                        <input type="text" class="form-control" id="nom"  value="<?php echo $client->getNom(); ?> " name="nom" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="col-sm-2 control-label">Prenom</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prenom" value="<?php echo $client->getPrenom(); ?>" name="prenom" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="col-sm-2 control-label">NIC</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nic"  name="nic" value="<?php echo $client->getNic(); ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel" class="col-sm-2 control-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $client->getTel(); ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="e-mail" name="email" value="<?php echo $client->getEmail(); ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fax" class="col-sm-2 control-label">Fax</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fax" name="fax" value="<?php echo $client->getFax(); ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profession" class="col-sm-2 control-label">Profession</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $client->getProfession(); ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $client->getAdresse(); ?>" placeholder="">
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
