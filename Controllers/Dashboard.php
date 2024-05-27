<?php 
    class Dashboard extends Controllers{
		
		public function __construct()
		{
			session_start();
			if(empty($_SESSION['permisos'][1]['r']))
			{
				header('Location: '.base_url());
				die();
			}
            parent::__construct();
			getPermisos(MDASHBOARD);	
		}

		public function dashboard()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url());
			}
			$data['page_id'] = 1;
			$data['page_tag'] = "Estructura";
			$data['page_title'] = "Página administrativa";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$data['productosVendidos']=$this->model->getCantidadTotalProductos();
			$data['ingresos']=$this->model->getIngresoTotal();
			$data['ntransacciones']=$this->model->getNumeroTransacciones();
			$data['pedMean']=$this->model->getPromedioProductosPorTransaccion();
            
			$this->views->getView($this,"dashboard",$data);
		}
    }
?>