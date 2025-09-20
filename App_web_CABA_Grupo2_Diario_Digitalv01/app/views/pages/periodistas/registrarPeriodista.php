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


                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Nuevo Periodista</h1>
                                        </div>

                                        <form class="user" id="registroForm" action="<?php echo RUTA_URL; ?>/PeriodistaController/registrar/"
                                            method="POST" enctype="multipart/form-data">
                                            <!-- Campos de formulario -->
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input name="nombre" type="text" class="form-control form-control-user"
                                                        id="nombre" placeholder="Nombre">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input name="apellido" type="text" class="form-control form-control-user"
                                                        id="apellido" placeholder="Apellido">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input name="dni" type="dni" class="form-control form-control-user"
                                                    id="dni" placeholder="DNI">
                                                <div class="form-group row">
                                                </div>
                                                <div class="form-group">
                                                    <input name="email" type="email" class="form-control form-control-user"
                                                        id="email" placeholder="Email"  value="ej: email@diariodigital.com">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input name="password" type="password" class="form-control form-control-user"
                                                            id="password" placeholder="Password">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input name="password2" type="password" class="form-control form-control-user"
                                                            id="password2" placeholder="Repetir Password">
                                                    </div>
                                                </div>

                                                <!-- Desplegable de Secciones -->
                                                <div class="form-group">
                                                    <label for="seccion">Seleccionar Sección:</label>
                                                    <select name="seccion_id" id="seccion" class="form-control">
                                                        <option value="">Seleccione una sección</option>
                                                        <?php foreach ($data['secciones'] as $seccion) : ?>
                                                            <option value="<?php echo $seccion->id_seccion; ?>">
                                                                <?php echo $seccion->nombre_seccion; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <?php 
                                                    if ($data['error_login']!=''){
                                                        echo $data['error_login'];
                                                    }
                                                ?>
                                                
                                                <?php 
                                                    if ($data['successful']!=''){
                                                        echo $data['successful'];
                                                    }
                                                ?>
                                                
                                                <button type="submit" class="btn btn-info btn-user btn-block">
                                                    Registrar
                                                </button>

                                        </form>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- DataTables Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-info">Periodistas registrados : </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">DNI</th>
                                        <th class="text-center">Acciones</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data['periodistas'])): ?>
                                        <?php foreach ($data['periodistas'] as $periodista): ?>
                                            <tr>
                                                <td><?php echo $periodista->nombre; ?></td>
                                                <td><?php echo $periodista->apellido; ?></td>
                                                <td><?php echo $periodista->dni; ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/PeriodistaController/editarPeriodista/<?php echo $periodista->id_periodista; ?>">Editar</a>
                                                        <form action="<?php echo RUTA_URL; ?>/PeriodistaController/eliminarPeriodista/<?php echo $periodista->id_periodista; ?>" method="POST" style="display:inline;">
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este periodista?');">Eliminar</button>
                                                        </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <h4 class="text-secondary">SIN PERIODISTAS</h4>
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