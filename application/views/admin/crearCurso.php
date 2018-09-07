              <BR>
              <h3><i class="fa fa-angle-right"></i>&nbsp;Crear Curso</h3>
            
              <!-- BASIC FORM ELELEMNTS -->
              <div class="row mt">
                <div class="col-lg-12">
                <?=@$error?>
                <span>
                    <?php echo validation_errors(); ?>  
                </span>
                <?=form_open_multipart(base_url()."admin/guardarCurso")?>

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
                              <label class="col-sm-2 col-sm-2 control-label">Color de Borde</label>
                              <div class="col-sm-10">
                                  <input type="color" name="colorBorde" class="form-control" placeholder="Color de Borde" required>
                                  <!--span class="help-block">El color debe de estar en formato hexadecimal o RGB. Ejemplos #A59376, rgb(165, 147, 118).</span-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Color de Bot&oacute;n</label>
                              <div class="col-sm-10">
                                  <input type="color" name="colorBtn" class="form-control" placeholder="Color de Bot&oacute;n" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Color de Fuente</label>
                              <div class="col-sm-10">
                                  <input type="color" name="colorFont" class="form-control" placeholder="Color de Fuente" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                              <div class="col-sm-10">
                                  <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Publicar</label>
                              <div class="col-lg-10">
                                <select class="form-control" name="publicar">
                                  <option value="1" >Si</option>
                                  <option value="0" >No</option>
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

                          <div class="form-group">
                              <div class="col-sm-2">
                                <label class="col-sm-2 col-sm-2 control-label">Archivos</label>
                              </div>
                              <div class="col-sm-10">

                                <div class="form-group" id="archivo2" style="display: none">
                                    <label class="col-sm-2 col-sm-2 control-label">Archivo 1</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="archivo2" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group" id="archivo3" style="display: none">
                                    <label class="col-sm-2 col-sm-2 control-label">Archivo 2</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="archivo3" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group" id="archivo4" style="display: none">
                                    <label class="col-sm-2 col-sm-4 control-label">Archivo 3</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="archivo4" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group" id="archivo5" style="display: none">
                                    <label class="col-sm-2 col-sm-5 control-label">Archivo 4</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="archivo5" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group" id="archivo6" style="display: none">
                                    <label class="col-sm-2 col-sm-6 control-label">Archivo 5</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="archivo6" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div type="submit" id="btnAdd" class="btn btn-info btn-block" onclick="addArchivo()">AÑADIR ARCHIVO</div>
                                <label class=" control-label" id="labelAdd" style="display: none">Haz alcanzado el m&aacute;ximo de archivos. Para poder agregar m&aacute; archivos guarda el curso.</label>
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