<?php 

    class BaseController{
                     
        public static function connect(){
            $dbPwd = "";
            $dbUser = "root";
            $dbServer = "localhost";
            $dbName = "tienda";

          
            $connection = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPwd);
           
                        
            return $connection;
        }

        function ExecuteQuery($cadena)
        { //$cadena se puede llamar como sea,antes era $query
            $result = null;

            $cnn = $this->connect();
            $result = $cnn->query($cadena); //se tiene que llamar como el de arriba entre ().

            if (count($cnn->errorInfo()) > 0) {
                foreach ($cnn->errorInfo() as $val) {
                    echo $val . "</br>";
                }
            }

            return $result;
        }

        function CheckLogin(){
            if (!isset($_SESSION["identifica"])) {
                header("Location: ".URL_BASE."Usuario/login");
            }
        }
    }
