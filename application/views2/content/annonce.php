<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI-LSpY59WTYlxTVaw8gIr4EY983Oph4E" ></script>
<style>
    .left h4{
        color:#1071b4;
    }
</style>
<div class="container">
    <div class="main-container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 left">
                <ul class="breadcumbs to_hide ">
                    <?php $sousregion = $annonce->getSousregion(); ?>
                    <li><a href="<?php echo site_url(); ?>"><?php echo $accueil; ?></a></li>
                    <li><a href="#"><?php echo $annonce->getStatut()->getVal(); ?></a></li>
                    <li><a href="#"><?php echo $sousregion->getVal(); ?></a></li>
                    <li><?php echo $annonce->getTitre_annonce(); ?></li>
                </ul>
                <br class="to_hide"/>
                <div class="row to_hide">
                    <div class="col-sm-2 col-sm-offset-8 col-xs-12">
                        <a onclick="javascript:window.print()">
                            <i class="fa fa-print" aria-hidden="true" style="font-size: 20px"></i>&nbsp;
                            <?php echo $imprimer; ?>
                        </a>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <a target=_blank href="<?php echo site_url("Annonce_Ctrl/createPdf/" . $annonce->getId_ann()); ?>">
                            <i class="fa fa-file-pdf" aria-hidden="true" style="font-size: 20px"></i>&nbsp;
                            <?php echo $version_pdf; ?>
                        </a>
                    </div>
                </div>
                <br class="to_hide"/>
                <?php
                $images = $annonce->getImages();
