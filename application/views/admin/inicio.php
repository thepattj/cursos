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
                    <div class="instagram-panel pn" style="background: url(<?php echo base_url()."assets/contenido/".$fondo[$i]; ?>) no-repeat center top;
                                                           text-align: center; background-position: center center;">
                      <i class="fa fa-instagram fa-4x"></i>
                      <p>@THISISYOU<br/>
                        5 min. ago
                      </p>
                      <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
                    </div>
                  </div><!-- /col-md-4 -->
                <?php
                  }//end of for
                }else if($total ==0){
                  echo '<center>NO HAY CURSOS PARA ESTE USUARIO';
                }//end of if
                ?>

				        </div><!-- /row -->
              </div><!-- /col-lg-9 END SECTION MIDDLE -->
            </div><!-- COCO -->
