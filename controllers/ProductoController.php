<?php
    require_once "BaseController.php";
    require_once "Datos/Datos.php";
    require_once "Datos/producto.php";
    

    class ProductoController extends BaseController{
        #region index
        public function index(){
            $idcategoria = 0;                           
            if(isset($_GET["idcategoria"])){
                $idcategoria = $_GET["idcategoria"];
            }
            $id = 0;
            if(isset($_GET["id"])){
                $id = $_GET["id"];
            }                      
            $orden = 1;
            if (isset($_GET["orden"])) {
                $orden = $_GET["orden"];                
            }            
            $this->listado($idcategoria, $id, $orden);
        }
        #endregion
        #region novedades
        public function novedades(){

            $instanovedades = new productoDatos();
            $topnovedades = $instanovedades->obtenerNovedades();
            require_once './views/Producto/novedades.php';
        }
        #endregion
        #region TopVentas
        public function topVentas(){
            $instatopvent = new productoDatos();
            $topVentas = $instatopvent-> conseguirTopVentas();
            require_once './views/Producto/topVentas.php';
        }
        #endregion
        #region Listado
        public function listado($idcategoria,$id,$orden){
            $instalistado = new productoDatos();
            $listProduct = $instalistado->conseguirListado($idcategoria, $orden);            
            //echo "valores: <br>";
           // print_r($listProduct);
           require_once './views/Producto/index.php';
        }
        #endregion
        #region Cargar Producto
        public function CargarProducto(){
            
            $datos = new Datos();
            $datos->CargarArticuloTotal();
        }
        #endregion

    }
?>