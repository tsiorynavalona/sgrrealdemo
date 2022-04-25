<style>
	.ano_cls{
		display:none;
	}
	a{
		color:#333;
	}
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover{
		color:#337ab7;
	}
	#topheading, .chracts{
		color:#337ab7;
	}
</style>
<div class="container">
    <div class="main-container">
    
    	<h4 class="col-md-8" id="topheading" style="padding-top:25px;">
        	&nbsp;
        </h4>
    	
    	<h4 style="padding-top:30px;" class="col-md-2">
        	<a href="javascript::;" class="prev"><i class="fa fa-backward"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript::;" class="play" style="display:none;"><i class="fa fa-play"></i></a>
            <a href="javascript::;" class="pause" ><i class="fa fa-pause"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="javascript::;" class="next"><i class="fa fa fa-forward"></i></a>
        </h4>
    	<div class="col-md-2" style="margin-bottom:10px;">
        	<div class = "logo">
                <img src = "<?php echo base_url('assets/images/logo.png') ?>" style="width:90%;" alt = "RPC-Real Estate logo"/>
            </div>
        </div>
    	<?php
			$count = 0;
			$fhead = "";
			
			
			foreach($annonces_premieres as $annonce){
			
			if($count == 0){
				$cls = '';
				$fhead = $annonce->getTitre_annonce();
			}else{
				$cls = 'ano_cls';
			}
		?>
        <div class="row annoncs <?php echo $cls; ?>" id="annonce_<?php echo $count; ?>">
            <div class="col-sm-12 col-md-12 col-lg-8">
            
             <?php
			 
			 	
				
				$sousregion = $annonce->getSousregion();
				
                $images = $annonce->getImages();
				$map = explode(',', $annonce->getGoogle_map());
				
				
				$url = $annonce->getVideo_url();
				
                ?>
                <h4 id="heading_<?php echo $count; ?>" style="display:none;"><?php echo $annonce->getTitre_annonce(); ?></h4>
                
                <div class="row to_hide">
                	<ul class="nav nav-tabs" style="margin:0px 15px 10px 15px ;">
                		<li class="active"><a data-toggle="tab"  href="#myCarousel20<?php echo $count; ?>"> <span>Photo Gallery</span></a></li>
                    	
                        <?php
						if (count($map) == 2) {
							?>
							<li><a data-toggle="tab"  href="#map<?php echo $count; ?>"> <span>Map de localisation</span></a></li>
							<?php
						}
						?>
                        
                        
                        <?php
							if($url != ''){
							?>
							<li><a data-toggle="tab"  href="#video<?php echo $count; ?>"> <span>Video</span></a></li>
							<?php	
							}
						?>
                    	
                	</ul>
                    <div id="tab-content" class="tab-content">
                    	<div id="myCarousel20<?php echo $count; ?>" class="tab-pane fade in active">
                    <div id="myCarouse0l20<?php echo $count; ?>" class="col-xs-12 carousel slide" data-ride="carousel">
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
                            <li data-target="#myCarouse0l20<?php echo $count; ?>" data-slide-to="0" class="active" style="padding:5px;">
                                <img class='img-thumbnail-no-border' src="<?php echo base_url('assets/images/' . $annonce->getImagePrincipal()); ?>" width="110" height="71">
                            </li>
                            <?php
                            foreach ($images as $key => $image) {
                                ?>
                                <li data-target="#myCarouse0l20<?php echo $count; ?>" data-slide-to="<?php echo $key + 1; ?>"  style="padding:5px;">
                                    <img class='img-thumbnail-no-border' src="<?php echo base_url('assets/images/' . $image->getNom_image()); ?>" width="110" height="71">
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        </div>
                    </div><!-- End Carousel -->
                    <?php
						
						if (count($map) == 2) {
							
							$lat = $map[0];
    						$long = $map[1];
							
							?>
                            <div id="map<?php echo $count; ?>" class="tab-pane fade">
                                <div class="row to_hide">
                                    <div class="col-md-12">
                                        <h4><?php $google_map; ?></h4>
                                        <!-- Add Google Maps -->
                                        <div id="mapid_<?php echo $count; ?>" style="width: 100%; height: 500px"></div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="showmap_<?php echo $count; ?>" value="1" />
                            <input type="hidden" id="lat_<?php echo $count; ?>" value="<?php echo $lat; ?>" />
                            <input type="hidden" id="lng_<?php echo $count; ?>" value="<?php echo $long; ?>" />
							<?php
						}else{
							?>
							<input type="hidden" id="showmap_<?php echo $count; ?>" value="0" />
							<?php
						}
					
						if($url != ''){
						?>
						 <div id="video<?php echo $count; ?>" class="tab-pane fade">
                         	<iframe width="100%" height="445" src="<?php echo $url; ?>">
                            </iframe>
                         </div>
                        
						<?php
							
						}
					?>	
                   
                    </div>
                </div>
                
                <br class="to_hide"/>

                
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
            
            		
                
            </div>
            <div class="col-sm-12 col-md-12  col-lg-4">
                <div class="block">
                    <h4 class="col-md-12 chracts"><?php echo $caracteristique; ?></h4>
                    <div class="fond-gris" style="background-color: unset;">
                        
                        
                        
                        <div class="row">
                    <div class="col-md-12">
                        <?php
                        $cars = $annonce->getCaracteristiques();
                        $icones = $annonce->getIcones();
                        if (!empty($icones) || !empty($cars)) {
                            ?>
                            
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
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
                
              
            </div>
        </div>

    
    
    <?php
		$count++;
			}
	
	?>
    </div>
    
</div>
</div>
<script>

	setInterval(function(){ update2(); }, 1000);
	
	var cont = 0;
	var tot = "<?php echo $count; ?>";
	tot = tot - 1;
	var timr = 0;
	var playing = 1;
	
	$(document).on("click", ".play", function(){
		playing = 1;
		$(".pause").show();
		$(".play").hide();
	});
	$(document).on("click", ".pause", function(){
		playing = 0;
		$(".play").show();
		$(".pause").hide();
	});
	
	$(document).on("click", ".next", function(){
		shownext();
	});
	$(document).on("click", ".prev", function(){
		showprv();
	});
	
	function update2(){
		if(playing == 0){
			return false;
		}
		timr = timr + 1;
		
		if(timr < 10){
			return false;
		}
		
		timr = 0;
		
		cont = cont + 1;
		
		update();
	}
	
	function showprv(){
		cont = cont - 1;
		update();
	}
	
	function shownext(){
		cont = cont + 1;
		update();
	}
	
	function update(){
		
		if(cont < 0){
			cont = tot;
		}
		if(cont > tot){
			cont = 0;
		}
		
		var shodiv = "#annonce_" + cont;
		$(".annoncs").hide();
		
		var sheadv = "#heading_" + cont;
		var headv = $(sheadv).html();
		
		$("#topheading").html(headv);
		
		$(shodiv).show();
		
		var shomap = "#showmap_" + cont;
		
		
		
		var ishomap = $(shomap).val();
		
		if(ishomap == 1){
			var latid = "#lat_" + cont;
			var lngid = "#lng_" + cont;
			var lat = $(latid).val();
			var lng = $(lngid).val();
			var mapid = "mapid_" + cont;
			initMap(lat, lng, mapid);
		}
		
		
	}
	
	var fhead = "<?php echo $fhead; ?>";
	$("#topheading").html(fhead);

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
  //  var lat = parseFloat('<?php echo $lat; ?>');
   // var lon = parseFloat('<?php echo $long; ?>');
  //  var myLatLng = {lat: lat, lng: lon};
	
	
	

    function initMap(lat, lon, mapid) {
		
        var mapProp = {
            center: new google.maps.LatLng(lat, lon),
            zoom: 15,
        };
        var map = new google.maps.Map(document.getElementById(mapid), mapProp);
        var myLatLng = {lat: lat, lng: lon};

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });

    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        initMap(lat, long);
    });
</script>
