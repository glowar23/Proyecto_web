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
  <div class="container">
      <div class="row">
    
      <div class="col-md-9">
      <ul id = "lista-tarjeta" data-idtarjeta="<?=intval($t['id_tarjeta']); ?>"
                data-domicilio="<?= intval($_SESSION['idDomicilio']) ?>">  
  <?php
  $domicilio = $_SESSION['idDomicilio'];
  $tarjetas = $data['tarjetas'];
  //dep($data);
  foreach ($tarjetas as $t) {
    $no_tarjeta = $t['no_tarjeta'];
    $exp = $t['expiracion'];
    $titular = $t['titular'];

    ?>
      <li>
      <i class="fa-regular fa-square-check"></i>
      <div class="card mb-3" style="margin-right: 5%; ">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
              <div>
                <img style="width: 45px; height: 50px;" src="<?= media() . 'images/pet_card.png' ?>">
              </div>
              <div class="ms-3"  >
                <h5>Tarjeta: <br>
                  <?php

                  $ultimos_cuatro = substr($no_tarjeta, -4);
                  echo "xxxx-xxxx-xxxx-" . $ultimos_cuatro;
                  ;
                  ?>
                </h5>
                <p class="small mb-0">Expiración: <?= $exp ?>.<br>Titular: <?= $titular ?>.</p>
              </div>
            </div>
            <div class="d-flex flex-row align-items-center">
              <div style="width: 50px;">
                <h5 class="fw-normal mb-0"></h5>
              </div>
              <div style="width: 80px;">
                <h5 class="mb-0"></h5>
              </div>

              <a href="#" class="procesarPagoLink" data-idtarjeta="<?=intval($t['id_tarjeta']); ?>"
                data-domicilio="<?= intval($_SESSION['idDomicilio']) ?>" 
                style="width: 50px; height: 50px;"><?php  $_SESSION['idTarjeta']=$t['id_tarjeta']; ?>
                <i class="fa-solid fa-arrow-right-long" style="padding: 30%;"></i>
              </a>

            </div>

          </div>
        </div>
      </div>
      </li>
    <?php } ?>
    </ul>

    <div class="card mb-3" style="margin-right: 5%;  border:  #000;">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          AGREGAR TARJETA
        </div>
      </div>
    </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Resumen</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Total antes de envio
                <span>$<?= $_SESSION['pedido']['subtotal'] ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Enivo
                <span><?php if ($_SESSION['pedido']['subtotal']>200) {echo 'Gratis'; $envio=0; }else {echo '$100'; $envio=100;} ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total a pagar</strong>
                  <strong>

                  </strong>
                </div>
                <span><strong>$<?= $_SESSION['pedido']['subtotal']+$envio; ?></strong></span>
              </li>
            </ul>

            <a href="<?= base_url() . 'carrito/finT' ?>" type="submit" class="btn btn-primary btn-lg btn-block"
              id="btn-comprar">
              Realizar Pedido
            </a>
          </div>
          <div  id="domicilioResult">
                
          </div>
        </div>
      </div>          
      </div>

    
    
    


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= media() . 'js/domicilio.js' ?>"></script>
<!-- enviar documentos por ajax -->
<script>
let idTarjetaSeleccionada = null;
let domicilioSeleccionado = null;
$('#lista-tarjeta').on('click', '.card', function() {
        // Toggle de la clase selected para resaltar visualmente la tarjeta seleccionada
        $(this).toggleClass('selected').siblings().removeClass('selected');

        // Recuperar datos de la tarjeta seleccionada
        idTarjetaSeleccionada = $(this).find('.procesarPagoLink').data('idtarjeta');
        domicilioSeleccionad = $(this).find('.procesarPagoLink').data('domicilio');

        // Opcional: Mostrar en consola los datos seleccionados
        console.log("ID de Tarjeta: " + idTarjetaSeleccionada + ", Domicilio: " + domicilioSeleccionado);

        // Aquí puedes añadir más código para realizar acciones con estos datos,
        // como preparar datos para un formulario de pago, etc.
    });
$('.procesarPagoLink').click(function(e) {
    e.preventDefault(); // Prevenir la acción por defecto del enlace
    
    // Remover la clase 'selected' de todos los elementos, y añadirla solo al actual clickeado
    $('.card').removeClass('selected');
    $(this).closest('.card').addClass('selected');
    
    // Almacenar los datos necesarios
    idTarjetaSeleccionada = $(this).data('idtarjeta');
    domicilioSeleccionado = $(this).data('domicilio');
    console.log("ID de Tarjeta: " + idTarjetaSeleccionada + ", Domicilio: " + domicilioSeleccionado);

    // Habilitar el botón de Realizar Pedido
    $('#btn-comprar').prop('disabled', false);
});

$('#btn-comprar').click(function() {
    if (idTarjetaSeleccionada && domicilioSeleccionado) {
        // Realizar la acción para enviar los datos
        $.ajax({
            url: 'http://localhost/Proyecto_web/carrito/finT',
            method: 'POST',
            data: {
                idTarjeta: idTarjetaSeleccionada,
                domicilio: domicilioSeleccionado
            },
            success: function(response) {
                window.location.href = 'http://localhost/Proyecto_web';
            },
            error: function() {
                alert('Error al procesar el pedido. Por favor, intenta nuevamente.');
            }
        });
    } else {
        alert('Por favor, selecciona una tarjeta antes de realizar el pedido.');
    }
});

</script>




</html>