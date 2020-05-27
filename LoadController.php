<?php 

    require_once "autoload.php";

    $showError = true;
    $controllerName = "HomeController";
    $action = "index";


    // Si $_GET["controller"] es vacio, instroducimos uno por defecto. Esto solo ocurre para cargar la home
    $controllerDefine = isset($_GET["controller"]);
    if ($controllerDefine) {
        $controllerName = $_GET['controller'] . 'Controller';
    }

    // Si $_GET["action"] es vacio, instroducimos uno por defecto.
    $actionDefine = isset($_GET["action"]);
    if ($actionDefine) $action = $_GET["action"];

    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $exists = method_exists($controller, $action);
        $showError = !$exists;

        if ($exists) $controller->$action();
    }

    if ($showError) {
        $error = new ErrorController();
        $error->error();
    }

?> 