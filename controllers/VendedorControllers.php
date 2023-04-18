<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedores;

class VendedorControllers{

    public static function crear(Router $router){

        $errores = Vendedores::getErrores();
        $vendedor = New Vendedores;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //crear nueva instancia de vendedor
            $vendedor= new Vendedores($_POST['vendedor']);
        
            //validar datos
            $errores= $vendedor->validar();
        
            //si no hay errores
            if(empty($errores)){//chequeamos que el array este vacio
                
                $vendedor->guardar();
            }
        }
        
        
        $router->render('/vendedores/crear',[
            'errores'=> $errores,
            'vendedor'=> $vendedor

        ]);
        
    }

    public static function actualizar(Router $router){

        $errores = Vendedores::getErrores();
        $id= validarOredireccionar('/admin');

        //obtener datos del vendedor a actualizar:
        $vendedor = Vendedores::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['vendedor'];
        
            $vendedor->sincronizar($args);
        
            // Validación
            $errores = $vendedor->validar();
           
        
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }
        
        $router->render('vendedores/actualizar',[
            'errores'=>$errores,
            'vendedor'=> $vendedor
        
        ]);
    }

    public static function eliminar(){ //no necesita enviarle router porque no renderiza una vista

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //validar que id vamos a validar
            $id= $_POST['id'];
            $id= filter_var($id,FILTER_VALIDATE_INT);

            if($id){
                //validar que tipo vamos a eliminar
                $tipo = $_POST['tipo'];

                    if(validarTipoDeContenido($tipo)){
                        $vendedor= Vendedores::find($id);
                        $vendedor->eliminar();
                }
            }
        }

    }



}

?>