<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    $nombre = $_SESSION['nombre'];
    $usuario_rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Proyecto Final</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="inicio.php">Home</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" 
                    aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="index.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!--Sidenav-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Almacenamiento</div>
                <?php if ($usuario_rol =="Supervisor" || $usuario_rol == "Maestro" || $usuario_rol == "Padre") { ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseE"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                                Gestion Estudiantes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseE" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="crearE.php">Agregar Estudiante</a>
                                    <a class="nav-link" href="listaE.php">Listado Estudiantes</a>
                                </nav>
                            </div>
                <?php } ?>
                <?php if ($usuario_rol == "Supervisor") {?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseM"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Gestion de Maestros
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseM" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="crearM.php">Agregar Maestro</a>
                                    <a class="nav-link" href="listaM.php">Listado Maestros</a>
                                </nav>
                            </div>
                <?php } ?>
                <?php if ($usuario_rol == "Supervisor" || $usuario_rol == "Maestro" || $usuario_rol == "Estudiante") { ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseC"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Gestion de Cursos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseC" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="crearC.php">Agregar Curso</a>    
                                    <a class="nav-link" href="listaC.php">Listado de Cursos</a>
                                </nav>
                            </div>
                <?php } ?>
                <?php if ($usuario_rol == "Supervisor" || $usuario_rol == "Maestro" || $usuario_rol == "Padre" || $usuario_rol == "Estudiante") { ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseN"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
                                Gestion de Notas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseN" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="crearN.php">Agregar Nota</a>
                                    <a class="nav-link" href="listaN.php">Listado de Notas</a>
                                </nav>
                            </div>
                <?php } ?>
                <?php if ($usuario_rol == "Supervisor") { ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseP"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-walking"></i></div>
                                Gestion de Padres
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseP" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="crearP.php">Agregar Padre</a>
                                    <a class="nav-link" href="listaP.php">Listado de Padres</a>
                                </nav>
                            </div>
                <?php } ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $usuario_rol ?>
                    </div>
                </nav>
            </div>
            <!--Fin del Sidenav-->
            <!--Contenido Pagina-->
            <div id="layoutSidenav_content" class="bg-success">
                <main>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4">Programacion Web - Proyecto Final</h1>
                    <div id="slider" class="carousel slide " data-ride="carousel">
                        
                                <ol class="carousel-indicators">
                                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                                    <li data-target="#slider" data-slide-to="1"></li>
                                    <li data-target="#slider" data-slide-to="2"></li>
                                    <li data-target="#slider" data-slide-to="3"></li>
                                </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/img/biblioteca.jpg?text=primera" alt="biblioteca">
                                <div class="carousel-caption d-one d-md-block">
                                    <h5>Biblioteca</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/patio.jpg?text=segunda" alt="patio">
                                <div class="carousel-caption d-one d-md-block">
                                    <h5>Patio</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/salon.jpg?text=tercera" alt="salon">
                                <div class="carousel-caption d-one d-md-block">
                                    <h5>Salones</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/secretaria.png?text=cuarta" alt="secretaria">
                                <div class="carousel-caption d-one d-md-block">
                                    <h5>Administracion</h5>
                                </div>
                            </div> 
                        </div>                              
                            <a href="#slider" class="carousel-control-prev" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a href="#slider" class="carousel-control-next" role="button" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                    </div>   
                        <div class="col-md-12">
                            <div class="jumbotron my-3">
                                <h1 class="display-6">Proyecto Final - Programacion Web</h1>
                                <p class="lead">
                                    Texto placeholder para la pagina principal
                                </p>
                            </div>
                        </div> 
                </main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Proyecto Final 2021</div>
                            <div>
                                <a href="#">Politica de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!--Fin Contenido Pagina-->
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>