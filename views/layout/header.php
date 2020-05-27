<?php
require_once "config/config.php";
require_once "models/usuarios/usuarios.php";


    /* if($_SERVER["REQUEST_URI"] != "ejercicios/TiendaMVCPHP/usuario/login"){
        $_SESSION["paginaActual"] = $_SERVER["REQUEST_URI"];
        print_r($_SERVER["REQUEST_URI"]);
    }   */ //hecho por Damian!! Pero tambien se puede hacer  como abajo
    if(isset($_SERVER["QUERY_STRING"])){
        parse_str($_SERVER["QUERY_STRING"], $query_array);
       // print_r($query_array);
        $controller="home";
        if(array_key_exists("controller", $query_array)){
            $controller = $query_array["controller"];
        }
        $action = "index";
        if (array_key_exists("action",$query_array)) {
            $action = $query_array["action"];
        }
        if (!(($controller=="usuario")&&($action=="login"))){
            $_SESSION["controller"] = $controller;
            $_SESSION["action"] = $action;
        }        
    }

?>


<!-- <div class="container-fluid">
    <div class="row"> -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($result as $val) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_BASE . $val->href; ?>"> <?php echo $val->nombre; ?></a>
                    </li>

                <?php endforeach; ?>

                <?php if ($id == 2) : ?>
                    <li class="nav-item">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorias
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo URL_BASE . "/producto/index&id=2&idcategoria=0"; ?>"></a>
                                <?php foreach ($Categ as $val) : ?>
                                    <a class="dropdown-item" href="<?php echo URL_BASE . "/producto/index&id=2&idcategoria=" . $val->id; ?>"><?php echo $val->nombre; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item">

                </li>
            </ul>


            <ul class="navbar-nav d-flex justify-content-end">
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASE . "Cesta/conseguirCesta" ?>">Cesta</a>
                </li>
                <li class="nav-item">
                    <?php if (!isset($_SESSION["identifica"])) : ?>
                        <a class="nav-link" href="<?php echo URL_BASE . "usuario/login" ?>">Login</a>
                    <?php else : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php $identifica = $_SESSION["identifica"];
                                echo $identifica->nombre;  ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Perfil</a>
                                <a class="dropdown-item" href="<?php echo URL_BASE . "usuario/cerrarSesion" ?>">Cerrar sesión</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- </div>
</div> -->