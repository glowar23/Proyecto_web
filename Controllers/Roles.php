<?php 
	
	class Roles extends Controllers{
		
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
		public function getRoles()
		{
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$arrData = $this->model->selectRoles();

				for ($i=0; $i < count($arrData); $i++) {

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success text-black">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					
						//$btnView = '<button class="btn btn-secondary btn-sm btnPermisosRol" onClick="fntPermisos('.$arrData[$i]['idrol'].')" title="Permisos"><i class="fas fa-key"></i></button>';
						//$btnEdit = '<button class="btn btn-primary btn-sm btnEditRol" onClick="fntEditRol('.$arrData[$i]['idrol'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idRol'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
					</div>';
					
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			
			die();
		}
		public function setRol(){
			$intIdrol = intval($_POST['idRol']);
			$strRol =  strClean($_POST['txtNombre']);
			$strDescipcion = strClean($_POST['txtDescripcion']);
			$intStatus = intval($_POST['listStatus']);
			$request_rol = "";
		
				//Crear
				
					$request_rol = $this->model->insertRol($strRol, $strDescipcion,$intStatus);
					$option = 1;
			

			if($request_rol > 0 )
			{
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	

	}
}
 ?>