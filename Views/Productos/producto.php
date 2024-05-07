<?php    
    require_once('Views/Generals/header_tienda.php');
    $p = $data['producto']
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center" style="width: 300px; height:300px  ;"><img src="<?=$p['images'][0]['url_image']?>" class="img-responsive" style=";width: auto; height: auto  ;"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h3 class="card-title"><?=$p['nombre_producto'] ?></h3>
                    <h6 class="card-subtitle"><?=$p['SKU']?></h6>
                    <h2 class="mt-5">
                        $<?=$p['precio']?><small class="text-success"></small>
                    </h2>
                    <button class="btn btn-dark btn-rounded mr-1 boton"   data-product="<?= $arrProductos[$i]['idproductos'] ?>"data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"> Agregar al carrito</i>
                    </button>
                    <h4 class="box-title mt-5">Descripción del producto</h4>
                        <p><?=$p['Descripcion']?></p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">Más de my pets</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390">Brand</td>
                                    <td>Stellar</td>
                                </tr>
                                <tr>
                                    <td>Delivery Condition</td>
                                    <td>Knock Down</td>
                                </tr>
                                <tr>
                                    <td>Seat Lock Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>Office Chair</td>
                                </tr>
                                <tr>
                                    <td>Style</td>
                                    <td>Contemporary&amp;Modern</td>
                                </tr>
                                <tr>
                                    <td>Wheels Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Upholstery Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Upholstery Type</td>
                                    <td>Cushion</td>
                                </tr>
                                <tr>
                                    <td>Head Support</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Suitable For</td>
                                    <td>Study&amp;Home Office</td>
                                </tr>
                                <tr>
                                    <td>Adjustable Height</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Model Number</td>
                                    <td>F01020701-00HT744A06</td>
                                </tr>
                                <tr>
                                    <td>Armrest Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Care Instructions</td>
                                    <td>Handle With Care,Keep In Dry Place,Do Not Apply Any Chemical For Cleaning.</td>
                                </tr>
                                <tr>
                                    <td>Finish Type</td>
                                    <td>Matte</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<?php 
require_once('Views/Generals/footer_tienda.php');?>