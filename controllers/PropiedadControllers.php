<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image; //le colocamos un alias para no escribir todo el nombre


        class PropiedadControllers {

            public static function index(Router $router){//le paso el objeto que creamos en el index para no perder las referencias
                
                $propiedades=Propiedad::all();
                $vendedores= Vendedores::all();
                $resultado= $_GET['resultado'] ?? null;
                
                $router->render('propiedades/admin',[

                    'propiedades'=> $propiedades, //a la variable q creo en las '' le puse el mismo nombre que la que tiene todas las propiedades
                    'resultado'=>$resultado,
                    'vendedores'=> $vendedores
                ]);
            }

            public static function crear(Router $router){

                $propiedad = new Propiedad;
                $vendedores = Vendedores::all();
                $errores = Propiedad::getErrores();


                if($_SERVER['REQUEST_METHOD'] === 'POST'){

                    //crear nueva instancia :
                    $propiedad = new Propiedad($_POST['propiedad']);
                
                            //crear carpeta imagenes
                                    $carpetaImagenes= CARPETA_IMAGENES;
                
                            //validamos que no este creada
                                        if(!is_dir($carpetaImagenes)){
                                            mkdir($carpetaImagenes);
                                        }
                 
                            //crear nombres aleatorio a los archivos
                                        $nombreImagen= md5( uniqid( rand(), true)) .".jpg";
                        
                            //setear la imagen
                                if($_FILES['propiedad']['tmp_name']['imagen']){               
                                    //realizar un resize a la imagen con intervetion
                                    $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);                               
                                    //guardar nombre de la imagen en BD
                                    $propiedad->setImagen($nombreImagen);
                                }
                                
                                //validar
                                $errores = $propiedad->validar();
                
                                //revisar que el arreglo de errores este vacio
                                if( empty($errores)){
                
                                    //guardar archivo en el disco duro
                                    $imagen->save($carpetaImagenes . $nombreImagen);
                      
                                    //guarda en la BD
                                            //llamado metodo:
                                       $resultado = $propiedad->guardar();
                
                                }
                             }
                                
                $router->render('propiedades/crear', [
                    'propiedad'=> $propiedad,
                    'vendedores'=> $vendedores,
                    'errores'=> $errores
                ]);

            }
            public static function actualizar(Router $router){

                $id = validarOredireccionar('/admin');
                $propiedad = Propiedad::find($id);
                $vendedores= Vendedores::all();

                         //metodo posy para actualizar
                         if($_SERVER['REQUEST_METHOD'] === 'POST'){

                             //asignar los atributos
                             $args = $_POST['propiedad'];
                
                             $propiedad->sincronizar($args);
                
                             $errores= $propiedad->validar();
                
                             //crear nombres aleatorio a los archivos
                             $nombreImagen= md5( uniqid( rand(), true)) .".jpg";

                             //setear la imagen
                                 if($_FILES['propiedad']['tmp_name']['imagen']){
                
                             //realizar un resize a la imagen con intervetion
                                 $imagen= Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                
                             //guardar nombre de la imagen en BD
                                 $propiedad->setImagen($nombreImagen);
                        
                             }
                             $carpetaImagenes= CARPETA_IMAGENES;
                        
                    if(empty($errores)){ 
                        //si hay una nueva imagen -guardala
                        if($_FILES['propiedad']['tmp_name']['imagen']){
                            $imagen->save(CARPETA_IMAGENES.$nombreImagen);
                        }
                        
                          //almacenar en BD
                          $propiedad->guardar();
                
                         //guardar archivo en el disco duro
                         $imagen->save($carpetaImagenes . $nombreImagen);
                
                        }
                 }
                

                $errores= Propiedad::getErrores();
                $router->render('/propiedades/actualizar',[
                        'propiedad'=> $propiedad,
                        'errores'=> $errores,
                        'vendedores'=> $vendedores
                ]);
            }

            public static function eliminar(){

                if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                    $id=$_POST['id'];
                    $id=filter_var($id, FILTER_VALIDATE_INT);
                
                         //eliminar archivo de imagen propiedad
                            if($id){
                
                                $tipo= $_POST['tipo'];
                
                                        if(validarTipoDeContenido($tipo)){
                                            $propiedad= Propiedad::find($id);
                                            $propiedad->eliminar();
                            }
                    }
                }
                
            }


        }

?>