<?php
    require_once 'controllers/BaseController.php';

    class datos extends BaseController{ 

        #region Cargar Articulo Total
        public function CargarArticuloTotal(){

            $query= "SET GLOBAL foreign_key_checks = 0";
            $this->ExecuteQuery($query);

            $this->cargarTipoMultimedia();            
            $this->cargarCategoria();
            $this->cargarProducto();            
            $this->cargarMultimedia();
            $this->cargarMenu();
            $this->cargarUsuario();
            $this->cargarVentas();
            $this->cargarComentarios();
            $query = "SET GLOBAL foreign_key_checks = 1";
            $this->ExecuteQuery($query);
        }

        #endregion

        #region Comentarios
        function insertarComentarios($descripcion, $idarticulo, $idusuario)
        {
            return "insert into comentarios (descripcion,idarticulo,idusuario,activo) values ('{$descripcion}',{$idarticulo},{$idusuario}, 1)";
        }
        function cargarComentarios()
        {
            $query = "TRUNCATE TABLE comentarios";
            $this->ExecuteQuery($query);

            $cadena = $this->insertarComentarios("Talla un poco pequeño, aun así es perfecta", 2, 1);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarComentarios("Color favorecedor,llegó en buen estado", 1, 2);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarComentarios("Los pantalones venía con mas rotos de los que se ve en la foto", 3, 1);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarComentarios("Demasiado pequeña para las medidas que ponía", 1, 2);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarComentarios("Me encanta la camiseta", 2, 2);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarComentarios("Deportivas super chulas, talla bien y se ve de buena calidad", 4, 1);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarComentarios("Tenis de muchos colores para combinar con diferentes looks", 3, 3);
            $this->ExecuteQuery($cadena);
            //return $cadena;
        }

            #endregion

        #region Menu
        function insertarMenu($idMenu,$nombre,$href){
            return "insert into menu (idMenu, nombre, href) values ({$idMenu},'{$nombre}','{$href}')";                        
        }

        function cargarMenu(){            
            $query = "TRUNCATE TABLE menu";
            $this->ExecuteQuery($query);

            $cadena = $this->insertarMenu(1,"Home","home/index");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(1,"Productos", "producto/index&id=2");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(1,"Contactos","contacto/index");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(2, "Home", "home/index");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(3, "Home", "home/index");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(4, "Home", "home/index");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(4, "Productos", "producto/index&id=2");
            $this->ExecuteQuery($cadena);
            //return $cadena;
        }

        #endregion

        #region Producto
        function cargarProducto(){
            $truncate = "TRUNCATE TABLE articulos";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarArticulo("Camiseta",120,5,20,2);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarArticulo("Camiseta", 20, 4, 10, 2);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarArticulo("Pantalon", 80, 2, 9, 3);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarArticulo("Calzado", 220, 3, 50, 1);
            $this->ExecuteQuery($cadena);

            
        }
        

        function insertarArticulo($nombre, $precio, $valoracion, $stock, $idcategoria){
            $descripcion = 'Lorem ipsum dolor sit amet consectetur adipiscing elit facilisis nisi aliquet ultrices vitae mattis phasellus inceptos diam sed, nostra dis non netus platea bibendum pharetra cum penatibus natoque augue potenti cursus nec neque.';
            $query = "INSERT INTO articulos (nombre, descripcion, precio, valoracion, stock, idcategoria, fechaalta, activo) VALUES ('{$nombre}', '{$descripcion}',{$precio},{$valoracion},{$stock},{$idcategoria},Now(),1);";
            return $query;
        }


        #endregion

        #region Categoria
        function cargarCategoria(){
            $truncate = "TRUNCATE TABLE categorias";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarCategoria("Calzado", 1);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarCategoria("Camiseta", 1);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarCategoria("Pantalon", 1);
            $this->ExecuteQuery($cadena);
   
        }

        function insertarCategoria($nombre,$activo){
            $query = "INSERT INTO categorias (nombre,activo) VALUES ('{$nombre}',{$activo})";
            return $query;
        }

        #endregion

        #region TipoMutlimedia

        function cargarTipoMultimedia(){
        
            $truncate = "TRUNCATE TABLE tipo_multimedia";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarTipoMultimedia("Imagen");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarTipoMultimedia("Video");
            $this->ExecuteQuery($cadena);

        }

        function insertarTipoMultimedia($nombre){

            $query = "INSERT INTO tipo_multimedia (nombre) VALUES ('{$nombre}')";
            return $query;
        }

        #endregion

        #region Multimedia
        function cargarMultimedia()
        {
            $truncate = "TRUNCATE TABLE multimedia";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarMultimedia(1,1, "https://chemasport.es/8115-thickbox_default/camiseta-adidas-clfn-granate.jpg");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMultimedia(2,2, "https://lasextraordinariascamisetasdelevas.com/wp-content/uploads/2017/12/camiseta_chico_dios_te_odia.jpg");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMultimedia(3,1, "https://cdn.shopify.com/s/files/1/2459/3885/products/2_0019_Layer-21_700x.png?v=1564674977");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMultimedia(4,2, "https://c.static-nike.com/a/images/t_PDP_1280_v1/f_auto/b3cc2f57-36a6-4438-aac6-66967c49b3ab/nikecourt-air-zoom-vapor-cage-4-zapatillas-de-tenis-de-pista-rapida-td1ksf.jpg");
            $this->ExecuteQuery($cadena);
        }

        function insertarMultimedia($idarticulo, $idtipo, $source){

            $query = "INSERT INTO multimedia (idarticulo, idtipo, source, activo) VALUES ({$idarticulo}, {$idtipo}, '{$source}',1)";
            return $query;
        }
    #endregion

        #region Usuario
        function cargarUsuario()
        {
            $truncate = "TRUNCATE TABLE usuarios";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarUsuario("Maripili","Contreras Pelaez","maripi@hotmail.com","12345","Calle Alozaina,6,Málaga",952444747);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarUsuario("Jose","González Jimenez","Jose@hotmail.com","12345","AV del Pacífico,20,Málaga",952141415);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarUsuario("Maria","Gutierrez Martin","maria@hotmail.com","12345","Calle Eolos,58,Málaga",952369584);
            $this->ExecuteQuery($cadena);
        }


        function insertarUsuario($nombre, $apellidos, $email, $password, $direccion, $telefono)
        {
            $query = "INSERT INTO usuarios (nombre, apellidos, email, `password`, direccion, telefono, fechaalta, activo) VALUES ('{$nombre}', '{$apellidos}','{$email}','{$password}','{$direccion}',{$telefono},Now(),1);";
            return $query;
        }


        #endregion

        #region Ventas
        function cargarVentas()
        {
            $truncate = "TRUNCATE TABLE ventas";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarVentas(2,2,5);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarVentas(1,3,2);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarVentas(3,1,6);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarVentas(3, 2, 5);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarVentas(1, 3, 2);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarVentas(2, 1, 6);
            $this->ExecuteQuery($cadena);
        }


        function insertarVentas($idarticulo, $idusuario, $cantidad)
        {
            $query = "INSERT INTO ventas (idarticulo, idusuario, cantidad,fechaventa) VALUES ({$idarticulo}, {$idusuario}, {$cantidad}, Now());";
            return $query;
        }


        #endregion

        
        function ExecuteQuery($cadena){ //$cadena se puede llamar como sea,antes era $query
            $result=null;
            
            $cnn = $this->connect();                     
            $result = $cnn->query($cadena);//se tiene que llamar como el de arriba entre ().
            
            if(count($cnn->errorInfo())>0){
                foreach($cnn->errorInfo() as $val){
                    echo $val."</br>";
                }
            }
            
            return $result;
                                         
        }
    }
?>