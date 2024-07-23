<?php

    namespace Controller;

    use MVC\Router;
    use Model\Propiedad;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    class PaginasController{
        public static function index( Router $router ){ 
            
            $inicio = true;

            $limiteDePropiedades = 3;
            $propiedades = Propiedad::get($limiteDePropiedades);

            $router->render("paginas/index", [
                "inicio" => $inicio,
                "propiedades" => $propiedades
            ]);
        }

        public static function nosotros( Router $router ){
            $router->render("paginas/nosotros");
        }

        public static function propiedades( Router $router ){
            $propiedades = Propiedad::getAll();

            $router->render("paginas/propiedades",[
                "propiedades" => $propiedades
            ]);
        }


        public static function propiedad( Router $router ){
            $id = validarIDRedireccionar("/propiedades");
            
            $propiedad = Propiedad::find($id);
            if( !$propiedad ){
                header("Location: /");
            }
    
            $router->render("paginas/propiedad",[
                "propiedad" => $propiedad
            ]);
        }

        public static function blog( Router $router ){
            $router->render("paginas/blog");
        }

        public static function entrada( Router $router ){
            $router->render("paginas/entrada");

        }

        public static function contacto( Router $router ){
            
            if( $_SERVER["REQUEST_METHOD"] === "POST"){
                $respuestas = $_POST["contacto"];

                //crea una instancia de PHPMailer
                $mail = new PHPMailer();                     

                //configurar STMP
                $mail->isSMTP();
                $mail->Host = "sandbox.smtp.mailtrap.io";
                $mail->SMTPAuth = true;
                $mail->Port = 587;
                $mail->Username = "4e438e4829019e";
                $mail->Password = "a32327c7940c21";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //Configurar el contenido del mail
                $mail->setFrom("admin@bienesraices.com", "Bienes Raices");
                $mail->addAddress("fgp332@gmail.com", "Usuario");
                $mail->Subject = "Tienes un nuevo mensaje";

                //Habilitar HTML
                $mail->isHTML(true);
                $mail->CharSet = "UTF-8";

                //Definir el contenido 
                $contenido = "<html>";
                $contenido .= "<h1> Tienes un nuevo mensaje </h1>";
                $contenido .= "<p>Nombre: " . $respuestas["nombre"] . " </p>";
                $contenido .= "<p>Email: " . $respuestas["email"] . " </p>";
                $contenido .= "<p>Telefono: " . $respuestas["telefono"] . " </p>";
                $contenido .= "<p>Mensaje: " . $respuestas["mensaje"] . " </p>";
                $contenido .= "<p>Opcion: " . $respuestas["opciones"] . " </p>";
                $contenido .= "<p>Presupuesto: " . $respuestas["presupuesto"] . " </p>";
                $contenido .= "<p>Forma de contacto: " . $respuestas["contacto"] . " </p>";
                $contenido .= "<p>Fecha: " . $respuestas["fecha"] . " </p>";
                $contenido .= "<p>Hora: " . $respuestas["hora"] . " </p>";
                $contenido .= "</html>";
                
                
                $mail->Body = $contenido;
                $mail->AltBody = "Esto es texto alternativo sin html";

                //Enviar el mail
                $mail->send();
            }
            
            
            $router->render("paginas/contacto", [

            ]);
        }


    }