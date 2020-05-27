<?php
require_once "controllers/BaseController.php";
require_once "Datos/Datos.php";
require_once "models/comentarios/comentarios.php";

class comentariosDatos extends BaseController
{
    public function obtenerComentarios($idart)
    {
        $array = [];
        $query = "SELECT c.id, u.nombre, c.descripcion from comentarios c INNER JOIN usuarios u ON u.id=c.idusuario WHERE idarticulo=$idart";
        $connect = $this->connect();
        $result = $connect->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) > 0) {
            foreach ($rows as $val) {
                $comentariosinst = new modeloComentarios();

                $comentariosinst->id = $val["id"];
                $comentariosinst->nombreUsuario = $val["nombre"];
                $comentariosinst->descripcion = $val["descripcion"];
                /* $comentariosinst->idarticulo = $val["idarticulo"];
                $comentariosinst->idusuario = $val["idusuario"];
                $comentariosinst->activo = $val["activo"]; */

                $array[] = $comentariosinst;
            }
        }
        $result = null;
        return $array;
    }
}
?>