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
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="<?=base_url()?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <h1 class="title">MyPets</h1>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
      </ul>

      <div class="col-md-3 text-end">
        
            <div class="a">
                    
                    <a href="<?= base_url().'Login'?>" class=" btn btn-light"> Login</a>
                    <a href="<?= base_url().'Register'?>" class="btn btn-light"> Registro</a>
                    <?php
                    if(isset($_SESSION['login']))
                    {
                        echo'<a href="'.base_url().'logout'.'" class="btn btn-light"> logout</a>'; 
                    }  
                    ?>
                    
            </div>
        
        </div>
        
    </header>
    
    <!-- <header id="MyPets"  class="title p-3 mb-3 border-bottom w-100">
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
                <div class="info-cart-product"> 
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
    </header> -->