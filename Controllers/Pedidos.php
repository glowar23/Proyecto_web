<?php 
require_once("Models/TraitTransaccion.php"); 
require_once("Models/TraitDomicilios.php"); 
class Pedidos extends Controllers{
	use TraitTransaccion;
    use TraitDomicilio;
	public function __construct()
	{
		parent::__construct();
		session_start();
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
			die();
		}
		getPermisos(MPEDIDOS);
	}
    public function Pedidos()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Pedidos";
		$data['page_title'] = "PEDIDOS Tienda Virtual";
		$data['page_name'] = "pedidos";
		$data['page_functions_js'] = "functions_pedidos.js";
		if ($_SESSION['userData']['idRol'] != 4)$this->views->getView($this,"pedidos",$data);
        else {
			$pedidos=($this->selectPedidos($_SESSION['userData']['id']));
			$ped=[];
			foreach ($pedidos as $p) {
				$ped[]=$this->selectPedido($p['idtransaccion']);
			}
			$data['pedidos']=$ped;
			$this->views->getView($this,"pedidosUser",$data);
		}
	}
    public function getPedidos(){
		if($_SESSION['permisosMod']['r']){
			if ($_SESSION['userData']['idRol'] === 3){
				$idpersona=$_SESSION['userData']['id'];
			}
			$idpersona = "";
			$arrData = $this->selectPedidos($idpersona);
			//dep($arrData);
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['total'] = SMONEY.formatMoney($arrData[$i]['total']);

				
				if($_SESSION['permisosMod']['r']){
					
					$btnView .= ' <a title="Ver Detalle" href="'.base_url().'/pedidos/orden/'.$arrData[$i]['idtransaccion'].'" target="_blanck" class="btn btn-info btn-sm"> <i class="far fa-eye"></i> </a>';

				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idtransaccion'].')" title="Editar pedido"><i class="fas fa-pencil-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
    public function getPedido(int $pedido){
		if($_SESSION['permisosMod']['u']){
			if($pedido == ""){
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{
				$requestPedido = $this->selectPedido($pedido,"");
				if(empty($requestPedido)){
					$arrResponse = array("status" => false, "msg" => "Datos no disponibles.");
				}else{
					$htmlModal = getFile("Generals/Modals/modalPedidos",$requestPedido);
					$arrResponse = array("status" => true, "html" => $htmlModal);
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
    public function orden($idpedido){
		if(!is_numeric($idpedido)){
			header("Location:".base_url().'/pedidos');
		}
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$idpersona = "";
		// if( $_SESSION['userData']['idrol'] == RCLIENTES ){
		// 	$idpersona = $_SESSION['userData']['idpersona'];
		// }
		$data['page_tag'] = "Pedido - Tienda Virtual";
		$data['page_title'] = "PEDIDO Tienda Virtual";
		$data['page_name'] = "pedido";
		$data['arrPedido'] = $this->selectPedido($idpedido,$idpersona);
		$this->views->getView($this,"orden",$data);
	}
	public function setPedido(){
		if($_POST){
			if($_SESSION['permisosMod']['u']){

				$idpedido = !empty($_POST['idpedido']) ? intval($_POST['idpedido']) : "";
				$estado = !empty($_POST['listEstado']) ? strClean($_POST['listEstado']) : "";

				if($idpedido == ""){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
						if($estado == ""){
							$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
						}else{
							$requestPedido = $this->updatePedido($idpedido,$estado);
							if($requestPedido){
								$arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente");
							}else{
								$arrResponse = array("status" => false, "msg" => "No es posible actualizar la información.");
							}
						}
					
					}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

}
?>
