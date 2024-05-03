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
  <style>
    .card {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
  }

  .card.show {
    opacity: 1;
    transform: translateY(0);
  }
    .selected-card {
      border: 2px solid blue;
      /* Cambia el color de borde deseado */
      transition: border-color 0.3s ease;
    }
  </style>
</head>
<?php
$domicilio = $_SESSION['idDomicilio'];
$tarjetas = $data['tarjetas'];
?>

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
        <ul style="list-style-type: none; padding-left: 0;">
          <?php

          //dep($data);
          foreach ($tarjetas as $t) {
            $no_tarjeta = $t['no_tarjeta'];
            $exp = $t['expiracion'];
            $titular = $t['titular'];

            ?>
            <li>
              <div class="card mb-3" style="margin-right: 5%; ">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <div>
                        <img style="width: 45px; height: 50px;" src="<?= media() . 'images/pet_card.png' ?>">
                      </div>
                      <div class="ms-3">
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
                      <div style="width: 150px; ">
                        <h5 class="mb-0"></h5>
                      </div>
                      <a href="#" class="procesarPagoLink" data-idtarjeta="<?= intval($t['id_tarjeta']); ?>"
                        data-domicilio="<?= intval($_SESSION['idDomicilio']) ?>"
                        style="width: 100px; height: 50px; margin-right: 50px; "><?php $_SESSION['idTarjeta'] = $t['id_tarjeta']; ?>
                        <i class="fa-solid fa-square-check" style="margin-top: 18px;">SELECCIONAR</i>
                      </a>

                    </div>

                  </div>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>

        <div class="card mb-3" style="margin-right: 5%;  border: #000; cursor: pointer;" id="toggleFormButton">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <button id="toggleFormButton" style="background: none; border: none; width: 150px; height: 30px;">Agregar
                Tarjeta</button>
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
                <span><?php if ($_SESSION['pedido']['subtotal'] > 200) {
                  echo 'Gratis';
                  $envio = 0;
                } else {
                  echo '$100';
                  $envio = 100;
                } ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total a pagar</strong>
                  <strong>

                  </strong>
                </div>
                <span><strong>$<?= $_SESSION['pedido']['subtotal'] + $envio; ?></strong></span>
              </li>
            </ul>

            <a type="submit" class="btn btn-primary btn-lg btn-block"
              id="btn-comprar">
              Realizar Pedido
            </a>
          </div>
          <div id="domicilioResult">

          </div>
        </div>
      </div>
    </div>
    <div id="formOverlay1" class="form-overlay1" style="display: none;"></div> <!-- Fondo oscurecido -->

    <div id="formContainer1" class="form-popup1" style="display: none;">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h3 class="mb-0">Datos de tarjeta</h3>
        </div>
        <form action="post" class="form-container1 mt-4" id="formCard">
          <div data-mdb-input-init class="form-outline form-white mb-4">
            <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
              placeholder="Cardholder's Name" required="" />
            <label class="form-label" for="typeName">Titular de la tarjeta</label>
          </div>

          <div data-mdb-input-init class="form-outline form-white mb-4">
            <input type="text" id="typeNumber" class="form-control form-control-lg" siez="17"
              placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" required="" />
            <label class="form-label" for="typeNumber">Numero de tarjeta</label>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <div data-mdb-input-init class="form-outline form-white">
                <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" size="7"
                  id="exp" minlength="7" maxlength="7" required="" />
                <label class="form-label" for="typeExp">Expiracion</label>
              </div>
            </div>
            <div class="col-md-6">
              <div data-mdb-input-init class="form-outline form-white">
                <input type="password" id="typeCvv" class="form-control form-control-lg"
                  placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" required="" />
                <label class="form-label" for="typeCvv">Cvv</label>
              </div>
            </div>
          </div>


          <button type="submit" class="btn1">Agregar</button>
          <button type="button" class="btn1 cancel1" onclick="closeForm()">Cerrar</button>
        </form>

      </div>
    </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--Cargar el formulario de manera bonita-->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
      setTimeout(() => {
        card.classList.add('show');
      }, 150 * index);  // Cada tarjeta se muestra con 150 ms de diferencia
    });
  });
</script>
<!--al seleccionar un card-->
<script>
  $('.procesarPagoLink').click(function (e) {
    e.preventDefault(); // Prevenir la acción por defecto del enlace

    // Remover la clase 'selected' de todos los elementos, y añadirla solo al actual clickeado
    $('.card').removeClass('selected-card'); // Primero eliminamos la clase de todos los elementos
    $(this).closest('.card').addClass('selected-card'); // Luego añadimos la clase al elemento clickeado
  });

</script>

<!-- script de las funciones del formulario -->
<script>
  $(document).ready(function () {
    $('#toggleFormButton, #formOverlay1').click(function () {
      $('#formContainer1, #formOverlay1').fadeToggle();
    });

    $(document).keydown(function (e) {
      if (e.keyCode == 27) { // Código para la tecla ESC
        $('#formContainer1, #formOverlay1').fadeOut();
      }
    });

    $("#formCard").submit(function (e) {
      e.preventDefault();
      var datosTarjeta = {
        titular: $("#typeName").val(),
        numero: $("#typeNumber").val(),
        expiracion: $("#typeExp").val(),
        cvv: $("#typeCvv").val()
      };

      $.ajax({
        url: 'http://localhost/Proyecto_web/Carrito/postCard', // Asegúrate de cambiar esto
        type: 'POST',
        data: {
          tarjeta: datosTarjeta
        },
        success: function (response) {
          console.log(response);
          location.href = "http://localhost/Proyecto_web/carrito/seleccionarTarjeta/";
          $('#formContainer1, #formOverlay1').fadeOut();
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText);
          alert("Error al agregar la tarjeta: " + xhr.responseText);
        }

      });
    });
  });
</script>

<!-- GENERAR TRANSACCIÓN SELECCIONANDO EL DOMICILIO -->

<script>
  let idTarjetaSeleccionada = null;
  let domicilioSeleccionado = null;

  $('.procesarPagoLink').click(function (e) {
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

  $('#btn-comprar').click(function () {
    if (idTarjetaSeleccionada && domicilioSeleccionado) {
      // Realizar la acción para enviar los datos
      $.ajax({
        url: 'http://localhost/Proyecto_web/carrito/finT',
        method: 'POST',
        
        data: {
          idTarjeta: idTarjetaSeleccionada,
          domicilio: domicilioSeleccionado
        },
        success: function (response) {
          console.log(response);
          Swal.fire({
                        title: 'Listo',
                        text: "¡Compra generada!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok!'
                      }).then((result) => {
                          if (result.isConfirmed) {
                            window.location.href ='http://localhost/Proyecto_web';
                          }
                        })
          

        },
        error: function () {
          alert('Error al procesar el pedido. Por favor, intenta nuevamente.');
        }
      });
    } else {
      alert('Por favor, selecciona una tarjeta antes de realizar el pedido.');
    }
  });
</script>




</html>