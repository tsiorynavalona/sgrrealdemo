<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form method="POST" enctype="multipart/form-data"  action="<?php echo site_url('back_ctrl/Annonce_Ctrl/save_annonce') ?>" >
                        <div class="box-header">
                            <h3 class="box-title">Ajout annonce</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo site_url('back_ctrl/Annonce_Ctrl') ?>">
                                    <span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Annuler
                                </a>
                                <button class="btn btn-sm btn-primary" id="btn-enregistrer-annonce" type="submit">
                                    <span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Enregistrer
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="box-body">
                                <h5>Titre annonce*</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                FR
                                            </span>
                                            <input type="text" name="titre_fr" class="form-control" required>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <input type="text" name="titre_en" class="form-control" required>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>

                                <h5>Description*</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                FR
                                            </span>
                                            <textarea   rows="11"  type="text" name="desc_fr" class="form-control" required></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <textarea rows="11" type="text" name="desc_en"  class="form-control" required></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Type bien*</h5>
                                        <select class="form-control select2"  name="id_type" style="width: 100%;" required>
                                            <option selected disabled=""></option>
                                            <?php foreach ($types as $type) { ?>
                                                <option value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Reference bien*</h5>
                                        <input type="text"  name="reference" class="form-control" required>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Prix*</h5>
                                        <div class="input-group" style="width:100%;">
                                            
                                            <select name="id_devise"  required style="float:left; height:34px;">
                                                <option value="" selected disabled >Devise</option>
                                                <?php foreach ($devises as $devise) { ?>
                                                    <option value="<?php echo $devise->getId_devise(); ?>"><?php echo $devise->getSymbole(); ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="text" name="prix" class="form-control" required  style="width:70%; float:left;">
                                            <input  type="checkbox" value="1" name="par_mois" style="margin-top:10px; margin-left:5px;" /> Par mois
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <h5>Image principal*</h5>
                                        <input type="file" value="1" name="image" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Adresse propriete*</h5>
                                        <input type="text" name="adresse" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Localisation*</h5>
                                        <select class="form-control select2" name="id_sousregion" style="width: 100%;" required>
                                            <option selected disabled></option>
                                            <?php foreach ($regions as $region) { ?>
                                                <optgroup label="<?php echo $region->getVal(); ?>">
                                                    <?php
                                                    foreach ($sousregions as $sousregion) {
                                                        $reg = $sousregion->getRegion();
                                                        if ($reg->getId_region() == $region->getId_region()) {
                                                            ?>
                                                            <option value="<?php echo $sousregion->getId_sousregion(); ?>"><?php echo $sousregion->getVal(); ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </optgroup>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Agent</h5>
                                        <select class="form-control select2" style="width: 100%;" name="id_agent" >
                                            <option selected></option>
                                            <?php foreach ($agents as $agent) { ?>
                                                <option value="<?php echo $agent->getId_agent(); ?>"><?php echo $agent->getNom() . " " . $agent->getPrenom(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Client</h5>
                                        <select class="form-control select2" style="width: 100%;" name='id_client[]' multiple="" >
                                            <?php foreach ($clients as $client) { ?>
                                                <option value="<?php echo $client->getId_client(); ?>"><?php echo $client->getPrenom() . " " . $client->getNom(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Tags</h5>
                                        <select name="id_tag" class="form-control select2" style="width: 100%;">
                                            <option selected ></option>
                                            <?php foreach ($tags as $tag) { ?>
                                                <option value="<?php echo $tag->getId_tag(); ?>" > <?php echo $tag->getVal(); ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Statut*</h5>
                                        <select class="form-control select2"  name="id_statut" style="width: 100%;" required>
                                            <option selected disabled></option>
                                            <?php foreach ($statuts as $statut) { ?>
                                                <option value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Contrat*  </h5>
                                        <input required name="exclusivite" value="1" type="radio"/> avec exclusivite
                                        <input required name="exclusivite" value="0" type="radio"/> sans exclusivite
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Contract transcrit et enregistre le </h5>
                                        <input type="date" class="form-control" name="date_contrat"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Mandat signe le  </h5>
                                        <input type="date" class="form-control" name="date_mandat"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Caractéristiques</h5>
                                        <?php foreach ($caracteristiques as $car) { ?>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <?php echo $car->getVal(); ?>
                                                </span>
                                                <input type="hidden" name="id_car[]" value=" <?php echo $car->getId_car(); ?>" class="form-control">
                                                <input type="text" name="val_car[]" class="form-control">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Icones</h5>
                                        <?php foreach ($icones as $icone) { ?>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <?php echo $icone->getNom_icone(); ?>
                                                        </span>
                                                        <input type="hidden" name="id_icone[]" value=" <?php echo $icone->getId_icone(); ?>" class="form-control">
                                                        <input type="text" name="val_icone[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php if ($icone->getNom_icone() == 'Surface terrain' || $icone->getNom_icone() == 'Surface habitable') { ?>
                                                        <select class="form-control select2" style="width: 100%;" name='id_mesure' >
                                                            <option selected></option>
                                                            <?php foreach ($mesures as $mesure) { ?>
                                                                <option value="<?php echo $mesure->getId_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>URL video</h5>
                                        <input type="text" name="url" class='form-control'>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Images Diapo (15 max)</h5>
                                        <input type="file" name="userfile[]" multiple="multiple" id="userfile" class="form-control" >

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Coordonnées Google Map</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Latitude
                                            </span>
                                            <input type="text" name="lat" class='form-control'>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Longitude
                                            </span>
                                            <input type="text" name="long" class='form-control'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Mettre en premiere</h5>
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" name="is_propertyfeatured" value="1" class="minimal"> Oui
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">

    $("#userfile").on("change", function () {
        if ($("#userfile")[0].files.length > 15) {
            alert("You can select only 15 images");
            $("userfile").val("");
        } else {
            $("#userfile").submit();
        }
    });
</script>