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


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Notas : </h1>
                    
                    <?php 
                        if ($data['mensaje'] != ''): ?>
                            <div class="alert alert-primary" role="alert">
                                <?php echo $data['mensaje']; ?>
                            </div>
                    <?php endif; ?>

                    <?php 
                        if ($data['mensaje']!=''){
                            echo $data['mensaje'];
                        }
                    ?>

                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-info">Tus notas actuales:</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center border-0">
                                        <tr>
                                            <th class="text-center">titulo</th>
                                            <th class="text-center">Fecha de publicación</th>
                                            <th class="text-center "></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data['notas'])): ?>
                                            <?php foreach ($data['notas'] as $nota): ?>
                                                <tr class=" border-0">
                                                    <td><?php echo $nota->titulo; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($nota->fecha_creacion)); ?></td>
                                                    
                                                    <td class="d-flex justify-content-center gap-2">

                                                      <!--Editar nota periodistica -->                                            
                                                        <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/NotaPeriodisticaController/editarNotaPeriodistica/<?php echo $nota->id_nota_periodistica; ?>">Editar</a>

                                                      <!--Eliminar nota periodistica -->                                        
                                                        <form action="<?php echo RUTA_URL; ?>/NotaPeriodisticaController/eliminarNotaPeriodistica/<?php echo $nota->id_nota_periodistica; ?>" method="POST" style="display:inline;">
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sección?');">Eliminar</button>
                                                        </form>

                                                      <!--Ver nota periodistica -->
                                                         <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/NotaPeriodisticaController/verNotaPeriodistica/<?php echo $nota->id_nota_periodistica; ?>">Ver</a>
                                                    </td>

       
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-secondary">SIN NOTAS</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
<!-- /.container-fluid -->