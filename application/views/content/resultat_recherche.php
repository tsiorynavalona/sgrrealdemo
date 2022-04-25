<?php
//echo "<pre>";
//print_r($_REQUEST);
//exit;
$id_type = $id_statut = $chambre = $surface_min = $surface_max = $reference = $prix_min = $prix_max = "";
if (isset($_REQUEST) && !empty($_REQUEST)) {

    if (isset($_REQUEST["id_type"]) && $_REQUEST["id_type"] != "") {
        $id_type = $_REQUEST["id_type"];
    }
    if (isset($_REQUEST["id_statut"]) && $_REQUEST["id_statut"] != "") {
        $id_statut = $_REQUEST["id_statut"];
    }
    if (isset($_REQUEST["chambre"]) && $_REQUEST["chambre"] != "") {
        $chambre = $_REQUEST["chambre"];
    }
    if (isset($_REQUEST["surface_min"]) && $_REQUEST["surface_min"] != "") {
        $surface_min = $_REQUEST["surface_min"];
    }
    if (isset($_REQUEST["surface_max"]) && $_REQUEST["surface_max"] != "") {
        $surface_max = $_REQUEST["surface_max"];
    }
    if (isset($_REQUEST["reference"]) && $_REQUEST["reference"] != "") {
        $reference = $_REQUEST["reference"];
    }
    if (isset($_REQUEST["prix_min"]) && $_REQUEST["prix_min"] != "") {
        $prix_min = $_REQUEST["prix_min"];
    }
    if (isset($_REQUEST["prix_max"]) && $_REQUEST["prix_max"] != "") {
        $prix_max = $_REQUEST["prix_max"];
    }
    if (isset($_REQUEST["id_sousregion"]) && $_REQUEST["id_sousregion"] != "") {
        $id_sousregion = $_REQUEST["id_sousregion"];
    }
}
?>
<style>
    .marg-top-20{
        margin-top:-20px;
    }
    .margin-bot-20{
        margin-bottom:-20px;
    }
</style>

