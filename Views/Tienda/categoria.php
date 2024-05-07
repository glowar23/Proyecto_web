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
    <div class="container-items container col-md-10 mr-2">    
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
                                        <?='$'.$arrProductos[$i]['precio']?>
                                        </p>
                                        <button class="boton btn" data-product="<?=$arrProductos[$i]['idproductos']?>"> Añadir al carrito</button>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
            <?php } ?>
    
    </div>
    </div>
    

<?php 
require_once('Views/Generals/footer_tienda.php');?>