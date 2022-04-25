<div class="container">
    <div class="main-container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
            	
                
            <?php
				if($this->session->userdata('site_lang') == "french"){
					?>
					<h3 style="text-transform: capitalize;">property evaluation services</h3>
                   <?php
					
				}else{
					?>
					<h3 style="text-transform: capitalize;">property evaluation services</h3>
                    
					<?php
				}
			?>
                
                
                
                
                
            
            </div>
            <div class="col-sm-12 col-md-12  col-lg-3" >
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $alerte_email; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <form method="POST" action="<?php echo base_url(); ?>alerte_email">
                            <h5><?php echo $nom.'*'; ?></h5>
                            <input type='text' name="nom" class='form-control right-form' required />
                            <h5><?php echo $prenom.'*'; ?></h5>
                            <input type='text' name="prenom" class='form-control right-form' required/>
                            <h5>Email*</h5>
                            <input type='email' name="email" class='form-control right-form' required/>
                            <br>
                            <button class='btn btn-bleu' > <?php echo $envoyer; ?> </button>
                        </form>
                    </div>
                </div>
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $actu_evenement; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <img src="" alt=""/>
                        <p class="text-actu">RPC Agence Immobilier vous souhaite
                            un Joyeux Mahashivaratree en ce 15
                            fevrier 2018.</p>
                    </div>
                </div>
                <div class="block">
                    <div class="fond-bleu">
                        <h4><?php echo $conversion_metrique; ?></h4>
                    </div>
                    <div class="fond-gris">
                        <h5><?php echo $convertir_de; ?></h5>
                        <select class='form-control right-form' id="mesure_avant" required>
                            <option value=""  selected></option>
                            <?php foreach ($mesures as $mesure) { ?>
                                <option value="<?php echo $mesure->getVal_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $en; ?></h5>
                        <select class='form-control right-form' id="mesure_apres">
                            <option value=""  selected></option>
                            <?php foreach ($mesures as $mesure) { ?>
                                <option value="<?php echo $mesure->getVal_mesure(); ?>"><?php echo $mesure->getNom_mesure(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $valeur_a_convertir; ?></h5>
                        <input type='number' id="to_convert_metric" class='form-control right-form' />
                        <h5><?php echo $resultat; ?></h5>
                        <input type='text' id="resultat_metric" class='form-control right-form' disabled />
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
                        <select class='form-control right-form' id="devise_avant" required>
                            <option value="" selected  ></option>
                            <?php foreach ($devises as $devise) { ?>
                                <option value="<?php echo $devise->getMontant_devise(); ?>"><?php echo $devise->getNom_devise(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $en; ?></h5>
                        <select class='form-control right-form' id="devise_apres" required>
                            <option value="" selected  ></option>
                            <?php foreach ($devises as $devise) { ?>
                                <option value="<?php echo $devise->getMontant_devise(); ?>"><?php echo $devise->getNom_devise(); ?></option>
                            <?php } ?>
                        </select>
                        <h5><?php echo $valeur_a_convertir; ?></h5>
                        <input type='number' id="to_convert_devise" class='form-control right-form' required />
                        <h5><?php echo $resultat; ?></h5>
                        <input type='text' id="resultat_devise" class='form-control right-form' disabled  />
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
	
	
	
	
</script>