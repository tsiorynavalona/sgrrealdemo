<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Caracteristiques</h3>
                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/Ajout' . $sous_menu_actif); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
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
                            <?php foreach ($caracteristiques as $car) { ?>
                                <tr>
                                    <td><?php echo $car->getId_car(); ?></td>
                                    <td><?php echo $car->getVal(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/detailCaracteristique/' . $car->getId_car()); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/delete_car/' . $car->getId_car()); ?>">
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
