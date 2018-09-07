<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Colegio de Ingenieros Civiles de Querétaro</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()."assets/admin/"; ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/lineicons/style.css">    
    <!-- link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/js/bootstrap-daterangepicker/daterangepicker.css" /-->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()."assets/admin/"; ?>/css/to-do.css">
    <link rel="icon" href="http://i2.wp.com/www.colegiodeingenieroscivilesdequeretaro.org/wp-content/uploads/2016/08/cropped-fav.png?fit=32%2C32" sizes="32x32">
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box" style="color: white !important">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"  style="color: white !important"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>MENU</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">SALIR</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  
                  <BR>
              	  <p class="centered"><a href="http://www.colegiodeingenieroscivilesdequeretaro.org/"><img src="<?php echo base_url()."assets/admin/"; ?>img/logo.png" width="60"></a></p>
              	  <BR>

                  <?php
                  $nombresMenu = ['INICIO', 'CURSOS', 'CREAR CURSOS', 'AJUSTES', 'SALIR'];
                  $nombresMenuG = ['INICIO', 'CURSOS', 'SALIR'];
                  $iconoMenu = ['fa-dashboard', 'fa-tasks', 'fa-book', 'fa-cogs', 'fa-arrow-circle-right'];
                  $rulsMenu = ['inicio', 'cursos', 'crearCurso', 'ajustes', 'salir'];
                  $rulsMenuG = ['inicio', 'cursos', 'salir'];

                  if($idse == '0') {
                    for ($i=0; $i < count($rulsMenu); $i++) { 
                  ?>

                    <li class="sub-menu">
                        <a class="<?php if($opcionMenu == $i){ echo "active"; } ?>" href="<?php echo base_url()."admin/".$rulsMenu[$i]; ?>">
                            <i class="fa <?php echo $iconoMenu[$i]; ?>"></i>
                            <span>&nbsp;&nbsp;<?php  echo $nombresMenu[$i];?></span>
                        </a>
                    </li>

                  <?php
                    }//end of for
                  }else if($idse =! '0'){ 
                    for ($i=0; $i < count($rulsMenuG); $i++) { 
                  ?>

                  <li class="sub-menu">
                        <a class="<?php if($opcionMenu == $i){ echo "active"; } ?>" href="<?php echo base_url()."generales/".$rulsMenuG[$i]; ?>">
                            <i class="fa <?php echo $iconoMenu[$i]; ?>"></i>
                            <span>&nbsp;&nbsp;<?php  echo $nombresMenuG[$i];?></span>
                        </a>
                    </li>
                  <?php
                    }
                  }
                  ?>

                  <BR><BR><BR>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">