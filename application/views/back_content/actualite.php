<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tags</h3>
                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo str_replace("?", "", site_url('back_ctrl/Actualite_Ctrl/ajout')); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($actus as $actu) { ?>
                                <tr>
                                    <td><?php echo $actu->getId_actu(); ?></td>
                                    <td><?php echo $actu->getTitre(); ?></td>
                                    <td><?php echo $actu->getDate_evenement(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo str_replace("?", "", site_url('back_ctrl/Actualite_Ctrl/modify/' . $actu->getId_actu())); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo str_replace("?", "", site_url('back_ctrl/Actualite_Ctrl/delete/' . $actu->getId_actu())); ?>">
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
