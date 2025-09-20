<?php require RUTA_APP . "/views/layout/landing/header.php";?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden-border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">RESETEO DE CONTRASEÑA</h1>
                                </div>
                                <form class="user" action="<?php echo RUTA_URL;?>/AuthController/actualizar_password/" method = "POST">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user mt-2" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Tu email">

                                        <input type="password" name="pass_actual" class="form-control form-control-user mt-2" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingrese contraseña actual">

                                        <input type="password" name="pass_nueva" class="form-control form-control-user mt-2" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingrese contraseña nueva">

                                        <input type="password" name="pass_nueva2" class="form-control form-control-user mt-2" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Repetir contraseña nueva">
                                    </div>
                                    <?php
                                    if($data['error_pass']!= ''){
                                        echo $data['error_pass'];
                                    }?>
                                    <div class="text-center mb-2">
                                        <a class="small" href="<?php echo RUTA_URL;?>/AuthController/login">Login</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Enviar</button>
                                </form>
                                <hr>
                                <?php if($data['error_mail'] != ''){
                                    echo $data['error_mail'];
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require RUTA_APP . "/views/layout/landing/footer.php";?>