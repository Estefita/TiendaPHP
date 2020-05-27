<?php
    require_once 'BaseController.php';
    require_once 'ProductoController.php';

    class HomeController extends BaseController{

        public function index(){
            $Productoinstancia = new ProductoController();
            $Productoinstancia->novedades();
            $Productoinstancia ->topVentas();
            
            /* if(isset($_SESSION["identifica"])){
                print_r($_SESSION["identifica"]);
            } */
            require_once 'views/Home/index.php';

        }
        
    }
?>