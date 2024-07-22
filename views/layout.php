<?php 

    if(!isset($_SESSION)){
        session_start();
    }

    if( !isset($inicio) ){
        $inicio = false;
    }

    $auth = $_SESSION["auth"] ?? false;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href = "/scss/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? "inicio" : ""; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img src="/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src = "/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if( $auth ) : ?>
                            <a href="/cerrarSesion">Cerrar Sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <?php echo $inicio ? "<h1>Venta de casas y departamentos Exclusivos de lujo</h1>" : ""; ?>
        </div>
    </header>

    <?php echo $contenido ?>
    
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados <?php echo date("Y"); ?> &copy;</p>
    </footer>

    <script src="/js/app.js"></script>
    <script src="/js/modernizr.js"></script>
</body>

</html>