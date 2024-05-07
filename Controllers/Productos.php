<?php 
	require_once("Models/TraitProducto.php");
	class Productos extends Controllers{
		use TraitProducto;
		public function __construct()
		{
			parent::__construct();
			session_start();
			getPermisos(MPRODUCTOS);
		}

		public function productos()
		{
			$data['page_tag'] = "Productos";
			$data['page_title'] = "PRODUCTOS <small>Tienda Virtual</small>";
			$data['page_name'] = "productos";
			$data['page_functions_js'] = "functions_productos.js";
			if($_SESSION['userData']['idRol']==3)$this->views->getView($this,"productosAdmin",$data);
			else $this->views->getView($this,"productos",$data);
		}
		public function producto($id){
            if(empty($id)){
				echo $id;
                //header("Location:".base_url());
			}else{
				$data['producto'] = $this->getProducto($id);
				$data['page_tag'] = NOMBRE_EMPESA." - ".$data['producto']['nombre_producto'];
				$data['page_title'] = NOMBRE_EMPESA." - ".$data['producto']['nombre_producto'];
				$data['page_name'] = "producto";
				$this->views->getView($this,"producto",$data);
			}

        }

	}
 ?>