<?php require RUTA_APP . "/views/layout/admin/header.php";?>



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

                        <form class="user" id="registroForm" action="<?php echo RUTA_URL; ?>/AuthController/registrarPeriodista/"
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
                                    id="email" placeholder="Email">
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
                            <button type="submit" class="btn btn-primary btn-user btn-block">
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



<?php require RUTA_APP . "/views/layout/admin/footer.php";?>
