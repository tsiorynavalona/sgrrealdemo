<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/saveStatutType')) ?>">
                        <div class="box-header">
                            <h3 class="box-title">Ajout statut - type</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "",site_url('back_ctrl/Annonce_Ctrl/Menu')) ?>">
                                    <span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Annuler
                                </a>
                                <button class="btn btn-sm btn-primary" id="btn-enregistrer-annonce">
                                    <span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Enregistrer
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="box-body">
                                <h5>Statut - Type</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select class="form-control select2" name="id_statut" style="width: 100%;">
                                            <option selected disabled> Statut</option>
                                            <?php foreach ($statuts as $statut) { ?>
                                                <option value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <select class="form-control select2" name="id_type" style="width: 100%;">
                                            <option selected disabled>Type</option>
                                            <?php foreach ($types as $type) { ?>
                                                <option value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
