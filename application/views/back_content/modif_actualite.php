<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo str_replace("?", "", site_url('back_ctrl/Actualite_Ctrl/updateActu')) ?>" >
                        <input type="hidden" name="id_actu" value="<?php echo $actu->getId_actu(); ?>">
                        <div class="box-header">
                            <h3 class="box-title">Modifier actualité</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "", site_url('back_ctrl/Actualite_Ctrl')) ?>">
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
                                <h5>Titre</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                FR
                                            </span>
                                            <input type="text" name="titre_fr" value="<?php echo $actu->getTitre()[1]; ?>" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <input type="text" name="titre_en" value="<?php echo $actu->getTitre()[2]; ?>" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                                <h5>Description</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                FR
                                            </span>
                                            <textarea  name="desc_fr"  class="form-control"><?php echo $actu->getDescription()[1]; ?></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <textarea  name="desc_en" class="form-control"><?php echo $actu->getDescription()[2]; ?></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                                <h5>Date</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="date" name="date" value="<?php echo $actu->getDate_evenement(); ?>" class="form-control">
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                                <h5>Image</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/' . $actu->getImage()->getNom_image()); ?>" />
                                        <input type="file" class="form-control" name="image">
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

<script></script>