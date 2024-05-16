<?php 
    
    class Mascotas extends Controllers{
        public function __construct() {
            parent::__construct();
            session_start();
            getPermisos(MCATEGORIAS);
        }
        public function mascotas () {
           
			$data['page_tag'] = "Mascotas";
			$data['page_title'] = "Mascotas";
			$data['page_name'] = "mascotas";
			$data['page_functions_js'] = "functions_mascotas.js";
            $data['Mascotas']=$this->model->selectMascotas($_SESSION['userData']['id']);
			$this->views->getView($this,"mascotas",$data);
        }
        public function getMascota($id){
            $arrData = $this->model->selectMascota($id);
                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }
                    echo json_encode($arrResponse);
        }
        public function setMascota() {
            $idmascota = intval($_POST['idRol']);
			$nombreMascota =  strClean($_POST['txtNombre']);
			$tipoMascota = $_POST['listStatus'];

			if($idmascota == 0)
			{
				//Crear
				$request_rol = $this->model->insertMascota($_SESSION['userData']['id'],$nombreMascota ,$tipoMascota);
				$option = 1;
			}else{
				//Actualizar
				$request_rol = $this->model->updateMascota( $nombreMascota , $tipoMascota,$idmascota);
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
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Algo salió mal.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
        }
        public function delMascota()  {
            $arrData = $this->model->deleteMascota($_POST['id']);
            if(empty($arrData))
            {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'Mascota eliminada :(');
            }
            echo json_encode($arrResponse);
            
        }
        
    }