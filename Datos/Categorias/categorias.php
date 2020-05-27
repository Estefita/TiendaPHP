<?php
    require_once "controllers/BaseController.php";
    require_once "Datos/Datos.php";
    require_once "models/categorias/categorias.php";

    class categoriasDatos extends BaseController{
        public function obtenerCategorias(){
            $array = [];
            $query = "SELECT id, nombre from categorias";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $categoriainst = new modeloCategorias();

                    $categoriainst-> id = $val["id"];
                    $categoriainst-> nombre = $val["nombre"];
                    $array[] = $categoriainst;
                }
            }
            $result = null;
            return $array;
            }
    }
?>