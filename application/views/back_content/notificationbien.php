<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Notification - Expiration du Mandat des biens</h3>
                        <div class="box-tools">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                    
                    	<?php
							if(count($estimations) > 0){
						?>
                    
                        <table class="table table-hover">
                            <tr>
                                <th>Reference</th>
                                <th>Titre</th>
                                <th>Agent</th>
                                <th>Client</th>
                                <th>Mandat signe le</th>
                                <th>Expiration</th>
                            </tr>
                            <?php 
							
							$phtime = date("Y-m-d", time());
							$comptime = strtotime("-6 month", time());
							foreach ($estimations as $estimation) { 
							
								$curdat = $estimation->getmandate();
								$curtim = strtotime($curdat);
								
								$disdat = $curtim;
								
								//echo time()."_".$curtim."_".date("Y-m-d", $disdat)."here-";
								
								
								if($curtim > $comptime){
									$disdat = strtotime($curdat);
									//echo " is coing here ";
								}else{
									
									$key = true;
									$count = 0;
									

									while($key){
										// Do stuff
										if($count > 100000){
											$key = false;
											break;
										}
										
										$count++;
										
										if($disdat > $comptime){ 
											$key = false;
										}else{
											$ndt = date("Y-m-d", $disdat);
											//echo $disdat."-".$ndt."<br>";
											$disdat = strtotime("+6 month", $disdat);
										}
									}
									
									
								}
								
								
								$exptim = strtotime("+6 month", $disdat);
							
							?>
                            
                            	
                            
                                <tr>
                                    <td><?php echo $estimation->getreference(); ?></td>
                                    <td><?php echo $estimation->gettitle(); ?></td>
                                    <td><?php echo $estimation->getagent(); ?></td>
                                    <td><?php echo $estimation->getclient(); ?></td>
                                    <td><?php echo date("Y-m-d", $disdat); ?></td>
                                    <td><?php echo date("Y-m-d", $exptim); ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <?php
							}else{
								?>
								<p class="alert alert-danger">No Data Found</p>
								<?php
							}
						?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
