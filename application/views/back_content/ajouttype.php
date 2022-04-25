<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/saveType')) ?>">
                        <div class="box-header">
                            <h3 class="box-title">Ajout type immobilier</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/Type')) ?>">
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
                                <h5>Designation</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                FR
                                            </span>
                                            <input name="val_fr" type="text" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <input name="val_en" type="text" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
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
