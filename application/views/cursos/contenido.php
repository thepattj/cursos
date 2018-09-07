<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <link rel="icon" href="http://i2.wp.com/www.colegiodeingenieroscivilesdequeretaro.org/wp-content/uploads/2016/08/cropped-fav.png?fit=32%2C32" sizes="32x32">

	<link href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- custom CSS -->
    <link href="<?php echo base_url().'assets/front/modern-business.css'; ?>" rel="stylesheet">

    <style type="text/css">

		.btnPersonalizados{
            background-color: <?php echo $colorBoton; ?> !important;
            border-color: <?php echo $colorBorde; ?> !important;
            border: <?php echo $colorFuente; ?> !important;
		}

    </style>

	<title>CONTENIDO</title>
</head>


<body>
	<div class="body" style="min-height: 100%; background-image: url(<?php echo base_url()."assets/contenido/".$fondo; ?>); background-size: cover; 
							 background-position: center; background-color: #ffffff;">
		<BR><BR><BR><BR><BR><BR>
		<section class="container">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-1 text-center"></div>
				<div class="col-md-8 col-sm-8 col-xs-10 text-center  well panel-azul-claro">	
					<H3 class="tituloAzul" >CONTENIDO: </H3>
				    <BR>
					<div class="list-group">
					<?php
						for ($i=0; $i < $totalArchivos; $i++) { 
					?>
						<a download="<?php echo $archivos[$i]; ?>" target="new" href="<?php echo base_url()."assets/documentos/".$archivos[$i]; ?>" class="list-group-item list-group-item-action blancosTransparentes" style="word-wrap: break-word;">
						  	<?php echo "Archivo ".$i; ?>
						</a>
					<?php
						}//end of for
					?>

					</div>
					<BR>

					<div class="row">
						<div class="col-md-2 col-sm-2 text-center"></div>
						<div class="col-md-8 col-sm-8 text-center">
							<a href="<?php echo base_url().'curso/bienvenido/'.$id; ?>" class="btnPersonalizados" >
								<label class="btnPersonalizados">
									REGRESAR
								</label>
							</a>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-1 text-center"></div>
					</div>

				</div>
				<div class="col-md-2 col-sm-2 text-center"></div>
			</div>

		</section>
 	</div>


</body>

</html>
