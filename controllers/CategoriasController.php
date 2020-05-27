<?php
    require_once 'BaseController.php';
    require_once "Datos/Categorias/categorias.php";
    class CategoriasController extends BaseController {
        public function categorias(){
            $categoinst = new categoriasDatos();
            return $categoinst ->obtenerCategorias(); 
        }
    }
?>