<?php

namespace Model;

class Vendedores extends ActiveRecord {
   
        protected static $tabla = "vendedores";

        protected static $columnasBD = ['id','nombre','apellido','telefono'];

        public $id;
        public $nombre;
        public $apellido;
        public $telefono;


        public function __construct($args = []) //toma un arreglo y por default esta vacio
                                                {
                    $this->id = $args['id'] ?? NULL ;
                    $this->nombre = $args['nombre'] ?? '';
                    $this->apellido = $args['apellido'] ?? '';
                    $this->telefono = $args['telefono'] ?? '';
                }
                
        public function validar(){
    
                    if(!$this->nombre){
                       self::$errores[] = "Debes añadir un Nombre";
                       }
                    if(!$this->apellido){
                        self::$errores[] = "Debes añadir un Apellido";
                        }
                     if(!$this->telefono){
                        self::$errores[] = "Debes añadir un Teléfono";
                        }
                    if(!preg_match('/[0-9]{10}/',$this->telefono)){//expresion regular -> es la que validamos el telefono que contenga numeros entre el 0y 9 y hasta 10 digitos
                        self::$errores[] = "Formato de teléfono no valido";
                    }
                    return self::$errores;
                 }            

}
?>