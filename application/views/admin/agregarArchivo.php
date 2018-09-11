              <BR>
              <h3><i class="fa fa-angle-right"></i>&nbsp;AñadirArchivo</h3>
          	
            	<!-- BASIC FORM ELELEMNTS -->
            	<div class="row mt">
            		<div class="col-lg-12">
                <?=@$error?>
                <span>
                    <?php echo validation_errors(); ?>  
                </span>
                <?=form_open_multipart(base_url()."admin/guardarArchivo")?>

                  <div class="form-panel">
                      <div class="form-horizontal style-form" method="get">
                          <BR>
                          <input type="hidden" name="state" id="state" value="<?php echo $id;?>">

                          <div class="form-group">
                              <div class="col-sm-2">
                                <label class="col-sm-2 col-sm-2 control-label">Archivos</label>
                              </div>
                              <div class="col-sm-10">

                                <div class="form-group" id="archivo0" >
                                    <label class="col-sm-2 col-sm-2 control-label">Archivo </label>
                                    <div class="col-sm-10">
                                        <input type="file" name="archivo0" class="form-control" placeholder="">
                                    </div>
                                </div>
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
                              <a href="<?php echo base_url()."admin/curso/".$id; ?>">
                                <div class="btn btn-danger btn-block" onclick="">CANCELAR</div>                              
                              </a>
                            </div>
                          </div>

                  </div>
          		</div><!-- col-lg-12-->   
              <?=form_close()?>
          	</div><!-- /row -->



