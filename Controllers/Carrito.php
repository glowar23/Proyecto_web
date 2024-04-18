<?php 
	require_once("Models/TraitProducto.php");
	require_once("Models/TraitTransaccion.php");
	require_once("Models/TraitClientes.php");
	class Carrito extends Controllers{
		use TraitClientes, TraitProducto,TraitTransaccion;
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function carrito()
		{
			$data['page_id'] = 3;
            $data['page_title']='Carrito';
			$data['prods']=isset($_SESSION['arrIdProductos'])?$this->getProductosCarrito($_SESSION['arrIdProductos']):array();
			$this->views->getView($this,"carrito",$data);
		}
		public function finT(){
			$resultado1=$this->insertTransaccion($_SESSION['idUser'],$_SESSION['pedido']['subtotal']);
			if($resultado1!=0){
				foreach ($_SESSION['pedido']['productos']as $p) {
					$resultado2=$this->insertDetalleTransaccion($p['idproductos'],intval($resultado1),$p['cantidad']);
				}
			}
			$_SESSION['arrIdProductos']=array();
			header("Location:".base_url());

		}	
		public function agragarCarrito(){
			session_start();
			if (!isset($_SESSION['arrIdProductos'])) {
				// Si no existe, inicializarla como un arreglo vacío
				$_SESSION['arrIdProductos'] = [];
			}
			$array =$_SESSION['arrIdProductos'];
			if (!in_array($_POST['myData'],$array))
			array_push($array,$_POST['myData']);
			$_SESSION['arrIdProductos']=$array;
			echo json_encode($array); 

		}
		public function procesarPago()
		{
			if (!isset($_SESSION['login'])) header("Location:".base_url().'Login');
			$data['page_id'] = 4;
            $data['page_title']='Realizar pedido';
			
			$this->views->getView($this,"procesarTransaccion",$data);
			//header("location:".base_url().'carrito/procesarPago');
		}

	}
 ?>