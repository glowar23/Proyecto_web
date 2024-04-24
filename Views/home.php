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
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="<?media().'images//banner-img3.png'?>" class="img-fluid">
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
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bowl-food"></iconify-icon>
            <h5>Foodies</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bird"></iconify-icon>
            <h5>Bird Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
            <h5>Dog Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:fish"></iconify-icon>
            <h5>Fish Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
            <h5>Cat Shop</h5>
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
                        <div class="card">
                            <img src="<?php 
                                if (count($arrProductos[$intProd]['images'])>0){
                                    $img = $arrProductos[$intProd]['images'][0]['url_image'];
                                }
                                else{
                                    $img=media().'images/default-image.jpg';
                                }                           
                            echo $img;  ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title"><?=$arrProductos[$intProd]['nombre_producto']?></h5>
                            <p class="card-text"><?='$'.$arrProductos[$intProd]['precio']?></p>
                            <button class="btn btn-primary" data-product="<?=$arrProductos[$intProd]['idproductos']?>">Añadir al carrito</button>
                            
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
    <div class="container-items">    
            <?php
            if (count($arrProductos)==0){
                echo '<h1>No hay productos</h1>';
            }else {
                $arrPr=[];
                for ($i=0; $i <count($arrProductos) ; $i++) {
                    if (count($arrProductos[$i]['images'])>0){
                        $portada = $arrProductos[$i]['images'][0]['url_image'];
                    }
                    else{
                        $portada=media().'images/default-image.jpg';
                    } ?> 
                        <div class="item">
                            <figure>
                                <img src="<?=$portada?>" alt="producto"> 
                            </figure>
                            <div>
                                <div class="info-product">
                                    <h2>
                                        <?=$arrProductos[$i]['nombre_producto']?>
                                        <p class="price">
                                        <?=$arrProductos[$i]['precio']?>
                                        </p>
                                        <button class="boton" data-product="<?=$arrProductos[$i]['idproductos']?>"> Añadir al carrito</button>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    

            <?php } ?>
    
    </div>
    
<?php require_once('Views/Generals/footer_tienda.php');?>
    
 