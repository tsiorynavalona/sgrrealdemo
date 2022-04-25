<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Statut Type immobilier</h3>

                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/Ajout' . $sous_menu_actif)); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>ID Statut</th>
                                <th>ID Type</th>
                                <th>Valeur Statut</th>
                                <th>Valeur Type</th>
                                <th>Menu Order</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($statut_type as $stat_type) { ?>
                                <tr>
                                    <td><?php echo $stat_type->getId_statut_type(); ?></td>
                                    <td><?php echo $stat_type->getId_statut(); ?></td>
                                    <td><?php echo $stat_type->getId_type(); ?></td>
                                    <td><?php echo $stat_type->getVal_statut(); ?></td>
                                    <td><?php echo $stat_type->getVal_type(); ?></td>
                                    <td><?php echo $stat_type->getVal_menu_order(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/detail_statut_type/' . $stat_type->getId_statut_type())); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/delete_statut_type/' . $stat_type->getId_statut_type())); ?>">
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
