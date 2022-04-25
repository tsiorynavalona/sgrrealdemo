<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo site_url('back_ctrl/Annonce_Ctrl/updateSousregion') ?>">
                        <input type="hidden" name="id_sousregion" value="<?php echo $sousregion->getId_sousregion(); ?>" >
                        <div class="box-header">
                            <h3 class="box-title">Modifier sous-region</h3>
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
                                        <input type="text" name="val_fr" value="<?php echo $sousregion->getVal()[1]; ?>" class="form-control">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            EN
                                        </span>
                                        <input type="text" name="val_en" value="<?php echo $sousregion->getVal()[2]; ?>" class="form-control">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <h5>Region</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="form-control select2" name="id_region" style="width: 100%;">
                                        <?php
                                        foreach ($regions as $region) {
                                            if ($region->getId_region() == $sousregion->getRegion()->getId_region()) {
                                                ?>
                                                <option selected value="<?php echo $region->getId_region(); ?>"><?php echo $region->getVal(); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $region->getId_region(); ?>"><?php echo $region->getVal(); ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
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
