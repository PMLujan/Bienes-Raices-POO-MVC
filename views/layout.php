<?php
//iniciar sesión

if(!isset($_SESSION)){
    session_start();

    $auth = $_SESSION['login'] ?? false;
}
if(!isset($inicio)){
    $inicio=false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>
 <!-- COMIENZO DEL HEADER -->
   <header class="header <?php echo $inicio ? 'inicio' : ''?>"   style=" background-image: url(./build/img/header.jpg)";
>
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/../../index.php">
                    <img src="/build/img/logo.svg" alt="logo">
                </a>
                <div class="menu-hamburguesa">
                    <img src="/build/img/barras.svg" alt="Icono menu responsivo">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Icono dark mode">
                        <nav class="navegacion">
                            <a href="/nosotros">Nosotros</a>
                            <a href="/propiedades">Anuncios</a>
                            <a href="/blog">Blog</a>
                            <a href="/contacto">Contacto</a>
                            <?php if(!$_SESSION['login']) : ?>
                                <a href="/login" > Iniciar Sesión </a>
                            <?php endif; ?>
                            <?php if($_SESSION['login']) : ?>
                                <a href="/logout" > Cerrar sesión </a>
                            <?php endif; ?>
                        </nav>
                </div>
            </div><!--fin del nav-->
            <?php if($inicio){ 
                ?>
                <h3>Ventas de casas y departamentos exclusivos de lujo</h3>
            <?php
            }
               ?>
        </div>
   </header>  <!--fin de header-->

   <?php echo $contenido; ?>
   
<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados- <?php echo date('Y') ?> &copy;</p>
   </footer>
    <script src="./build/js/bundle.min.js"></script>
</body>
</html>