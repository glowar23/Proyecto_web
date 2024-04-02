<?php 
	require_once("Models/TraitProducto.php");
	class Home extends Controllers{
		use TraitProducto;	
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function home()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Estructura";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$data["products"] = $this->getProductosT();
			$this->views->getView($this,"home",$data);
		}

	}
 ?>