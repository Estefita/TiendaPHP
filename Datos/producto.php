<?php
    require_once "controllers/BaseController.php";
    require_once "models/producto/producto.php";
    require_once "models/detalle/detalle.php";
    

    class productoDatos extends BaseController{

        #region Detalles
        public function detallesProducto($id){
        //$array = [];
        $instdetalle = new modeloDetalle();
            $query = "SELECT a.id as 'id', a.nombre as 'nombre' , m.source as 'source', a.descripcion as 'descripcion', a.valoracion as 'valoracion', a.precio as 'precio', a.stock as 'stock', c.descripcion as 'comentario' FROM articulos a INNER JOIN multimedia m ON a.id=m.idarticulo INNER JOIN comentarios c ON a.id=c.idarticulo WHERE a.id=$id";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                //foreach ($rows as $val) {
                $val = $rows[0];
              
                $instdetalle->id = $val["id"];
                $instdetalle->nombre = $val["nombre"];
                $instdetalle->source = $val["source"];
                $instdetalle->descripcion  = $val["descripcion"];
                $instdetalle->valoracion = $val["valoracion"];
                $instdetalle->precio = $val["precio"];
                $instdetalle->stock = $val["stock"];
                $instdetalle->comentario = $val["comentario"];


                //$array[] = $instdetalle;
            }
            // }
           // print_r($instdetalle);
            $result = null;
            //return $array;
            return $instdetalle;
        }

        #endregion
         
        #region conseguirVentas
        public function conseguirTopVentas($limit = true,$idcategoria=0){
            $array = [];
            $limitQuery = "LIMIT 3";
            if($limit == false){
                $limitQuery = "";
            }
            $query = "SELECT a.id as 'ID Artículo', a.nombre as 'Nombre', a.descripcion as 'Descripcion', a.valoracion as 'Valoracion' ,m.source as 'Imagen', a.precio as 'Precio', SUM(v.cantidad) as 'Cantidad' FROM ventas v INNER JOIN articulos a ON v.idarticulo=a.id INNER JOIN multimedia m ON a.id=m.idarticulo WHERE (a.idcategoria=$idcategoria OR (0=$idcategoria)) GROUP BY a.id ORDER BY a.id DESC $limitQuery;";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows) > 0){
                foreach($rows as $val){
                    $card = new modeloProducto();

                    $card-> id = $val["ID Artículo"];
                    $card-> nombre = $val["Nombre"];
                    $card-> descripcion  = $val["Descripcion"];
                    $card-> valoracion = $val["Valoracion"];
                    $card-> precio = $val["Precio"];
                    $card-> source = $val["Imagen"];

                    $array[] = $card;

                    /*$card-> id = $val["id"];
                    $card-> idcategoria = $val["idcategoria"];
                    $card-> fechaalta = $val["fechaalta"];
                    $card-> activo = $val["activo"]; */
                }
            
        }
            $result = null;
            return $array;
        }
        #endregion
        #region obtenerNovedades
        public function obtenerNovedades(){
            $array = [];
            $query = "SELECT a.id, a.nombre, a.descripcion, a.valoracion, a.precio, m.source FROM articulos a INNER JOIN multimedia m on a.id=m.idarticulo ORDER BY fechaalta DESC LIMIT 3";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloProducto();

                    $card->nombre = $val["nombre"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->precio = $val["precio"];
                    $card->source = $val["source"];

                    $array[] = $card;
                }
            }
            $result = null;
            return $array;
        }
        #endregion
        #region listadoProducto

        public function conseguirListado($idcategoria, $orden){            
            $campoOrden = "";
            switch ($orden){
                case 1: 
                    $campoOrden = "a.fechaalta";
                break;
                case 2:
                    $campoOrden = "a.fechaalta DESC";
                break;
                case 3:
                    return $this->conseguirTopVentas(false,$idcategoria);
                break;
                case 4:
                    $campoOrden = "a.precio DESC";
                break;
                case 5:
                    $campoOrden = "a.precio";
                break;
            }
                   
            $array = [];
            $connect = $this->connect();
            $query =  <<<EOD
                    SELECT a.id, a.nombre, a.descripcion, a.valoracion, a.precio, m.source FROM articulos a 
                    INNER JOIN multimedia m on a.id=m.idarticulo 
                    WHERE (a.idcategoria = :idcategoria OR (0=:idcategoria)) ORDER BY {$campoOrden};
            EOD;

        //$result = $connect->query($query);
            $result = $connect->prepare($query);
            $result->bindParam(':idcategoria',$idcategoria);
           // $result->bindParam(':orden', $campoOrden);
            $result->execute();
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $lista = new modeloProducto();

                    $lista-> id = $val["id"];
                    $lista-> nombre = $val["nombre"];
                    $lista-> descripcion  = $val["descripcion"];
                    $lista-> valoracion = $val["valoracion"];
                    $lista-> precio = $val["precio"];
                    $lista-> source = $val["source"];

                    $array[] = $lista;
                }
            }
            $result = null;
            $connect = null;
            return $array; 
         }
        #endregion
    }
?>