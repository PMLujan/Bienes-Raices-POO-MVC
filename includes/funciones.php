<?php

//defino constantes

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplate($nombre, $inicio=false){
    @include TEMPLATES_URL ."/{$nombre}.php";

}

function estaAutenticado() : bool {
    session_start();
    
    $auth= $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;
}

function debuguear($variable){
    echo "<pre>";
      var_dump($variable);
    echo "</pre>";

exit;
}


//escapar HTML o sanitizar entrada de datos
function s($html){
    $s= htmlspecialchars($html);

    return $s;
}

//funcion para mostrar tipo de formulario a eliminar

function validarTipoDeContenido($tipo){
    $tipos=['vendedor','propiedad'];

    return in_array($tipo,$tipos);// busca un string en un arreglo -1ro recibe el string y despues el arreglo donde lo va a buscar
}

//mostrar notificaciones 

function mostrarNotifiacion($codigo){
    $mensaje='';

    switch($codigo){
        case 1:
            $mensaje="Creado Correctamente";
            break;
        case 2:
             $mensaje="Actualizado  Correctamente";
             break;
        case 3:
             $mensaje="Eliminado Correctamente";
            break;
        default:
            $mensaje= false;
             break; 
    }
    return $mensaje;
}

function validarOredireccionar( string $url){

    $idUrl= $_GET['id'];
    $id= filter_var($idUrl,FILTER_VALIDATE_INT); //valida que sea un entero


        if(!$id){ //si no recibe un numero lo redirecciona
            header("location: {$url}");
    }
    return $id;

}