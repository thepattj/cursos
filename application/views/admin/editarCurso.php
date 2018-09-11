              <BR>
              <h3><i class="fa fa-angle-right"></i>&nbsp;Crear Curso</h3>
          	
            	<!-- BASIC FORM ELELEMNTS -->
            	<div class="row mt">
            		<div class="col-lg-12">
                <?=@$error?>
                <span>
                    <?php echo validation_errors(); ?>  
                </span>
                <?=form_open_multipart(base_url()."admin/actualizarCurso")?>

                  <div class="form-panel">
                      <div class="form-horizontal style-form" method="get">
                          <BR>
                          <input type="hidden" name="state" id="state" value="<?php echo $id;?>">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $nombre; ?>" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Color de Borde</label>
                              <div class="col-sm-10">
                                  <input type="color" name="colorBorde" class="form-control" placeholder="Color de Borde"  value="<?php echo $colorBorde; ?>" required>
                                  <!--span class="help-block">El color debe de estar en formato hexadecimal o RGB. Ejemplos #A59376, rgb(165, 147, 118).</span-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Color de Bot&oacute;n</label>
                              <div class="col-sm-10">
                                  <input type="color" name="colorBtn" class="form-control" placeholder="Color de Bot&oacute;n"  value="<?php echo $colorBoton; ?>" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Color de Fuente</label>
                              <div class="col-sm-10">
                                  <input type="color" name="colorFont" class="form-control" placeholder="Color de Fuente"  value="<?php echo $colorFuente; ?>" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                              <div class="col-sm-10">
                                  <input type="password" name="pass" class="form-control" placeholder="Contraseña"  value="<?php echo $contrasenia; ?>" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Publicar</label>
                              <div class="col-lg-10">
                                <select class="form-control" name="publicar">
                                  <option value="1" <?php if($publicado == '1'){ echo "selected"; } ?> >Si</option>
                                  <option value="0" <?php if($publicado == '0'){ echo "selected"; } ?> >No</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Imagen de Fondo</label>
                              <div class="col-sm-10">
                                  <input type="file" name="archivo0" class="form-control" placeholder="">
                                  <span class="help-block">Esta imagen es el fondo del curso debe ser de 1721 × 844 y pesar menos de 2MB</span>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Imagen de curso</label>
                              <div class="col-sm-10">
                                  <input type="file" name="archivo1" class="form-control" placeholder="">
                                  <span class="help-block">Esta imagen es la que contiene el titulo y fecha del curso, debe ser de 3872 × 2098 y pesar menos de maximo 500KB</span>
                              </div>
                          </div>



                          <div class="form-group" id="archivos" style="display: none">
                              <label class="col-sm-12 control-label">Imagen de curso</label>
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


