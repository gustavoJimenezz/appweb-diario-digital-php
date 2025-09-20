<?php require RUTA_APP .'/views/layout/landing/header.php';?>
  
<!-- LOGIN -->

<header>  
    <nav class="navbar bg-info text-white">
       
        <div class="container-fluid justify-content-end">
            
         <!-- Boton Suscripcion -->
           <a class="btn btn-light me-2" type="button" href="<?php echo RUTA_URL; ?>/SuscripcionesController/suscripcion">Suscripcion</a>
                      
        
         <!-- Boton Ingresar --> 
            <a class="btn btn-light me-2" type="button" href="<?php echo RUTA_URL; ?>/AuthController/login">Ingresar</a>
                        
         </div>

    </nav>

       



</header>

 <!-- CUERPO -->

 <section>

<!-- ANTERIOR <section class="container mt-3 mb-3">
    
    <div class="row">
        <div class="col-md-3">
            <h3 class="text-black-50">Decile adiós al <em>riesgo pais</em></h3>
        </div>
        <div class="col-md-9">
            <img class="" src="<?php echo RUTA_URL;?>/img/tareas_landing.jpg" alt="">
        </div>
    </div>
-->


<!-- CARD PRINCIPAL -->

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card mb-4">
                <img src="<?php echo RUTA_URL;?>/img/CARD0.jpg" class="card-img-top" alt="Título de la noticia 1">
                <div class="card-body">
                    <h5 class="card-title">El “terremoto” que generó Franco Colapinto en la Fórmula 1 y la disyuntiva que hay entre dos jefes de Red Bull</h5>
                    <p class="card-text">Christian Horner, jefe de la escudería, y Helmut Marko, principal asesor, tienen miradas opuestas sobre la posible llegada del argentino para ser compañero de Max Verstappen.</p>
                    <a href="https://www.infobae.com/deportes/2024/11/08/el-terremoto-que-genero-franco-colapinto-en-la-formula-1-y-la-disyuntiva-que-hay-entre-dos-jefes-de-red-bull/" class="btn btn-light" >Leer más</a>
                </div>
            </div>
     </div>

   <!-- CARD 1 -->

    <div class="container mt-4">
     <div class="row">
        <div class="col-md-4 ">
            <div class="card mb-1">
                <img src="<?php echo RUTA_URL;?>/img/CARD1.jpg" class="card-img-top" alt="Título de la noticia 1">
                <div class="card-body">
                    <h5 class="card-title">33° Marcha del Orgullo LGBTIQ+: cómo es el evento, el mensaje de apoyo de 30 diplomáticos y el mapa de cortes de calles</h5>
                    <p class="card-text">Tendrá lugar durante toda la jornada de este sábado entre Plaza de Mayo y la Plaza de los Dos Congresos. El cierre musical estará a cargo de Valeria Lynch. Será la primera vez que se lleva a cabo durante la presidencia de Javier Milei. Embajadores agrupados en Diplomáticos por la Igualdad —entre ellos el estadounidense Marc Stanley y la británica Hayes— difundieron un video apoyando a la comunidad.</p>
                    <a href="noticia1.html" class="btn btn-light">Leer más</a>
                </div>
            </div>
    </div>  

    <!-- CARD 2 -->

        <div class="col-md-4 ">
            <div class="card mb-1">
                <img src="<?php echo RUTA_URL;?>/img/CARD2.jpg" class="card-img-top" alt="Título de la noticia 1">
                <div class="card-body">
                    <h5 class="card-title">Tormenta tropical Pilar dejó inundaciones y árboles caídos en Tabasco I FOTOS</h5>
                    <p class="card-text">Este fenómeno interactúa con el Frente Frío No. 8, causando efecto en varias entidades mexicanas. En Tabasco se declaró Alerta Amarilla por los efectos de la tormenta tropical Pilar y el Frente Frío Número 8. El pronóstico era de lluvias intensas a torrenciales y fuertes vientos.</p>
                    <a href="noticia1.html" class="btn btn-light">Leer más</a>
                </div>
            </div>
        </div>

    <!-- CARD 3 --> 

     <div class="col-md-4 ">
            <div class="card mb-1">
                <img src="<?php echo RUTA_URL;?>/img/CARD3.jpg" class="card-img-top" alt="Título de la noticia 1">
                <div class="card-body">
                    <h5 class="card-title">Se termina la carga manual de datos de IVA: cómo es el nuevo sistema de AFIP que arranca en noviembre</h5>
                    <p class="card-text">La Administración Federal de Ingresos Públicos implementó un mecanismo que busca facilitar la presentación de la declaración jurada del impuesto al valor agregado. La medida impactará en el 90% de los contribuyentes a partir de noviembre.</p>
                    <a href="noticia1.html" class="btn btn-light">Leer más</a>
                </div>
            </div>
        </div>
  
</div>

<div class="col-md-4 ">
            <div class="card mb-1">
                <img src="<?php echo RUTA_URL;?>/img/CARD4.jpg" class="card-img-top" alt="Título de la noticia 1">
                <div class="card-body">
                    <h5 class="card-title">Abel Pintos y Luciano Pereyra hacen historia en la primera de 30 noches inolvidables en el Luna Park</h5>
                    <p class="card-text">Con un escenario en 360 grados, este sábado los artistas iniciaron la serie de conciertos en el legendario estadio de la ciudad de Buenos Aires. En diálogo con Teleshow, ambos expresaron la emoción por el recibimiento del público y la felicidad que sienten por cantar juntos.</p>
                    <a href="https://www.infobae.com/teleshow/2024/11/10/abel-pintos-y-luciano-pereyra-hacen-historia-en-la-primera-de-30-noches-inolvidables-en-el-luna-park/" class="btn btn-light">Leer más</a>
                </div>
            </div>
        </div>
  
</div>
</section>

 <!-- FOOTER -->
<?php require RUTA_APP .'/views/layout/landing/footer.php';?>   