<?php     
    
    require_once('Views/Generals/header_tienda.php');
?>
    <?php 
        foreach ($data['pedidos'] as $p) {
        $detalle = $p['detalle'];
        
    ?>
    <br>
    <div class="container">
    <main class="app-content">
 
 <div class="row">
       <div class="container">
       <div class="col-md-12">
     <div class="tile">
       <?php
         if(empty($p)){
       ?>
       <p>Datos no encontrados</p>
       <?php }else{
           $cliente = $p['cliente']; 
           $orden = $p['orden'];
           $detalle = $p['detalle'];
           $direccion=$p['direccion'];
        ?>
       <section id="sPedido" class="invoice">
         <div class="row mb-4">
           <div class="col-6">
             <h5 class="text-right">Fecha: <?= $orden['fecha'] ?></h5>
           </div>
         </div>
         <div class="row invoice-info">
           <div class="col-4">
             <address><strong><?= NOMBRE_EMPESA; ?></strong><br>
               <?= DIRECCION ?><br>
               <?= TELEMPRESA ?><br>
               <?= EMAIL_EMPRESA ?><br>
               <?= WEB_EMPRESA ?>
             </address>
           </div>
           <div class="col-4">
             <address><strong><?= $cliente['name']?></strong><br>
               Envío: <?= 'Colonia: '.$direccion['colonia']; ?><br>
               Email: <?= $cliente['email'] ?>
              </address>
           </div>
           <div class="col-4"><b>Orden #<?= $orden['idtransaccion'] ?></b><br> 
               <b>Estado:</b> <?= $orden['status'] ?> <br>
               <b>Monto:</b> <?= SMONEY.' '. formatMoney($orden['total']) ?>
           </div>
         </div>
         <div class="row">
           <div class="col-12 table-responsive">
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Descripción</th>
                   <th class="text-right">Precio</th>
                   <th class="text-center">Cantidad</th>
                   <th class="text-right">Importe</th>
                 </tr>
               </thead>
               <tbody>
                   <?php 
                       $subtotal = 0;
                       if(count($detalle) > 0){
                           foreach ($detalle as $producto) {
                               $subtotal += $producto['cantidad'] * $producto['precio'];
                    ?>
                 <tr>
                   <td><?= $producto['producto'] ?></td>
                   <td class="text-right"><?= SMONEY.' '. formatMoney($producto['precio']) ?></td>
                   <td class="text-center"><?= $producto['cantidad'] ?></td>
                   <td class="text-right"><?= SMONEY.' '. formatMoney($producto['cantidad'] * $producto['precio']) ?></td>
                 </tr>
                 <?php 
                           }
                       }
                  ?>
               </tbody>
               <tfoot>
                   <tr>
                       <th colspan="3" class="text-right">Sub-Total:</th>
                       <td class="text-right"><?= SMONEY.' '. formatMoney($subtotal) ?></td>
                   </tr>
                   <tr>
                       <th colspan="3" class="text-right">Envío:</th>
                       <td class="text-right">
                           <!-- <?= SMONEY.' '. formatMoney($orden['costo_envio']) ?> -->
                           gratis
                       </td>
                   </tr>
                   <tr>
                       <th colspan="3" class="text-right">Total:</th>
                       <td class="text-right"><?= SMONEY.' '. formatMoney($orden['total']) ?></td>
                   </tr>
               </tfoot>
             </table>
           </div>
         </div>
       </section>
       <?php } ?>
     </div>
   </div> 
       </div>
 
 </div>
</main>
    </div>
    
<?php }?>
<?php require_once('Views/Generals/footer_tienda.php');?>