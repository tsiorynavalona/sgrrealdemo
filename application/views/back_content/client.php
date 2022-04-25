<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Clients</h3>
                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/Ajout' . $sous_menu_actif)); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Tel</th>
                                <th>Mail</th>
                                <th>Adresse</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($clients as $client) {
                                ?>
                                <tr>
                                    <td><?php echo $client->getId_client(); ?></td>
                                    <td><?php echo $client->getNom(); ?></td>
                                    <td><?php echo $client->getPrenom(); ?></td>
                                    <td><?php echo $client->getTel(); ?></td>
                                    <td><?php echo $client->getEmail(); ?></td>
                                    <td><?php echo $client->getAdresse(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/detail_client/' . $client->getId_client())); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/delete_client/' . $client->getId_client())); ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                            ?>
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
