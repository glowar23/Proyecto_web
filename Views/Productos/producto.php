<?php
require_once ('Views/Generals/header_tienda.php');
$p = $data['producto'];
$rel = $data['related_products']['productos'];
?>

<div class="container">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center" style="width: 300px; height:300px  ;"><img
                            src="<?= $p['images'][0]['url_image'] ?>" class="img-responsive"
                            style=";width: auto; height: auto  ;"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h3 class="card-title"><?= $p['nombre_producto'] ?></h3> <!-- Nombre del producto-->
                    <h6 class="card-subtitle"><?= $p['SKU'] ?></h6> <!-- SKU del producto-->
                    <h2 class="mt-5">
                        $<?= $p['precio'] ?><small class="text-success"></small>
                    </h2>
                    <button class="btn btn-dark btn-rounded mr-1 car"
                        data-product="<?= $arrProductos[$i]['idproductos'] ?>" data-toggle="tooltip" title=""
                        data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"> Agregar al carrito</i>
                    </button>
                    <h4 class="box-title mt-5">Descripción </h4> <!-- Descripción del producto-->
                    <p><?= $p['Descripcion'] ?></p>
                </div>
            </div>
            
            
        </div>
        
    
        <h3 class ="card-title" style="margin-left: 20px;"> <u>Productos relacionados</u></h3>
        <div class="container-items container" style="">

    <?php
    if (count($rel) == 0) {
      echo '<h1>No hay productos relacionados</h1>';
    } else {
      $arrPr = [];
      for ($i = 0; $i < 3; $i++) {
        if (count($rel[$i]['images']) > 0) {
          $portada = $rel[$i]['images'][0]['url_image'];
        } else {
          $portada = media() . 'images/default-image.jpg';
        } ?>
        
        <div class="item">
        <a href="<?= base_url() . 'productos/producto/' . $rel[$i]['idproductos']; ?>">
          <figure>
            <img src="<?= $portada ?>" alt="producto">
          </figure>

          <div>
            <div class="info-product">
              <h2>
                <?= $rel[$i]['nombre_producto'] ?>
                <p class="price">
                  <?= $rel[$i]['precio'] ?>
                </p>
                </a>
                <button class="btn btn-dark btn-rounded mr-1 car" data-product="<?= $rel[$i]['idproductos'] ?>"> Añadir al carrito</button>
              </h2>
            </div>
          </div>
        </div>
      <?php } ?>
      

    <?php } ?>
    
</div>

    </div>
    
</div>


<?php require_once ('Views/Generals/footer_tienda.php'); ?>
