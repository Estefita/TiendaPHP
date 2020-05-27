<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($topnovedades as $key => $val) : ?>
            <?php
            $activo = "";
            if ($key == 0) $activo = "active";
            ?>
            <div class="carousel-item <?php echo $activo ?>">

                <!-- <img class="d-block w-100" widht="10px" height="500px" src="<?php echo $val->source; ?>" alt="First slide"> -->


                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $val->source; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $val->nombre; ?></h5>
                        <p class="card-text"><?php echo $val->descripcion; ?></p>
                        <p class="card-text">Valoración: <?php echo $val->valoracion; ?></p>
                        <p class="card-text">Precio: <?php echo $val->precio; ?>€</p>

                        <!-- <a href="#" class="btn btn-primary">Detalles</a> -->
                    </div>
                </div>


            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>