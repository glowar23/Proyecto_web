<?php 
  require_once('Views/Generals/header_admin.php');
  
?>
    <!-- Sidebar menu-->
   
    <main class="app-content">
      <div class="app-title">
        <div>
          
          <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon bi bi-bag-check-fill"></i>
            <div class="info">
              <h4>Productos vendidos totales</h4>
              <p><b><?=($data['productosVendidos']['total_productos_vendidos'])?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa-solid fa-cash-register"></i>
            <div class="info">
              <h4>Ingresos totales</h4>
              <p><b>$<?=$data['ingresos']['ingreso_total']?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon bi bi-calendar2-check"></i>
            <div class="info">
              <h4>Numero de Pedidos</h4>
              <p><b><?=$data['ntransacciones']['numero_transacciones']?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon bi bi-activity"></i>
            <div class="info">
              <h4>Promedio de productos por pedido</h4>
              <p><b><?=$data['pedMean']['promedio_transaccion']?></b></p>
            </div>
          </div>
        </div>
      </div>  
        <div class="tile">
          <p></p>
            
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php require_once('Views/Generals/footer_admin.php');?>