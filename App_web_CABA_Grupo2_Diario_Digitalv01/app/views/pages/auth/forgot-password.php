<?php require RUTA_APP . "/views/layout/landing/header.php";?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Olvidate Contaseña?</h1>
                                        <p class="mb-4">Ingresá tu mail y te enviamos el link para generar una nueva contraseña</p>
                                    </div>
                                    <form class="user" action="<?php echo RUTA_URL;?>/AuthController/enviar_password/" method="POST">
                                        <div class="form-group">
                                            <input name ="email" type="email" class="form-control form-control-user" id="exampelInputEmail" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <button type="submit" class="btn btn-info btn-user btn-block">Enviar</button>
                                    </form>
                                    <hr>
                                    <?php if($data['mail']!= ''){
                                        echo $data['mail'];
                                    }?>
                                <?php if($data['error_mail']!= ''){
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