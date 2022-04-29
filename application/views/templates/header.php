<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>SGR - Real Estate Agency</title>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/logo.png') ?>"/>
        
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/caroussel.css') ?>" />
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/style.css') ?>" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style-print.css') ?>" type="text/css" media="print">
        <!-- <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/font-awesome.min.css') ?>" /> -->
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity = "sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin = "anonymous"/>
        <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    </head>
    <body class="container" >
<?php
	/*

<div data-spy="affix" data-offset-top="10">
	*/
?>
        <div class="marg-top-20">
            <div class = "container" >
                <div class = "top-menu to_hide">
                    <div class = "email">
                        <p>Tel: (230) 5943 7200 | Mobile:5705 7200 | Fax: 427 4557 | Email: dhan@sgrreal.com</p>
                    </div>
                    <?php if ($langue == 'french') { ?>
                        <div class = "lang">
                            <a href="<?php echo site_url('?switchLanguage=english'); ?>"><img src = "<?php echo base_url('assets/images/Lang-EN.png') ?>"/></a>
                        </div>
                    <?php } else {
                        ?>
                        <div class = "lang">
                            <a href="<?php echo site_url('?switchLanguage=french'); ?>"><img  width="50" height="30" src = "<?php echo base_url('assets/images/FRAN0001.GIF') ?>"/></a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class = "container">
                <!-- <div class="contact-details">
                    <div class = "top-email">
                        <p><img src="<?php echo base_url('assets/images/tel.png') ?>"/>: Standard (00230) 5294-9691 | Service Commercial: 427-2696 | GSM: 5780-4852 | <img src="<?php echo base_url('assets/images/mail.png') ?>"/>: contact@rpc-ea.com</p>
                    </div>
                <?php if ($langue == 'french') { ?>
                                                                <div class = "top-lang">
                                                                    <a href="<?php echo site_url('index/switchLanguage/english'); ?>"><img src = "<?php echo base_url('assets/images/Lang-EN.png') ?>"/></a>
                                                                </div>
                <?php } else {
                    ?>
                                                                <div class = "top-lang ">
                                                                    <a href="<?php echo site_url('index/switchLanguage/french'); ?>"><img width="50" height="30" src = "<?php echo base_url('assets/images/FRAN0001.GIF') ?>"/></a>
                                                                </div>
                    <?php
                }
                ?>
                </div> -->


                <div class = "header">
                    <div class = "row">
                        <div class = "col-xs-6 col-lg-3 to_hide">
                            <div class = "logo">
                                <a href = "<?php echo base_url(); ?>"><img src = "<?php echo base_url('assets/images/logo.png') ?>"  alt = "SGR-Real Estate logo"/></a>
                            </div>
                        </div>
                        <div class = "col-xs-6 col-lg-3 to_show">
                            <div class = "logo">
                                <img src = "<?php echo base_url('assets/images/logo.png') ?>" alt = "SGR-Real Estate logo"/>
                            </div>
                        </div>
                        
                        <div class = "col-xs-6 col-lg-6 to_hide text-center site-heading">
                            <h4><span>SGR REAL</span></h4>
                            <div class="site-des">SGR Real Estate Agency Ltd</div>
                        </div>
                        
                        <div class = "col-xs-6 col-lg-2 to_hide" style="margin-top:45px; font-size:20px;">
                           
                            <a href="<?php echo base_url(); ?>back_ctrl/index/login" style="color:#000;">Webmaster Login</a>
                        </div>
                        
                    
                </div>
            </div>
        </div>
        
        <!-- menue will be here -->
        
        <div class="clearfix"></div>
        <div class="container">
        	
            <div class = "col-xs-12 col-lg-12 to_hide" style="padding:0px; ">
                            
                            <button type="button" class="navbar-toggle my-burger-menu" data-toggle="collapse" data-target="#responsiveNavBar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class = "collapse navbar-collapse" id="responsiveNavBar">
                                
                                
                                <ul class="nav navbar-nav" style="background: #0066cc !important; width:100%;">
                                    <?php
										$count = 0;
									 foreach ($statuts as $statut) { ?>
                                        <li class="dropdown">   
                                            <a  href="javascript:void(0)" class="dropbtn" ><?php
												if($count == 0){
													echo(' '.strtoupper($statut->getVal())); 
												}else{
													echo(' '.strtoupper($statut->getVal())); 
												} 
												$count++;
											?>
                                                <!-- &nbsp;<i class = "fa fa-sort-down" aria-hidden = "true" style = "font-size: 20px"></i> -->
                                            </a>
                                            <div class="dropdown-content">
                                                <?php
                                                foreach ($statut_type as $type) {
                                                    if ($statut->getId_statut() == $type->getId_statut()) {
                                                        ?>
                                                        <a href="<?php echo str_replace("?", "", site_url("menu/" . url_title(convert_accented_characters($statut->getVal()), '-', true) . "/" . url_title(convert_accented_characters($type->getVal_type()), '-', true) . "-" . $type->getId_type() . "-" . $statut->getId_statut())) ?>"><?php echo $type->getVal_type(); ?></a>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </li>

                                    <?php } ?>
                                    
                                    
                                    
                                    <li class="dropdown">   
                                            <a href="javascript:void(0)" class="dropbtn">  SERVICES                                                <!-- &nbsp;<i class = "fa fa-sort-down" aria-hidden = "true" style = "font-size: 20px"></i> -->
                                            </a>
                                            <div class="dropdown-content">
                                            
                                            	<?php if ($langue == 'french') { ?>
                                            	<a href="<?php echo str_replace("?", "", site_url('services')); ?>/property-management">Gestion de la propriété</a>
                                                <a href="<?php echo str_replace("?", "", site_url('services')); ?>/syndic-management-of-co-propriety">Syndic - Gestion de copropriété</a>
                                                <a href="<?php echo str_replace("?", "", site_url('services')); ?>/partage-sharing-heirs-descendants">Partage / Partage (héritiers / descendants)</a>
                                                <a href="<?php echo str_replace("?", "", site_url('services')); ?>/sub-division-of-land">Subdivision de terre</a>
                                                <a href="<?php echo str_replace("?", "", site_url('services')); ?>/land-surveying">Arpentage</a>
                                                <a href="<?php echo str_replace("?", "", site_url('services')); ?>/notarial-services">Services notariaux</a>
                                                <a href="<?php echo str_replace("?", "", site_url('services')); ?>/building-contracting">Bâtiment et sous-traitance</a>
                                                <a href="<?php echo str_replace("?", "", site_url('services')); ?>/property-evaluation-services">Services d'évaluation de propriété</a>
                                           
                                            	<?php
												}else{
												?>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/property-management">Property Management</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/syndic-management-of-co-propriety">Syndic - Management of Co-Propriety</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/partage-sharing-heirs-descendants">Partage / Sharing (heirs/ descendants)</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/sub-division-of-land">Sub-division of Land</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/land-surveying">Land Surveying</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/notarial-services">Notarial Services</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/building-contracting">Building &amp; Contracting</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/property-evaluation-services">Property Evaluation Services</a>
                                           <?php
												}
										   ?>
                                           
                                           </div>
                                        </li>
                                        
                                        
                                      <li class="dropdown">   
                                            <a href="javascript:void(0)" class="dropbtn"> CONTRACTOR                                                <!-- &nbsp;<i class = "fa fa-sort-down" aria-hidden = "true" style = "font-size: 20px"></i> -->
                                            </a>
                                            <div class="dropdown-content">
                                            <?php if ($langue == 'french') { ?>
                                            	<a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/landscapingt">Aménagement paysager</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/painting-works">Travaux de peinture</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/land-clearing">Défrichage / planification</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/excavation-works">Travaux d'excavation</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/renovation-works">Travaux de rénovation</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/carting-services">Services de karting</a>
                                           
                                            <?php
												}else{
												?>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/landscapingt">Landscaping</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/painting-works">Painting Works</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/land-clearing">Land Clearing / Planning</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/excavation-works">Excavation Works</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/renovation-works">Renovation Works</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/carting-services">Carting Services</a>
                                           <?php
												}
										   ?>
                                           </div>
                                        </li>
                               
                               
                                    <li class="dropdown">
                                    	<?php
											$abtxt = "ABOUT US";
											if ($langue == 'french') {
												$abtxt = "A Propos";
											}
										?>
                                        <a href="<?php echo str_replace("?", "", site_url('about')); ?>" class="dropbtn" ><?php echo ''.$abtxt; ?></a>
                                    </li>
                                    
                                    <li class="dropdownpadding">
                                        <a href="<?php echo str_replace("?", "", site_url('contact')); ?>" class="dropbtn  contact-menu1 " ><?php echo ''.strtoupper('Contact'); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
        
        
        </div>
        
        
        <!-- menu will be end here -->

        <div class = "container margin-bot-20">
            <div class = "banniere to_hide">
                <div class = "row">
                    <div class = "col-lg-9 col-sm-7 col-md-8 col-xs-12 banniere-left">
                        <marquee direction="right">
                            <?php foreach ($textes as $texte) { ?>
                                <a>
                                    <?php
                                    for ($i = 0; $i < 200; $i++)
                                        echo('&nbsp');
                                    ?>
                                    <?php echo $texte->getVal(); ?>
                                </a>
                            <?php } ?>
                        </marquee>
                    </div>
                    <div class = "col-lg-3 col-sm-5 col-md-4 col-xs-12">
                        <div class = "search-container">
                            <form action="<?php echo site_url() ?>/index/search" method="GET">
                                <input type = "text" placeholder = "<?php echo $search_placeholder; ?>" name = "search"><button type = "submit" class = "search-btn"><i class = "fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

