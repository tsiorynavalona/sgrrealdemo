<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/updateAgent')) ?>">
                        <input type="hidden" class="form-control" name="id_agent" value="<?php echo $agent->getId_agent(); ?>">
                        <div class="box-header">
                            <h3 class="box-title">Modifier agent</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/Agent')) ?>">
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
                                        <input type="text" class="form-control" value="<?php echo $agent->getNom(); ?>" name="nom" id="nom" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="col-sm-2 control-label">Prenom</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $agent->getPrenom(); ?>" name="prenom" id="prenom" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel" class="col-sm-2 control-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tel" value="<?php echo $agent->getTel(); ?>" id="tel" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="<?php echo $agent->getEmail(); ?>" id="email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label">Photo</label>
                                    <div class="col-sm-10">
                                        <img src="<?php echo base_url('assets/images/' . $agent->getImage()->getNom_image()); ?>" class="img img-responsive"/>
                                        <input type="file" class="form-control" name="image">
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
