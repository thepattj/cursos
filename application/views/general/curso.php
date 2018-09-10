              <h3><i class="fa fa-angle-right"></i>&nbsp;<?php echo $nombre;?></h3>

              <!-- SECCION Archivos -->
              <div class="row mt">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="showback">
                    <div class="row mtbox">
                      <div class="col-md-2 col-sm-2 box0"></div>
                      <div class="col-md-8 col-sm-8 box0">
                        <div class="box1">
                          <span class="li_stack"></span>
                          <h3><?php echo $totalArchivos; ?> Archivos</h3>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 box0"></div>
                    </div><!-- /row mt -->  
                    <BR>
                  </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                  <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                      <div class="pull-left">
                        <h4><i class="fa fa-angle-right"></i>&nbsp;<?php echo $totalArchivos." Archivos"; ?> </h4>
                      </div>
                      <BR>
                    </div>
                    <div class="panel-body">
                      <div class="task-content">
                        <ul id="sortable" class="task-list">
                          <?php 
                          for ($i=0; $i < $totalArchivos; $i++) { 
                          ?>

                          <li class="list-primary">
                            <i class=" fa fa-ellipsis-v"></i>
                            <div class="task-title">
                              <span class="task-title-sp"><?php echo $tituloa[$i]; ?></span>
                              <div class="pull-right hidden-phone">
                                <a href="" class="btn btn-success btn-xs fa fa-download"></a>
                              </div>
                            </div>
                          </li>

                          <?php
                          }//end of for
                          ?>

                        </ul>
                      </div>
                      <div class=" add-task-row">
                        <a class="btn btn-info btn-sm pull-right" href="<?php echo base_url()."admin/adherirArchivo/".$id; ?>">Añadir Archivo</a>
                      </div>
                    </div>
                  </section>
                </div>
              </div>


            
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <BR><BR>
                <BR><BR>
                <BR><BR>
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #7e1524">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">ELIMINAR</h4>
                    </div>
                    <div class="modal-body">
                      ¿Estas seguro fe que deseas eliminar el elemento?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <a href="<?php echo base_url()."admin/eliminarCurso/".$id; ?>" class="btn btn-primary">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>  



            
              <div class="modal fade" id="myModalRule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <BR><BR>
                <BR><BR>
                <BR><BR>
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #7e1524">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Url del curso: </h4>
                    </div>
                    <div class="modal-body">
                      <h5>
                      <strong>Url:</strong>
                      http://localhost/cursos/curso/ingresar/<?php echo $id; ?> 
                      <BR>
                      <BR>
                      <strong>Contraseña:</strong>
                      <?php echo $contrasenia; ?> 
                      </h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                  </div>
                </div>
              </div>  


              <script type="text/javascript">
                
                function mostrarLogin(){
                  document.getElementById("contenidoUno").style.display = "";
                  document.getElementById("contenidoDos").style.display = "none";
                  document.getElementById("contenidoTres").style.display = "none";
                }//end of mostrar Info


                function mostrarPrincipal(){

                  document.getElementById("contenidoUno").style.display = "none";
                  document.getElementById("contenidoDos").style.display = "";
                  document.getElementById("contenidoTres").style.display = "none";

                }//end of mostrar Info


                function mostrarArchivos(){

                  document.getElementById("contenidoUno").style.display = "none";
                  document.getElementById("contenidoDos").style.display = "none";
                  document.getElementById("contenidoTres").style.display = "";

                }//end of mostrar Info

              </script>





