<?php 
    $arrProductos=$data['products'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title']?></title>
    
    <script src="https://kit.fontawesome.com/3c4b3c6940.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>css/styleProduct.css">
    
</head>
<style> 
   
</style>
<body>
    <header id="MyPets" class="title">
        <a href="">
        <h1 >MyPets</h1>
        </a>    
    <div class="carrito-icon">
    <div class="a">
            <a href="<?= base_url().'login'?>" class=" btn btn-light"> login</a>
            <a href="<?= base_url().'register'?>" class="btn btn-light"> registro</a>
            <a href="<?= base_url().'logout'?>" class="btn btn-light"> logout</a>
        </div>
        <i class="fa-solid fa-basket-shopping"></i>
        <div class="count-products">
            <span id="contador-productos">0</span>
        </div>

        <div class="container-cart-products hidden-cart">
            <div class="cart-product">
                <div class="info-cart-product"> <!-- información del carrito-->
                    <span class="cantidad-producto-carrito">1</span>
                    <p class="titulo-producto-carrito">
                        Croquetas Felix
                    </p>
                    <span class="precio-producto-carrito">$699</span>
                </div>
                <i class="fa-solid fa-x"></i>
            </div>
            <div class="cart-total">
                <h3>Total a pagar:</h3>
                <span class="total-pagar">$699</span>
            </div>
        </div>
    </div>
    </header>
    
    <div class="container-items">
        
        <?php
            if (count($arrProductos)==0){
                echo '<h1>No hay productos</h1>';

            }else for ($i=0; $i <count($arrProductos) ; $i++) {
                if (count($arrProductos[$i]['images'])>0){
                    $portada = $arrProductos[$i]['images'][0]['url_image'];
                }
                else{
                    $portada=media().'images/default-image.jpg';
                } 
                echo '
                    <div class="item">
                <figure>
                    <img src="'.$portada.'" alt="producto"> 
                </figure>
                <div>
                    <div class="info-product">
                        <h2>
                            '.$arrProductos[$i]['nombre_producto'].'
                            <p class="price">
                                $'.$arrProductos[$i]['precio'].'
                            </p>
                            <button> Añadir al carrito</button>
                        </h2>
                    </div>
                </div>
            </div>';
            }
        ?>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src=<?php media()."js/"."carrito.js"?>></script>
</body>
</html>