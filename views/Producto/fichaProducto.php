<div class="card" style="width: 18rem;">
    <img src="<?php echo $val->source; ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $val->nombre; ?></h5>
        <p class="card-text"><?php echo $val->descripcion; ?></p>
        <p class="card-text">Valoración: <?php echo $val->valoracion; ?></p>
        <p class="card-text">Precio: <?php echo $val->precio; ?>€</p>

        <a href="<?php echo URL_BASE . "Detalle/detalle&id=3&idart=" . $val->id ?>" class="btn btn-primary">Detalles</a>
        <a href="<?php echo URL_BASE . "Cesta/Insertarcesta&idarticulo=".$val->id ?>" class="btn btn-primary">Añadir a Cesta</a>
    </div>
</div>