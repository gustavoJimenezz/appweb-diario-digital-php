<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

     <?php require RUTA_APP . "/views/layout/periodista/menuPeriodista.php"; ?>

     <!-- Content Wrapper -->
     <div class="d-flex flex-column flex-grow-1">
 
        <!-- Main Content -->
        <div id="content">

            <!-- logout -->
            <!-- Topbar -->
            <?php require RUTA_APP . "/views/layout/periodista/navPeriodista.php"; ?>
           
            <!-- Begin Page Content -->
            <div class="container-fluid">
                 <!-- Content Row -->
                 <div class="row">
                                  
                 <!-- Titulo -->
                 <h1><?php echo $data['tituloNota']; ?></h1>
                 <!-- Contenido --> 
                 <p><?php echo $data['contenidoNota']; ?></p>
                 
           
                
                <img src="<?php echo RUTA_APP . '/'. $data['imagen_nota']; ?>" alt="">
                <img src="<?php echo str_replace('\\', '/', RUTA_URL . '/public/' . $data['imagen_nota']); ?>" alt="">

                    
                 </div>
             </div>       
        </div>       
         <?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
    </div>

<!-- End of Main Content -->


<!-- /.container-fluid -->
