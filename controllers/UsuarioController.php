<?php
    require_once "BaseController.php";
    require_once "Datos/Usuarios/Usuarios.php";


    class UsuarioController extends BaseController{
        public function index(){
            //echo " UsuarioController -> index";
            require_once './views/Usuario/index.php';
        }
        public function ver(){
            //echo "Hola Mundo Web";
            require_once './views/Usuario/ver.php';
        }

        public function login(){
            $loginins = new usuarioDatos;
            
            $email = "";
            if (isset($_POST["email"])) {
                $email = $_POST["email"];
                echo "Email: ". $email ."<br>";
                
            }
            $password = "";
            if (isset($_POST["password"])) {
                $password = $_POST["password"];
                echo "Contraseña: ". $password. "<br>";
            }
            
            $identifica = $loginins->login($email);
           
            if($identifica){
                $_SESSION["identifica"]= $identifica;
                $referer =  "http://localhost/ejercicios/TiendaMVCPHP";
                if (isset($_SERVER["HTTP_REFERER"])) {
                    $referer = $_SERVER["HTTP_REFERER"];
                }
                
                if(isset($_SESSION["controller"]) && isset($_SESSION["action"])){
                    $url = URL_BASE. $_SESSION["controller"]."/".$_SESSION["action"];
                    header("Location: $url");
                }                
            }
            else{
                require_once 'views/Usuario/login.php';
            }                                   
        }

        public function cerrarSesion(){
            $referer = "http://localhost/ejercicios/TiendaMVCPHP";
            if(isset($_SERVER["HTTP_REFERER"])){
                $referer = $_SERVER["HTTP_REFERER"];
            }

            if(isset($_SESSION["identifica"])){
                unset($_SESSION["identifica"]);
                header("Location: ".$referer);
            }
        }
        /* function perfil(){
            require_once "./views/Usuario/perfil.php";
        } */

    }
?>