<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<body>
    
 <div class="container text-center mt-5">
    <h2 class="text-black fw-bold">¡Sumate a la comunidad de Diario Digital!</h2>
    <!-- <form class="user" id="registroForm" action="<?php echo RUTA_URL; ?>/AuthController/registrarLector/"
    method="POST" enctype="multipart/form-data"> -->

    <div class="row mt-5">
        <!-- Plan acceso ilimitado -->

    <div class="col-md-6">
        <form class="user" action="<?php echo RUTA_URL;?>/SuscripcionesController/vincularSuscripcion/" method="POST">
            
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title fw-bold">Plan ilimitado</h3>
                        <img src="./../img/plan-ilimitado.jpg" alt="Plan acceso ilimitado" class="img-fluid my-3" style="width: 500px; height: 500px;">
                        <p class="display-4">$10.000/mes</p>
                        <p class="card-text"></p>

                        <button type="submit" name="id-suscripcion" value="1" class="btn btn-info btn-user btn-block" >SUSCRIBITE</button>
                    </div>
                </div>
           
        </form>
    </div>   

        <!-- Edicion dominical -->
    <div class="col-md-6">
        <form class="user" action="<?php echo RUTA_URL;?>/SuscripcionesController/vincularSuscripcion/" method="POST">
           
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title fww-bold">Edicion dominical</h3>
                        <img src="./../img/edicion-dominical.jpg" alt="Edicion dominical" class="img-fluid my-3" style="width: 500px; height: 500px;">
                        <p class="display-4">$2.000/mes</p>
                        <p class="card-text"></p>

                        <button type="submit" name="id-suscripcion" value="2" class="btn btn-info btn-user btn-block" >SUSCRIBITE</button>
                    </div>
                </div>
            
        </form>
    </div>

</div>
 
 </body>

 <?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>