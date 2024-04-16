$(document).ready(function(){
    $('#tableRoles').DataTable({
        "aProcessing":true,
        "aServerSide":true,
        "ajax":{
            "url": ""+base_url+"/Roles/getRoles",
            "dataSrc":""
        },
        "colums":[
            {"data":"idRol"},
            {"data":"nombreRol"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "responsive":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]] 

    });
});

function openModal(){

    document.querySelector('#idRol').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector("#formRol").reset();
	$('#modalFormRol').modal('show');
}