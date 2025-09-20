<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require RUTA_APP . "/views/layout/admin/menu.php"; ?>

    <!-- Content Wrapper -->
    <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Periodista</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo RUTA_URL; ?>/PeriodistaController/actualizarPeriodista" method="POST">
                <!-- Campo oculto para enviar el ID de la sección -->
                <input type="hidden" name="id_periodista" value="<?php echo $data['periodista']['id_periodista']; ?>">
                
                <div class="form-group">
                    <label for="nombre_periodista">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['periodista']['nombre']; ?>">
                </div>   
                <div class="form-group">
                    <label for="apellido_periodista">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $data['periodista']['apellido']; ?>">
                </div>
                <div class="form-group">
                    <label for="dni_periodista">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $data['periodista']['dni']; ?>">
                </div>
                <div class="form-group">
                    <!-- HAY Q VER SI VA O NO
                    <label for="seccion">Seleccionar Sección:</label>
                    <select name="seccion_id" id="seccion" class="form-control">
                        <option value="">Seleccione una sección</option>
                        <?php foreach ($data['secciones'] as $seccion) : ?>
                                <option value="<?php echo $seccion->id_seccion; ?>">
                                    <?php echo $seccion->nombre_seccion; ?>
                                </option>
                        <?php endforeach; ?>
                    </select>
                </div>-->
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>


        <!-- End of Main Content -->
        <?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
    </div>
</div>