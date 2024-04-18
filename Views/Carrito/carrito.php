<?php 
    require_once('Views/Generals/header_tienda.php');
    $productos =($data['prods'])  ;
    $_SESSION['pedido']['productos']=$data['prods'];
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
                    <p class="mb-0">Usted tiene <?=count($_SESSION['arrIdProductos'])?> en su carrito </p>
                  </div>
                </div>
                <?php 
                  $subtotal=0;
                    //echo json_encode($productos);
                    if(empty($productosdi)) {
                    foreach ($productos as $p) {  
                      $subtotal+=$p['precio'];
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
                          <h5 class="fw-normal mb-0">1</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$ <?=$p['precio']?></h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                    <?php }
                    }
                      $_SESSION['pedido']['subtotal']=$subtotal;
                      for ($i=0; $i <count($_SESSION['pedido']['productos']) ; $i++) { 
                        $_SESSION['pedido']['productos'][$i]['cantidad']=1;
                      }
                    ?>            
              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    
                    

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <h2 class="mb-2">Subtotal</h2>
                      <h2 class="mb-2">$<?=$subtotal?></h2>
                    </div>
                    <a href="<?=base_url().'carrito/procesarPago'?>" class="" >
                        <img src="<?=media().'/images/continue.png'?>" alt="" style="height:105px">
                    </a>
                  </div>
                </div>

              </div>    

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	<?php require_once('Views/Generals/footer_tienda.php');?>