<?php

namespace Model;

class Propiedad extends ActiveRecord {

            protected static $tabla = 'propiedades';  
            
            protected static $columnasBD = ['id','titulo','precio','imagen','descripcion','habitaciones','baños','estacionamiento','creado','vendedores_id'];

            
            public $id;
            public $titulo;
            public $precio;
            public $imagen;
            public $descripcion;
            public $habitaciones;
            public $baños;
            public $estacionamiento;
            public $creado;
            public $vendedores_id;

            //funcion constructura

            public function __construct($args = []) //toma un arreglo y por default esta vacio
                                                    {
                    $this->id = $args['id'] ?? NULL;
                    $this->titulo = $args['titulo'] ?? '';
                    $this->precio = $args['precio'] ?? '';
                    $this->imagen = $args['imagen'] ?? '';
                    $this->descripcion = $args['descripcion'] ?? '';
                    $this->habitaciones = $args['habitaciones'] ?? '';
                    $this->baños = $args['baños'] ?? '';
                    $this->estacionamiento = $args['estacionamiento'] ?? '';
                    $this->creado = date('Y/m/d') ;
                    $this->vendedores_id = $args['vendedores_id'] ?? '';

                }

                public function validar(){
    
                    if(!$this->titulo){
                       self::$errores[] = "Debes añadir un titulo";
                       }
                       if(!$this->precio){
                        self::$errores[] = "Debes añadir un Precio";
                       }
                       if( strlen($this->descripcion) < 15){
                           self::$errores[] = "Debes añadir una descripción que contenga mas de 15 caracteres";
                       }
                       if(!$this->habitaciones){
                           self::$errores[] = "Debe añadir la cantidad de habitaciones";
                       }
                       if(!$this->baños){
                           self::$errores[] = "Debes añadir cantidad de baños";
                       }
                       if(!$this->estacionamiento){
                           self::$errores[] = "Debes añadir cantidad de estacionamientos";
                       }
                       if(!$this->vendedores_id){
                           self::$errores[] = "Debes seleccionar un vendedor";
                       }
                       if(!$this->imagen){
                           self::$errores[] ="La imagen es obligatoria";
                       }
              return self::$errores;
           }
       
   


}