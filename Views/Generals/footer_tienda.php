    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src=<?php media()."js/"."carrito.js"?>></script>
    <div class="container">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    <div class="col mb-3">
      <a href="<?=base_url()?>" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
      <p class="title">MyPets</p>
      </a>
      <p class="text-body-secondary">© 2024</p>
    </div>

    <div class="col mb-3">

    </div>

    <div class="col mb-3">
      <h5 class="title">Sobre MyPets</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5> Contacto</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Informacion Legal</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

// Cuando el documento esté listo
$(document).ready(function(){
    
  // Asignar un controlador de eventos al elemento HTML con id 'ajaxButton'
  var productId =0;
  $('.btn').click(function(){
        // Realizar la solicitud Ajax al servidor
         productId = $(this).data('product');
        //console.log(productId);
        $.ajax({
            url: 'http://localhost/Proyecto_web/Carrito/agragarCarrito', // URL a la que enviar los datos
            method: 'POST', // Método HTTP
            data: {myData: productId}, // Datos a enviar
            success: function(response){ // Manejar la respuesta del servidor
                // Mostrar la respuesta en el elemento HTML correspondiente
                console.log(response);
            }
        });
    });
    $('.boton').click(function(){
        // Realizar la solicitud Ajax al servidor
        productId = $(this).data('product');
        $.ajax({
            url: 'http://localhost/Proyecto_web/Carrito/agragarCarrito', // URL a la que enviar los datos
            method: 'POST', // Método HTTP
            data: {myData: productId}, // Datos a enviar
            success: function(response){ // Manejar la respuesta del servidor
                // Mostrar la respuesta en el elemento HTML correspondiente
                console.log(response);
            }
        });
    });
    
});
</script>
</div>
</body>
</html>