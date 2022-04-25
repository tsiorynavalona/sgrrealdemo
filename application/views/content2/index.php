<div style="display:none1; height:250px;
color:#fff; background: url(http://patrickpatisserie.info/sgr/assets/images/banner.jpg) no-repeat center center fixed; padding-top:100px; 
font-size:24px; text-align:center; background-size: cover; text-shadow: 2px 2px #000;">
	<?php
		if($this->session->userdata('site_lang') == "english"){
			echo 'Purchase, Sale, Lease <br> Property Management - Syndic <br> Partage Facilities - Heirs';
		}else{
			echo 'Acht, vente, location <br> Gestion des Bien - Syndic <br> Installation de Partage - Héritiers';
		}
	?>
    
</div>

<div class="container">
    <div class="main-container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="multi-search-container">
                    <form action="<?php echo site_url() ?>index.php/recherche_multicritere" method="GET">
                    <?php
					/*
                    <form action="<?php echo site_url() ?>/index/recherche_multicritere" method="GET">
					*/
					?>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-4">
                                        <h5 for="type-bien"><?php echo $type_de_bien; ?></h5>
                                        <div class="select">
                                            <select name="id_type" id="id_type">
                                                <option></option>
                                                <?php foreach ($types as $type) { ?>
                                                    <option value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-lg-4">
                                        <h5><?php echo $type_de_transaction; ?></h5>
                                        <div class="select">
                                            <select id="id_statut" name="id_statut">
                                                <option></option>
                                                <?php foreach ($statuts as $statut) { ?>
                                                    <option value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-lg-4">
                                        <h5><?php echo $chambres; ?></h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="input-custom" id="nb_chambre" name="chambre">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-md-4">
                                        <h5><?php echo $region; ?></h5>
                                        <div class="select">
                                            <select name="id_sousregion" style="width: 100%;">
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
                                    <div class="col-sm-8 col-md-4">
                                        <h5><?php echo $surface_habitable; ?></h5>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 my-col">
                                                <input type="text" name="surface_min" id="surface_min"
                                                       class="input-custom">
                                            </div>
                                            <div class="col-sm-6 col-md-6 my-col">
                                                <input type="text" name="surface_max" id="surface_max"
                                                       class="input-custom">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-md-4">
                                        <h5><?php echo $par_reference; ?></h5>
                                        <input type="text" id="reference" name="reference" class="input-custom">
                                    </div>
                                    <div class="col-sm-8 col-md-4">
                                        <h5>Budget</h5>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 my-col">
                                                <input type="text" name="prix_min" id="prix_min" class="input-custom" placeholder="min">
                                            </div>
                                            <div class="col-sm-6 col-md-6 my-col">
                                                <input type="text" name="prix_max" id="prix_max" class="input-custom" placeholder="max">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 search-button">
                                        <button class='btn btn-bleu'> <?php echo $rechercher; ?> </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-lg-3">
                                <img src="<?php echo base_url('assets/images/map-maurice.jpg'); ?>" usemap="#image-map">
                                <map name="image-map">
                                    <area target="" alt="Rivière du Rempart" title="Rivière du Rempart"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Rivière du Rempart"), '-', true) . '/8'); ?>"
                                          coords="106,50,115,46,122,43,129,41,124,33,119,25,116,14,121,8,114,4,106,3,100,0,91,1,85,10,96,17,96,30,106,38,101,41"
                                          shape="poly">
                                    <area target="" alt="Pamplemousses" title="Pamplemousses"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Pamplemousses"), '-', true) . '/5'); ?>"
                                          coords="80,66,90,57,97,56,102,51,98,43,99,36,91,32,92,23,83,14,78,6,72,16,66,21,63,27,65,35,60,38,60,45,67,47,72,48,77,53,78,58"
                                          shape="poly">
                                    <area target="" alt="Port Louis" title="Port Louis"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Port Louis"), '-', true) . '/7'); ?>"
                                          coords="73,64,74,57,71,51,64,51,53,54,55,59,61,63,66,65" shape="poly">
                                    <area target="" alt="Black River" title="Black River"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Black River"), '-', true) . '/1'); ?>"
                                          coords="16,154,20,150,19,144,24,141,29,139,34,135,40,134,45,132,39,128,40,121,41,111,43,105,42,93,42,85,41,70,46,63,47,56,41,57,36,60,31,64,26,73,22,82,18,89,16,95,17,106,19,117,16,122,21,126,18,132,12,141,6,142,2,147,9,147"
                                          shape="poly">
                                    <area target="" alt="Savanne" title="Savanne"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Savanne"), '-', true) . '/9'); ?>"
                                          coords="22,158,28,160,36,163,44,160,49,163,56,165,64,166,69,168,75,166,82,163,89,162,93,158,90,150,83,145,77,137,79,132,70,131,62,129,56,130,54,137,46,137,40,135,28,143,23,146"
                                          shape="poly">
                                    <area target="" alt="Plaines-Wilhems" title="Plaines-Wilhems"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Plaines-Wilhems"), '-', true) . '/6'); ?>"
                                          coords="46,130,54,129,57,124,62,127,67,124,73,120,79,115,84,112,76,106,70,99,67,90,66,84,57,82,51,75,49,67,44,71,44,83,48,87,47,93,44,100,48,103,50,109,50,114,43,115,42,121,43,127,46,130"
                                          shape="poly">
                                    <area target="" alt="Moka" title="Moka"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Moka"), '-', true) . '/4'); ?>"
                                          coords="74,99,77,104,84,106,92,108,103,107,105,99,108,93,105,86,101,80,102,74,106,70,101,64,95,60,86,64,79,68,70,68,64,66,56,64,52,67,53,72,56,77,62,80,67,82,71,88"
                                          shape="poly">
                                    <area target="" alt="Grand Port" title="Grand Port"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Grand Port"), '-', true) . '/3'); ?>"
                                          coords="69,128,74,128,79,129,80,135,85,139,88,144,94,151,98,159,105,159,111,155,117,151,120,145,126,143,124,135,119,129,119,122,124,119,128,123,132,118,138,115,143,111,140,106,134,109,126,110,115,110,108,110,97,112,89,112,79,119"
                                          shape="poly">
                                    <area target="" alt="Flacq" title="Flacq"
                                          href="<?php echo site_url('region/' . url_title(convert_accented_characters("Flacq"), '-', true) . '/2'); ?>"
                                          coords="109,102,115,106,123,106,131,104,137,100,146,102,144,94,149,95,149,85,154,79,148,71,143,59,135,56,134,49,136,41,126,45,100,58,111,68,102,77,113,87"
                                          shape="poly">
                                </map>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="echantillon">
                    <h3><?php echo $propriete_en_premiere; ?></h3>
                    <div class="row">
                        <?php
                        for ($i = 0; $i < $nb_donnees_afficher; $i++) {

                        }
//                        echo "<pre>";
//                        print_r($annonces_premieres);
//                        echo "</pre>";
//                        exit;
							$d = 0;
							$cls = 'section1';
                        foreach ($annonces_premieres as $annonce) {
                            $sousregion = $annonce->getSousregion();
                            $icones = $annonce->getIcones();
                            $nombre_piece = $this->Annonce_Model->getCar($annonce, "Nombre de pieces", 'French');
                            $devise = $annonce->getDevise();
                            $href = site_url() . $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();
                            if($d > 8){
								//break;
								$cls = 'section2';
							}
							$d++;
							?>
                            <div class="col-sm-6 col-md-4 <?php echo $cls; ?>" style="height:420px;">
                                <div class="annonce">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo $href; ?>"> <img
                                                    src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>"
                                                    alt="<?php echo $annonce->getTitre_annonce(); ?>"
                                                    class="img-responsive"
                                                    /></a>
                                                <?php if ($annonce->getTag() != null) { ?>
                                                <div class="tag">
                                                    <?php echo $annonce->getTag()->getVal(); ?>
                                                </div>
                                                <br/>

                                            <?php } ?>
                                            
                                            
                                            <?php
												if($annonce->getStatut()->getVal() != ""){
												?>
												<label class="type-bien-place"><?php echo $annonce->getType()->getVal(); ?></label>
                                                - <?php echo $annonce->getStatut()->getVal(); ?>
                                                <br/>
                                                
												<?php	
												}
											?>
                                            
                                            
                                            <?php 
											
											if( $sousregion->getVal() != null){
												echo $sousregion->getRegion()->getVal(); ?>
                                                , <?php echo $sousregion->getVal(); ?>
                                                <br/>
                                                <?php
											}
											
											
                                            foreach ($icones as $icone) {
                                                $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
												$ticon = $icone->getVal();
												
                                                ?>
                                                <i class="<?php echo $ticon; ?>"></i> <?php
                                                echo $icone->getVal_icone();
                                                echo " " . $mes;
                                                ?> &nbsp;
                                            <?php } ?>

                                            <?php
                                            if ($nombre_piece != "") {
                                                echo "<br>" . $nb_piece_label;
                                                ?> : <?php
                                                echo $nombre_piece;
                                            }
                                            ?>
                                           
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <?php if ($devise->getLeft_symbole() == "1") { ?>
                                                <label class="type-bien-place"><?php
                                                    echo $devise->getSymbole() . " " . $annonce->getPrix();
                                                    if ($annonce->getPar_mois()) {
                                                        ?> / <?php
                                                        echo $mois;
                                                    }
                                                    ?>
                                                </label>
                                            <?php } else {
                                                ?>
                                                <label class="type-bien-place"><?php
                                                    echo $annonce->getPrix() . " " . $devise->getSymbole();
                                                    if ($annonce->getPar_mois()) {
                                                        ?> /  <?php
                                                        echo $mois;
                                                    }
                                                    ?> </label>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-5">
                                            <a class='btn btn-bleu' href="<?php echo $href; ?>">
                                                + <?php echo $more; ?> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="page">
                    
                    	<ul class="pagination pagination-sm">
                        
                        	<li style="display:none1;"><a href="javascript::;" class="btnsection1">1</a></li>
                            <li style="display:none1;"><a href="javascript::;" class="btnsection2">2</a></li>
                        </ul>
                    
                        <ul class="pagination pagination-sm" style="display:none;">
                        
                        	
                            <?php if ($page != 1) { ?>
                                <li><a class="numpage" href="<?php echo site_url() . "/" . $url . "/" . ($page - 1) ?>"
                                       data-page="prev"> < </a></li>
                                    <?php
                                }
                                $i = intval($page / 5) * 5 + 1;
                                if ($page % 5 == 0)
                                    $i = intval(($page - 1) / 5) * 5 + 1;
                                $max = $i + 4;
                                if ($max >= $nb_page)
                                    $max = $nb_page;
                                for ($i; $i <= $max; $i++) {
                                    ?>
                                <li><a class="numpage"
                                       href="<?php echo site_url() . "/" . $url . "/" . $i ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                            }
                            if ($page != $nb_page && $page <= $nb_page) {
                                ?>
                                <li><a class="numpage" href="<?php echo site_url() . "/" . $url . "/" . ($page + 1) ?>"
                                       data-page="next"> > </a></li>
                                <?php } ?>
                        </ul>

                    </div>
                    <hr>
                    <?php
                    if (!empty($annonces_nouveaute)) {
                        ?>
                        <h3><?php echo $nouveaute; ?></h3>
                        <div class="row">
                            <div id="myCarouselNew" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div id='actus' class="item active">

                                        <?php
                                        for ($i = 0; $i < count($annonces_nouveaute) && $i < 3; $i++) {

                                            $annonce = $annonces_nouveaute[$i];
                                            $sousregion = $annonce->getSousregion();
                                            $icones = $annonce->getIcones();
                                            $nombre_piece = $this->Annonce_Model->getCar($annonce, "Nombre de pieces", 'French');
                                            $devise = $annonce->getDevise();
                                            $href = site_url() .  $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();
                                            ?>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="annonce">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="<?php echo $href; ?>"> <img
                                                                    src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>"
                                                                    alt="<?php echo $annonce->getTitre_annonce(); ?>"
                                                                    class="img-responsive"
                                                                    /></a>
                                                                <?php if ($annonce->getTag() != null) { ?>
                                                                <div class="tag">
                                                                    <?php echo $annonce->getTag()->getVal(); ?>
                                                                </div>

                                                            <?php } ?><br/>
                                                            <label class="type-bien-place"><?php echo $annonce->getType()->getVal(); ?></label>
                                                            - <?php echo $annonce->getStatut()->getVal(); ?>
                                                            <br/>
                                                            <?php echo $sousregion->getRegion()->getVal(); ?>
                                                            , <?php echo $sousregion->getVal(); ?>
                                                            <br/>
                                                            <?php
                                                            foreach ($icones as $icone) {
                                                                $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                                ?>
                                                                <i class="<?php echo $icone->getVal(); ?>"></i><?php
                                                                echo $icone->getVal_icone();
                                                                echo " " . $mes;
                                                                ?> &nbsp;
                                                            <?php } ?>

                                                            <?php
                                                            if ($nombre_piece != "") {
                                                                echo "        <br/>" . $nb_piece_label;
                                                                ?>
                                                                : <?php
                                                                echo $nombre_piece . "";
                                                            }
                                                            ?>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
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
                                                                    ?> </label>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <a class='btn btn-bleu' href="<?php echo $href; ?>">
                                                                + <?php echo $more; ?> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <?php
                                    for ($i = 3; $i < (count($annonces_nouveaute) - 3 - 1); $i = $i + 3) {

                                        $annonce = $annonces_nouveaute[$i + 1];
                                        $sousregion = $annonce->getSousregion();
                                        $icones = $annonce->getIcones();
                                        $nombre_piece = $this->Annonce_Model->getCar($annonce, "Nombre de pieces", 'French');
                                        $devise = $annonce->getDevise();
                                        $href = site_url() .  $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();

                                        $annonce2 = $annonces_nouveaute[$i + 2];
                                        $sousregion2 = $annonce2->getSousregion();
                                        $icones2 = $annonce2->getIcones();
                                        $nombre_piece2 = $this->Annonce_Model->getCar($annonce2, "Nombre de pieces", 'French');
                                        $devise2 = $annonce2->getDevise();
                                        $href2 = site_url() .  $url_annonce . "/" . url_title(convert_accented_characters($annonce2->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce2->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion2->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion2->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce2->getTitre_annonce()), '-', true) . "-" . $annonce2->getId_ann();

                                        $annonce3 = $annonces_nouveaute[$i + 3];
                                        $sousregion3 = $annonce3->getSousregion();
                                        $icones3 = $annonce3->getIcones();
                                        $nombre_piece3 = $this->Annonce_Model->getCar($annonce3, "Nombre de pieces", 'French');
                                        $devise3 = $annonce3->getDevise();
                                        $href3 = site_url() .  $url_annonce . "/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce3->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion3->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion3->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce3->getId_ann();
                                        ?>
                                        <div id='actus' class="item">
                                            <div class="col-sm-6 col-md-4">
                                                <div class="annonce">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="<?php echo $href; ?>"> <img
                                                                    src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>"
                                                                    alt="<?php echo $annonce->getTitre_annonce(); ?>"
                                                                    class="img-responsive"
                                                                    /></a>
                                                                <?php if ($annonce->getTag() != null) { ?>
                                                                <div class="tag">
                                                                    <?php echo $annonce->getTag()->getVal(); ?>
                                                                </div>

                                                            <?php } ?>  <br/>
                                                            <label class="type-bien-place"><?php echo $annonce->getType()->getVal(); ?></label>
                                                            - <?php echo $annonce->getStatut()->getVal(); ?>
                                                            <br/>
                                                            <?php echo $sousregion->getRegion()->getVal(); ?>
                                                            , <?php echo $sousregion->getVal(); ?>
                                                            <br/>
                                                            <?php
                                                            foreach ($icones as $icone) {
                                                                $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                                ?>
                                                                <i class="<?php echo $icone->getVal(); ?>"></i> <?php
                                                                echo $icone->getVal_icone();
                                                                echo " " . $mes;
                                                                ?> &nbsp;
                                                            <?php } ?>
                                                            <?php
                                                            if ($nombre_piece != "") {
                                                                echo "<br/>" . $nb_piece_label;
                                                                ?>
                                                                : <?php
                                                                echo $nombre_piece . "<br/>";
                                                            }
                                                            ?>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
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
                                                                    ?> </label>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <a class='btn btn-bleu' href="<?php echo $href; ?>">
                                                                + <?php echo $more; ?> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="annonce">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="<?php echo $href2; ?>"> <img
                                                                    src="<?php echo base_url('assets/images/' . $annonce2->getImagePrincipal()); ?>"
                                                                    alt="<?php echo $annonce2->getTitre_annonce(); ?>"
                                                                    class="img-responsive"
                                                                    /></a>
                                                                <?php if ($annonce2->getTag() != null) { ?>
                                                                <div class="tag">
                                                                    <?php echo $annonce2->getTag()->getVal(); ?>
                                                                </div>

                                                            <?php } ?>   <br/>
                                                            <label class="type-bien-place"><?php echo $annonce2->getType()->getVal(); ?></label>
                                                            - <?php echo $annonce2->getStatut()->getVal(); ?>
                                                            <br/>
                                                            <?php echo $sousregion2->getRegion()->getVal(); ?>
                                                            , <?php echo $sousregion2->getVal(); ?>
                                                            <br/>
                                                            <?php
                                                            foreach ($icones2 as $icone) {
                                                                $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                                ?>
                                                                <i class="<?php echo $icone->getVal(); ?>"></i>  <?php
                                                                echo $icone->getVal_icone();
                                                                echo " " . $mes;
                                                                ?> &nbsp;
                                                            <?php } ?>

                                                            <?php
                                                            if ($nombre_piece2 != "") {
                                                                echo "<br/>" . $nb_piece_label;
                                                                ?>
                                                                : <?php
                                                                echo $nombre_piece2 . "<br/>";
                                                            }
                                                            ?>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <?php if ($devise2->getLeft_symbole() == "1") { ?>
                                                                <label class="type-bien-place"><?php
                                                                    echo $devise2->getSymbole() . " " . $annonce2->getPrix();
                                                                    if ($annonce2->getPar_mois()) {
                                                                        ?> / <?php
                                                                        echo $mois;
                                                                    }
                                                                    ?> </label>
                                                            <?php } else {
                                                                ?>
                                                                <label class="type-bien-place"><?php
                                                                    echo $annonce2->getPrix() . " " . $devise2->getSymbole();
                                                                    if ($annonce2->getPar_mois()) {
                                                                        ?> / <?php
                                                                        echo $mois;
                                                                    }
                                                                    ?> </label>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <a class='btn btn-bleu' href="<?php echo $href2; ?>">
                                                                + <?php echo $more; ?> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="annonce">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="<?php echo $href3; ?>"> <img
                                                                    src="<?php echo base_url('assets/images/' . $annonce3->getImagePrincipal()); ?>"
                                                                    alt="<?php echo $annonce3->getTitre_annonce(); ?>"
                                                                    class="img-responsive"
                                                                    /></a>
                                                                <?php if ($annonce3->getTag() != null) { ?>
                                                                <div class="tag">
                                                                    <?php echo $annonce3->getTag()->getVal(); ?>
                                                                </div>

                                                            <?php } ?> <br/>
                                                            <label class="type-bien-place"><?php echo $annonce3->getType()->getVal(); ?></label>
                                                            - <?php echo $annonce3->getStatut()->getVal(); ?>
                                                            <br/>
                                                            <?php echo $sousregion3->getRegion()->getVal(); ?>
                                                            , <?php echo $sousregion3->getVal();
															
															if($sousregion3->getVal() != "" && $sousregion3->getRegion()->getVal() != ""){
																echo "<br>";
															}
															 ?>
                                                            
                                                            <?php
                                                            foreach ($icones3 as $icone) {
                                                                $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                                ?>
                                                                <i class="<?php echo $icone->getVal(); ?>"></i>  <?php
                                                                echo $icone->getVal_icone();
                                                                echo " " . $mes;
                                                                ?> &nbsp;
                                                            <?php } ?>
                                                           
                                                            <?php
                                                            if ($nombre_piece3 != "") {
                                                                echo "        <br/>" . $nb_piece_label;
                                                                ?>
                                                                : <?php
                                                                echo $nombre_piece3 . "";
                                                            }
                                                            ?>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <?php if ($devise3->getLeft_symbole() == "1") { ?>
                                                                <label class="type-bien-place"><?php
                                                                    echo $devise3->getSymbole() . " " . $annonce3->getPrix();
                                                                    if ($annonce3->getPar_mois()) {
                                                                        ?> / <?php
                                                                        echo $mois;
                                                                    }
                                                                    ?> </label>
                                                            <?php } else {
                                                                ?>
                                                                <label class="type-bien-place"><?php
                                                                    echo $annonce3->getPrix() . " " . $devise3->getSymbole();
                                                                    if ($annonce3->getPar_mois()) {
                                                                        ?> / <?php
                                                                        echo $mois;
                                                                    }
                                                                    ?> </label>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <a class='btn btn-bleu' href="<?php echo $href3; ?>">
                                                                + <?php echo $more; ?> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <?php } ?>

                                </div>

                                <a class="left carousel-control" href="#myCarouselNew" role="button"
                                   data-slide="prev"><span class="fa fa-angle-left"></span></a>

                                <a class="right carousel-control" href="#myCarouselNew" role="button" data-slide="next"><span
                                        class="fa fa-angle-right"></span></a>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-12  col-lg-3">
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $alerte_email; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <form method="POST" action="<?php echo site_url(); ?>/alerte_email">
                            <h5><?php echo $nom . '*'; ?></h5>
                            <input type='text' name="nom" class='form-control right-form' required/>
                            <h5><?php echo $prenom . '*'; ?></h5>
                            <input type='text' name="prenom" class='form-control right-form' required/>
                            <h5>Email*</h5>
                            <input type='email' name="email" class='form-control right-form' required/>
                            <br>
                            <button class='btn btn-bleu'> <?php echo $envoyer; ?> </button>
                        </form>
                    </div>
                </div>
                <?php if (!empty($actus)) {
                    ?>
                    <div class="block">
                        <div class="fond-bleu">
                            <h4><?php echo $actu_evenement; ?></h4>
                        </div>

                        <div class="fond-gris">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100% !important;">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div id='actus' class="item active">
                                        <img class="img-responsive"
                                             src="<?php echo base_url('assets/images/' . $actus[0]->getImage()->getNom_image()); ?>"
                                             alt="<?php echo $actus[0]->getTitre(); ?>"/>
                                             <br />
                                        <p class="text-actu"><?php echo $actus[0]->getDescription(); ?></p>
                                    </div>
                                    <?php
                                    //$actu = $actus[rand(0, count($actus) - 1)];
                                    for ($i = 1; $i < count($actus); $i++) {
                                        ?>
                                        <div id='actus' class="item">
                                            <img class="img-responsive"
                                                 src="<?php echo base_url('assets/images/' . $actus[$i]->getImage()->getNom_image()); ?>"
                                                 alt="<?php echo $actus[$i]->getTitre(); ?>"/>
                                            <br>
                                            <p class="text-actu"><?php echo $actus[$i]->getDescription(); ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-1">
                                    <a class="left carousel-control" href="#myCarousel" role="button"
                                       data-slide="prev"><span class="fa fa-angle-left"></span></a>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1">
                                    <a class="right carousel-control" href="#myCarousel" role="button"
                                       data-slide="next"><span class="fa fa-angle-right"></span></a>
                                </div>
                                <div class="col-sm-4"></div>
                                <?php
                                //$actu = $actus[rand(0, count($actus) - 1)];
                                /*  foreach ($actus as $actu) {
                                  ?>
                                  <div id='actus' >
                                  <img class="img-responsive" src="<?php echo base_url('assets/images/' . $actu->getImage()->getNom_image()); ?>" alt="<?php echo $actu->getTitre(); ?>"/>
                                  <br>
                                  <p class="text-actu"><?php echo $actu->getDescription() ?></p>
                                  <div class="col-sm-3"></div>
                                  <div class="col-sm-1">
                                  <a ><span class="fa fa-angle-left"></span></a>
                                  </div>
                                  <div class="col-sm-1"></div>
                                  <div class="col-sm-1">
                                  <a href="javascript:next()"><span class="fa fa-angle-right"></span></a>
                                  </div>
                                  <div class="col-sm-4"></div>
                                  </div>
                                  <?php } */
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $conversion_metrique; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <h5><?php echo $convertir_de; ?></h5>
                        <select class='form-control right-form' id="mesure_avant">
                            <option value="" disabled selected></option>
                            <?php foreach ($mesures as $mesure) { ?>
                                <option value="<?php echo $mesure->getVal_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $en; ?></h5>
                        <select class='form-control right-form' id="mesure_apres">
                            <option value="" disabled selected></option>
                            <?php foreach ($mesures as $mesure) { ?>
                                <option value="<?php echo $mesure->getVal_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $valeur_a_convertir; ?></h5>
                        <input type='text' id="to_convert_metric" class='form-control right-form'/>
                        <h5><?php echo $resultat; ?></h5>
                        <input type='text' id="resultat_metric" class='form-control right-form' disabled/>
                        <br>
                        <button class='btn btn-bleu' id='convert_metric'> <?php echo $convertir; ?> </button>
                    </div>
                </div>
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $conversion_devise; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <h5><?php echo $convertir_de; ?></h5>
                        <select class='form-control right-form' id="devise_avant">
                            <option value="" selected disabled></option>
                            <?php foreach ($devises as $devise) { ?>
                                <option value="<?php echo $devise->getMontant_devise(); ?>"><?php echo $devise->getNom_devise(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $en; ?></h5>
                        <select class='form-control right-form' id="devise_apres">
                            <option value="" selected disabled></option>
                            <?php foreach ($devises as $devise) { ?>
                                <option value="<?php echo $devise->getMontant_devise(); ?>"><?php echo $devise->getNom_devise(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $valeur_a_convertir; ?></h5>
                        <input type='text' id="to_convert_devise" class='form-control right-form'/>
                        <h5><?php echo $resultat; ?></h5>
                        <input type='text' id="resultat_devise" class='form-control right-form' disabled/>
                        <br>
                        <button class='btn btn-bleu' id="convert_devise"> <?php echo $convertir; ?> </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<style>
	.section2{
		display:none;
	}
</style>
<script>
    $("#convert_metric").click(function () {
        var avant = $('#mesure_avant option:selected').val();
        var apres = $('#mesure_apres option:selected').val();
        var to_convert = $('#to_convert_metric').val();
        if (to_convert == '') {
            $('#to_convert_metric').focus();
        }
        if (apres == '') {
            $('#mesure_apres').focus();
        }
        if (avant == '') {
            $('#mesure_avant').focus();
        }
        if (avant != '' && apres != '' && to_convert != '') {
            $.ajax({
                url: '<?php echo site_url(); ?>/index/convert_metric',
                type: 'POST',
                dataType: 'html', // On désire recevoir du HTML
                data: {avant: avant, apres: apres, to_convert: to_convert},
                success: function (code_html, statut) { // code_html contient le HTML renvoyé
                    $("#resultat_metric").val(code_html);
                }
            });
        }

    });
    $("#convert_devise").click(function () {
        var avant = $('#devise_avant option:selected').val();
        var apres = $('#devise_apres option:selected').val();
        var to_convert = $('#to_convert_devise').val();
        if (to_convert == '')
            $('#to_convert_devise').focus();
        if (apres == '')
            $('#devise_apres').focus();
        if (avant == '')
            $('#devise_avant').focus();
        ;


        if (apres != '' && avant != '' && to_convert != '') {
            $.ajax({
                url: '<?php echo site_url(); ?>/index/convert_devise',
                type: 'POST',
                dataType: 'html', // On désire recevoir du HTML
                data: {avant: avant, apres: apres, to_convert: to_convert},
                success: function (code_html, statut) { // code_html contient le HTML renvoyé
                    $("#resultat_devise").val(code_html);
                }
            });
        }
    });
	
	
	$(document).on("click", ".btnsection1", function(){
		$(".section1").show();
		$(".section2").hide();
	});
	$(document).on("click", ".btnsection2", function(){
		$(".section2").show();
		$(".section1").hide();
	});
	
</script>