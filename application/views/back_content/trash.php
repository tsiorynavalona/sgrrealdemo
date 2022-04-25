<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Archive</h3>
                        <div class="box-tools">
                            <a class="btn btn-default pull-right" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl')); ?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Annonces</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                   <!--  <form class="form" action="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/rechercherTrash')); ?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <input class="form-control pull-right" type="text" placeholder="Reference" name="reference"/>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-search"></span>&nbsp; Rechercher</button>
                            </div>
                        </div>
                    </form -->>
                    <br>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="example2">
                            <thead>
                            <tr>
                                <th>Reference</th>
                                <th width="250px">Titre</th>
                                <th>Prix</th>
                                <th>Sous region</th>
                                <th>Region</th>
<!--                                <th>Agent</th>
                                <th>Client</th>-->
                                <th>Statut</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($annonces as $annonce) { ?>
                                <tr>
                                    <td><?php echo $annonce->getReference(); ?></td>
                                    <td><?php echo $annonce->getTitre_annonce(); ?></td>
                                    <td><?php echo $annonce->getPrix() . " " . $annonce->getDevise()->getSymbole(); ?></td>
                                    <td><?php echo $annonce->getSousregion()->getVal(); ?></td>
                                    <td><?php echo $annonce->getSousregion()->getRegion()->getVal(); ?></td>
    <!--                                    <td><?php // echo $annonce->getAgent()->getPrenom() . " " . $annonce->getAgent()->getNom();             ?></td>
                                    <td><?php //echo $annonce->getClient()->getPrenom() . " " . $annonce->getAgent()->getNom();             ?></td>-->
                                    <td><?php echo $annonce->getStatut()->getVal(); ?></td>
                                    <td><?php echo $annonce->getType()->getVal(); ?></td>
                                    <td>
                                        <a class="btn btn-xs" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/restore/' . $annonce->getId_ann())); ?>">
                                            <span ><img height="30" width="30" src="<?php echo base_url('back_assets/img/restore.png'); ?>"/></span>
                                        </a>
                                        <a class="supprimer-banque btn btn-xs btn-danger" href="<?php echo str_replace("?", "", site_url('back_ctrl/Annonce_Ctrl/delete_trash/' . $annonce->getId_ann())); ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </body>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
       <!--  <?php if($page != null) {?>
        <div class="page">
            <ul class="pagination pagination-sm">
                <?php if ($page != 1) { ?>
                    <li><a class="numpage" href="<?php echo str_replace("?", "", site_url()) . "/" . $url . "/" . ($page - 1) ?>" data-page="prev"> < </a></li>
                    <?php
                }
                $i = 1;
                for ($i; $i <= $nb_page; $i++) {
                    ?>
                    <li><a class="numpage" href="<?php echo str_replace("?", "", site_url()) . "/" . $url . "/" . $i ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                if ($page < $nb_page && $page <= $nb_page) {
                    ?>
                    <li><a class="numpage" href="<?php echo str_replace("?", "", site_url()) . "/" . $url . "/" . ($page + 1) ?>" data-page="next" > > </a></li>
                <?php } ?>
            </ul>
            </div>
            <?php } ?> -->
    </section>
</div>

