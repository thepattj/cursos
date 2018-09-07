<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <link rel="icon" href="http://i2.wp.com/www.colegiodeingenieroscivilesdequeretaro.org/wp-content/uploads/2016/08/cropped-fav.png?fit=32%2C32" sizes="32x32">

	<link href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- custom CSS -->
    <link href="<?php echo base_url().'assets/front/modern-business.css'; ?>" rel="stylesheet">
    <style type="text/css">
    	.graciasN{
    		font-family: FuturaBold;
    	}


		.btnPersonalizados{
            background-color: <?php echo $colorBoton; ?> !important;
            border-color: <?php echo $colorBorde; ?> !important;
            border: <?php echo $colorFuente; ?> !important;
		}
    </style>
	<title>CURSO TALLER</title>
</head>

<body>
	<div class="body" style="min-height: 100%; background-image: url(<?php echo base_url()."assets/contenido/".$fondo; ?>); background-size: cover; 
							 background-position: center; background-color: #ffffff;">
		<BR><BR><BR>
		<section class="container-fluid">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-12 text-center cursos">
					<div class="row">
						<div class="col-lg-2 col-md-1 col-sm-2 col-xs-3"></div>
						<div class="col-lg-8 col-md-10 col-sm-8 col-xs-6 text-center">
							<BR>
							<center><img src="<?php echo base_url().'assets/imagenes/LOGO_COLEGIO.png'; ?>" style="width: 80%"></center>
						</div>
						<div class="col-lg-2 col-md-1 col-sm-2 col-xs-3"></div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12 text-center" style="color: black">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<BR><BR>
							<div class="evaluacionN">
								<center><img style="width: 100%;" src="<?php echo base_url().'assets/contenido/'.$texto; ?>"></center>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-md-2 col-sm-2 col-xs-12"></div>
					</div>
					<BR><BR>
					<BR><BR>
					<div class="row">
						<div class="col-md-2 col-sm-2 text-center"></div>
						<div class="col-md-8 col-sm-8 text-center">
							<a href="<?php echo base_url().'curso/contenido/'.$id; ?>">
								<label class="btnPersonalizados">
									DESCARGA
									<BR> 
									INFORMACI&Oacute;N DEL CURSO
								</label>
							</a>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12"></div>
					</div>
					<BR><BR>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-12 text-center">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-2 text-center cursos">	
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-3"></div>
						<div class="col-md-8 col-sm-8 col-xs-6">
							<!--img src="<?php echo base_url().'assets/imagenes/LOGO_BASF.png'; ?>" style="width: 90%"-->
							<BR>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3"></div>
					</div>	
				</div>
				<BR>
				<div class="col-md-8 col-sm-8 text-center cursos">
					<center>
						<div class="azulN graciasN" style="color: <?php echo $colorFuente; ?> !important;">
							¡GRACIAS POR TU PARTICIPACI&Oacute;N!
						</div>
					</center>	
				</div>
				<div class="col-md-2 col-sm-2 text-center cursos">	
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-3"></div>
						<div class="col-md-8 col-sm-8 col-xs-6">
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3"></div>
					</div>	
				</div>
			</div>
				<BR><BR><BR><BR>

		</section>
	</div>





</body>

</html>
