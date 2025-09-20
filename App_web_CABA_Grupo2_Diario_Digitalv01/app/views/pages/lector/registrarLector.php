<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require RUTA_APP . "/views/layout/admin/menu.php"; ?>

    <!-- Content Wrapper -->
    <div class="d-flex flex-column flex-grow-1">

        <!-- Main Content -->
        <div id="content">
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- DataTables -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-info">Lectores actuales:</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">Dni</th>
                                        <th class="text-center">Celular</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data['lectores'])): ?>
                                        <?php foreach ($data['lectores'] as $lector): ?>
                                            <tr>
                                                <td><?php echo $lector->nombre; ?></td>
                                                <td><?php echo $lector->apellido; ?></td>
                                                <td><?php echo $lector->dni; ?></td>
                                                <td><?php echo $lector->celular; ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/LectorController/editarLector/<?php echo $lector->Id_lector; ?>">Editar</a>
                                                    <form action="<?php echo RUTA_URL; ?>/LectorController/eliminarLector/<?php echo $lector->Id_lector; ?>" method="POST" style="display:inline;">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sección?');">Eliminar</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-secondary">SIN LECTORES</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- End of Main Content -->
        <?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
    </div>
</div>
