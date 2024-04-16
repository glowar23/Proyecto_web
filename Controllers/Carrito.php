<?php 
	
	class Carrito extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
			
		}

		public function carrito()
		{
			$data['page_id'] = 3;
            $data['page_title']='Carrito';
			
			$this->views->getView($this,"carrito",$data);
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

	}
 ?>