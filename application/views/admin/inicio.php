            <div class="row" name="coco">
              <div class="col-lg-12 main-chart">
                <h3><i class="fa fa-angle-right"></i>&nbsp;Cursos</h3>
                <BR>            
                <div class="row">


                <?php
                if ($total > 0) {
                  for ($i=0; $i < $total; $i++) { 
                ?>
                  <div class="col-md-4 mb">
                    <div class="instagram-panel pn" style="background: url(<?php echo base_url()."assets/contenido/".$fondo[$i]; ?>);
                                                            background-repeat: no-repeat;
                                                            background-attachment: fixed;
                                                            background-position: 50% 50%; ">
                      <BR><BR><BR><BR><BR><BR>
                      <h2><?php echo $nombre[$i]; ?></h2>
                    </div>
                  </div><!-- /col-md-4 -->
                <?php
                  }//end of for
                }//end of if
                ?>

                </div><!-- /row -->
              </div><!-- /col-lg-9 END SECTION MIDDLE -->
            </div><!-- COCO -->
