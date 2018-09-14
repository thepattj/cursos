<BR>
<h3><i class="fa fa-angle-right"></i>&nbsp;Editar Usuario</h3>

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <?=@$error?>
        <span>
            <?php echo validation_errors(); ?>
        </span>
        <?=form_open_multipart(base_url()."admin/actualizaUsuario/".$idse)?>

        <div class="form-panel">
            <div class="form-horizontal style-form" method="get">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-10">
                        <input type="text" name="usuario" value="<?php echo $U; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?php echo $CP; ?>" name="cp" value class="form-control" placeholder="Max. 6 caracteres." required>
                    </div>
                </div>
                <?php $tipos = ['Inactivo', 'Activo']; ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="state">
                            <option value="1" <?php if( $D=='1' ){echo "selected" ; } ?> >Si</option>
                            <option value="0" <?php if( $D=='0' ){echo "selected" ; } ?> >No</option>
                        </select>
                        <!-- <input type="text" name="nombre" value="<?php/* echo $tipos[$D];*/ ?>"  class="form-control" placeholder="example@servidor.com" required>-->
                    </div>
                </div>
                <div class="form-group">
                    <BR><BR>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-success btn-block">GUARDAR</button>
                    </div>
                    <div class="col-lg-3">
                        <a href="<?php echo base_url()."admin/usuarios/"?>">
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

        function addArchivo() {
            document.getElementById("archivo" + contadorArchie).style.display = "";
            contadorArchie++;
            if (contadorArchie == 7) {
                document.getElementById("btnAdd").style.display = "none";
                document.getElementById("labelAdd").style.display = "";
            }
        } //end of add archivo

    </script>
