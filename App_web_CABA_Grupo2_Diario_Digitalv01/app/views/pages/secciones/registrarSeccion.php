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
                

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Alta de sección</h1>
                </div>

                <form class="d-flex flex-column gap-2" action="<?php echo RUTA_URL; ?>/SeccionController/registrar/" method="POST">
                    <div class="input-group mb-3">
                        <input name="nombre-seccion" id="nombre-seccion" type="text" class="form-control" placeholder="Nombre de sección" aria-describedby="basic-addon2" required>
                        <div class="input-group-append">
                            <button id="btn-crear-seccion" class="btn btn-info" type="submit">Crear</button>
                        </div>
                    </div>
                </form>

                <!-- DataTables -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-info">Secciones actuales:</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Secciones</th>
                                        <th class="text-center">Fecha de publicación</th>
                                        <th class="text-center">ID de sección</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data['secciones'])): ?>
                                        <?php foreach ($data['secciones'] as $seccion): ?>
                                            <tr>
                                                <td><?php echo $seccion->nombre_seccion; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($seccion->dia_publicacion)); ?></td>
                                                <td><?php echo $seccion->id_seccion; ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/SeccionController/editarSeccion/<?php echo $seccion->id_seccion; ?>">Editar</a>
                                                    <form action="<?php echo RUTA_URL; ?>/SeccionController/eliminarSeccion/<?php echo $seccion->id_seccion; ?>" method="POST" style="display:inline;">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sección?');">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-secondary">SIN SECCIONES</td>
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
