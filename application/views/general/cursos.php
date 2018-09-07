
              <h3><i class="fa fa-angle-right"></i>&nbsp;Cursos</h3>

          	 <!-- COMPLEX TO DO LIST -->			
              <div class="row mt">
                <div class="col-md-12">
                  <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                      <div class="pull-left"><h5><i class="fa fa-tasks"></i>&nbsp; Elementos</h5></div>
                      <br>
                    </div>
                    <div class="panel-body">
                      <div class="task-content">
                        <ul class="task-list">

                        <?php

                        $tipos = ['bg-important', 'bg-info']; 
                        $tiposTxt = ['Inactivo', 'Activo']; 

                        if($total == 0){
                          echo "No hay elementos existentes";
                        }else{
                          for ($i=0; $i < $total; $i++) { 
                        ?>
                          <li>
                             <a href=" <?php echo base_url()."generales/curso/". $id[$i]; ?>"  style="color: #797979">
                              <div class="task-title">                             
                                <span class="task-title-sp"><?php echo $nombre[$i]; ?></span>
                                <span class="badge <?php echo $tipos[$publicado[$i]]; ?>"><?php echo $tiposTxt[$publicado[$i]]; ?></span>
                            </div>  </a>
                          </li>   
                          <?php
                          }//end of for
                        }//end of else
                        ?>

                        </ul>
                      </div>
                    </div>
                  </section>
                </div><!-- /col-md-12-->
              </div><!-- /row -->
			
			