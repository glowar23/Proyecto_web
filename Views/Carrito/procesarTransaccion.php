<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['page_title'];?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>css/styleProduct.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=base_url()?>" class="text-black text-decoration-none">
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
        <form>
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div data-mdb-input-init class="form-outline">
                <input type="text" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Colonia</label>
              </div>
            </div>
            <div class="col">
              <div data-mdb-input-init class="form-outline">
                <input type="text" id="form7Example2" class="form-control" />
                <label class="form-label" for="form7Example2">Codio Postal</label>
              </div>
            </div>
          </div>

          <!-- Text input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form7Example3" class="form-control" />
            <label class="form-label" for="form7Example3">Calle </label>
          </div>

          <!-- Text input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form7Example4" class="form-control" />
            <label class="form-label" for="form7Example4">Numero exterior</label>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="form7Example5" class="form-control" />
            <label class="form-label" for="form7Example5">Numero interior (Opcional)</label>
          </div>

          <!-- Number input -->

          <!-- Message input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <textarea class="form-control" id="form7Example7" rows="4"></textarea>
            <label class="form-label" for="form7Example7">Referencia</label>
          </div>

          <!-- Checkbox -->
          <div class="form-check d-flex justify-content-center mb-2">
            <input class="form-check-input me-2" type="checkbox" value="" id="form7Example8" checked />
            <label class="form-check-label" for="form7Example8">
              Create an account?
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Summary</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            Products
            <span>$53.98</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
            Enivo
            <span>Gratis</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div>
              <strong>Total amount</strong>
              <strong>
                
              </strong>
            </div>
            <span><strong>$53.98</strong></span>
          </li>
        </ul>

        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">
          Realizar Pedido
        </button>
      </div>
    </div>
  </div>
</div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>