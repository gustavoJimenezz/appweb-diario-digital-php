<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require RUTA_APP . "/views/layout/periodista/menuPeriodista.php"; ?>

    <!-- Content Wrapper -->
    <div class="d-flex flex-column flex-grow-1">

        <!-- Main Content -->
        <div id="content">

            <!-- logout -->
            <!-- Topbar -->
            <?php require RUTA_APP . "/views/layout/periodista/navPeriodista.php"; ?>
            
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row">

                    <!-- PERIODISTAS -->
                    <h2 class="mt-5 mb-4">Editar nota</h2>

                    <form class="user d-flex flex-column gap-2" action="<?php echo RUTA_URL; ?>/NotaPeriodisticaController/actualizarNota/" method="POST">
                        <input type="hidden" name="id_nota_periodistica" value="<?php echo $data['id_nota_periodistica']; ?>">
                        
                        <!-- titulo input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form4Example1">Titulo :</label>
                            <input name="titulo" type="text" id="titulo" class="form-control" required value="<?php echo $data['tituloNota']; ?>">
                            
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4" >
                            <input type="file">
                                <label class="form-label" for="form4Example3">Imagen :</label>
                            </input>
                        </div>
    
                        <!-- contenido input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form4Example3">Contenido :</label>
                            <textarea class="form-control" id="contenido" name="contenido" rows="10" cols="50" required><?php echo $data['contenidoNota']; ?></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-lg" onclick="return confirm('¿Desea aplicar Cambios?');">Aplicar</button>
                            <button type="button" class="btn btn-secondary btn-lg" onclick="this.form.reset(); window.location.href='<?php echo RUTA_URL; ?>/NotaPeriodisticaController/notasPublicadas';">Cancelar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
<!-- /.container-fluid -->
