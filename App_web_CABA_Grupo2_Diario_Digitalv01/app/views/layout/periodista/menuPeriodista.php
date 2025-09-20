 <!-- menu -->
<ul class="navbar-nav bg-info text-white sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo RUTA_URL; ?>/PeriodistaController/dashboardPeriodista">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="m-0 font-weight-bold mx-3"><?php echo $_SESSION['nombre'] ?></div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block border-info-subtle border-2">

     <!-- Heading -->
     <div class="sidebar-heading">
         Menu de trabajo
     </div>

     <!-- Nav Item - Secciones Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link" href="<?php echo RUTA_URL; ?>/NotaPeriodisticaController/crearNota/"><i class="fas fa-fw fa-chart-area"></i><span>Nueva nota periodistica</span></a>
         <a class="nav-link" href="<?php echo RUTA_URL; ?>/NotaPeriodisticaController/notasPublicadas/"><i class="fas fa-fw fa-chart-area"></i><span>Notas publicadas</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">
</ul>