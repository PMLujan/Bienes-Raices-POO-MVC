<?php

namespace MVC;

class Router {
    public $rutasGET= [];
    public $rutasPOST = [];

    public function get($url,$fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url,$fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobandoRutas(){
        session_start();//para tener acceso a la super global $_session

        $auth = $_SESSION['login'] ?? null;

        //arreglos con rutas protegidas:
        $rutasProtegidas =['/admin','/propiedades/crear','/vendedores/crear','/propiedades/actualizar','/propiedades/eliminar','/vendedores/actualizar','/vendedores/eliminar'];

        $urlActual= $_SERVER['PATH_INFO'] ?? '/';
        $metodo= $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
           $fn= $this->rutasGET[$urlActual] ?? NULL;
        }else{
            $fn= $this->rutasPOST[$urlActual] ?? NULL;
        }
        //proteger las rutas
        if(in_array($urlActual,$rutasProtegidas) && !$auth){
            header('location:/');
        }

           if($fn){
            //la url existe en la funcion asociada
            call_user_func($fn,$this); //va llamar una funcion cuando no sabemos el nombre
           }else{
             echo 'Pagina no encontrada';
           }
    }
    //metodo para mostrar vista
    public function render($view, $datos=[]){

        foreach($datos as $key => $value){
            $$key= $value;
        }

        ob_start();// iniciamos almasenamiento en memoria

        include __DIR__ . './views/'.$view.'.php'; //archivo que la almacena en momoria

        $contenido= ob_get_clean(); //borranos archivo en memoria

        include __DIR__ . './views/layout.php';
    }

}

?>