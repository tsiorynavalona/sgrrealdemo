<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Region</h3>
                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/AjoutRegion'); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($regions as $region) { ?>
                                <tr>
                                    <td><?php echo $region->getId_region(); ?></td>
                                    <td><?php echo $region->getVal(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/detail_region/' . $region->getId_region()); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/delete_region/' . $region->getId_region()); ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sous - region</h3>
                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/AjoutSousregion'); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Designation</th>
                                <th>Region</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($sousregions as $sousregion) { ?>
                                <tr>
                                    <td><?php echo $sousregion->getId_sousregion(); ?></td>
                                    <td><?php echo $sousregion->getVal(); ?></td>
                                    <td><?php echo $sousregion->getRegion()->getVal(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/detail_sousregion/' . $sousregion->getId_sousregion()); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/delete_sousregion/' . $sousregion->getId_sousregion()); ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
