<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form method="POST" enctype="multipart/form-data"  action="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/update_annonce')) ?>" >
                        <input type="hidden" name="id_ann" value="<?php echo $annonce->getId_ann(); ?>" class="form-control">
                        <div class="box-header">
                            <h3 class="box-title">Modifier annonce</h3>
                            <div class="box-tools">
                                <a class="btn btn-sm btn-danger" id="btn-annuler-modification-annonce" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl')) ?>">
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
                                            <input type="text" required name="titre_fr" value="<?php echo $annonce->getTitre_annonce(); ?>" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <input type="text" required name="titre_en" value="<?php echo $annonce->getTitre_annonce_en(); ?>"  class="form-control">
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
                                            <textarea type="text" required name="desc_fr" class="form-control" ><?php echo $annonce->getDescription_annonce(); ?>
                                            </textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                EN
                                            </span>
                                            <textarea type="text" required name="desc_en" class="form-control"><?php echo $annonce->getDescription_annonce_en(); ?></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Type bien*</h5>
                                        <select class="form-control select2" required name="id_type" style="width: 100%;">
                                            <?php
                                            foreach ($types as $type) {
                                                if ($type->getId_type() == $annonce->getType()->getId_type()) {
                                                    ?>
                                                    <option selected value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Reference bien*</h5>
                                        <input type="text" required value="<?php echo $annonce->getReference(); ?>" name="reference" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Prix*</h5>
                                        <div class="input-group" style="width:100%;">
                                        
                                        	<select name="id_devise" style="float:left; height:34px;">
                                                <?php
                                                foreach ($devises as $devise) {
                                                    if ($devise->getId_devise() == $annonce->getDevise()->getId_devise()) {
                                                        ?>
                                                        <option selected value="<?php echo $devise->getId_devise(); ?>"><?php echo $devise->getSymbole(); ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $devise->getId_devise(); ?>"><?php echo $devise->getSymbole(); ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        
                                            <input type="text" required name="prix" value="<?php echo $annonce->getPrix(); ?>" class="form-control" style="width:75%; float:left;">
                                            
                                            <?php if ($annonce->getPar_mois() == 1) { ?>
                                                <input type="checkbox" checked name="par_mois" value="1" class="minimal" style="margin-top:10px; margin-left:5px;"> Par mois
                                            <?php } else {
                                                ?>
                                                <input type="checkbox" name="par_mois" value="1" class="minimal" style="margin-top:10px; margin-left:5px;"> Par mois
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <h5>Image principal*</h5>

                                        <?php if ($annonce->getImagePrincipal() == '') { ?>
                                            <input type="file" name="image" required/>
                                        <?php } else {
                                            ?>
                                            <img class="img" src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>" />
                                            <a class="btn btn-sm btn-danger" href="javascript:del_img('<?php echo $annonce->getId_ann(); ?>')">Supprimer</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Adresse propriete*</h5>
                                        <input type="text" required name="adresse" value="<?php echo $annonce->getAdresse_propriete(); ?>" class="form-control">
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
                                                            if ($sousregion->getId_sousregion() == $annonce->getSousregion()->getId_sousregion()) {
                                                                ?>
                                                                <option selected value="<?php echo $sousregion->getId_sousregion(); ?>"><?php echo $sousregion->getVal(); ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $sousregion->getId_sousregion(); ?>"><?php echo $sousregion->getVal(); ?></option>

                                                                <?php
                                                            }
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
                                        <select class="form-control select2" style="width: 100%;" name="id_agent">
                                            <option selected></option>
                                            <?php
                                            foreach ($agents as $agent) {
                                                if ($annonce->getAgent() != null && $agent->getId_agent() == $annonce->getAgent()->getId_agent()) {
                                                    ?>
                                                    <option selected value="<?php echo $agent->getId_agent(); ?>"><?php echo $agent->getNom() . " " . $agent->getPrenom(); ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $agent->getId_agent(); ?>"><?php echo $agent->getNom() . " " . $agent->getPrenom(); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Client</h5>
                                        <select class="form-control select2" style="width: 100%;" name='id_client' multiple="">
                                            <?php
                                            $clients_ann = $annonce->getClients();

                                            foreach ($clients as $client) {
                                                $not_client = true;
                                                foreach ($clients_ann as $client_ann) {
                                                    if ($client->getId_client() == $client_ann->getId_client()) {
                                                        ?>
                                                        <option selected value="<?php echo $client->getId_client(); ?>"><?php echo $client->getPrenom() . " " . $client->getNom(); ?></option>
                                                        <?php
                                                        $not_client = false;
                                                        break;
                                                    }
                                                }
                                                if ($not_client) {
                                                    ?>
                                                    <option value="<?php echo $client->getId_client(); ?>"><?php echo $client->getPrenom() . " " . $client->getNom(); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Tags</h5>
                                        <select name="id_tag" class="form-control select2" style="width: 100%;">
                                            <option selected ></option>
                                            <?php
                                            foreach ($tags as $tag) {
                                                if ($annonce->getTag() != null && $tag->getId_tag() == $annonce->getTag()->getId_tag()) {
                                                    ?>
                                                    <option selected value="<?php echo $tag->getId_tag(); ?>" > <?php echo $tag->getVal(); ?> </option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $tag->getId_tag(); ?>" > <?php echo $tag->getVal(); ?> </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Statut*</h5>
                                        <select class="form-control select2"  name="id_statut" style="width: 100%;" required>
                                            <option selected disabled></option>
                                            <?php
                                            foreach ($statuts as $statut) {
                                                if ($statut->getId_statut() == $annonce->getStatut()->getId_statut()) {
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

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Contrat*  </h5>
                                        <input required name="exclusivite" value="1" type="radio" <?php if ($annonce->getExclusivite() == "1") echo "checked"; ?> /> avec exclusivite
                                        <input required name="exclusivite" value="0" type="radio" <?php if ($annonce->getExclusivite() == "0") echo "checked"; ?> /> sans exclusivite
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Contract transcrit et enregistre le </h5>
                                        <input type="date" class="form-control" value="<?php echo $annonce->getDate_contrat(); ?>" name="date_contrat"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Mandat signe le </h5>
                                        <input type="date" class="form-control"  value="<?php echo $annonce->getDate_mandat(); ?>" name="date_mandat"/>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <h5>Caractéristiques</h5>
                                        <?php
                                        foreach ($caracteristiques as $car) {
                                            ?>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <?php echo $car->getVal(); ?>
                                                </span>
                                                <input type="hidden" name="id_car[]" value=" <?php echo $car->getId_car(); ?>" class="form-control">
                                                <input type="text" name="val_car[]" value="<?php echo $this->Annonce_Model->getCar($annonce, $car->getVal(), 'french'); ?>" class="form-control">
                                            </div>
                                        <?php }
										$ct = 0;
                                        ?>
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
                                                        <input type="text" name="val_icone[]" value="<?php echo $this->Annonce_Model->getIcone($annonce, $icone->getNom_icone()); ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 ">
                                                    <?php
													
													
													 if ($icone->getNom_icone() == 'Surface terrain' || $icone->getNom_icone() == 'Surface habitable') { 
													 	if($ct == 0){
															$ct++;
															
													
															?>
															<select class="form-control select2" style="width: 100%;" name='id_mesure' >
                                                            <option selected></option>
															<?php foreach ($mesures as $mesure) { 
																$selt = '';
																if($annonce->getMeasure_Terrin() == $mesure->getId_mesure()){
																	$selt = 'selected="selected"';
																	
																}
																?>
                                                                <option <?php echo $selt; ?> value="<?php echo $mesure->getId_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                                                            <?php } 
														}else{
															?>
															<select class="form-control select2" style="width: 100%;" name='id_mesure2' >
                                                            <option selected></option>
															<?php foreach ($mesures as $mesure) {
																$selt = '';
																if($annonce->getMeasure_Habit() == $mesure->getId_mesure()){
																	$selt = 'selected="selected"';
																	
																}
																 ?>
                                                                <option <?php echo $selt; ?> value="<?php echo $mesure->getId_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                                                            <?php } 
														}
													 ?>
                                                        
                                                            
                                                            <?php 
															/*
															if ($icone->getMesure() != null) { ?>
                                                                <option selected value="<?php echo $icone->getMesure()->getId_mesure(); ?>"><?php echo $icone->getMesure()->getNom_mesure(); ?></option>
                                                            <?php } 
															
															?>
                                                            <?php foreach ($mesures as $mesure) { ?>
                                                                <option value="<?php echo $mesure->getId_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                                                            <?php }
															*/ 
															?>
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
                                        <input type="text" name="url" value="<?php echo $annonce->getVideo_url(); ?>" class='form-control'>
                                    </div>

                                    <div class="col-lg-6">
                                        <h5>Images Diapo (15 max)</h5>
                                        <?php
                                        $images = $annonce->getImages();
                                        foreach ($images as $img) {
                                            ?>
                                            <div  style="margin-bottom: 10px">
                                                <img  class="img" src="<?php echo base_url('assets/images/' . $img->getNom_image()); ?>" />
                                                <a class="btn btn-sm btn-danger" href="javascript:del_img('<?php echo $annonce->getId_ann(); ?>','<?php echo $img->getId_image(); ?>')">Supprimer</a>
                                            </div>
                                            <?php
                                        }
                                        if (count($images) < 15) {
                                            ?>
                                            <input type="file" name="userfile[]" multiple="multiple" id="userfile" class="form-control" >
                                        <?php }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Coordonnées Google Map</h5>
                                        <?php
                                        $map = explode(',', $annonce->getGoogle_map());
                                        $lat = '';
                                        $long = '';
                                        if (count($map) == 2) {
                                            $lat = $map[0];
                                            $long = $map[1];
                                        }
                                        ?>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Latitude
                                            </span>
                                            <input type="text" value="<?php echo $lat; ?>" name="lat" class='form-control'>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Longitude
                                            </span>
                                            <input type="text" value="<?php echo $long; ?>" name="long" class='form-control'>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Mettre en premiere</h5>
                                        <label class="col-sm-4 control-label">
                                            <?php if ($annonce->getIs_featuredproperty() == 1) { ?>
                                                <input type="checkbox" checked name="is_propertyfeatured" value="1" class="minimal"> Oui
                                            <?php } else {
                                                ?>
                                                <input type="checkbox" name="is_propertyfeatured" value="1" class="minimal"> Oui
                                                <?php
                                            }
                                            ?>
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
    function del_img(id_ann, id_image) {
        if (id_ann !== 'undefined' && id_image !== 'undefined') {
            //requete ajax delete image_annonce
            $.ajax({
                url: '<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl')); ?>/del_image_annonce/1',
                type: 'POST',
                dataType: 'html', // On désire recevoir du HTML
                data: {id_ann: id_ann, id_image: id_image},
                success: function (code_html, statut) { // code_html contient le HTML renvoyé
                    location.reload();
                }
            });
        }
        if (id_ann !== 'undefined') {
            //requete ajax update annonce set imagePrincipal ""
            $.ajax({
                url: '<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl')); ?>/del_image_principal/1',
                type: 'POST',
                dataType: 'html', // On désire recevoir du HTML
                data: {id_ann: id_ann},
                success: function (code_html, statut) { // code_html contient le HTML renvoyé
                    location.reload();
                }
            });
        }
    }
</script>

<style>

    .img{
        width: 50%;
        height: 50%;

    }
</style>