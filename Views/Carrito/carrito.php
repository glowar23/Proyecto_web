<?php 
    require_once('Views/Generals/header_tienda.php');
    if(isset($data['prods'])){
      $_SESSION['pedido']['productos']=$data['prods'];
      $arreglo2=$_SESSION['arrIdProductos'];
      $c=0;
      foreach ($_SESSION['pedido']['productos'] as $indice => $elemento) {
        if ($elemento['idproductos'] == $arreglo2[$elemento['idproductos']]['id']) {  
          $_SESSION['pedido']['productos'][$indice]['cantidad']=$arreglo2[$elemento['idproductos']]['cantidad'];   
        }
      }
      //for ($i=0; $i <count($_SESSION['pedido']['productos']) ; $i++) { 
      //  if(!isset($_SESSION['pedido']['productos'][$i]['cantidad']))$_SESSION['pedido']['productos'][$i]['cantidad']=1;
      //}
    }
?>
	<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="<?=base_url()?>" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continuar comprando</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Carrito de compras</p>
                    <p class="mb-0">Usted tiene <?=isset($_SESSION['arrIdProductos'])?count($_SESSION['arrIdProductos']):0?> productos en su carrito </p>
                  </div>
                </div>
                <?php 
                  $subtotal=0;
                  if (isset($data['prods'])){
                    //echo json_encode($productos);
                    
                    foreach ($_SESSION['pedido']['productos'] as $p) {  
                      $subtotal+=$p['precio']*$p['cantidad'];
                ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            
                            src="<?php if (!empty($p['images']))echo$p['images'][0]['url_image']; 
                            else{
                                echo media().'images/default-image.jpg';
                            }?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="heigth: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5><?=$p['nombre_producto']?></h5>
                          <p class="small mb-0">SKU: <?=$p['SKU']?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                            <a href="<?=base_url().'carrito/sumarCantidad/'.$p['idproductos']?>"><i class="fa-solid fa-plus"></i></a>
                          <h5 class="fw-normal mb-0"><?=$p['cantidad']?> </h5>
                            <a href="<?=base_url().'carrito/restarCantidad/'.$p['idproductos']?>"><i class="fa-solid fa-minus"></i></a>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$ <?=$p['precio']?></h5>
                        </div>
                        <a href="<?=base_url().'carrito/eliminarProducto/'.$p['idproductos']?>"  style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                    <?php }
                      $_SESSION['pedido']['subtotal']=$subtotal;
                      
                    ?>            
              </div>
              
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3 p-2">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h2 class="mb-2">Subtotal</h2>
                      <h2 class="mb-2">$<?=$subtotal?></h2>
                    </div>
                    
                    <br>
                    <a href="<?=base_url().'carrito/seleccionarDomicilio'?>" class="btn btn-secondary" style="" >  
                      <p>Elegir domicilio <i class="fa-solid fa-shield-cat fa-lg"></i> <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                  </div>
                </div>
                <br>
                <div class="card bg-secondary text-black rounded-3 p-1">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="font-weight-light">!En la compra de mas de $200 de producto el envio es gratis¡</p>
                  </div>
                </div>

              </div>   
              <?php }?> 

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	<?php require_once('Views/Generals/footer_tienda.php');?>