<?php
    require_once "BaseController.php";
    require_once "ComentariosController.php";
    require_once "Datos/Datos.php";
    require_once "Datos/producto.php";
    

    class DetalleController extends BaseController {
        public function detalle(){
            $id = $_GET["id"];
            $detarticulo = $_GET["idart"];
            $detalleinst = new productoDatos();
            $detal = $detalleinst->detallesProducto($detarticulo);
            require_once "views/Detalle/detalle.php";

            $comentario = new ComentariosController();
            $comentario->comentarios($detarticulo);    

            
        }
    }
?>