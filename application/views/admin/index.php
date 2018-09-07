<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Colegio de Ingenieros</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()."assets/admin/"; ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/admin/"; ?>/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/admin/"; ?>/css/style-responsive.css" rel="stylesheet">

    <script src="<?php echo base_url()."assets/admin/"; ?>/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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

                  <li class="mt">
                      <a class="active" href="<?php echo base_url()."assets/admin/inicio"; ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>INICIO</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()."assets/admin/inicio"; ?>">
                          <i class="fa fa-tasks"></i>
                          <span>CURSOS</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()."assets/admin/inicio"; ?>">
                          <i class="fa fa-book"></i>
                          <span>CREAR CURSO</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()."assets/admin/inicio"; ?>">
                          <i class="fa fa-cogs"></i>
                          <span>AJUSTES</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()."assets/admin/inicio"; ?>">
                          <i class="fa fa-arrow-circle-right"></i>
                          <span>SALIR</span>
                      </a>
                  </li>

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

              <div class="row">
                  <div class="col-lg-12 main-chart">
                    <h3><i class="fa fa-angle-right"></i>&nbsp;Cursos</h3>
                    <BR>
                    				
					<div class="row">

            <div class="col-md-4 mb">
              <!-- INSTAGRAM PANEL -->
              <div class="instagram-panel pn">
                <i class="fa fa-instagram fa-4x"></i>
                <p>@THISISYOU<br/>
                  5 min. ago
                </p>
                <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
              </div>
            </div><!-- /col-md-4 -->

            <div class="col-md-4 mb">
              <!-- INSTAGRAM PANEL -->
              <div class="instagram-panel pn">
                <i class="fa fa-instagram fa-4x"></i>
                <p>@THISISYOU<br/>
                  5 min. ago
                </p>
                <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
              </div>
            </div><!-- /col-md-4 -->
												
						<div class="col-md-4 mb">
							<!-- INSTAGRAM PANEL -->
							<div class="instagram-panel pn">
								<i class="fa fa-instagram fa-4x"></i>
								<p>@THISISYOU<br/>
									5 min. ago
								</p>
								<p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
							</div>
						</div><!-- /col-md-4 -->

					
					</div><!-- /row -->

					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->

              </div><! --/row -->


              
          </section>
      </section>


  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/jquery.js"></script>
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()."assets/admin/"; ?>/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url()."assets/admin/"; ?>/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url()."assets/admin/"; ?>/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url()."assets/admin/"; ?>/js/sparkline-chart.js"></script>    
	<script src="<?php echo base_url()."assets/admin/"; ?>/js/zabuto_calendar.js"></script>	
	

	

  

  </body>
</html>
