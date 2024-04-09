console.log("Hola mundo");
$(document).ready(function() {
    $("#formRegiter").on('submit', function(e) {
      e.preventDefault(); // Previene el envío normal del formulario
      
      $.ajax({
        type: "POST",
        url: base_url +"/register/postRegister",
        data: $(this).serialize(), // Serializa los datos del formulario
        success: function(response) {
          console.log(response);
          var jsonData = JSON.parse(response);
            
          // El usuario se ha autenticado correctamente
          if (jsonData.success == 1) {
            console.log("sin problemas");
            console.log(jsonData);
            location.href = base_url+''; 
            
           // console.log(jsonData);
          }
          else {
            console.log(jsonData);
            if (jsonData.error=="Email existente"){
                $("#registeresult").html("");
                $("#registeresult").html("El email ya existe.");
                $("#registeresult").addClass("alert alert-danger");
            }  
            if (jsonData.error=="contraseñas distintas"){
                $("#registeresult").html("");
                $("#registeresult").html("Las contraseñas no coinciden.");
                $("#registeresult").addClass("alert alert-danger");
            }  
          }
         }
      });
    });
  });