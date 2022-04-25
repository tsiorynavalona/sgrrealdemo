<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Estimations bien</h3>
                        <div class="box-tools">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered" id="example2">
						<thead>
                            <tr>
                                <th>Nom et Prenom</th>
                                <th>Email</th>
                                <th>Type bien</th>
                                <th>Localisation</th>
                                <th>Action</th>
                            </tr>
							</thead>
							<tbody>
                            <?php foreach ($estimations as $estimation) { ?>
                                <tr>
                                    <td><?php echo $estimation->getNom_prenom(); ?></td>
                                    <td><?php echo $estimation->getEmail(); ?></td>
                                    <td><?php echo $estimation->getType_bien(); ?></td>
                                    <td><?php echo $estimation->getLocalisation(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo str_replace("?", "", site_url('back_ctrl/Estimationbien/detail/' . $estimation->getId_estimation())); ?>">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo str_replace("?", "", site_url('back_ctrl/Estimationbien/delete/' . $estimation->getId_estimation())); ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
							</tbody>
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
