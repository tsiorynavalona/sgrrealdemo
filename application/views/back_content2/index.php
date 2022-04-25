<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">CRUD Annonce</h3>

                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/Ajout'); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter</a>
                            <a class="btn btn-default pull-right" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/archive'); ?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Archives</a>
                        </div>
                    </div>
                    <form class="form" action="<?php echo site_url('back_ctrl/Annonce_Ctrl/rechercher'); ?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <input class="form-control pull-right" type="text" placeholder="Reference" name="reference"/>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-search"></span>&nbsp; Rechercher</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Reference</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Sous region</th>
                                <th>Region</th>
<!--                                <th>Agent</th>
                                <th>Client</th>-->
                                <th>Statut</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                            foreach ($annonces as $annonce) {
                                $sousregion = $annonce->getSousregion();
                                $href = site_url() . "/annonce/" . url_title(convert_accented_characters($annonce->getStatut()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getType()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getRegion()->getVal()), '-', true) . "/" . url_title(convert_accented_characters($sousregion->getVal()), '-', true) . "/" . url_title(convert_accented_characters($annonce->getTitre_annonce()), '-', true) . "-" . $annonce->getId_ann();
                                ?>
                                <tr>
                                <?php
									$contdt = $annonce->getdate_contrat();
								?>
                                
                                    <td><?php echo $annonce->getReference(); ?></td>
                                    <td><?php echo $annonce->getTitre_annonce(); ?></td>
                                    <?php if ($annonce->getDevise()->getLeft_symbole() == "1") { ?>
                                        <td><?php echo $annonce->getDevise()->getSymbole() . " " . $annonce->getPrix(); ?></td>

                                    <?php } else {
                                        ?>
                                        <td><?php echo $annonce->getPrix() . " " . $annonce->getDevise()->getSymbole(); ?></td>
                                        <?php
                                    }
                                    ?>

                                    <td><?php echo $sousregion->getVal(); ?></td>
                                    <td><?php echo $sousregion->getRegion()->getVal(); ?></td>
    <!--                                    <td><?php //echo $annonce->getAgent()->getPrenom() . " " . $annonce->getAgent()->getNom();                     ?></td>
                                    <td><?php // echo $annonce->getClient()->getPrenom() . " " . $annonce->getAgent()->getNom();                     ?></td>-->
                                    <td><?php echo $annonce->getStatut()->getVal(); ?></td>
                                    <td><?php echo $annonce->getType()->getVal(); ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/detail/' . $annonce->getId_ann()); ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo site_url('back_ctrl/Annonce_Ctrl/delete_annonce/' . $annonce->getId_ann()); ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a class="btn btn-xs btn-default" href="<?php echo $href; ?>">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    <?php if($page != null) {?>
        <div class="page">

            <ul class="pagination pagination-sm">
                <?php if ($page != 1) { ?>
                    <li><a class="numpage" href="<?php echo site_url() . "/" . $url . "/" . ($page - 1) ?>" data-page="prev"> < </a></li>
                    <?php
                }
                $i = 1;
                for ($i; $i <= $nb_page; $i++) {
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
    <?php } ?>
    </section>
</div>

