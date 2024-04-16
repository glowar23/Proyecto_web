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
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <div class="text-start"></div> 
            <a href="<?=base_url()?>" class="d-flex align-items-center m-2 mb-lg-0 text-white text-decoration-none">
          <p class="title">MyPets</p>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Perro </a></li>
          <li><a href="#" class="nav-link px-2 text-white">Gato </a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pajaro </a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pez </a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">
        </form>
        <a href="">
        <i class="fa-solid fa-basket-shopping m-3 " ></i> 
        </a>
        <div class="text-end">
        <div class="dropdown">
          <a href="#" style="margin-top: 0px;" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?=media().'images/dog.png'?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          
          <ul class="dropdown-menu text-small" style="">
            
            
          <?php 
            if(!isset($_SESSION['login']))
            {
          ?>
            <li><a class="dropdown-item" href="<?= base_url().'Login'?>">Login</a></li>
            <li><a class="dropdown-item" href="<?= base_url().'Register'?>">Registro</a></li>
            
            <?php }?>
            
            <?php
              if(isset($_SESSION['login']))
              { ?>
                <li><p class="dropdown-item-text title">Bienvenido <?=$_SESSION['name']?></p></li>  
                <?php if ($_SESSION['tipoUsuario'] === 'Admin'){echo '<li><a class="dropdown-item" href="'.base_url().'dashboard">Administrar Sitio</a></li>';
                }else {
                ?>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Mis pedidos</a></li>
                <?php }?>
                <li><hr class="dropdown-divider"></li>
                <a href="<?=base_url().'logout'?>" class="dropdown-item"> Logout</a>
              <?php }?>  
              
            
          </ul>
          
      </div>
    </div>
  </header>
    