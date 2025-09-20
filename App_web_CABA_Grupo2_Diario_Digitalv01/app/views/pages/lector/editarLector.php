<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require RUTA_APP . "/views/layout/admin/menu.php"; ?>

    <!-- Content Wrapper -->
    <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Lector</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo RUTA_URL; ?>/LectorController/actualizarLector" method="POST">
                <!-- Campo oculto para enviar el ID de la sección -->
                <input type="hidden" name="Id_lector" value="<?php echo $data['lectores']['Id_lector']; ?>">
                
                <div class="form-group">
                    <label for="nombre">Nombre Lector</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['lectores']['nombre']; ?>">
                </div>
                
                <div class="form-group">
                    <label for="apellido">Apellido Lector</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $data['lectores']['apellido']; ?>">
                </div>

                <div class="form-group">
                    <label for="dni">Dni Lector</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $data['lectores']['dni']; ?>">
                </div>

                <div class="form-group">
                    <label for="celular">Celular Lector</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $data['lectores']['celular']; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>


        <!-- End of Main Content -->
        <?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
    </div>
</div>