//                echo'<pre>';
//                print_r($annonce);
//                echo'</pre>';
//                exit;
                ?>
                <div class="row to_hide">
                    <div id="myCarousel2" class="col-xs-12 carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php if ($annonce->getTag() != null) { ?>
                                <div class="tag-annonce">
                                    <?php echo $annonce->getTag()->getVal(); ?>
                                </div>
                            <?php } ?>
                            <div class="item active">
                                <img class='img-thumbnail-no-border' src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>" width="798" height="425">
                            </div>
                            <?php
                            foreach ($images as $image) {
                                ?>
                                <div class="item">
                                    <img class='img-thumbnail-no-border' src="<?php echo base_url('assets/images/' . $image->getNom_image()); ?>" width="798" height="425">
                                </div>
                                <?php
                            }
                            ?>
                        </div><!-- End Carousel Inner -->
                        <ul class="nav nav-pills nav-justified" style="overflow:auto;">
                            <li data-target="#myCarousel2" data-slide-to="0" class="active" style="padding:5px;">
                                <img class='img-thumbnail-no-border' src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>" width="110" height="71">
                            </li>
                            <?php
                            foreach ($images as $key => $image) {
                                ?>
                                <li data-target="#myCarousel2" data-slide-to="<?php echo $key + 1; ?>"  style="padding:5px;">
                                    <img class='img-thumbnail-no-border' src="<?php echo base_url('assets/images/' . $image->getNom_image()); ?>" width="110" height="71">
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!-- End Carousel -->
                </div>
                <br class="to_hide"/>

                <h4><?php echo $annonce->getTitre_annonce(); ?></h4>
                <div class="to_show">
                    <img  src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>" width="798" height="425">
                </div>
                <p>
                    <?php echo $annonce->getDescription_annonce(); ?>
                </p>
                <br >
                <div class="row">
                    <div class="col-md-6">
                        <p><?php echo $type_de_bien; ?>:<b> <?php echo $annonce->getType()->getVal(); ?> </b> </p>
                        <?php
                        $devise = $annonce->getDevise();
                        $agent = $annonce->getAgent();
                        ?>
                        <p> <?php echo $region; ?>: <b> <?php echo $sousregion->getRegion()->getVal(); ?>  </b> </p>
                        <p> <?php echo $sous_region; ?>: <b> <?php echo $sousregion->getVal(); ?> </b> </p>
                    </div>
                    <div class="col-md-6">
                        <?php if ($devise->getLeft_symbole() == "1") { ?>
                            <p>
                                <?php echo $prix; ?>: <b> <?php
                                    echo $devise->getSymbole() . " " . $annonce->getPrix();
                                    if ($annonce->getPar_mois()) {
                                        ?> /  <?php
                                        echo $mois;
                                    }
                                    ?>  </b>
                            </p>
                        <?php } else { ?>
                            <p>
                                <?php echo $prix; ?>: <b> <?php
                                    echo $annonce->getPrix() . " " . $devise->getSymbole();
                                    if ($annonce->getPar_mois()) {
                                        ?> /  <?php
                                        echo $mois;
                                    }
                                    ?></b>
                            </p>
                        <?php } ?>
                        <p> <?php echo $reference; ?>: <b> <?php echo $annonce->getReference(); ?> </b> </p>
                        <?php if ($agent != null) { ?>
                            <p> <?php echo $agent_a_contacter; ?>:<b> <?php echo $agent->getPrenom() . " " . $agent->getNom() . ", mob:" . $agent->getTel(); ?></b> </p>
                        <?php } ?>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $cars = $annonce->getCaracteristiques();
                        $icones = $annonce->getIcones();
                        if (!empty($icones) || !empty($cars)) {
                            ?>
                            <h4><?php echo $caracteristique; ?></h4>
                            <?php
                        }
                        $gris = true;
                        if (!empty($icones)) {
                            foreach ($icones as $icone) {
                                if ($gris) {
                                    $gris = false;
                                    ?>
                                    <div class="row" style=" background-color: #f0f0f0; padding: 10px;">
                                        <div class="col-xs-6 ">
                                            <?php echo $icone->getNom_icone(); ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <?php
                                            echo $icone->getVal_icone();
                                            $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                            echo " " . $mes;
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    $gris = true;
                                    ?>
                                    <div class="row"  style="height: 40px; background-color: #fff; padding: 10px;">
                                        <div class="col-xs-6 ">
                                            <?php echo $icone->getNom_icone(); ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <?php
                                            echo $icone->getVal_icone();
                                            $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                            echo " " . $mes;
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        if (!empty($cars)) {
                            foreach ($cars as $car) {
                                if ($gris) {
                                    $gris = false;
                                    ?>
                                    <div class="row" style=" background-color: #f0f0f0; padding: 10px;">
                                        <div class="col-xs-6 ">
                                            <?php echo $car->getVal(); ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <?php echo $car->getVal_car(); ?>
                                        </div>

                                    </div>
                                    <?php
                                } else {
                                    $gris = true;
                                    ?>
                                    <div class="row"  style="height: 40px; background-color: #fff; padding: 10px;">
                                        <div class="col-xs-6 ">
                                            <?php echo $car->getVal(); ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <?php echo $car->getVal_car(); ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <br>
                <?php
                $map = explode(',', $annonce->getGoogle_map());

                if (count($map) == 2) {
                    ?>
                    <div class="row to_hide">
                        <div class="col-md-12">
                            <h4><?php $google_map; ?></h4>
                            <!-- Add Google Maps -->
                            <div id="map" style="width: 100%; height: 500px"></div>
                        </div>
                    </div>
                    <?php
                }
                $url = $annonce->getVideo_url();
                if ($url != '') {
                    ?>
                    <br>
                    <div class="row to_hide">
                        <div class="col-md-12">
                            <h4>Video</h4>
                            <iframe width="100%" height="445"
                                    src="<?php echo $url; ?>">
                            </iframe>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-12 col-md-12  col-lg-3 to_hide" >
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $alerte_email; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <form method="POST" action="<?php echo site_url('alerte_email'); ?>">
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
                url: '<?php echo site_url('index'); ?>/convert_metric',
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
                url: '<?php echo site_url('index'); ?>/convert_devise',
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
<script type="text/javascript">
    $(document).ready(function () {
        function pager(id) {
            alert(id);
        }
    })
</script>
<?php
if (count($map) == 2) {
    $lat = $map[0];
    $long = $map[1];
}
?>
<script>
    var lat = parseFloat('<?php echo $lat; ?>');
    var lon = parseFloat('<?php echo $long; ?>');
    var myLatLng = {lat: lat, lng: lon};

    function initMap() {

        var mapProp = {
            center: new google.maps.LatLng(lat, lon),
            zoom: 17,
        };
        var map = new google.maps.Map(document.getElementById("map"), mapProp);

        var myLatLng = {lat: lat, lng: lon};

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });

    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        initMap();
    });
</script>