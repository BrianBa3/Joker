<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>JOKER</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/material-dashboard.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/site.css" rel="stylesheet" />

  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/site.js" type="text/javascript"></script>
  
  <!-- <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.0/xlsx.core.min.js" integrity="sha512-R9Q4MB2XIPgVFOR7dVrC5DglztLe2gbLQ8uQ0D+RPLWJdxGvvJWjCA6CuOjiGwAywsKWTSgQdW7B+aDmsNHGpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
  <script src="https://unpkg.com/tableexport@5.2.0/dist/js/tableexport.min.js"></script>
  <!-- <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script> -->

  <?php if (isset($_GET["view"]) && $_GET["view"] == "home") : ?>
    <link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='assets/fullcalendar/moment.min.js'></script>
    <script src='assets/fullcalendar/fullcalendar.min.js'></script>
  <?php endif; ?>

</head>

<body>

  <?php if (isset($_SESSION["user_id"])) : ?>  
    <div class=""> 
      <div class="sidebar" data-color="blue">
            <div class="logo">
              <a href="./" class="simple-text"><i class="fa fa-home"> Inicio</i></a>
            </div>
          
            <div class="sidebar-wrapper">
              <div>
                <div class="logo">
                    <a href="./?view=Inci_inicioincidencias" class="simple-text">INCIDENCIAS</a>
                </div>
              
                <ul class="nav">
                  <li class="" >
                    <a href="./?view=Inci_inicioincidencias">
                      <i class="fa fa-table" aria-hidden="true"></i>
                      <p>Tablero</p>
                    </a>
                  </li>
                  <?php
                  if ($_SESSION['kind'] == 1) {
                  ?>            
                    <li>
                      <a href="./?view=projects">
                        <i class="fa fa fa-th"></i>
                        <p>Modulos</p>
                      </a>
                    </li>
                    <li>
                      <a href="./?view=categories">
                        <i class="fa fa-list-ul"></i>
                        <p>Categorias</p>
                      </a>
                    </li>
                    <li>
                      <a href="./?view=reports">
                        <i class="fa fa-area-chart"></i>
                        <p>Reportes</p>
                      </a>
                    </li>
                
                  <?php
                  }
                  ?>
                </ul>              
                <?php
                if ($_SESSION['kind'] == 1) {
                ?>
                  <div class="logo">
                    <a href="./?view=Pro_inicioproyecto" class="simple-text">PROYECTOS</a>
                  </div>  

                  <ul class="nav">
                    <li class="" >
                      <a href="./?view=Pro_inicioproyecto">
                        <i class="fa fa-table"></i>
                        <p>Tablero</p>
                      </a>
                    </li> 
                    
                    <li>
                      <a href="./?view=Pro_iniciotareas">
                        <i class="fa fa-tasks"></i>
                        <p>Tareas</p>
                      </a>
                    </li>

                    <li>
                      <a href="index.php?view=Pro_fases">
                        <i class="fa fa-list-ol"></i>
                        <p>Fases</p>
                      </a>
                    </li>
                
                    <li>
                      <a href="./?view=Pro_reportes">
                        <i class="fa fa-area-chart"></i>
                        <p>Reportes</p>
                      </a>
                    </li>
                  </ul> 
                
                  <div class="logo">
                     <a href="./?view=users" class="simple-text"> USUARIOS</a>
                  </div>  
                <?php
                }
                ?>
              </div>
            </div>
      </div>

      <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
          <div class="container-fluid">            
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="./"><b>JOKER</b></a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i>
                    &nbsp;<?php echo Core::$user->name . " " . Core::$user->lastname; ?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="https://www.eimportacion.com.mx/" target="_blank">Hola!</a></li>
                    <li class="divider"></li>

                    <?php
                    if ($_SESSION['kind'] == 1) {
                    ?>
                    <li><a href="./?view=configuration">Configuracion</a></li>
                    <li class="divider"></li>
                    <?php
                    }
                    ?>
                    <li><a href="logout.php">Salir</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        
        <div class="content">
              <div class="container-fluid ">
                
                <?php
                // puedo cargar otras funciones iniciales
                // dentro de la funcion donde cargo la vista actual
                // como por ejemplo cargar el corte actual
                View::load("login");

                ?>
              </div> 
        </div>
      </div>      
    </div>
    
  <?php else : ?>
    <?php
    View::load("login");
    ?>
  <?php endif; ?>
</body>

<!--   Core JS Files   -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>

</html>