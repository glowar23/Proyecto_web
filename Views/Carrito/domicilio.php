<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['page_title']; ?></title>
  <script src="https://kit.fontawesome.com/3c4b3c6940.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css  " rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>css/styleProduct.css">
</head>

<body>
  <header>
    <div class="container">
      <a href="<?= base_url() ?>" class="text-black text-decoration-none">
        <h1 class="title text-center">MyPets</h1>
      </a>
    </div>

  </header>
  <?php
  $domicilios = $data['domicilios']; 
   // echo json_encode($domicilios);
  foreach ($domicilios as $d) {
    $calle = $d['calle'];
    $no_ext = $d['numero_exterior'];
    $cod_p = $d['codigo_postal'];

    ?>
    
    <div class="card mb-3" style="margin-right: 25%; margin-left: 25%;">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-row align-items-center">
            <div>
              <img style="width: 45px; height: 50px;"src="<?=media().'images/domicilio.png'?>">
            </div>
            <div class="ms-3">
              <h5>Calle: <?=$calle?></h5>
              <p class="small mb-0">Código Postal: <?= $cod_p?><br>Numero exterior: <?= $no_ext ?></p>
            </div>
          </div>
          <div class="d-flex flex-row align-items-center">
            <div style="width: 50px;">
              <h5 class="fw-normal mb-0"></h5>
            </div>
            <div style="width: 80px;">
              <h5 class="mb-0"></h5>
            </div>
            <a href="<?=base_url().'carrito/seleccionarTarjeta/'.$d['idDomicilio']?>" style="width: 50px; height: 50px;  "><i class="fa-solid fa-arrow-right-long" style="padding: 30%;"></i></a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  
  <div class="card mb-3" style="margin-right: 25%; margin-left: 25%; border:  #000;">
    <div class="card-body">
        <div class="d-flex justify-content-between">
          AGREGAR DOMICILIO
        </div>
      </div>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= media() . 'js/domicilio.js' ?>"></script>

</html>