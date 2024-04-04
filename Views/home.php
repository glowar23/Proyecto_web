<?php 
    $arrProductos=$data['products'];
    require_once('Views/Generals/header_tienda.php');
?>


    
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