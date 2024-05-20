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
</style>



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
              <img style="width: 45px; height: 50px;" src="<?= media() . 'images/domicilio.png' ?>">
            </div>
            <div class="ms-3">
              <h5>Calle: <?= $calle ?></h5>
              <p class="small mb-0">Código Postal: <?= $cod_p ?><br>Numero exterior: <?= $no_ext ?></p>
            </div>
          </div>
          <div class="d-flex flex-row align-items-center">
            <div style="width: 50px;">
              <h5 class="fw-normal mb-0"></h5>
            </div>
            <div style="width: 80px;">
              <h5 class="mb-0"></h5>
            </div>
            <a href="<?= base_url() . 'carrito/seleccionarTarjeta/' ?>"
              style="width: 50px; height: 50px;  "><?php $_SESSION['idDomicilio'] = $d['idDomicilio']; ?><i
                class="fa-solid fa-arrow-right-long" style="padding: 30%;"></i></a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  
    <div class="card mb-3" style="margin-right: 25%; margin-left: 25%; border:  #000;cursor: pointer;" id="toggleFormButton">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <button id="toggleFormButton" style="background: none; border: none; width: 150px; height: 30px;">Agregar Domicilio</button>
      </div>

    </div>
  </div>
  </div>
  <div id="formOverlay1" class="form-overlay1" style="display: none;"></div> <!-- Fondo oscurecido -->

  <div id="formContainer1" class="form-popup1"
    style="display: none; width: 80%; max-width: 400px; min-height: 100px; max-height: 90vh; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); overflow-y: auto; z-index: 1050;">

<div class="row">
    <div class=" card mb-4">
      <div class="card-header py-3">
        <h3 class="mb-0">Datos del domicilio</h3>
      </div>
      <form method="post"class="form-container1 mt-4 " id="formCard" style="max-width: 400px">
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" id="textColonia" class="form-control"  required />
              <label class="form-label" for="textColonia">Colonia</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="text" id="textPostal" class="form-control" required />
              <label class="form-label" for="TextPostal">Código Postal</label>
            </div>
          </div>
        </div>
        <div class="form-outline mb-4">
          <input type="text" id="textCalle" class="form-control" required />
          <label class="form-label" for="textCalle">Calle</label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" id="textNoExt" class="form-control" required />
          <label class="form-label" for="textNoExt">Número exterior</label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" id="textNoInt" class="form-control" />
          <label class="form-label" for="textNoInt">Número interior (Opcional)</label>
        </div>
        <div class="form-outline mb-4">
          <textarea class="form-control" id="textRef" rows="4" required></textarea>
          <label class="form-label" for="textRef">Referencia</label>

          <button type="submit" class="btn1" id="btn-agregar">Agregar</button>
          <button type="button" class="btn1 cancel1" onclick="closeForm()">Cerrar</button>
      </form>

    </div>
</div>
    
  </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--Cargar el formulario de manera bonita-->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
      setTimeout(() => {
        card.classList.add('show');
      }, 150 * index);  // Cada tarjeta se muestra con 150 ms de diferencia
    });
  });
</script>
<!-- script de las funciones del formulario -->
<script>
  $(document).ready(function () {
  $('#toggleFormButton').click(function () {
    $('#formContainer1, #formOverlay1').fadeIn();
  });

  $('#formOverlay1').click(function () {
    $(this).fadeOut();
    $('#formContainer1').fadeOut();
  });

  window.closeForm = function () {
    $('#formContainer1, #formOverlay1').fadeOut();
  }

  $(document).keydown(function (e) {
    // La tecla Esc tiene el código 27
    if (e.keyCode == 27) {
      $('#formContainer1, #formOverlay1').fadeOut();
    }
  });

  $("#formCard").submit(function(e) {
    e.preventDefault();

    // Validación de los formularios
    if (!validarFormularioDomicilio()) {
      alert("Por favor, complete todos los campos requeridos correctamente.");
      return; // Detener la función si la validación falla
    }

    // Recopilar datos de los formularios
    var datosDomicilio = {
      colonia: $("#textColonia").val(),
      postal: $("#textPostal").val(),
      calle: $("#textCalle").val(),
      noExt: $("#textNoExt").val(),
      noInt: $("#textNoInt").val(),
      referencia: $("#textRef").val()
    };

    // Enviar datos mediante AJAX al script PHP
    $.ajax({
      url: 'https://localhost/Proyecto_web/Carrito/postDomicilio', // Modificar con la URL del script PHP de destino
      type: 'POST',
      data: {
        domicilio: datosDomicilio
      },
      success: function (response) {
        // Aquí puedes manejar la respuesta del servidor
        console.log(response);
        location.href="https://localhost/Proyecto_web/carrito/seleccionarDomicilio";
        $('#formContainer1, #formOverlay1').fadeOut();
      
      },
      error: function (xhr, status, error) {
        // Aquí puedes manejar errores de solicitud
        console.error(error);
        alert("Error al procesar el pedido.");
      }
    });
  });

  function validarFormularioDomicilio() {
    // Implementar validaciones específicas para el formulario de domicilio
    return $("#textColonia").val() && $("#textPostal").val() && $("#textCalle").val() && $("#textNoExt").val();
  }
});

</script>
</html>