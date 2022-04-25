<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo str_replace("?", "",site_url('back_ctrl/Annonce_Ctrl/updateStatutType')) ?>">
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
                                        <input type="hidden" value="<?php echo $statut_type->getId_statut_type(); ?>" name="id_statut_type">

                                        <select class="form-control select2" name="id_statut" style="width: 100%;">
                                            <option selected disabled> Statut</option>
                                            <?php
                                            foreach ($statuts as $statut) {
                                                if ($statut->getId_statut() == $statut_type->getId_statut()) {
                                                    ?>
                                                    <option selected value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <select class="form-control select2" name="id_type" style="width: 100%;">
                                            <option selected disabled>Type</option>
                                            <?php
                                            foreach ($types as $typ) {
                                                if ($typ->getId_type() == $statut_type->getId_type()) {
                                                    ?>
                                                    <option selected value="<?php echo $typ->getId_type(); ?>"><?php echo $typ->getVal(); ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $typ->getId_type(); ?>"><?php echo $typ->getVal(); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
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
