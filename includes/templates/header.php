<?php
//iniciar sesión

if(!isset($_SESSION)){
    session_start();

    $auth = $_SESSION['login'] ?? false;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>
 <!-- COMIENZO DEL HEADER -->
   <header class="header <?php echo $inicio ? 'inicio' : ''?>">
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
                            <a href="nosotros.php">Nosotros</a>
                            <a href="anuncios.php">Anuncios</a>
                            <a href="blog.php">Blog</a>
                            <a href="contacto.php">Contacto</a>
                            <?php if($auth): ?>
                                <a href="cerrarSesion.php">Cerrar sesión</a>
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
