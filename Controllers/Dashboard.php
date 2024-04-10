<?php 
    class Dashboard extends Controllers{
		
		public function __construct()
		{
			session_start();
			if($_SESSION['tipoUsuario']!='Admin')
			{
				header('Location: '.base_url());
				die();
			}
            parent::__construct();
			
		}

		public function dashboard()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Estructura";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
            $data[""] = "";
			$this->views->getView($this,"dashboard",$data);
		}
    }
?>