<div class="container">
    <div class="main-container">
        <div class="col-sm-12 col-md-12 col-lg-9" >
            <div class="multi-search-container">
                <form action="<?php echo str_replace("?", "", site_url()) ?>index.php/recherche_multicritere" method="GET">

                    <input type="hidden" name="qsearch" value="1" />
                    <div class="row">
                        <div class="col-lg-3">
                            <h5><?php echo $par_reference; ?></h5>
                            <input type="text" id="reference" name="reference" class="input-custom" value="<?php echo $reference; ?>">
                        </div>

                        <div class="col-lg-3">
                            <h5><?php echo $type_de_transaction; ?></h5>
                            <div class="select">
                                <select id="id_statut" name="id_statut">
                                    <option value="">Select Property Status</option>
                                    <?php
                                    foreach ($statuts as $statut) {
                                        if ($statut->getId_statut() == $id_statut) {
                                            ?>
                                            <option selected="selected" value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $statut->getId_statut(); ?>"><?php echo $statut->getVal(); ?></option>
                                        <?php } ?>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h5 for="type-bien"><?php echo $type_de_bien; ?></h5>
                            <div class="select">
                                <select name="id_type" id="id_type">
                                    <option value="">Select Type</option>
                                    <?php
                                    foreach ($types as $type) {
                                        if ($type->getId_type() == $id_type) {
                                            ?>
                                            <option selected="selected" value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $type->getId_type(); ?>"><?php echo $type->getVal(); ?></option>
                                        <?php } ?>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h5><?php echo $region_label; ?></h5>
                            <div class="select">
                                <select name="id_sousregion" style="width: 100%;">
                                    <option value="">Select Region</option>
                                    <?php foreach ($regions as $region) { ?>
                                        <optgroup label="<?php echo $region->getVal(); ?>">
                                            <?php
                                            foreach ($sousregions as $sousregion) {
                                                $reg = $sousregion->getRegion();
                                                if ($reg->getId_region() == $region->getId_region()) {
                                                    if ($sousregion->getId_sousregion() == $id_sousregion) {
                                                        ?>
                                                        <option selected="selected" value="<?php echo $sousregion->getId_sousregion(); ?>"><?php echo $sousregion->getVal(); ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $sousregion->getId_sousregion(); ?>"><?php echo $sousregion->getVal(); ?></option>
                                                    <?php } ?>
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
                    <div class="row">
                        <div class="col-lg-3">
                            <h5><?php echo $chambres; ?></h5>
                            <input type="text" class="input-custom" id="nb_chambre" name="chambre" value="<?php echo $chambre; ?>">

                        </div>
                        <div class="col-lg-3">
                            <h5><?php echo $surface_habitable; ?></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="surface_min"  id="surface_min" class="input-custom" value="<?php echo $surface_min; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="surface_max"  id="surface_max" class="input-custom" value="<?php echo $surface_max; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h5>Budget</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text"  name="prix_min"  id="prix_min" class="input-custom" placeholder="min" value="<?php echo $prix_min; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="text"  name="prix_max"  id="prix_max" class="input-custom" placeholder="max" value="<?php echo $prix_max; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 search-button">
                            <button class='btn btn-bleu' ><?php echo $rechercher; ?> </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div id='estimer_link'> <h4><a style="text-decoration: underline" href='<?php echo str_replace("?", "", site_url($url_estimate_property)) ?>'>+ <?php echo $estimer_bien; ?></a></h4></div>
            <br>
            <br>


            <div class="echantillon">
                <div class="div-title"><?php
                    if (isset($menu))
                        echo $menu;
                    if (isset($sousmenu))
                        echo " > " . $sousmenu;
                    ?> <span id="nb_recherche"><?php echo count($total_results); ?></span>   <span><?php echo $text_result; ?>: </span></div>
                    <?php
                    $i = 0;
                    foreach ($results as $result) {
                        $sousregion = $result->getSousregion();
                        $href = site_url() . "/" . $url_annonce . "/" . url_title(convert_accented_characters($result->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($result->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($result->getTitre_annonce()), '-', true) . "-" . $result->getId_ann();
                        $icones = $result->getIcones();
                        $nombre_piece = $this->Annonce_Model->getCar($result, "Nombre de pieces", 'French');
                        $devise = $result->getDevise();
                        ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 style="color:#1071b4"><?php echo $result->getTitre_annonce(); ?></h4>
                            <div class="col-sm-4">
                                <div class="annonce">
                                    <img src="<?php echo base_url('assets/images/' . $result->getImagePrincipal()) ?>" alt="<?php echo $result->getTitre_annonce(); ?>" style="width:100%;"/>

                                    <?php if ($result->getTag() != null) { ?>
                                        <div class="tag">
                                            <?php echo $result->getTag()->getVal(); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="desc">
                                    <h5><span class="ul-bleu"><?php echo $type_bien; ?>:</span> <b class="ul-bleu"><?php echo $result->getType()->getVal(); ?></b></h5>
                                    <p><?php echo $type_de_transaction; ?> : <b><?php echo $result->getStatut()->getVal(); ?></b></p>
                                    <p><?php echo $reference; ?> : <b><?php echo $result->getReference(); ?></b></p>
                                    <p><?php echo $region_label; ?> : <b><?php echo $sousregion->getRegion()->getVal(); ?></b></p>
                                    <p><?php echo $sous_region; ?>: <b><?php echo $sousregion->getVal(); ?></b></p>
                                    <?php foreach ($icones as $icone) { ?>
                                        <p><?php echo $icone->getNom_icone(); ?>  : <b><?php
                                                echo $icone->getVal_icone();
                                                //$mes = ($icone->getMesure() != null) ? $icone->getMesure()->getNom_mesure() : "";
                                                $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                                echo " " . $mes;
                                                ?></b></p>
                                        <?php
                                    }

                                    if ($nombre_piece != "") {
                                        ?>
                                        <p><?php echo $nb_piece_label; ?>: <b><?php echo $nombre_piece; ?></b></p>
                                        <?php
                                    }

                                    $prixtxt = 'Prix';
                                    if ($langue == "english") {
                                        $prixtxt = "Price";
                                    }
                                    if ($devise->getLeft_symbole() == "1") {
                                        ?>

                                        <h5 ><span class="ul-bleu"><?php echo $prixtxt; ?> : </span> <b class="ul-bleu"><?php
                                                echo $devise->getSymbole() . " " . $result->getPrix();
                                                if ($result->getPar_mois()) {
                                                    ?> / <?php
                                                    echo $mois;
                                                }
                                                ?></b></h5>
                                    <?php } else {
                                        ?>

                                        <h5 ><span class="ul-bleu"><?php echo $prixtxt; ?> : </span><b class="ul-bleu"><?php
                                                echo $result->getPrix() . " " . $devise->getSymbole();
                                                if ($result->getPar_mois()) {
                                                    ?> / <?php
                                                    echo $mois;
                                                }
                                                ?></b></h5>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="module"><p><?php echo $result->getDescription_annonce(); ?> </p></div>
                                <a class='btn btn-bleu' href="<?php echo $href; ?>"> + <?php echo $more; ?> </a>
                            </div>
                            <?php
                            if ($i != count($results) - 1) {
                                ?>
                                <div class="col-sm-12"><hr></div>
                                <?php
                            }
                            $i++;
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <br>
            <div class="page">

                <ul class="pagination pagination-sm">
                    <?php if ($page != 1) { ?>
                        <li><a class="numpage" href="<?php echo site_url() . "/" . $url . "/" . ($page - 1) ?>" data-page="prev"> < </a></li>
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
                        <li><a class="numpage" href="<?php echo site_url() . "/" . $url . "/" . $i ?>"><?php echo $i; ?></a></li>
                        <?php
                    }
                    if ($page < $nb_page && $page <= $nb_page) {
                        ?>
                        <li><a class="numpage" href="<?php echo site_url() . "/" . $url . "/" . ($page + 1) ?>" data-page="next" > > </a></li>
                    <?php } ?>
                </ul>

            </div>
        </div>
        <div class="col-sm-12 col-md-12  col-lg-3" >
            <div class="block">
                <div class="fond-bleu">
                    <h4><?php echo $alerte_email; ?></h4>
                </div>
                <div class="fond-gris">
                    <form method="POST" action="<?php echo str_replace("?", "", site_url('alerte_email')); ?>">
                        <h5><?php echo $nom . '*'; ?></h5>
                        <input type='text' name="nom" class='form-control right-form' required/>
                        <h5><?php echo $prenom . '*'; ?></h5>
                        <input type='text' name="prenom" class='form-control right-form' required/>
                        <h5>Email*</h5>
                        <input type='email' name="email" class='form-control right-form' required/>
                        <br>
                        <button class='btn btn-bleu' > <?php echo $envoyer; ?> </button>
                    </form>
                </div>
            </div>
            <?php if (!empty($actus)) {
                ?>
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $actu_evenement; ?></h4>
                    </div>

                    <div class="fond-gris" >
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div id='actus' class="item active">
                                    <img class="img-responsive" src="<?php echo base_url('assets/images/' . $actus[0]->getImage()->getNom_image()); ?>" alt="<?php echo $actus[0]->getTitre(); ?>"/>
                                    <br />
                                    <p class="text-actu"><?php echo $actus[0]->getDescription(); ?></p>
                                </div>
                                <?php
                                //$actu = $actus[rand(0, count($actus) - 1)];
                                for ($i = 1; $i < count($actus); $i++) {
                                    ?>
                                    <div id='actus' class="item">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/' . $actus[$i]->getImage()->getNom_image()); ?>" alt="<?php echo $actus[$i]->getTitre(); ?>"/>
                                        <br>
                                        <p class="text-actu"><?php echo $actus[$i]->getDescription(); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-1">
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="fa fa-angle-left"></span></a>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-1">
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="fa fa-angle-right"></span></a>
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
                    <input type='text' id="to_convert_metric" class='form-control right-form' />
                    <h5><?php echo $resultat; ?></h5>
                    <input type='text' id="resultat_metric" class='form-control right-form' disabled/>
                    <br>
                    <button class='btn btn-bleu' id='convert_metric' > <?php echo $convertir; ?> </button>
                </div>
            </div>
            <div class="block">
                <div class="fond-bleu">
                    <h4><?php echo $conversion_devise; ?></h4>
                </div>
                <div class="fond-gris">
                    <h5><?php echo $convertir_de; ?></h5>
                    <select class='form-control right-form' id="devise_avant">
                        <option value="" selected disabled ></option>
                        <?php foreach ($devises as $devise) { ?>
                            <option value="<?php echo $devise->getMontant_devise(); ?>"><?php echo $devise->getNom_devise(); ?></option>
                        <?php } ?>
                    </select>
                    <h5><?php echo $en; ?></h5>
                    <select class='form-control right-form' id="devise_apres">
                        <option value="" selected disabled ></option>
                        <?php foreach ($devises as $devise) { ?>
                            <option value="<?php echo $devise->getMontant_devise(); ?>"><?php echo $devise->getNom_devise(); ?></option>
                        <?php } ?>
                    </select>
                    <h5><?php echo $valeur_a_convertir; ?></h5>
                    <input type='text' id="to_convert_devise" class='form-control right-form' />
                    <h5><?php echo $resultat; ?></h5>
                    <input type='text' id="resultat_devise" class='form-control right-form' disabled/>
                    <br>
                    <button class='btn btn-bleu' id="convert_devise" > <?php echo $convertir; ?> </button>
                </div>
            </div>
        </div>
    </div>
</div>
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
                url: '<?php echo str_replace("?", "", site_url('index')); ?>/convert_metric',
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
                url: '<?php echo str_replace("?", "", site_url('index')); ?>/convert_devise',
                type: 'POST',
                dataType: 'html', // On désire recevoir du HTML
                data: {avant: avant, apres: apres, to_convert: to_convert},
                success: function (code_html, statut) { // code_html contient le HTML renvoyé
                    $("#resultat_devise").val(code_html);
                }
            });
        }
    });
</script>
