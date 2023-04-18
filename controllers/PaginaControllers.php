<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginaControllers{

    public static function index( Router $router){

        $propiedad = Propiedad::get(3);
        $inicio= true;

        $router->render('paginas/index',[

            'propiedades'=> $propiedad,
            'inicio'=> $inicio
            
        ]);
    }
        public static function nosotros( Router $router){
            $router->render('paginas/nosotros',[]);
    }
        public static function propiedades( Router $router){

            $propiedades = Propiedad::all();
            $router->render('paginas/propiedades',[
            'propiedades'=>$propiedades
            ]);
    }
        public static function propiedad( Router $router){
            $idUrl=$_GET['id'];
            $id=filter_var($idUrl,FILTER_VALIDATE_INT);

            if(!$id){
                header('location: /');
            }

            $propiedad = Propiedad::find($id);
            $router->render('paginas/propiedad',[
                'propiedad' => $propiedad
            ]);
    }
        public static function blog( Router $router){
            $router->render('paginas/blog',[]);
    }
        public static function entrada( Router $router){
            $router->render('paginas/entrada',[]);
    }
        public static function contacto( Router $router){
            $mensaje= null;

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $respuesta = $_POST['contacto'];

                // debuguear($respuesta['contacto']);

                //creamos una instancia del objeto PHPmailer
                $email = new PHPMailer();

                //Configuramos el protocolo para el envio de mails SMTP
                $email->isSMTP();
                $email->Host = 'sandbox.smtp.mailtrap.io';//el host a donde se van a enviar
                $email->SMTPAuth= true; //se va autenticar
                $email->Username = '42f496248deb81';
                $email->Password = '51e24b91215544';
                $email->SMTPSecure = 'tls'; //para que sean enviados por una ruta segura
                $email->Port = 2525;

                //configurar el contenido del email
                $email->setFrom('admin@bienesraices.com'); //quien envia el email
                $email->addAddress('admin@bienesraices.com', 'BienesRaices.com');//a qe mail va llegar ese correo
                $email->Subject ='Tienes un mesaje nuevo';

                //habilitar HTML
                $email->isHTML(true);
                $email->CharSet = 'UTF-8';

                //definir el contenido
                $contenido = '<html>';
                $contenido .= '<p> Tienes un nuevo mensaje </p> ';
                $contenido .= '<p> Nombre: ' . $respuesta['nombre'] . '</p> ';
                //condicional segun el medio que lo contacte
                if($respuesta['contacto'] === 'telefono'){
                    $contenido.= '<p> Eligio ser contactado por teléfono </p>';
                    $contenido .= '<p> Teléfono: ' . $respuesta['telefono'] . '</p> ';
                    $contenido .= '<p> Fecha: ' . $respuesta['fecha'] . '</p> ';
                    $contenido .= '<p> Hora: ' . $respuesta['hora'] . '</p> ';

                }else if($respuesta['contacto'] === 'email'){
                    $contenido.= '<p> Eligio ser contactado por E-mail </p>';
                    $contenido .= '<p> E-mail: ' . $respuesta['nombre'] . '</p> ';
                }
                $contenido .= '<p> Mensaje: ' . $respuesta['mensaje'] . '</p> ';
                $contenido .= '<p> Tipo: ' . $respuesta['tipo'] . '</p> ';
                $contenido .= '<p> Precio: ' . $respuesta['precio'] . '</p> ';
                $contenido .= '<p> Contacto: ' . $respuesta['contacto'] . '</p> ';
                $contenido .= '</html>';

                $email->Body = $contenido;
                $email->AltBody = 'Esto es texto alternativo sin HTML';

                if($email->send()){
                    $mensaje ='Su mensaje fue enviado correctamente';
                }else{
                    $mensaje= 'El mensaje no se pudo enviar...';
                }

            }

            $router->render('paginas/contacto',[
                'mensaje'=>$mensaje
            ]);
    }

}
?>