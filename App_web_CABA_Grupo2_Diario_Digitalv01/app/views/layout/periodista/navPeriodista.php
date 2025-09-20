<!-- logout -->
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Contenedor central -->
    <div class="container-fluid">
        <!-- Columna para el nombre de la sección centrado -->
        <div class="d-flex justify-content-center flex-grow-1">
            <div class="d-none d-sm-inline-block form-inline my-2 my-md-0">
                <span class="h3 mb-0 text-gray-800 text-capitalize text-center">
                    <?php echo $_SESSION['nombre_seccion']; ?>
                </span>
            </div>
        </div>
        <!-- <button type="button" class="btn btn-primary btn-sm">Small button</button> -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Columna para el logout en el costado derecho -->
        <div class="navbar-nav ml-auto">
            <div class="nav-item dropdown no-arrow">
                <a class="btn btn-light btn-sm" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
</nav>
