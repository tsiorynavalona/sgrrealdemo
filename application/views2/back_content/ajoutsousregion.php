<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo site_url('back_ctrl/Annonce_Ctrl/saveSousregion') ?>">
                        <div class="box-header">
                            <h3 class="box-title">Ajout sous-region</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/Lieu') ?>">
                                    <span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Annuler
                                </a>
                                <button class="btn btn-sm btn-primary" id="btn-enregistrer-annonce">
                                    <span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Enregistrer
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <h5>Designation</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            FR
                                        </span>
                                        <input type="text" name="val_fr" class="form-control">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            EN
                                        </span>
                                        <input type="text" name="val_en" class="form-control">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <h5>Region</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="form-control select2" name="id_region" style="width: 100%;">
                                        <option selected disabled></option>
                                        <?php foreach ($regions as $region) { ?>
                                            <option value="<?php echo $region->getId_region(); ?>"><?php echo $region->getVal(); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
