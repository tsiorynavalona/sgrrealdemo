<div class="container">
    <div class="main-container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
            	
                
            <?php
				if($this->session->userdata('site_lang') == "french"){
					?>
					<h3>À Propos</h3>
                    <p><b>SGR REAL - SGR Real Estate Agency Limited </b>est une société créée pour fournir des services dans le secteur de la gestion immobilière / de l'immobilier.</p>
                    <p>Que vous souhaitiez acheter, vendre ou louer une propriété, nous sommes toujours prêt pour répondre à vos besoins.</p>
                    <p>Nous apportons à nos clients / partenaires les meilleures offres et solutions pour une vie meilleure et un investissement fructueux.</p>
                    <p>Nous avons de bonnes offres pour des propriétés commerciales, des maisons résidentielles, des terrains agricoles/résidentielles, des appartements, des villas au bord de la mer et des propriétés à flanc de colline avec vue panoramique autour.</p>
                    <p>Partagez avec nous votre vision et vos offres et nous vous aiderons à réaliser la valeur!</p>
                    <p>BONNE CHANCE !!!</p>
                    <h4>Mission</h4>
                    <p>Fournir des services à toutes les étapes de votre processus de vente / acquisition / location et garantir les meilleures offres pour les investisseurs mauriciens et étrangers.</p>
                    <h4>Vision</h4>
                    <p>Devenir un guichet unique pour les besoins immobiliers à Maurice, en fournissant tous les services connexes et requis, avant de devenir régional.</p>
					<?php
					
				}else{
					?>
					<h3>About Us</h3>
                    <p><b>SGR REAL - SGR Real Estate Agency Limited </b>is a company created to provide services in the real estate / property management sector.</p>
                    <p>Whether you want to buy, sell or rent a property, we are always ready to meet your needs.</p>
                    <p>We provide our clients / partners with the best offers and solutions for a better life and a successful investment.</p>
                    <p>We have good offers for commercial properties, residential houses, agricultural / residential plots, apartments, seaside villas and hillside properties with panoramic views around.</p>
                    <p>Share with us your vision and your offers and we will help you realize the value!</p>
                    <p>GOOD LUCK !!!</p>
                    <h4>Mission</h4>
                    <p>Provide services at all stages of your sale / acquisition / lease process and guarantee the best deals for Mauritian and foreign investors.</p>
                    <h4>Vision</h4>
                    <p>To become a one stop shop for property needs in Mauritius, provisioning all related and required services, before going regional.</p>
					
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