<?php foreach ($coment as $detal) : ?>
    <div> Comentarios: <?php echo $detal->nombreUsuario; ?> </div>
    <div class="card" style="width: 18rem;">

        <div class="card-body">
            <p class="card-text"><?php echo $detal->descripcion; ?></p>
        </div>

    </div>
<?php endforeach ?>