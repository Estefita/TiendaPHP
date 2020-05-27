<?php
    require_once 'controllers/BaseController.php';
    require_once 'Datos/producto.php';
    require_once 'models/producto/producto.php';
    require_once 'models/cesta/cesta.php';

    class cestaDatos extends BaseController{

        public function addCesta($idarticulo,$cantidad,$idusuario){

            $detalles = new productoDatos();
            $detalle = $detalles ->detallesProducto($idarticulo);
            //print_r($detalle);
            $infoprecio = $detalle->precio;

            $idart = "SELECT * FROM cesta WHERE idarticulo = $idarticulo";
            $connect = $this->connect();
            $result3 = $connect->query($idart);  
            $rows = $result3->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                $query2 = <<<EOD
                UPDATE cesta SET cantidad=cantidad+1
                WHERE cesta.idarticulo = $idarticulo;
                EOD;
                $connect = $this->connect();
                $result2 = $connect->query($query2);  
                $result2 = null;  
            }
           
            else {
            $query = "INSERT INTO cesta (idarticulo,cantidad,idusuario,precio,fechacarrito) VALUES ($idarticulo,$cantidad,$idusuario,$infoprecio,Now())";
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));
           }
            $result = null;
        }

        public function obtenerCesta(){
            $arrayCesta= [];
            $query = "SELECT a.id, c.idarticulo, a.nombre, m.source, a.precio,c.idusuario, c.cantidad FROM articulos a INNER JOIN cesta c ON a.id=c.idarticulo INNER JOIN usuarios u ON u.id=c.idusuario INNER JOIN multimedia m ON a.id=m.idarticulo;";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $carrito = new modeloCesta();

                    $carrito->id = $val["id"];
                    $carrito->idarticulo = $val["idarticulo"];
                    $carrito->idusuario = $val["idusuario"];
                    $carrito->cantidad = $val["cantidad"];
                    $carrito->nombre = $val["nombre"];
                    $carrito->source = $val["source"];
                    $carrito->precio = $val["precio"];

                    $arrayCesta[] = $carrito;
                }
            }
            $result = null;
            return $arrayCesta;
        }
        public function borrarArticulo($idarticulo,$cantidad){

            $query = "DELETE FROM cesta WHERE idarticulo= $idarticulo AND cantidad = $cantidad";
            $query2 = <<<EOD
                        UPDATE cesta SET cantidad=cantidad-1
                        WHERE cesta.idarticulo = $idarticulo;
                        EOD;
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));  

            $result2 = $connect->query($query2);
            $result = null;
            $result2 = null;
        }
    }
?>