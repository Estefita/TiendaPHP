<?php
require_once "config/config.php";

$url = URL_BASE . "producto/index&id=$id&idcategoria=$idcategoria&orden=";
?>

<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ordenar por:
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="<?php echo $url . "1" ?>">Más Antiguos</a>
        <a class="dropdown-item" href="<?php echo $url . "2" ?>">Más Recientes</a>
        <a class="dropdown-item" href="<?php echo $url . "3" ?>">Más Vendidos</a>
        <a class="dropdown-item" href="<?php echo $url . "4" ?>">Precio Mayor</a>
        <a class="dropdown-item" href="<?php echo $url . "5" ?>">Precio Menor</a>
    </div>
</div>
<div class="card-group">
    <?php
    foreach ($listProduct as $val) :
        require 'views/Producto/fichaProducto.php';
    endforeach;
    ?>
</div>