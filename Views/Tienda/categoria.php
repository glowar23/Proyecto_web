<?php     
    
    require_once('Views/Generals/header_tienda.php');
    $arrProductos=$data['productos'];
    $categorias=$data['categorias'];
?>
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-9">
            <h2 class="p-3 title"><?=($data['infoCategoria']['categoria'])?></h2>    
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-2">
            <h4 class="p-3 title">Categorias</h4>
        <div class="container m-4">
            
            <ul class="list-group">
                <?php 
                    foreach ($categorias as $cat) {
                        $url=base_url().'/tienda/categoria/'.$cat['idcategoria'];
                        if ($cat['status']==1)echo '<a href="'.$url.'"><li class="list-group-item btn btn-secondary text-start">'.$cat['nombre'].'</li></a>';
                    }
                ?>
        </ul>
            </div>
        </div>
        <br>
        <div class="container col-md-10 mr-2">
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

    </div>
    

<?php 
require_once('Views/Generals/footer_tienda.php');?>