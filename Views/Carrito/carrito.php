<?php 
    require_once('Views/Generals/header_tienda.php');
?>
	<h2>Este es la pagina de carrito.</h2>
    <?= $_SESSION['arrIdProductos'][0]?>
	<?php require_once('Views/Generals/footer_tienda.php');?>