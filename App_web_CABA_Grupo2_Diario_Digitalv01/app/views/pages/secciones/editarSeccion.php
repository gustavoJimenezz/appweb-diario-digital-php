<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require RUTA_APP . "/views/layout/admin/menu.php"; ?>

    <!-- Content Wrapper -->
    <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Sección</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo RUTA_URL; ?>/SeccionController/actualizarSeccion" method="POST">
                <!-- Campo oculto para enviar el ID de la sección -->
                <input type="hidden" name="id_seccion" value="<?php echo $data['seccion']['id_seccion']; ?>">
                
                <div class="form-group">
                    <label for="nombre_seccion">Nombre de la Sección</label>
                    <input type="text" class="form-control" id="nombre_seccion" name="nombre_seccion" value="<?php echo $data['seccion']['nombre_seccion']; ?>">
                </div>
                
                <div class="form-group">
                    <label for="dia_publicacion">Fecha de Publicación</label>
                    <input type="date" class="form-control" id="dia_publicacion" name="dia_publicacion" value="<?php echo date('Y-m-d', strtotime($data['seccion']['dia_publicacion'])); ?>">
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