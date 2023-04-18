<?php 

namespace Model;

class ActiveRecord {

                //conectamos BD y lo tenemos como protected para que solamente dentro de la clase podamos acceder a ella-como esta  statico el atributo el metodo para conectarla tmb es statico
                protected static $bd;
                //para sanitizar entrada de datos los incluimos en un arreglo-lo mapea para iterarlo
                protected static $columnasBD =[];
                
                protected static $tabla = "";
                //validacion
    
                protected static $errores= [];

                // public $id;
                // public $imagen;
    
                //metodo 
                //conectar a la base de datos
                // cuanto son atributos staticos van con self:: cuando son public van con this:
    
            public static function setBD($baseDatos){
                self::$bd = $baseDatos;
            }
    
            public function guardar(){
                if($this->id){
                    //actualizar
                    $this->actualizar();
                }else{
                    //crear
                    $this->crear();
                }
    
            }
    
            public function crear(){
                    //sanitizar datos
                    $atributos = $this->sanitizarAtributos();
                    //query
                    $query= " INSERT INTO " . static::$tabla . " ( " ;
                    $query.= join(', ',array_keys($atributos));
                    $query .= " ) VALUES (' ";
                    $query .= join("', '", array_values($atributos));
                    $query .= " ') ";
    
                //insertar en BD
    
                    $resultado= self::$bd->query($query);
    
                    if($resultado){
                        //redireccionar a la pagina inicio
                        header('location: /admin?resultado=1');
                    }
       
                }
    
            public function actualizar(){
                //sanitizar datos
                    $atributos = $this->sanitizarAtributos();
                //en valores vamos a ir llenando con los datos en memoria
                    $valores=[];
    
                foreach($atributos as $key=>$value){
                    $valores[]="{$key} ='{$value}'";
                }
            
                //insertar en la base de datos
                $query= "UPDATE " . static::$tabla . " SET ";
                $query .= join(", ", $valores);
                $query .= " WHERE id= '" . self::$bd->escape_string($this->id) . "' ";
                $query .= " LIMIT 1";
            
                $resultado = self::$bd->query($query);
    
                if($resultado){
                //redireccionar a la pagina inicio
                header('location: /admin?resultado=2');
            }
        }
    
        public function eliminar(){
    
            //eliminar propiedad
            $query="DELETE FROM " . static::$tabla . " WHERE id=". self::$bd->escape_string($this->id);
    
            $resultado= self::$bd->query($query);
            if($resultado){
                //eeliminar imagen
                $this->borrarImagen();
                header('location: /admin?resultado=3');
            }
        }
    
        //identificar y unir atributos de la BD //FOREACH ES PARA ARREGLOS
    
        public function atributos(){
                    $atributos =[]; //voy a mapear las columnas de la BD
                    foreach( static::$columnasBD as $columna){  //uso self porque es un atributo estatico-> la variable columna va iterar en cada columna de la BD 
                        if($columna === 'id') continue;   // cuando el id no tiene valor el continue hace que se siga ejecuntando el codigo lo ignora
                        $atributos[$columna] = $this->$columna;  // atributo en la posicion de columna va ser igua al el objeto(columnaDB en este caso) en posicion de columna
                    }     
                    return    $atributos;
                }
    
        //subida de imagenes
    
        public function setImagen($imagen){
            //eliminar la imagen previa la actualizar 
            if(!is_null($this->id)){
                //borrar iamagen
                $this->borrarImagen();
            }
            //asignar al atributo de imagen el nombre de la imagen
            if($imagen){
                $this->imagen = $imagen;
            }
        }
    
        //eliminar archivo de imagenes
    
        public function borrarImagen(){
             //comprobar que existe el archivo
             $existeArchivo= file_exists(CARPETA_IMAGENES . $this->imagen);
             if($existeArchivo){
                 unlink(CARPETA_IMAGENES . $this->imagen);
             }
        }
    
        public function sanitizarAtributos(){
            $atributos = $this->atributos();
            $sanitizado = []; //voy a mapear los atributos sanitizados
    
            foreach( $atributos as $key => $valeu){
                $sanitizado[$key] = self::$bd->escape_string($valeu);
    
            }
    
            return $sanitizado;
        }
         //validacion
    
         public static function getErrores(){
                return static::$errores;
    
            }

            public function validar(){
                static::$errores= [];
                return static::$errores;
       }
   

        
        //metodo para mostrar todas las propiedades
    
        public static function all(){
                //escribir el query:
                $query= 'SELECT * FROM ' . static::$tabla;

                //consulta BD
                $resultado= self::consultaSql($query);
    
                return $resultado;
        }
    
        //metodo mostra propiedad por id
    
        public static function find($id){
                    $query= "SELECT * FROM " . static::$tabla . " WHERE id = $id";
    
                    $resultado= self::consultaSql($query);
                    
            return array_shift($resultado); //funcion que devuelve la primer posicion de un arreglo
        }
    
        public static function consultaSql($query){
                    // consultar a la bd
                    $resultado=self::$bd->query($query);
    
                   //iterar los resultados
                    $array=[];
                    while($registro = $resultado->fetch_assoc()){  //como fetch asocc devuelve un array y los principios de active record indican que tiene que ser un objeto tenemos que pasar ese array a objeto
                        $array[]=static::crearObjeto($registro);
                    }
    
            //liberar la memoria
            $resultado->free();//los objetos que se crearon estan en memoria  una vez que los insertamos en el array los liberamos
    
        //retornar los resultados
        return $array;
    
        }
    
        protected static function crearObjeto($registro){
            $objeto= new static; //self/static(si se herada) esta creando una nueva instancia de la clase Propiedad
    
    
            foreach($registro as $key =>$value){
                if( property_exists($objeto, $key)){ //funcion que verifica si existe la propiedad y si existe le va a dar el valor toma dos parametros
                    $objeto->$key = $value;
                }
            }
    
            return $objeto;
        }
    
        //metodo para sincronizar los datos al momento de actualizar- sincroniza los datos en memoria con la BD
    
        public function sincronizar($args = []) {
              foreach($args as $key => $value){
                if(property_exists($this, $key) && !is_null($value)){//con is null le estamo diciendo que no puede estar nulo el valor
                    $this->$key =$value;
                } //this esta haciendo referencia al objeto del arreglo a lo que ya trae cargado el formulario
              }
        }

        //optiene determinado numeros de registros

        public static function get($cantidad){
            //escribir el query:
            $query= 'SELECT * FROM ' . static::$tabla . " LIMIT " . $cantidad;
            
            //consulta BD
            $resultado= self::consultaSql($query);

            return $resultado;
    }

    
}





?>