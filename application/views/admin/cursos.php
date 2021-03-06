
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
                              <a href="<?php echo base_url()."admin/curso/".$id[$i];?>" style="color: #797979"> 
                                  <div class="task-title">
                                      <span class="task-title-sp"><?php echo $nombre[$i]; ?></span>
                                      <span class="badge <?php echo $tipos[$publicado[$i]]; ?>"><?php echo $tiposTxt[$publicado[$i]]; ?></span>
                                      <div class="pull-right hidden-phone">
                                          <a class="btn btn-primary btn-xs" href="<?php echo base_url()."admin/editarCurso/".$id[$i]; ?>" ><i class="fa fa-pencil"></i></a>
                                          <a class="btn btn-danger btn-xs" href="<?php echo base_url()."admin/eliminarCurso/".$id[$i]; ?>" ><i class="fa fa-trash-o "></i></a>
                                      </div>
                                  </div>
                              </a>
                          </li> 
                          

                          <?php
                          }//end of for
                        }//end of else
                        ?>

                        </ul>
                      </div>
                      <div class=" add-task-row">
                        <a class="btn btn-success btn-sm pull-right" href="<?php echo base_url()."admin/crearCurso"; ?>">+ Agregar Curso</a>
                      </div>
                    </div>
                  </section>
                </div><!-- /col-md-12-->
              </div><!-- /row -->
			
			