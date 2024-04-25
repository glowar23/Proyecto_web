console.log("Tarjeta")
$(document).ready(function() {
    $("#btn-comprar").click(function(e) {
        e.preventDefault();

        // Validación de los formularios
        if ( !validarFormularioTarjeta()) {
            alert("Por favor, complete todos los campos requeridos correctamente.");
            return; // Detener la función si la validación falla
        }

        var datosTarjeta = {
            nombreTitular: $("#typeName").val(),
            numeroTarjeta: $("#typeNumber").val(),
            expiracion: $("#typeExp").val(),
            cvv: $("#typeCvv").val()  // Asegúrate de que este id exista y sea único para el CVV
        };

        // Enviar datos mediante AJAX al script PHP
        $.ajax({
            url: 'http://localhost/Proyecto_web/Carrito/postCard',  // Modificar con la URL del script PHP de destino
            type: 'POST',
            data: {
                tarjeta: datosTarjeta
            },
            success: function(response) {
                // Aquí puedes manejar la respuesta del servidor
                console.log(response);
                alert("Pedido procesado correctamente.");
            },
            error: function(xhr, status, error) {
                // Aquí puedes manejar errores de solicitud
                console.error(error);
                alert("Error al procesar el pedido.");
            }
        });
        
    });

    function validarFormularioTarjeta() {
        // Implementar validaciones específicas para el formulario de tarjeta
        return $("#typeName").val() && $("#typeNumber").val() && $("#typeExp").val() && $("#typeCvv").val();
    }
});