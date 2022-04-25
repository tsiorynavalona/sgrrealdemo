<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form class="form-horizontal" method="POST" action="<?php echo site_url('back_ctrl/Annonce_Ctrl/updateDevise') ?>" >
                        <input type="hidden" name="id_devise" value="<?php echo $devise->getId_devise(); ?>"/>
                        <div class="box-header">
                            <h3 class="box-title">Modifier devise</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/Devise'); ?>">
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
                                <h5>Designation</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                FR
                                            </span>
                                            <input type="text" name="val_fr" value="<?php echo $devise->getNom_devise()[1]; ?>" class="form-control"/>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <input type="text" name="val_en" value="<?php echo $devise->getNom_devise()[2]; ?>" class="form-control"/>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                                <h5>Montant</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="montant" value="<?php echo $devise->getMontant_devise(); ?>" name="montant_devise"  placeholder=""/>
                                    </div>
                                </div>
                                <h5>Symbole</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="symbole" name="symbole" value="<?php echo $devise->getSymbole(); ?>" placeholder=""/>
                                    </div>
                                </div>
                                <h5>Affichage symbole a gauche</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label control-label">
                                        <?php if ($devise->getLeft_symbole() == '1') { ?>
                                                   <input name="left_symbole" value="1" class="minimal"  checked type="checkbox"> Oui
                                                       <?php
                                                   } else {
                                                       ?>
                                                <input name="left_symbole" value="1" class="minimal"  type="checkbox"> Oui
                                                <?php
                                            }
                                            ?>
                                        </label>
                                    </div>
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
