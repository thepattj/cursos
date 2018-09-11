              <!-- PRIMERA SECCION -->
              <BR>
              <div class="row mt">
                <!-- INI SECCION PREVIEW -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="showback">
                    <h4><i class="fa fa-angle-right"></i>&nbsp;Preview Login</h4>

                    <style type="text/css">
                      
                    .btnPersonalizado{
                        color: #FFF;
                        background-color: <?php echo $colorBoton; ?> !important;
                        border: 1px solid <?php echo $colorBoton; ?>;
                        padding: 1px;
                        padding-left: 5px;
                        padding-right: 5px;
                        width: auto;
                        box-shadow: 0px 5px 5px grey;
                        cursor: pointer;
                    }


                      .panel-borde{
                        border: 2px solid <?php echo $colorBorde; ?> !important;
                        border-radius: 5px;
                      }//end of panel

                    </style>

                    <style type="text/css">

                      .tituloAzul{
                        font-size: 20px;
                        color: #000;
                      }//end of tittle

                      .btnPersonalizado{
                        background-color: <?php echo $colorBoton; ?> !important;
                        border-color: <?php echo $colorBorde; ?> !important;
                        border: <?php echo $colorFuente; ?> !important;
                      }//end of botonAzul

                    </style>

                    <!-- VISTA UNO -->
                    <div id="contenidoUno" style="min-height: 100%; background-image: url(<?php echo base_url()."assets/contenido/".$fondo; ?>); background-size: cover; background-position: center; background-color: #ffffff;">
                      <BR><BR><BR>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-2 text-center"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 text-center panel-borde">


                          <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">

                              <BR>
                              <p class="tituloAzul">BIENVENIDO</p>
                              <BR>

                              <center>
                                <img src="http://www.colegiodeingenieroscivilesdequeretaro.org/portafolioU/assets/imagenes/LOGO_COLEGIO.png" width="60%">
                              </center>    
                              <BR><BR>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Contraseña</label>
                                <input type="password" class="form-control" name="pass" id="pass" aria-describedby="emailHelp" placeholder="Ingresa tu Contraseña">
                              </div>
                              <BR>

                              <center>
                                <button type="submit" class="btnPersonalizado">
                                  INGRESAR
                                </button>
                              </center>


                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>                
                          </div>

                          <BR><BR>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-2 text-center"></div>
                      </div>
                      <BR><BR><BR>
                    </div>


                    <!-- VISTA DOS -->
                    <div id="contenidoDos" style="min-height: 100%; background-image: url(<?php echo base_url()."assets/contenido/".$fondo; ?>); background-size: cover; background-position: center; background-color: #ffffff; display: none">
                      <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <BR>
                              <div class="evaluacionN">
                                <center><img style="width: 100%;" src="<?php echo base_url()."assets/contenido/".$texto; ?>" /></center>
                              </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-md-2 col-sm-2 col-xs-12"></div>
                          </div>
                          <BR><BR>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
                      </div>


                      <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12 text-center cursos">
                          <BR><BR><BR><BR><BR>
                          <center><img src="http://www.colegiodeingenieroscivilesdequeretaro.org/portafolioU/assets/imagenes/LOGO_COLEGIO.png" style="width: 60%"></center>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 text-center" style="color: black">
                          <div class="row">
                            <div class="col-md-2 col-sm-2 text-center"></div>
                            <div class="col-md-8 col-sm-8 text-center">
                              <a>
                                <label class="btnPersonalizado">
                                  DESCARGA
                                  <BR>
                                  INFORMACIÓN DEL CURSO
                                </label>
                              </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12"></div>
                          </div>
                          <br><br><br>
                          <center>
                            <div class="azulN graciasN">
                              <!--img style="width: 40%;" src="http://www.colegiodeingenieroscivilesdequeretaro.org/portafolioU/assets/movilidad/imagenes/gracias.png"-->
                            </div>
                          </center>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                        </div>
                      </div>


                      <BR><BR><BR><BR>
                    </div>


                    <!-- VISTA TRES -->
                    <div id="contenidoTres" style="min-height: 100%; background-image: url(<?php echo base_url()."assets/contenido/".$fondo; ?>); background-size: cover; background-position: center; background-color: #ffffff; display: none">
                      <BR><BR><BR><BR><BR>

                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-2 text-center"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 text-center panel-borde">

                          <h3 class="tituloAzul"> CONTENIDO: </h3>
                          <BR>
                          <div class="list-group">
                          <?php
                            for ($i=0; $i < $totalArchivos; $i++) { 
                          ?>
                            <a class="list-group-item list-group-item-action blancosTransparentes" style="word-wrap: break-word;">
                                <?php echo "Archivo ".$i; ?>
                            </a>
                          <?php
                            }
                          ?>
                          </div>

                          <BR>
                          <a>
                            <label class="btnPersonalizado">
                              REGRESAR
                            </label>
                          </a>
                          <BR><BR>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-2 text-center"></div>
                      </div>
                      <BR><BR><BR><BR><BR>
                    </div>
                    <BR><BR>


                    <!-- JUSTIFIED BUTTONS -->
                    <div>
                      <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                          <button type="button" class="btn btn-theme02" onclick="mostrarLogin()">LOGIN</button>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-theme02" onclick="mostrarPrincipal()">PRINCIPAL</button>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-theme02" onclick="mostrarArchivos()">ARCHIVOS</button>
                        </div>
                      </div>              
                    </div><!--/showback -->


                    <BR>
                    <div class="row">
                      <div class="col-md-12 col-sm-12 box0">
                        <button type="submit" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModalRule">OBTENER URL</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- FIN SECCION PREVIEW -->

                <!-- INI SECCION INFORMACION -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="showback">
                    <h4><i class="fa fa-angle-right"></i>&nbsp;Informaci&oacute;n</h4>


                    <div class="form-horizontal style-form" method="get">
                      <BR>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $nombre; ?>" disabled >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Color de Borde</label>
                        <div class="col-sm-10">
                          <input type="color" name="colorBorde" class="form-control" placeholder="Color de Borde" value="<?php echo $colorBorde; ?>" disabled >
                          <!--span class="help-block">El color debe de estar en formato hexadecimal o RGB. Ejemplos #A59376, rgb(165, 147, 118).</span-->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Color de Bot&oacute;n</label>
                        <div class="col-sm-10">
                          <input type="color" name="colorBtn" class="form-control" placeholder="Color de Bot&oacute;n" value="<?php echo $colorBoton; ?>" disabled >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Color de Fuente</label>
                        <div class="col-sm-10">
                          <input type="color" name="colorFont" class="form-control" placeholder="Color de Fuente" value="<?php echo $colorFuente; ?>" disabled >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" name="pass" class="form-control" placeholder="Contraseña" value="<?php echo $contrasenia; ?>" disabled >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Publicar</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="publicar" disabled>
                            <option value="1" <?php if( $publicado == '1' ){ echo "selected"; }//end of if ?> >Si</option>
                            <option value="0" <?php if( $publicado == '0' ){ echo "selected"; }//end of if ?> >No</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <BR>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 box0">

                        <a href="<?php echo base_url()."admin/editarCurso/".$id; ?>" class="btn btn-success btn-lg btn-block">EDITAR</a>
                      </div>
                      <div class="col-md-6 col-sm-6 box0">
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#myModal">ELIMINAR</button>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- FIN SECCION INFORMACION -->
              </div>



              <!-- SEGUNDA SECCION -->

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
                              $j = 1 + $i;
                          ?>

                          <li class="list-primary">
                            <i class=" fa fa-ellipsis-v"></i>
                            <div class="task-title">
                              <span class="task-title-sp"><?php echo $tituloArch[$i]; ?></span>
                              <div class="pull-right hidden-phone">
                                <a class="btn btn-success btn-xs fa fa-download" download="<?php echo $tituloArch[$i]; ?>" target="new" href="<?php echo base_url()."assets/contenido/".$archivos[$i]; ?>" class="list-group-item list-group-item-action blancosTransparentes" ></a>
                                <div class="btn btn-danger btn-xs fa fa-trash-o" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"></div>
                              </div>
                            </div>
                          </li>

                          <?php
                          }//end of for
                          ?>

                        </ul>
                      </div>
                      <div class=" add-task-row">
                        <a class="btn btn-info btn-sm pull-right" href="<?php echo base_url()."admin/agregarArchivo/".$id; ?>">Añadir Archivo</a>
                      </div>
                    </div>
                  </section>
                </div>
              </div>



              <!-- SECCION Usuarios -->
              <div class="row mt">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="showback">
                    <div class="row mtbox">
                      <div class="col-md-2 col-sm-2 box0"></div>
                      <div class="col-md-8 col-sm-8 box0">
                        <div class="box1">
                          <span class="li_stack"></span>
                          <h3><?php echo $totalUsuarios; ?> Usuarios</h3>
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
                        <h4><i class="fa fa-angle-right"></i>&nbsp;<?php echo $totalUsuarios." Usuarios"; ?> </h4>
                      </div>
                      <BR>
                    </div>
                    <div class="panel-body">
                      <div class="task-content">
                        <ul id="sortable" class="task-list">
                            
                             
                            
                          <?php
                            $tipos = ['bg-important', 'bg-info']; 
                            $tiposTxt = ['Inactivo', 'Activo'];
                          for ($i=0; $i < $totalUsuarios; $i++) { 
                          ?>

                          <li class="list-primary">
                            <i class=" fa fa-ellipsis-v"></i>
                            <div class="task-title">
                              <span class="task-title-sp"><?php echo $nuser[$i]; ?></span>
                              <span class="badge <?php echo $tipos[$ndisp[$i]]; ?>"><?php echo $tiposTxt[$ndisp[$i]]; ?></span>
                              <div class="pull-right hidden-phone">
                                <a href="<?php echo base_url()."admin/editarUsuario/".$unico[$i]."/".$id; ?>" class="btn btn-primary btn-xs btn-xs fa fa-pencil"></a>
                                <a href=""  data-toggle="modal" data-target="#myModalU<?php echo $unico[$i]; ?>" onclick="corroborainfo()" class="btn btn-danger btn-xs fa fa-trash-o"></a>
                              </div>
                            </div>
                          </li>

                          <?php
                          }//end of for
                          ?>

                        </ul>
                      </div>
                      <div class=" add-task-row">
                        <a class="btn btn-info btn-sm pull-right" href="<?php echo base_url()."admin/agregarUsuario/".$id; ?>">Añadir Usuario</a>
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
                    
                    
                    <!--MODAL PARA LA ELIMINACION DE USUARIOS ************FALTA EL CONTROLADOR-->
                          <?php 
                          for ($i=0; $i < $totalUsuarios; $i++) { 
                          ?>
              <div class="modal fade" id="myModalU<?php echo $unico[$i]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                      ¿Estas seguro de que deseas Desactivar al usuario <?php echo $nuser[$i]; ?> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <a href="<?php echo base_url()."admin/eliminarUsuario/".$unico[$i]."/".$id; ?>" class="btn btn-primary">Desactivar</a>
                    </div>
                  </div>
                </div>
              </div>  
                          <?php
                          }//end of for
                          ?>

            
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




<?php 
for ($i=0; $i < $totalArchivos; $i++) { 
  $j = 1 + $i;
?>

             <div class="modal fade" id="myModal<?php echo $i; ?>"" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                      ¿Estas seguro de que deseas eliminar el archivo "<?php echo $tituloArch[$i]; ?>"?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <a href="<?php echo base_url()."admin/eliminarArchivo/".$archivosID[$i]; ?>" class="btn btn-primary">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>  

<?php
}//end of for
?>



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





