<?php

namespace Controllers;
use MVC\Router;
use Model\Admin ;

class LoginControllers{

    public static function login(Router $router){

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)){
                //verifivar que el usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado){
                    $errores = Admin::getErrores();
                }else{
                    //verificar que el pasword existe
                    $autenticado=$auth->comprobarPassword($resultado);

                    if($autenticado){
                        //autenticar a el usuario
                        $auth->autenticar();
                    }else{
                        //password incorrecto (mensaje de error)
                        $errores = Admin::getErrores();

                    }
                }                
            }           
        }

        $router->render('auth/login' , [
            'errores'=>$errores,
        ]);
    }
    
    public static function logout(){
        session_start();
        //restauramos la super global session vaciando el arreglo

        $_SESSION = [];

        header('location:/');

    }

}


?>