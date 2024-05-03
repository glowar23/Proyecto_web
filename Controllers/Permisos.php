<?php 
	
	class Permisos extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function roles()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Estructura";
			$data['page_title'] = "Roles";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"roles",$data);
		}
        public function getPermisosRol($idrol){
            $rolid = intval($idrol);
			if($rolid > 0)
			{
				$arrModulos = $this->model->selectModulos();
				$arrPermisosRol = $this->model->selectPermisosRol($rolid);
				$arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
				$arrPermisoRol = array('idrol' => $rolid );

				if(empty($arrPermisosRol))
				{
					for ($i=0; $i < count($arrModulos) ; $i++) { 

						$arrModulos[$i]['permisos'] = $arrPermisos;
					}
				}else{
					for ($i=0; $i < count($arrModulos); $i++) {

						$arrPermisos = array('r' => $arrPermisosRol[$i]['r'], 
											 'w' => $arrPermisosRol[$i]['w'], 
											 'u' => $arrPermisosRol[$i]['u'], 
											 'd' => $arrPermisosRol[$i]['d'] 
											);
						if($arrModulos[$i]['idmodulo'] == $arrPermisosRol[$i]['moduloid'])
						{
							$arrModulos[$i]['permisos'] = $arrPermisos;
						}
					}
				}
				$arrPermisoRol['modulos'] = $arrModulos;
				$html = getModal("modalPermisos",$arrPermisoRol);
				//dep($arrPermisoRol);

			}
			die();

        }
		
	
    }
?>