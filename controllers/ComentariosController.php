<?php
    require_once 'BaseController.php';
    require_once "Datos/Datos.php";
    require_once "Datos/comentarios/comentarios.php";

    class ComentariosController extends BaseController {
        public function comentarios($idart){
            $comentariosinst = new comentariosDatos();
            $coment = $comentariosinst->obtenerComentarios($idart);
            require_once "views/Comentarios/comentarios.php";
        }
    }
?>