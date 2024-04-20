<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['page_title']; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
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
      <div class="col-md-8 mb-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Su Pedido</h5>
          </div>
          <div class="card-body">
            <form method="POST" name="formDomicilio" id="formDomicilio">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="textColonia" class="form-control" required />
                    <label class="form-label" for="textColonia">Colonia</label>
                  </div>
                </div>
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="textPostal" class="form-control" required />
                    <label class="form-label" for="TextPostal">Codio Postal</label>
                  </div>
                </div>
              </div>

              <!-- Text input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="textCalle" class="form-control" required />
                <label class="form-label" for="textCalle">Calle </label>
              </div>

              <!-- Text input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="textNoExt" class="form-control" required />
                <label class="form-label" for="tectNoExt">Numero exterior</label>
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="textNoInt" class="form-control" />
                <label class="form-label" for="textNoInt">Numero interior (Opcional)</label>
              </div>

              <!-- Number input -->

              <!-- Message input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <textarea class="form-control" id="textRef" rows="4" required></textarea>
                <label class="form-label" for="textRef">Referencia</label>
              </div>



              <!-- Checkbox -->
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Datos de tarjeta</h5>
          </div>
          <div class="card-body" >

            <form class="mt-4" id="formCard" method="POST">
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

            </form>
          </div>
        </div>
      </div>
      <div class="col-md-12 mb-3">
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
                <span>Gratis</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total a pagar</strong>
                  <strong>

                  </strong>
                </div>
                <span><strong>$<?= $_SESSION['pedido']['subtotal'] ?></strong></span>
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
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src = "<?=media().'js/domicilio.js'?>"></script>
<script src = "<?=media().'js/card.js'?>"></script>

</html>