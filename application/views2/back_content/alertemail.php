<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Alert email</h3>
                        <div class="box-tools">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Nom et Prenom</th>
                                <th>Email</th>
                                <th>Type bien</th>
                                <th>Statut</th>
                                <th>Localisation</th>
                                <th>Prix min</th>
                                <th>Prix max</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($alertes as $alerte) { ?>
                                <tr>
                                    <td><?php echo $alerte->getNom_prenom(); ?></td>
                                    <td><?php echo $alerte->getEmail(); ?></td>
                                    <td><?php echo $alerte->getType_bien()->getVal(); ?></td>
                                    <td><?php echo $alerte->getStatut()->getVal(); ?></td>
                                    <td><?php echo $alerte->getSous_region()->getVal(); ?></td>
                                    <td><?php echo $alerte->getPrix_min(); ?></td>
                                    <td><?php echo $alerte->getPrix_max(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('back_ctrl/Alertemail/detail/' . $alerte->getId_alerte()); ?>">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo site_url('back_ctrl/Alertemail/delete/' . $alerte->getId_alerte()); ?>">
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
