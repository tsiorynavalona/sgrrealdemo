<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>SGR - Real Estate Agency</title>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/logo.png') ?>"/>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/style.css') ?>" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style-print.css') ?>" type="text/css" media="print">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/caroussel.css') ?>" />
        <!-- <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/font-awesome.min.css') ?>" /> -->
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity = "sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin = "anonymous"/>
        <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    </head>
    <body class="container" >
        <div data-spy="affix" data-offset-top="10">
            <div class = "container">
                <div class = "top-menu to_hide">

                    <div class = "email">
                        <p>Tel: (230) 5943 7200 | Mobile:5705 7200 | Fax: 427 4557 | Email: dhan@sgrreal.com</p>
                    </div>
                    <?php if ($langue == 'french') { ?>
                        <div class = "lang">
                            <a href="<?php echo str_replace("?", "", site_url('index?switchLanguage=english')); ?>"><img src = "<?php echo base_url('assets/images/Lang-EN.png') ?>"/></a>
                        </div>
                    <?php } else {
                        ?>
                        <div class = "lang">
                            <a href="<?php echo str_replace("?", "", site_url('index?switchLanguage=french')); ?>"><img  width="50" height="30" src = "<?php echo base_url('assets/images/FRAN0001.GIF') ?>"/></a>
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
                        <div class = "col-xs-6 col-lg-9 to_hide" style="padding:0px;">
                            <!-- <div class="row hide-on-small">
                                <div class = "top-header-left col-sm-6">
                                    <h1 style="font-size:40px;"><?php echo $header_text; ?></h1>
                                    <h1 style="font-size:40px;padding-left:50px"><?php echo $header_text_bottom; ?></h1>
                                </div>
                                <div class = "top-header-right col-sm-6">
                                    <img src = "<?php echo base_url('assets/images/top-right.jpg') ?>" alt = " Estate Maurice"/>
                                </div>
                            </div> -->
                            <button type="button" class="navbar-toggle my-burger-menu" data-toggle="collapse" data-target="#responsiveNavBar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class = "collapse navbar-collapse" id="responsiveNavBar">
                                <div class="col-sm-3"></div>
                                <ul class="nav navbar-nav">
                                    <?php
										$count = 0;
									 foreach ($statuts as $statut) { ?>
                                        <li class="dropdown">   
                                            <a  href="javascript:void(0)" class="dropbtn" ><?php
												if($count == 0){
													echo('&nbsp;&nbsp;&nbsp; '.strtoupper($statut->getVal())); 
												}else{
													echo(' &nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp; '.strtoupper($statut->getVal())); 
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
                                            <a href="javascript:void(0)" class="dropbtn"> &nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp; SERVICES                                                <!-- &nbsp;<i class = "fa fa-sort-down" aria-hidden = "true" style = "font-size: 20px"></i> -->
                                            </a>
                                            <div class="dropdown-content">
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/property-management">Property Management</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/syndic-management-of-co-propriety">Syndic - Management of Co-Propriety</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/partage-sharing-heirs-descendants">Partage / Sharing (heirs/ descendants)</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/sub-division-of-land">Sub-division of Land</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/land-surveying">Land Surveying</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/notarial-services">Notarial Services</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/building-contracting">Building &amp; Contracting</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('services')); ?>/property-evaluation-services">Property Evaluation Services</a>
                                           </div>
                                        </li>
                                        
                                        
                                      <li class="dropdown">   
                                            <a href="javascript:void(0)" class="dropbtn"> &nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp; CONTRACTOR                                                <!-- &nbsp;<i class = "fa fa-sort-down" aria-hidden = "true" style = "font-size: 20px"></i> -->
                                            </a>
                                            <div class="dropdown-content">
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/landscapingt">Landscaping</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/painting-works">Painting Works</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/land-clearing">Land Clearing / Planning</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/excavation-works">Excavation Works</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/renovation-works">Renovation Works</a>
                                                 <a href="<?php echo str_replace("?", "", site_url('contractor')); ?>/carting-services">Carting Services</a>
                                           </div>
                                        </li>
                               
                                    
                                    <?php
									
									/*


                                    <li class="">
                                        <a href="<?php echo str_replace("?", "", site_url($url_infos_utiles)); ?>" class="dropbtn"><?php echo('&nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp;'.strtoupper($information)); ?></a>
                                    </li>
                                    <li class=" ">
                                        <a href="<?php echo str_replace("?", "", site_url($url_notre_agence)); ?>" class="dropbtn"><?php echo('&nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp;'.strtoupper($notre_agence )); ?></a>

                                    </li>
									
									*/
									?>
                                    
                                    <li class="">
                                    	<?php
											$abtxt = "ABOUT US";
											if ($langue == 'french') {
												$abtxt = "A Propos";
											}
										?>
                                        <a href="<?php echo str_replace("?", "", site_url('about')); ?>" class="dropbtn " ><?php echo '&nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp;'.$abtxt; ?></a>
                                    </li>
                                    
                                    <li class="">
                                        <a href="<?php echo str_replace("?", "", site_url('contact')); ?>" class="contact-menu " ><?php echo strtoupper('Contact'); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "container">
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

