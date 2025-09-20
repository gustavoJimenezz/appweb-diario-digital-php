
    <!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Diario Digital</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo RUTA_URL; ?>/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <!-- Boton para volver atras -->
        <body>

    <!-- Header -->
    <header class="post-header">
        <div class="container">
            <h1><?php echo $data['tituloNota']; ?></h1>
        </div>
    </header>

    <!-- Post Content -->
    <main class="container my-5">
        <div class="post-content">
            <img src="<?php echo str_replace('\\', '/', RUTA_URL . '/public/' . $data['imagen_nota']); ?>" alt="Imagen de la noticia">
            <p><?php echo $data['contenidoNota']; ?></p>
            <a href="javascript:history.back()" class="btn-back">Volver</a>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>Copyright &copy; Diario Digital 2024 | <a href="#">Política de privacidad</a></p>
        </div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- End of Main Content -->

<!-- /.container-fluid -->
