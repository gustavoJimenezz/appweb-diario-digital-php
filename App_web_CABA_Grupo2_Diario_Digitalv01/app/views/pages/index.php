<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Diario Digital</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo RUTA_URL; ?>/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Diario Digital</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo RUTA_URL; ?>/SuscripcionesController/suscripcion">Suscripcion</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo RUTA_URL; ?>/AuthController/login">Ingresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Primicia Global</h1>
                            <span class="subheading"> Donde la información nunca se detiene.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <!-- Sección Principal (Noticia destacada) -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <img src="<?php echo RUTA_URL;?>/img/CARD0.jpg" class="card-img-top" alt="El terremoto en la F1">
                <div class="card-body">
                    <span class="badge bg-primary">Deporte</span>
                    <h5 class="card-title mt-2">
                        <a href="https://www.infobae.com/deportes/2024/11/08/el-terremoto-que-genero-franco-colapinto-en-la-formula-1-y-la-disyuntiva-que-hay-entre-dos-jefes-de-red-bull/" target="_blank"  class="text-decoration-none text-dark">
                            El “terremoto” que generó Franco Colapinto en la Fórmula 1 y la disyuntiva que hay entre dos jefes de Red Bull
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <!-- Sección de Noticias Secundarias -->
        <div class="row gx-4 gy-4">
            <!-- Noticia 1 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?php echo RUTA_URL;?>/img/CARD2.jpg" class="card-img-top" alt="Tormenta tropical">
                    <div class="card-body">
                        <span class="badge bg-success">Mundo</span>
                        <h6 class="card-title mt-2">
                            <a href="https://www.infobae.com/mexico/2023/11/01/tormenta-tropical-pilar-dejo-inundaciones-y-arboles-caidos-en-tabasco-i-fotos/" target="_blank" class="text-decoration-none text-dark">
                                Tormenta tropical Pilar dejó inundaciones y árboles caídos en Tabasco I FOTOS.
                            </a>
                        </h6>
                    </div>
                </div>
            </div>

            <!-- Noticia 2 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?php echo RUTA_URL;?>/img/CARD3.jpg" class="card-img-top" alt="AFIP IVA">
                    <div class="card-body">
                        <span class="badge bg-danger">Economía</span>
                        <h6 class="card-title mt-2">
                            <a href="https://www.infobae.com/economia/2024/10/24/se-termina-la-carga-manual-de-datos-de-iva-como-es-el-nuevo-sistema-de-afip-que-arranca-en-noviembre/" target="_blank" class="text-decoration-none text-dark">
                                Se termina la carga manual de datos de IVA: cómo es el nuevo sistema de AFIP que arranca en noviembre
                            </a>
                        </h6>
                    </div>
                </div>
            </div>

            <!-- Noticia 3 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?php echo RUTA_URL;?>/img/CARD1.jpg" class="card-img-top" alt="Marcha del Orgullo">
                    <div class="card-body">
                        <span class="badge bg-warning">Mundo</span>
                        <h6 class="card-title mt-2">
                            <a href="https://www.infobae.com/sociedad/2024/11/02/33-marcha-del-orgullo-lgbtiq-como-sera-el-evento-el-mensaje-de-apoyo-de-30-diplomaticos-y-el-mapa-de-cortes-de-calles/" target="_blank" class="text-decoration-none text-dark">
                                33° Marcha del Orgullo LGBTIQ+: cómo es el evento, el mensaje de apoyo de 30 diplomáticos y el mapa de cortes de calles
                            </a>
                        </h6>
                    </div>
                </div>
            </div>         
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Diario Digital 2024</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo RUTA_URL;?>/js/scripts.js"></script>
    </body>
</html>
