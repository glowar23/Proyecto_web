<?php 

    require_once('Views/Generals/header_tienda.php');
    $mascotas=$data['Mascotas'];
    getModal('modalMascotas',$data);
?> 
<br>
<div class="container">
    <button class="btn btn-primary" onClick="openModal();">Nuevo +</button>
</div>

<?php foreach ($mascotas as $m) {
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-2">
        <img src="<?=media().'images/pets/'.$m['tipo_animal'].'.jpg'?>" class="img-fluid h-40">
        </div>
        <div class="col-md-10">
            <div class="information item">
                <h2>Nombre: <?=$m['nombre']?></h2>
                <button class="btn btn-primary" onClick="fntEditMascota(this,<?=$m['idmascota']?>)">Editar</button>
                <button class="btn btn-primary" onClick="fntEliminarMascota(this,<?=$m['idmascota']?>)">Eliminar</button>
            </div>
        </div>
    </div>
<?php }?>   

</div>
<?php require_once('Views/Generals/footer_tienda.php');?>
<script src="<?=media().'js/functions_mascotas.js'?>"></script> 