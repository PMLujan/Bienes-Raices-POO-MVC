<?php

namespace Model;

class Admin extends ActiveRecord {

//base de datos-> son protected porque accedemos a ellos solo en esta clase
    protected static $tabla = 'usuarios';
    protected static $columnasDb = ['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct( $args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? ''; 
    }

    public function validar()
    {
        if(!$this->email){
            self::$errores[]= 'El E-mail es obligatorio';
        }
        if(!$this->password){
            self::$errores[]='El Password es obligatorio';
        }

        return self::$errores;
    }

    public function existeUsuario(){
        //revisar si el usuario existe
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$bd->query($query);

        if(!$resultado->num_rows){
            self::$errores[] = 'El usuario no existe';
            return; //para cortar la ejecucion
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();  //un fectch para que traiga todas las columnad e la bd
         //verificar clave hasheada 
        $autenticado = password_verify($this->password , $usuario->password);//1ro clave que ingreso el usuario y 2da clave de bd
        if(!$autenticado){
            self::$errores[] = 'El password es incorrecto';
        }
        return $autenticado;
    }

    public function autenticar(){
        session_start();//siempre se utiliza para iniciar session

        //llenar el arreglo de SESSION
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('location:/admin');
    }
}
?>