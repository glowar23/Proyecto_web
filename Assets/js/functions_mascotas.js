$(document).ready(function(){
    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e) {
        e.preventDefault();

        var intIdRol = document.querySelector('#idRol').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var intStatus = document.querySelector('#listStatus').value;        
        if(strNombre == ''|| intStatus == '')
        {
            Swal.fire({
                title: 'Atenicon',
                text: "¡Datos faltantes!",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok!'
              })
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Mascotas/setMascota'; 
        var formData = new FormData(formRol);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    Swal.fire({
                        title: 'Exito',
                        text: "¡Datos cargados!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            $('#modalFormMascota').modal('show');
                            location.reload();
                        }
                      })
                }else{
                    Swal.fire({
                        title: 'Atenicon',
                        text: "¡Error en la respuesta del servidor!",
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok!'
                      })
                }              
            } 
            return false;
        }

        
    }

});

function openModal(){

    document.querySelector('#idRol').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector("#formRol").reset();
	$('#modalFormMascota').modal('show');
}
function fntEditMascota(event, id){
    document.querySelector('#titleModal').innerHTML ="Actualizar Datos";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl  = base_url+'/Mascotas/getMascota/'+id;
            request.open("GET",ajaxUrl ,true);
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#idRol").value = objData.data.idmascota;
                        document.querySelector("#txtNombre").value = objData.data.nombre;

                        // if(objData.data.status == 1)
                        // {
                        //     var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        // }else{
                        //     var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        // }
                        var optionSelect = '<option value="'+objData.data.tipo_animal+'" selected class="notBlock">Actual</option>';
                        var htmlSelect = `${optionSelect}
                                          <option value="dog">Perro</option>
                                            <option value="cat">Gato</option>
                                            <option value="bird">Ave</option>
                                            <option value="fish">Pez</option>
                                            <option value="otro">Otro</option>
                                        `;
                        document.querySelector("#listStatus").innerHTML = htmlSelect;
                        $('#modalFormMascota').modal('show');
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
            }
}
function fntEliminarMascota(event, id){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {   
          // Lógica para eliminar el ítem
          // Por ejemplo, llamar a una función de eliminación o enviar una solicitud AJAX
          let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
          let ajaxUrl = base_url+'/Mascotas/delMascota';
          let strData = "id="+id;
          request.open("POST",ajaxUrl,true);
          request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function(){
              if(request.readyState == 4 && request.status == 200){
                  let objData = JSON.parse(request.responseText);
                  if(objData.status)
                  {
                      Swal.fire("Eliminar!", objData.msg , "success");
                      location.reload();
                  }else{
                    Swal.fire("Atención!", objData.msg , "error");
                  }
              }
          }     
        }
      })

}