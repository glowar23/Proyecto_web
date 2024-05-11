<?php 
	
	class Roles extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
			session_start();
			getPermisos(MUSUARIOS);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url());
			}
			
			//echo json_encode($_SESSION['permisos']);
		}
		

		public function Roles()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Estructura";
			$data['page_title'] = "Roles";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$data['page_functions_js'] = "functions_roles.js";
			$this->views->getView($this,"roles",$data);
		}
		public function getSelectRoles()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectRoles();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idRol'].'">'.$arrData[$i]['nombreRol'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
		public function getRoles()
		{
			if(!$_SESSION['permisosMod']['r']){ die();}
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$arrData = $this->model->selectRoles();
				for ($i=0; $i < count($arrData); $i++) {

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge bg-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge bg-danger">Inactivo</span>';
					}

					if($_SESSION['permisosMod']['u']){
						$btnView = '<button class="btn btn-secondary btn-sm btnPermisosRol" rl="'.$arrData[$i]['idRol'].'" onClick="fntPermisos('.$arrData[$i]['idRol'].')" title="Permisos"><i class="fas fa-key"></i></button>';
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditRol" rl="'.$arrData[$i]['idRol'].'" onClick="fntEditRol('.$arrData[$i]['idRol'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['idRol'].'" onClick="fntDelRol('.$arrData[$i]['idRol'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
					</div>';
					}
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

			if($intIdrol == 0)
			{
				//Crear
				$request_rol = $this->model->insertRol($strRol, $strDescipcion,$intStatus);
				$option = 1;
			}else{
				//Actualizar
				$request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescipcion, $intStatus);
				$option = 2;
			}

			if($request_rol > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				}
			}else if($request_rol == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

	public function getRol(int $idrol)
		{
			$intIdrol = intval(strClean($idrol));
			if($intIdrol > 0)
			{
				$arrData = $this->model->selectRol($intIdrol);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delRol(){	
			if($_POST){
				$intIdrol = intval($_POST['idrol']);
				$requestDelete = $this->model->deleteRol($intIdrol);
				if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Rol asociado a usuarios.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	
}
 ?>