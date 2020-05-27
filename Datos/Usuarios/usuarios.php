<?php 
    require_once "controllers/BaseController.php";
    require_once "models/usuarios/usuarios.php";

    class usuarioDatos extends BaseController{
        public function login($email) {
            $userinst = false;
            $connect = $this->connect();
            $query = "SELECT * FROM usuarios u WHERE u.email = '$email'";
            $result = $connect->query($query);
            if($result){
                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) > 0) {
                    //foreach ($rows as $val) { //No se usa foreach porque solo es un elemento y no vamos a usar el array solo para uno
                    $val = $rows[0];
                    $userinst = new modeloUsuario;
                    $userinst->id = $val["id"];
                    $userinst->nombre = $val["nombre"];
                    $userinst->apellidos = $val["apellidos"];
                    $userinst->email  = $val["email"];
                    $userinst->fechaalta = $val["fechaalta"];
                    $userinst->password = $val["password"];
                    $userinst->activo = $val["activo"];
                    $userinst->direccion = $val["direccion"];
                    $userinst->telefono = $val["telefono"];

                //$array[] = $instdetalle;
                }
                
             }
                $result = null;
                //return $array;
                return $userinst;
            //}
        }
    }    
?>