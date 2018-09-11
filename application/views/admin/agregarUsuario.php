
              <BR>
              <h3><i class="fa fa-angle-right"></i>&nbsp;Agregar Usuario</h3>
            
              <!-- BASIC FORM ELELEMNTS -->
              <div class="row mt">
                <div class="col-lg-12">
                <?=@$error?>
                <span>
                    <?php echo validation_errors(); ?>  
                </span>
                <?=form_open_multipart(base_url()."admin/guardarUsuario/")?>

                  <div class="form-panel">
                      <div class="form-horizontal style-form" method="get">
                          <BR>


                          <?php 
                          if ($contador > 0) {
                            ?> 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Usuarios</label>
                              <div class="col-sm-10">
                                  <select name="usuarios" id="usuarios" onchange="opcionesDeUsuario(this.value)" class="form-control" >
                                    <option value="" disabled selected hidden> Selecciona un usuario </option>
                                  <?php

                                  for ($i=0; $i < $contador; $i++) { 
                                  ?>
                                    <option value="<?php echo $idUsuario[$i]; ?>"><?php echo $usuario[$i]; ?></option>
                                  <?
                                  }
                                  ?>
                                    <option value="I">Agregar Usuario</option>
                                  </select>

                              </div>
                          </div>
                            <?php
                          }

                          ?>

                    <script type="text/javascript">
                      function opcionesDeUsuario(varsu){
                        if (varsu == "I") {
                          document.getElementById("formularioUsuario").style.display = "";
                        }else if(varsu == ""){
                          document.getElementById("formularioUsuario").style.display = "none";
                          alert("nooo");
                        }else if(varsu > 0){
                          document.getElementById("formularioUsuario").style.display = "none";
                        }

                      }
                    </script>


                        <!-- AGREGAR NUEVO USUARIO PARA DB Y CURSO -->
                          <div id="formularioUsuario" style="display: none">

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" placeholder="Nuevo Usuario">
                                </div>
                            </div>

                           
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pass" class="form-control" placeholder="Max. 6 caracteres.">
                                </div>
                            </div>

                          </div>
                          <?php

                          if($contador == 0){
                            ?>
                            <script type="text/javascript">
                              opcionesDeUsuario("I");
                            </script>
                            <input type="hidden" name="usuarios" class="form-control" value="I" >
                          <!--div id="formularioUsuario"> 

                            <input type="hidden" name="usuarios" class="form-control" value="I" >

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" placeholder="Nuevo Usuario">
                                </div>
                            </div>

                           
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pass" class="form-control" placeholder="Max. 6 caracteres.">
                                </div>
                            </div>

                          </div-->
                            <?php
                          }
                          ?>

                          <input type="hidden" name="curso" class="form-control" value="<?php echo $nocurso; ?>" >




                          <div class="form-group">
                            <BR><BR>
                            <div class="col-lg-6"></div>
                            <div class="col-lg-3">
                              <button type="submit" class="btn btn-success btn-block">GUARDAR</button>
                            </div>
                            <div class="col-lg-3">
                              <a href="<?php echo base_url()."admin/curso/".$nocurso; ?>">
                                <div type="button" class="btn btn-danger btn-block" onclick="">CANCELAR</div>                              
                              </a>
                            </div>
                          </div>
                          

                  </div>
              </div><!-- col-lg-12-->   
              <?=form_close()?>
            </div><!-- /row -->


