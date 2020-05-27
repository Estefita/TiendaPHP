<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- <link rel=StyleSheet href="CSS/style.css" TYPE="text/css"> -->
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Producto</th>
                            <th scope="col">Disponible</th>
                            <th scope="col" class="text-center">Cantidad</th>
                            <th scope="col" class="text-right">Precio</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($obtieneCesta as $val) : ?>
                            <tr>
                                <td><img height="200" width="200" src="<?php echo $val->source; ?>" /> </td>
                                <td><?php echo $val->nombre; ?></td>
                                <td>En stock</td>
                                <td><input class="form-control" type="text" value="<?php echo $val->cantidad; ?>" /></td>
                                <td class="text-right"><?php echo $val->precio; ?>€</td>
                                <td class="text-right"><a class="btn btn-sm btn-danger" href="<?php echo URL_BASE."Cesta/eliminarArticulo&idarticulo=".$val->id ?>"><i class="fa fa-trash"></i> </a> </td>
                            </tr>

                        <?php endforeach; ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                           
                                <td class="text-right"><?php echo $val->precio; ?>€</td>
                           
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Gastos de envío</td>
                            <td class="text-right">6,90 €</td>
                        </tr> -->
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo $val->precio; ?>€</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continuar Comprando</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>