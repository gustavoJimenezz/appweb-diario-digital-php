<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require RUTA_APP . "/views/layout/admin/menu.php"; ?>

    <!-- Content Wrapper -->
    <div id='dashboard-admin' class="d-flex flex-column flex-grow-1">

        <!-- Main Content -->
        <div id="content">


            <!-- logout -->
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow ">                            
                            <div class="dropdown-divider "></div>
                            <a class="dropdown-item text-info" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 " ></i>
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row">
                    
                    <!-- PERIODISTAS -->
                    <h2 class="mt-5 mb-4">Lista de Periodistas</h2>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!empty($data['periodistas'])): ?>
                                <?php foreach ($data['periodistas'] as $periodista): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($periodista->nombre); ?></td>
                                        <td><?php echo htmlspecialchars($periodista->apellido); ?></td>
                                        <td><?php echo htmlspecialchars($periodista->dni); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No hay periodistas registrados</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- LECTORES -->
                    <h2 class="mt-5 mb-4">Lista de Lectores</h2>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!empty($data['lectores'])): ?>
                                <?php foreach ($data['lectores'] as $lectores): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($lectores->nombre); ?></td>
                                        <td><?php echo htmlspecialchars($lectores->apellido); ?></td>
                                        <td><?php echo htmlspecialchars($lectores->dni); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No hay lectores registrados</td>
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