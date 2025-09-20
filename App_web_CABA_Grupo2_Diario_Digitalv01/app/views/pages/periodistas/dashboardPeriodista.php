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
            <div class="row">
                <!-- Pending Requests Card Example -->
                <div class=" mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Cantidad de notas</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($data['notas']); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <?php foreach ($data['notas'] as $nota): ?>
                        <div class="col">
                            <div class="card h-100">
                                <!-- <img src="" class="card-img-top" alt="Imagen de la nota"> -->
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $nota->titulo; ?></h5>
                                    <p class="card-text"><?php echo $nota->contenido; ?></p>
                                    <a class="btn btn-light" href="<?php echo RUTA_URL; ?>/NotaPeriodisticaController/verNotaPeriodistica/<?php echo $nota->id_nota_periodistica; ?>">Leer más</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>



        </div>

    </div>
</div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
<?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>