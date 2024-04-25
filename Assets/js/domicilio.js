console.log("Domicilio")
$(document).ready(function() {
    $("#btn-comprar").click(function(e) {
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
            url: 'http://localhost/Proyecto_web/Carrito/postDomicilio',  // Modificar con la URL del script PHP de destino
            type: 'POST',
            data: {
                domicilio: datosDomicilio
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

    function validarFormularioDomicilio() {
        // Implementar validaciones específicas para el formulario de domicilio
        return $("#textColonia").val() && $("#textPostal").val() && $("#textCalle").val() && $("#textNoExt").val();
    }
});
