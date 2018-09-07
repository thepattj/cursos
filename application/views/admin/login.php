<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Colegio de Ingenieros Civiles de Querétaro</title>
	<link rel="icon" href="http://i2.wp.com/www.colegiodeingenieroscivilesdequeretaro.org/wp-content/uploads/2016/08/cropped-fav.png?fit=32%2C32" sizes="32x32">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()."assets/admin/"; ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <div class="form-login">
		        <?=@$error?>
		        <span>
		            <?php echo validation_errors(); ?>  
		        </span>
		        <?=form_open_multipart(base_url()."admin/verificarAcceso")?>
		        <h2 class="form-login-heading form-login-heading-col">INGRESA AHORA</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
		            <br>
		            <input type="password" class="form-control" placeholder="Contraseña" name="contrasenia" required>
		            <br>
		            <button class="btn btn-theme btn-block btn-theme-col" type="submit"><i class="fa fa-lock"></i> INGRESAR </button>
		            <hr>
		        </div>
        		<?=form_close()?>
		      </div>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/jquery.js"></script>
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url()."assets/admin/"; ?>/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url()."assets/admin/"; ?>/img/fondo.jpg", {speed: 500});
    </script>


  </body>
</html>
