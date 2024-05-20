<?php 
    $arrProductos=$data['products'];
    require_once('Views/Generals/header_tienda.php');
    
?>
    
  <section id="banner" style="background: #F9F3EC;">
    <div class="container">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="<?=media().'images/banner-img.png'?>" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Productos</div>
                <h2 class="banner-title display-1 fw-normal">Los mejores productos para <span class="text-primary">tus mascotas</span>
                </h2>
                <a href="<?=base_url().'/tienda/categoria/2'?>" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  shop now
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg></a>
              </div>

            </div>
          </div>
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="<?=media().'images//banner-img3.png'?>" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Consitenlo con </div>
                <h2 class="banner-title display-1 fw-normal">Los mejores productos para <span class="text-primary">tu Gato</span>
                </h2>
                <a href="<?=base_url().'/tienda/categoria/1'?>" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  shop now
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg></a>
              </div>

            </div>
          </div>
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="<?=media().'images/banner-img4.png'?>" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                <h2 class="banner-title display-1 fw-normal">Best destination for <span class="text-primary">your
                    pets</span>
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  shop now
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg></a>
              </div>

            </div>
          </div>
        </div>

        <div class="swiper-pagination mb-5"></div>

      </div>
    </div>
  </section>

  <section id="categories">
    <div class="container my-3 py-5">
      <div class="row my-5">
        
        <div class="col text-center">
          <a href="<?=base_url().'/tienda/categoria/3'?>" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bird"></iconify-icon>
            <h5>Aves</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="<?=base_url().'/tienda/categoria/2'?>" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
            <h5>Perros</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="<?=base_url().'/tienda/categoria/4'?>" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:fish"></iconify-icon>
            <h5>Peces</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="<?=base_url().'/tienda/categoria/1'?>" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
            <h5>Gatos</h5>
          </a>
        </div>
      </div>
    </div>
  </section>
    <div class="container">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php 
                    $intProd=0;
                    for ($indice=0; $indice <2 ; $indice++) { 
                ?>
                <div class="carousel-item <?php if ($indice==0) echo'active'?>">
                    <div class="cards-wrapper">
                        <?php 
                            for ($c=0; $c <3 ; $c++) { 
                        ?>
                        <div class="card item ">
                          <a href="<?= base_url() . 'productos/producto/' . $arrProductos[$intProd]['idproductos']; ?>">
                            <img src="<?php 
                                if (count($arrProductos[$intProd]['images'])>0){
                                    $img = $arrProductos[$intProd]['images'][0]['url_image'];
                                }
                                else{
                                    $img=media().'images/default-image.jpg';
                                }                           
                            echo $img;?>" class="w-100 h-95" alt="...">
                            </a>
                            <div class="card-body">
                            <h5 class="card-title"><?=$arrProductos[$intProd]['nombre_producto']?></h5>
                            <p class="card-text"><?='$'.$arrProductos[$intProd]['precio']?></p>
                            <button class="btn btn-primary car" data-product="<?=$arrProductos[$intProd]['idproductos']?>">Añadir al carrito</button>
                            
                            </div>
                        </div>
                        <?php 
                        $intProd++;
                    }?>
                        
                    </div>
                </div>
                <?php }?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <br>
    <div class="container">
      
    <?php if (count($arrProductos)==0): ?>
        <h1>No hay productos</h1>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($arrProductos as $producto): ?>
                <?php 
                if (count($producto['images']) > 0) {
                    $portada = $producto['images'][0]['url_image'];
                } else {
                    $portada = media().'images/default-image.jpg';
                }
                ?>
                <div class="item col">
                    <div class="card h-100">
                    <a href="<?= base_url() . 'productos/producto/' . $producto['idproductos']; ?>">
                        <img src="<?=$portada?>" class="w-90 h-100" alt="producto"></a>
                        <div class="card-body">
                            <h5 class="card-title"><?=$producto['nombre_producto']?></h5>
                            <p class="card-text price"><?='$'.$producto['precio']?></p>
                            <button class="btn btn-primary boton" data-product="<?=$producto['idproductos']?>">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

    
<?php require_once('Views/Generals/footer_tienda.php');?>
    
 