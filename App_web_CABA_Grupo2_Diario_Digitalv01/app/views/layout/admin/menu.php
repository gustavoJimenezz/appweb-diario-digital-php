<!-- Sidebar -->
<ul class="navbar-nav bg-info text-white sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/AuthController/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?php echo $_SESSION['nombre']; ?></span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading --> 
    <div class="sidebar-heading">
        Herramientas
    </div>

    <!-- Nav Item - Secciones Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSecciones" aria-expanded="true"
            aria-controls="collapseSecciones">
            <i class="fas fa-fw fa-list"></i>
            <span>Secciones</span>
        </a>
        
        <div id="collapseSecciones" class="collapse" aria-labelledby="headingSecciones" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
                <a class="collapse-item " style="color:white;" href="<?php echo RUTA_URL;?>/SeccionController/registrarSeccion"><b>Alta de sección</b></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Periodistas Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeriodistas" aria-expanded="true"
            aria-controls="collapsePeriodistas">
            <i class="fas fa-fw fa-list"></i>
            <span>Periodistas</span>
        </a>
        
        <div id="collapsePeriodistas" class="collapse" aria-labelledby="headingPeriodistas" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
                <a class="collapse-item " style="color:white;" href="<?php echo RUTA_URL;?>/PeriodistaController/registrarPeriodista"><b>Alta de periodista</b></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Lectores Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLector" aria-expanded="true"
            aria-controls="collapseLector">
            <i class="fas fa-fw fa-list"></i>
            <span>Lectores</span>
        </a>
        
        <div id="collapseLector" class="collapse" aria-labelledby="headingLectores" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
                <a class="collapse-item " style="color:white;" href="<?php echo RUTA_URL;?>/LectorController/registrarLector"><b>Alta de Lectores</b></a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
<!-- End of Sidebar -->
