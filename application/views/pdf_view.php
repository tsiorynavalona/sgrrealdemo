<?php
// create new PDF document
$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('My Title');
$pdf->SetHeaderMargin(10);
$pdf->SetTopMargin(60);
$pdf->setFooterMargin(15);
$pdf->SetAutoPageBreak(true, 25);
$pdf->SetAuthor('RPC');
$pdf->SetDisplayMode('real', 'default');

// set default header data
$pdf->SetHeaderData('logo.png', 45, '', '');

$pdf->AddPage();

function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

$source_img = base_url('assets/images/' . $annonce->getImagePrincipal());
$destination_img = './pdfmaker/'.$annonce->getImagePrincipal();
compress($source_img, $destination_img, 29);

    foreach ($annonce->getImages() as $key => $image) {
        $source_img1=base_url('assets/images/' . $image->getNom_image());
		$destination_img1 = './pdfmaker/'.$image->getNom_image();
		compress($source_img1, $destination_img1, 32);
    }

ob_start();
$images = $annonce->getImages(); 
?>

<div>
    <h4 style="text-decoration: underline;"><?php echo $annonce->getTitre_annonce(); ?></h4>

    <p><img src="<?php echo base_url('pdfmaker/' . $annonce->getImagePrincipal()); ?>" width="798" height="425"></p>

    <?php
    foreach ($images as $key => $image) {
        ?>
        <img src="<?php echo base_url('pdfmaker/' . $image->getNom_image()); ?>" width="169" height="100">
        <span> </span>
        <?php
    }
    ?>
</div>
<br/>
<p>
    <?php echo $annonce->getDescription_annonce(); ?>
</p>
<div>
    <p> Type de bien:<b> <?php echo $annonce->getType()->getVal(); ?> </b> </p>
    <?php
    $sousregion = $annonce->getSousregion();
    $devise = $annonce->getDevise();
    $agent = $annonce->getAgent();
    ?>
    <p> Region: <b> <?php echo$sousregion->getRegion()->getVal(); ?>  </b> </p>
    <p> Sous-Region: <b> <?php echo$sousregion->getVal(); ?> </b> </p>
    <?php if ($devise->getLeft_symbole() == "1") { ?>
        <p> Prix: <b> <?php echo $devise->getSymbole() . " " . $annonce->getPrix(); ?>  </b> </p>
    <?php } else {
        ?> <p> Prix: <b> <?php echo $annonce->getPrix() . " " . $devise->getSymbole(); ?></b> </p>
        <?php
    }
    ?>
    <p> Reference Annonce: <b> <?php echo $annonce->getReference(); ?> </b> </p>
    <?php if ($agent != null) { ?>
        <p> Agent a contacter:<b> <?php echo $agent->getPrenom() . " " . $agent->getNom() . ", mob:" . $agent->getTel(); ?></b> </p>
    <?php } ?>
</div>
<div>
    <h4 style="text-decoration: underline;">Caracteristiques</h4>
    <table>
        <?php
		$icones = $annonce->getIcones();
		$gris = true;
		if (!empty($icones)) {
                            foreach ($icones as $icone) {
								
                                if ($gris) {
                                    $gris = false;
                                    ?>
                                   
                                    
                                    <tr style="background-color: #f0f0f0; padding: 10px;">
                                        <td width="270" align="center">
                                            <?php echo $icone->getNom_icone(); ?>
                                        </td>
                                        <td width="270" align="center">
                                            <?php
                                            echo $icone->getVal_icone();
                                            $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                            echo " " . $mes;
                                            ?>
                                        </td>
                    
                                    </tr>
                                    
                                    
                                    
                                    <?php
                                } else {
                                    $gris = true;
                                    ?>
                                    
                                    <tr style="background-color: #fff; padding: 10px;">
                                        <td width="270" align="center">
                                            <?php echo $icone->getNom_icone(); ?>
                                        </td>
                                        <td width="270" align="center">
                                            <?php
                                            echo $icone->getVal_icone();
                                            $mes = ($icone->getMesure() != null) ? $icone->getMesure()->getSymbole() : "";
                                            echo " " . $mes;
                                            ?>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                }
                            }
                        }
		
        $gris = true;
        $cars = $annonce->getCaracteristiques();
        foreach ($cars as $car) {
            if ($gris) {
                $gris = false;
                ?>
                <tr style="background-color: #f0f0f0; padding: 10px;">
                    <td width="270" align="center">
                        <?php echo $car->getVal(); ?>
                    </td>
                    <td width="270" align="center">
                        <?php echo $car->getVal_car(); ?>
                    </td>

                </tr>
                <?php
            } else {
                $gris = true;
                ?>
                <tr style="background-color: #fff; padding: 10px;">
                    <td width="270" align="center">
                        <?php echo $car->getVal(); ?>
                    </td>
                    <td width="270" align="center">
                        <?php echo $car->getVal_car(); ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>

<?php
$content = ob_get_contents();
ob_end_clean();
//$pdf->writeHTML($content, true, false, true, false, '');
$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, '', true);

$pdf->Output('RPC-' . $annonce->getTitre_annonce() . '.pdf', 'D');
