
console.log("hola mundo");
$(document).ready(function() {
    $("#formLogin").on('submit', function(e) {
      e.preventDefault(); // Previene el envío normal del formulario
      
      $.ajax({
        type: "POST",
        url: base_url+"/login/loginUser",
        data: $(this).serialize(), // Serializa los datos del formulario
        success: function(response) {
          console.log(response);  
          var jsonData = JSON.parse(response);
            
          // El usuario se ha autenticado correctamente
          if (jsonData.success == "1") {
            location.href = base_url+''; 
           // console.log(jsonData);
          }
          else {
            $("#loginResult").html("Usuario o contraseña incorrectos.");
            console.log(jsonData);  
          }
          }
      });
    });
  });



