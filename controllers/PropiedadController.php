<?php

    namespace Controller;

    use MVC\Router;
    use Model\Vendedor;
    use Model\Propiedad;
    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Gd\Driver;

    class PropiedadController{
        
        public static function index( Router $router ){

            $alert_type = $_GET["alert_type"] ?? NULL;


            $propiedades = Propiedad::getAll();
            $vendedores = Vendedor::getAll();

            $router->render("propiedades/admin", [
                "propiedades" => $propiedades,
                "vendedores" => $vendedores,
                "alert_type" => $alert_type
            ]);
        }


        public static function crear( Router $router ){
            $propiedad = new Propiedad();
            $vendedores = Vendedor::getAll();
            $errores = [];

            if($_SERVER["REQUEST_METHOD"] === "POST" ){

                //Sobreescribe la variable
                $propiedad = new Propiedad($_POST["propiedad"]); 
        
                //Generar nombre de la imagen
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        
                if($_FILES["propiedad"]["tmp_name"]["imagen"]){
                    $propiedad->setImg($nombreImagen);
                }
        
                $errores = $propiedad->validar();
        
                //Revisar que el arreglo de errores este vacio
                if( empty($errores) ){
        
                    //Crear carpeta para las imagenes
                    if( !is_dir(CARPETA_IMAGENES) ){
                        mkdir(CARPETA_IMAGENES);
                    }
        
                    //procesando imagen
                    $manager = new ImageManager(new Driver());
                    $imagen = $manager->read($_FILES["propiedad"]["tmp_name"]["imagen"]);
                    $imagen->cover(800,600);
                    $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                    
                    $propiedad->guardar();
                }        
            }


            $router->render("propiedades/crear", [
                "propiedad" => $propiedad,
                "vendedores" => $vendedores,
                "errores" => $errores
            ]);
        }


        public static function actualizar( Router $router ){
            //Obtener datos para llenar campos segun el id
            $id_propiedad = validarIDRedireccionar( "/admin" );
            
            $propiedad = Propiedad::find($id_propiedad);
            $vendedores = Vendedor::getAll();

            if( !$propiedad ){
                header( "Location: /admin");
            }

            //Arreglo de errores
            $errores = [];

            //Ejecuta el codigo despues de que el usuario envia el formulario
            if($_SERVER["REQUEST_METHOD"] === "POST" ){

                //Asignar los atributos
                $args = $_POST["propiedad"];
                $propiedad->sincronizar( $args );

                $errores = $propiedad->validar();

                //Revisar que el arreglo de errores este vacio
                if( empty($errores) ){

                    //Generar nombre de la imagen
                    $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                    if($_FILES["propiedad"]["tmp_name"]["imagen"]){

                        $propiedad->setImg($nombreImagen);
                        $manager = new ImageManager(new Driver());
                        $imagen = $manager->read($_FILES["propiedad"]["tmp_name"]["imagen"]);
                        $imagen->cover(800,600);
                        $imagen->save(CARPETA_IMAGENES . $nombreImagen);

                    }

                    $propiedad->guardar();
                }        
            }
            

            $router->render( "propiedades/actualizar", [
                "propiedad" => $propiedad,
                "vendedores" => $vendedores,
                "errores" => $errores
            ]);
        }


        //Eliminar propiedad
        public static function eliminar(){
            $id = filter_var( $_POST["id"], FILTER_VALIDATE_INT );

            if( $id ){
                $tipo = $_POST["tipo"];
                if( $tipo === "propiedad" && validarTipoContenido( $tipo ) ){
                    //Comprueba lo que vamos a eliminar
                   $propiedad = Propiedad::find($id);
                   $propiedad->eliminar();
                }
            }
        }
    }
