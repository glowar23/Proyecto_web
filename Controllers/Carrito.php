<?php 
	require_once("Models/TraitProducto.php");
	
	require_once("Models/TraitClientes.php");
	class Carrito extends Controllers{
		use TraitClientes, TraitProducto;
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