<?php
    require_once "BaseController.php";
    require_once "Datos/Cesta/cesta.php";
    require_once "config/config.php";

    class CestaController extends BaseController {
        
        public function Insertarcesta1(){
          
            $idarticulo= 0;
            
            if(isset($_GET["idarticulo"])){
                $idarticulo=$_GET["idarticulo"];
            }

            $cantidad = 1;
            if (isset($_GET["cantidad"])) {
                $cantidad=$_GET["cantidad"];
            }

            $url = URL_BASE."home/index";
            if (isset($_SESSION["identifica"])) {
                $identificausuario = $_SESSION["identifica"];
                $cesta = new CestaDatos();
                $cesta->addCesta($idarticulo, $cantidad,  $identificausuario->id);
                if (isset($_SESSION["controller"]) && isset($_SESSION["action"])) {
                    $url = URL_BASE . $_SESSION["controller"] . "/" . $_SESSION["action"];
                    
                }  
                
            }
            header("Location: $url");
        }


        public function Insertarcesta(){

            $cesta = new cestaDatos();

            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;
          
                $idarticulo= 0;
                if(isset($_GET["idarticulo"])){
                $idarticulo=$_GET["idarticulo"];
                }

                $cantidad = 1;
                if (isset($_GET["cantidad"])) {
                    $cantidad=$_GET["cantidad"];
                }
                $url = URL_BASE."home/index";
                $cesta = new cestaDatos();
                $obtieneCesta = $cesta->addCesta($idarticulo,$cantidad,$idusuario);
                /* if (isset($_SESSION["controller"]) && isset($_SESSION["action"])) {
                    $url = URL_BASE . $_SESSION["controller"] . "/" . $_SESSION["action"];   
                    //header("Location: $url");
                } */
                header("Location: $url");
            }
        }


        public function conseguirCesta(){
            $instacesta = new cestaDatos();
            $obtieneCesta = $instacesta->obtenerCesta();
            require_once 'views/Cesta/cesta.php';
        }

        
        
        public function eliminarArticulo(){

            $cesta = new cestaDatos();

            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;  

                $idarticulo = 0;

                if (isset($_GET["idarticulo"])) {
                    $idarticulo = $_GET["idarticulo"];
                }

                $cantidad = 1;
                if (isset($_GET["cantidad"])) {
                    $cantidad = $_GET["cantidad"];
                }

                $cesta = new CestaDatos();
                $obtieneCesta = $cesta ->borrarArticulo($idarticulo,$cantidad);
                $obtieneCesta = $cesta ->obtenerCesta();
                require_once 'views/Cesta/cesta.php';
            }
        }
    }
    ?>
