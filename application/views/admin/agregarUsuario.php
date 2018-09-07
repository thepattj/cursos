              <BR>
              <h3><i class="fa fa-angle-right"></i>&nbsp;Agregar Usuario</h3>
            
              <!-- BASIC FORM ELELEMNTS -->
              <div class="row mt">
                <div class="col-lg-12">
                <?=@$error?>
                <span>
                    <?php echo validation_errors(); ?>  
                </span>
                <?=form_open_multipart(base_url()."admin/guardarUsuario")?>

                  <div class="form-panel">
                      <div class="form-horizontal style-form" method="get">
                          <BR>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Usuario</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nombre" class="form-control" placeholder="Usuario" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nombre" class="form-control" placeholder="Max. 6 caracteres." required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Correo</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nombre" class="form-control" placeholder="example@servidor.com" required>
                              </div>
                          </div>
                          <div class="form-group">
                            <BR><BR>
                            <div class="col-lg-6"></div>
                            <div class="col-lg-3">
                              <button type="submit" class="btn btn-success btn-block">GUARDAR</button>
                            </div>
                            <div class="col-lg-3">
                              <a href="<?php echo base_url()."admin/cursos"; ?>">
                                <div type="button" class="btn btn-danger btn-block" onclick="">CANCELAR</div>                              
                              </a>
                            </div>
                          </div>

                  </div>
              </div><!-- col-lg-12-->   
              <?=form_close()?>
            </div><!-- /row -->



            <script type="text/javascript">
              var contadorArchie = 2;
              function addArchivo(){
                document.getElementById("archivo" + contadorArchie).style.display = "";
                contadorArchie ++;
                if (contadorArchie == 7) {
                  document.getElementById("btnAdd").style.display = "none";
                  document.getElementById("labelAdd").style.display = "";
                }
              }//end of add archivo
            </script>