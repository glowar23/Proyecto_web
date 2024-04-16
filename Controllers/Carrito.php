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
			
			echo $_POST['myData']; 

		}

	}
 ?>