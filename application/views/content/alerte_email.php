<style>
	.input-custom{
height:unset;
}

.marg-top-20{
margin-top:-20px;
}

</style>
<div class="container">
    <div class="main-container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="echantillon2">
                    <div class="div-title">Alerte Email</div>
                    <?php if (isset($msg)) { ?>
                        <div class="alert alert-success">
                            <?php echo $msg; ?>
                        </div>
                    <?php } else if (isset($error)) {
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <p<?php echo $text_intro; ?>
                </p>
                <form method="POST" action="<?php echo str_replace("?", "", site_url('Alerte_email/envoyer')) ?>">
                    <div class="form">
                        <h4><?php echo $info_perso; ?></h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5><?php echo $nom_label ?>*</h5>
                                <input type="text" required name="nom" value="<?php echo $prenom . " " . $nom; ?>" class="input-custom">
                                <input type="hidden" required name="prenom" value="<?php echo $prenom; ?>" class="input-custom">
                            </div>
                            <div class="col-sm-6">
                                <h5>Email*</h5>
                                <input type="email" required name="email" value="<?php echo $email; ?>" class="input-custom">
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <h4><?php echo $votre_slerte; ?></h4>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <h5><?php echo $select_type; ?>*</h5>
                                <div class="select">
                                    <select name="statut" required>
                                        <option disabled selected></option>
                                        <?php foreach ($statuts as $statut) { ?>
                                            <option value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h5><?php echo $select_type_bien; ?>*</h5>
                                <div class="select">
                                    <select name="type" required>
                                        <option disabled selected></option>
                                        <?php foreach ($types as $type) { ?>
                                            <option value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <h5><?php echo $sur_min; ?> (m2)*</h5>
                                <input name="surf_min" type="number" class="input-custom" required>
                            </div>
                            <div class="col-sm-6">
                                <h5><?php echo $sur_max; ?>  (m2) *</h5>
                                <input name="surf_max"  type="number" class="input-custom"required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <h5><?php echo $nb_piece; ?></h5>
                                <input type="nomber" name="nbre_piece"  class="input-custom">
                            </div>
                            <div class="col-sm-6">
                                <h5><?php echo $select_ville . "*"; ?></h5>
                                <div class="select" >
                                    <select name="sous_region" style="width: 100%;" required>
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
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <h5><?php echo $prix_min; ?> (Rs)</h5>
                                <input name="prix_min" type="number" class="input-custom">
                            </div>
                            <div class="col-sm-6">
                                <h5><?php echo $prix_max; ?> (Rs)</h5>
                                <input name="prix_max" type="number" class="input-custom">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h5><?php echo $your_msg; ?></h5>
                                <textarea name="remarque"  class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <p>* <?php echo $Champs_obligatoires; ?></p>
                    <button class='btn btn-bleu' type="submit" > <?php echo $envoyer; ?> </button>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-12  col-lg-3" >
            <div class="block">
                <form action='<?php echo site_url(); ?>index.php/quickSearch'>
                    <div class="fond-bleu">
                        <h4><?php echo $recherche_rapide; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <input type='hidden' value="1" name="qsearch"/>
                        <input placeholder="<?php echo $reference; ?>" type='text' class='form-control right-form' name="reference"/>
                        <br>
                        <select class='form-control right-form' name="id_statut" id="id_statut">
                            <option disabled selected value=""><?php echo $type_de_transaction; ?></option>
                            <?php foreach ($statuts as $statut) { ?>
                                <option value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <select class='form-control right-form' name="id_type" id="id_type">
                            <option disabled selected value=""><?php echo $type_de_bien; ?></option>
                            <?php foreach ($types as $type) { ?>
                                <option value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <select  class='form-control right-form' name="id_sousregion" id="id_region">
                            <option disabled selected value=""><?php echo $region_label; ?></option>
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
                        <br>
                        <button class='btn btn-bleu' type="submit" ><?php echo $rechercher; ?> </button>
                    </div>
                </form>
            </div>
            <?php
            if (!empty($annonces_premieres)) {
                $annonce = $annonces_premieres[0];
                $sousregion = $annonce->getSousregion();
                $icones = $annonce->getIcones();
                $nombre_piece = $this->Annonce_Model->getCar($annonce, "Nombre de pieces", 'French');
                $devise = $annonce->getDevise();
                $href = site_url() .  $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();
                ?>
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $annonce_vedette; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="annonce item active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo $href; ?>"> <img src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>" alt="<?php echo $annonce->getTitre_annonce(); ?>" style="width:100%;"/></a>
                                            <br/>
                                            <label class="type-bien-place"><?php echo $annonce->getType()->getVal(); ?>label</label> - <?php echo $annonce->getStatut()->getVal(); ?>
                                            <br/>
                                            <?php echo $sousregion->getRegion()->getVal(); ?>, <?php echo $sousregion->getVal(); ?>
                                            <?php
                                            if (!empty($icones)) {
                                                ?>
                                                <br/>
                                                <?php
                                                foreach ($icones as $icone) {
                                                    $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                    ?>
                                                    <i class="<?php echo $icone->getVal(); ?>"></i> &nbsp; <?php
                                                    echo $icone->getVal_icone();
                                                    echo " " . $mes;
                                                    ?> &nbsp;
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php if ($nombre_piece != "") { ?>
                                                <br/>
                                                Nombres pieces : <?php echo $nombre_piece; ?>

                                                <br/>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if ($devise->getLeft_symbole() == "1") { ?>
                                                <label class="type-bien-place"><?php
                                                    echo $devise->getSymbole() . " " . $annonce->getPrix();
                                                    if ($annonce->getPar_mois()) {
                                                        ?> / <?php
                                                        echo $mois;
                                                    }
                                                    ?> </label>
                                            <?php } else {
                                                ?>
                                                <label class="type-bien-place"><?php
                                                    echo $annonce->getPrix() . " " . $devise->getSymbole();
                                                    if ($annonce->getPar_mois()) {
                                                        ?> / <?php
                                                        echo $mois;
                                                    }
                                                    ?></label>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <a class='btn btn-bleu' href="<?php echo $href; ?>" > + <?php echo $more; ?> </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-1">
                                        <a class="carousel-control" href="#myCarousel3" role="button" data-slide="prev"><span class="fa fa-angle-left"></span></a>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-1">
                                        <a class="carousel-control" href="#myCarousel3" role="button" data-slide="next"><span class="fa fa-angle-right"></span></a>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                                <?php
                                for ($i = 1; $i < count($annonces_premieres); $i++) {
                                    $annonce = $annonces_premieres[$i];
                                    $sousregion = $annonce->getSousregion();
                                    $icones = $annonce->getIcones();
                                    $nombre_piece = $this->Annonce_Model->getCar($annonce, "Nombre de pieces", 'French');
                                    $devise = $annonce->getDevise();
                                    $href = site_url() . $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();
                                    ?>
                                    <div class="annonce item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="<?php echo $href; ?>"> <img src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>" alt="<?php echo $annonce->getTitre_annonce(); ?>" style="width:100%;"/></a>
                                                <br/>
                                                <label class="type-bien-place"><?php echo $annonce->getType()->getVal(); ?></label> - <?php echo $annonce->getStatut()->getVal(); ?>
                                                <br/>
                                                <?php echo $sousregion->getRegion()->getVal(); ?>, <?php echo $sousregion->getVal(); ?>
                                                <?php
                                                if (!empty($icones)) {
                                                    ?>
                                                    <br/>
                                                    <?php
                                                    foreach ($icones as $icone) {
                                                        $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                        ?>
                                                        <i class="<?php echo $icone->getVal(); ?>"></i> &nbsp; <?php
                                                        echo $icone->getVal_icone();
                                                        echo " " . $mes
                                                        ?> &nbsp;
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php if ($nombre_piece != "") { ?>
                                                    <br/>
                                                    Nombres pieces : <?php echo $nombre_piece; ?>

                                                    <br/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if ($devise->getLeft_symbole() == "1") { ?>
                                                    <label class="type-bien-place"><?php
                                                        echo $devise->getSymbole() . " " . $annonce->getPrix();
                                                        if ($annonce->getPar_mois()) {
                                                            ?> /  <?php
                                                            echo $mois;
                                                        }
                                                        ?> </label>
                                                <?php } else {
                                                    ?>
                                                    <label class="type-bien-place"><?php
                                                        echo $annonce->getPrix() . " " . $devise->getSymbole();
                                                        if ($annonce->getPar_mois()) {
                                                            ?> /  <?php
                                                            echo $mois;
                                                        }
                                                        ?>
                                                    </label>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <a class='btn btn-bleu' href="<?php echo $href; ?>"> + <?php echo $more; ?> </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-1">
                                            <a class="carousel-control" href="#myCarousel3" role="button" data-slide="prev"><span class="fa fa-angle-left"></span></a>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1">
                                            <a class="carousel-control" href="#myCarousel3" role="button" data-slide="next"><span class="fa fa-angle-right"></span></a>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
            }
            if (!empty($annonces_nouveaute)) {
                $new = $annonces_nouveaute[0];
				$annonce = $annonces_nouveaute[0];
                $sousregion = $new->getSousregion();
                $icones = $new->getIcones();
                $nombre_piece = $this->Annonce_Model->getCar($new, "Nombre de pieces", 'French');
                $devise = $new->getDevise();
                $href = site_url() .  $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();
                ?>
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $nouveaute; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <div id="myCarousel4" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="annonce item active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo $href; ?>"> <img src="<?php echo base_url('assets/images/' . $new->getImagePrincipal()); ?>" alt="<?php echo $new->getTitre_annonce(); ?>" style="width:100%;"/></a>
                                            <br/>
                                            <label class="type-bien-place"><?php echo $new->getType()->getVal(); ?></label> - <?php echo $new->getStatut()->getVal(); ?>
                                            <br/>
                                            <?php echo $sousregion->getRegion()->getVal(); ?>, <?php echo $sousregion->getVal(); ?>
                                            <?php
                                            if (!empty($icones)) {
                                                ?>
                                                <br/>
                                                <?php
                                                foreach ($icones as $icone) {
                                                    $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                    ?>
                                                    <i class="<?php echo $icone->getVal(); ?>"></i> &nbsp; <?php
                                                    echo $icone->getVal_icone();
                                                    echo " " . $mes;
                                                    ?> &nbsp;
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php if ($nombre_piece != "") { ?>
                                                <br/>
                                                Nombres pieces : <?php echo $nombre_piece; ?>

                                                <br/>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if ($devise->getLeft_symbole() == "1") { ?>
                                                <label class="type-bien-place"><?php
                                                    echo $devise->getSymbole() . " " . $new->getPrix();
                                                    if ($new->getPar_mois()) {
                                                        ?> /  <?php
                                                        echo $mois;
                                                    }
                                                    ?> </label>
                                            <?php } else {
                                                ?>
                                                <label class="type-bien-place"><?php
                                                    echo $new->getPrix() . " " . $devise->getSymbole();
                                                    if ($new->getPar_mois()) {
                                                        ?> /  <?php
                                                        echo $mois;
                                                    }
                                                    ?> </label>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <a class='btn btn-bleu' href="<?php echo $href; ?>"> + <?php echo $more; ?> </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-1">
                                        <a class="carousel-control" href="#myCarousel4" role="button" data-slide="prev"><span class="fa fa-angle-left"></span></a>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-1">
                                        <a class="carousel-control" href="#myCarousel4" role="button" data-slide="next"><span class="fa fa-angle-right"></span></a>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                                <?php
                                for ($i = 1; $i < count($annonces_nouveaute); $i++) {
                                    $new = $annonces_nouveaute[$i];
									$annonce = $annonces_nouveaute[$i];
                                    $sousregion = $new->getSousregion();
                                    $icones = $new->getIcones();
                                    $nombre_piece = $this->Annonce_Model->getCar($new, "Nombre de pieces", 'French');
                                    $devise = $new->getDevise();
									$href = "";
                                    $href = site_url() .  $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();
                                    ?>
                                    <div class="annonce item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="<?php echo $href; ?>"> <img src="<?php echo base_url('assets/images/' . $new->getImagePrincipal()); ?>" alt="<?php echo $new->getTitre_annonce(); ?>" style="width:100%;"/></a>
                                                <br/>
                                                <label class="type-bien-place"><?php echo $new->getType()->getVal(); ?></label> - <?php echo $new->getStatut()->getVal(); ?>
                                                <br/>
                                                <?php echo $sousregion->getRegion()->getVal(); ?>, <?php echo $sousregion->getVal(); ?>
                                                <?php
                                                if (!empty($icones)) {
                                                    ?>
                                                    <br/>
                                                    <?php
                                                    foreach ($icones as $icone) {
                                                        $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                        ?>
                                                        <i class="<?php echo $icone->getVal(); ?>"></i> &nbsp; <?php
                                                        echo $icone->getVal_icone();
                                                        echo " " . $mes;
                                                        ?> &nbsp;
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php if ($nombre_piece != "") { ?>
                                                    <br/>
                                                    Nombres pieces : <?php echo $nombre_piece; ?>

                                                    <br/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if ($devise->getLeft_symbole() == "1") { ?>
                                                    <label class="type-bien-place"><?php
                                                        echo $devise->getSymbole() . " " . $new->getPrix();
                                                        if ($new->getPar_mois()) {
                                                            ?> /  <?php
                                                            echo $mois;
                                                        }
                                                        ?> </label>
                                                <?php } else {
                                                    ?>
                                                    <label class="type-bien-place"><?php
                                                        echo $new->getPrix() . " " . $devise->getSymbole();
                                                        if ($new->getPar_mois()) {
                                                            ?> /  <?php
                                                            echo $mois;
                                                        }
                                                        ?> </label>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <a class='btn btn-bleu' href="<?php echo $href; ?>"> + <?php echo $more; ?> </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-1">
                                            <a class="carousel-control" href="#myCarousel4" role="button" data-slide="prev"><span class="fa fa-angle-left"></span></a>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1">
                                            <a class="carousel-control" href="#myCarousel4" role="button" data-slide="next"><span class="fa fa-angle-right"></span></a>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>
</div>
<script>

    $("#slideshow > div:gt(0)").hide();

    setInterval(function () {
        $('#slideshow > div:first')
                .fadeOut(0)
                .next()
                .fadeIn(0)
                .end()
                .appendTo('#slideshow');
    }, 3000);
</script>