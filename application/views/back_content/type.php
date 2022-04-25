<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Type immobilier</h3>

                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/Ajout' . $sous_menu_actif)); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
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
                            <?php foreach ($types as $type) { ?>
                                <tr>
                                    <td><?php echo $type->getId_type(); ?></td>
                                    <td><?php echo $type->getVal(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/detail_type/' . $type->getId_type())); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/delete_type/' . $type->getId_type())); ?>">
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
