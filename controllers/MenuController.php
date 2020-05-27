<?php 
    require_once "BaseController.php";
    require_once "Datos/Datos.php";
    require_once "models/menu/header.php";
    require_once "CategoriasController.php";

    class MenuController extends BaseController{

        public function header(){
            $id=1;        
            $controllerDefine = isset($_GET["id"]);
            if ($controllerDefine && !empty($_GET["id"])) $id = $_GET["id"];
            $result = $this->obtenerMenu($id);     
            $cateinst = new CategoriasController();
            $Categ = $cateinst -> Categorias();

            require_once "views/layout/header.php";
        }
        public function footer()
        {
            require_once "views/layout/footer.php";
        }


        public function CargarMenu(){
            $datos = new Datos();
            $datos->cargarMenu();
        }


        public function obtenerMenu($idmenu){
            
            return $this->obtenerMenuElemento($idmenu);
        }

    
        private function  obtenerMenuElemento($idmenu){        
            $array = [];    
            $conexion = $this->connect();
            $query = "SELECT idmenu, nombre, href FROM menu WHERE idmenu = ?";            
            $result = $conexion->prepare($query);
            $p1 = $idmenu;

            $result->bindValue(1,$p1);
            $result->execute();
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            
            if (count($rows)>0) {
                foreach ($rows as $val) {
                    $header = new header();
                    $header-> nombre = $val["nombre"];
                    $header-> href = $val["href"];
                    $header-> idmenu = $val["idmenu"];

                    $array[] = $header; 
                    //echo $val["nombre"], $val["href"];     
               }
                //print_r($result);
            }
            $conexion = null;
            $result = null;            
            return $array;            
        }
    }
?>