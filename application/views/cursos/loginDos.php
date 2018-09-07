<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <link rel="icon" href="http://i2.wp.com/www.colegiodeingenieroscivilesdequeretaro.org/wp-content/uploads/2016/08/cropped-fav.png?fit=32%2C32" sizes="32x32">

	<link href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- custom CSS -->
    <link href="<?php echo base_url().'assets/front/modern-business.css'; ?>" rel="stylesheet">

	<title><?php echo $nombre; ?></title>

	<style type="text/css">
		.panel-azul-claro{
		    border-width: 3px;
		    border-color: <?php echo $colorBorde; ?>;
		    background-color: transparent;
		}//end


		.btnPersonalizados{
            background-color: <?php echo $colorBoton; ?> !important;
            border-color: <?php echo $colorBorde; ?> !important;
            border: <?php echo $colorFuente; ?> !important;
		}

	</style>
</head>


<body>
	<div class="body" style="min-height: 100%; background-image: url(<?php echo base_url()."assets/contenido/".$fondo; ?>); background-size: cover; 
							 background-position: center; background-color: #ffffff;">
		<BR><BR><BR><BR>
		<section class="container">
			<div class="row">
				<div class="col-lg-3 col-md-2 col-sm-2 col-xs-1 text-center"></div>
				<div class="col-lg-6 col-md-8 col-sm-8 col-xs-10 text-center well panel-azul-claro">	

		        <?=@$error?>
		            <span>
		                <?php echo validation_errors(); ?>  
		            </span>
		            <BR>
		            <?=form_open_multipart(base_url()."curso/verificarContrasenia")?>
		            <BR>
		            <BR>

		            <div class="row">
		                <div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-6">

		                    <p class="tituloAzul">BIENVENIDO</p>
		                   	<BR><BR>
		                    <center>
		                    	<img src="<?php echo base_url().'assets/imagenes/LOGO_COLEGIO.png'; ?>" width="60%" >
		                    </center>
		                    <BR><BR>

						  	<div class="form-group">
						    	<label style="color: red">La contrase&ntilde;a ingresada es incorrecta</label>
						    	<input type="password" class="form-control" name="pass" id="pass"  aria-describedby="emailHelp" placeholder="Ingresa tu Contrase&ntilde;a">
						    	<input type="hidden" id="country" name="country" value="<?php echo $id; ?>">
						 	</div>

		                    <BR><BR>

							<div class="row">
								<div class="col-md-2 col-sm-2 text-center"></div>
								<div class="col-md-8 col-sm-8 text-center btnPersonalizados">
									<button type="submit" class="btnPersonalizados">
										INGRESAR
									</button>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-12"></div>
							</div>


		                <div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
		            </div>
		                    
		            <?=form_close()?>

				</div>
				<div class="col-lg-3 col-md-2 col-sm-2 text-center"></div>
			</div>

		</section>
 	</div>

</body>

</html>
