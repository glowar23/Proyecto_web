<?php 
	require_once("Models/TraitProducto.php");
	require_once("Models/TraitTransaccion.php");
	require_once("Models/TraitClientes.php");
	require_once("Models/TraitDomicilios.php");
	class Carrito extends Controllers{
		use TraitClientes, TraitProducto,TraitTransaccion, TraitDomicilio;
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function carrito()
		{
			$data['page_id'] = 3;
            $data['page_title']='Carrito';
			$data['prods']=isset($_SESSION['arrIdProductos'])?$this->getProductosCarrito($_SESSION['arrIdProductos']):array();
			$this->views->getView($this,"carrito",$data);
		}
		public function finT(){
			$resultado1=$this->insertTransaccion($_SESSION['idUser'],$_SESSION['pedido']['subtotal']);
			if($resultado1!=0){
				foreach ($_SESSION['pedido']['productos']as $p) {
					$resultado2=$this->insertDetalleTransaccion($p['idproductos'],intval($resultado1),$p['cantidad']);
				}
			}
			$_SESSION['arrIdProductos']=array();
			header("Location:".base_url());

		}	
		public function agragarCarrito(){
			session_start();
			if (!isset($_SESSION['arrIdProductos'])) {
				// Si no existe, inicializarla como un arreglo vacío
				$_SESSION['arrIdProductos'] = [];
			}
			$array =$_SESSION['arrIdProductos'];
			if (!in_array($_POST['myData'],$array))
			array_push($array,$_POST['myData']);
			$_SESSION['arrIdProductos']=$array;
			echo json_encode($array); 

		}
		public function procesarPago()
		{
			if (!isset($_SESSION['login'])) header("Location:".base_url().'Login');
			$data['page_id'] = 4;
            $data['page_title']='Realizar pedido';
			
			$this->views->getView($this,"procesarTransaccion",$data);
			//header("location:".base_url().'carrito/procesarPago');
		}
		public function seleccionarDomicilio(){
			
				$idUser = $_SESSION['idUser'];
				$data['page_title']='Seleccionar destino';
				$data['domicilios'] = $this->selectDomicilios($idUser);
				$this->views->getView($this,"domicilio",$data);
			
		}
		public function postDomicilio () { 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Obtener los datos del formulario
				$idUser = $_SESSION['idUser'];  // Asegúrate de recibir este dato si es necesario
				$calle = $_POST['domicilio']['calle'] ?? '';
				$colonia = $_POST['domicilio']['colonia'] ?? '';
				$cp = $_POST['domicilio']['postal'] ?? '';
				$no_ext = $_POST['domicilio']['noExt'] ?? 0;
				$no_int = $_POST['domicilio']['noInt'] ?? 0;
				$referencia = $_POST['domicilio']['referencia'] ?? '';
	
				// Validar los datos recibidos
				if (empty($calle) || empty($colonia) || empty($cp) || empty($no_ext)) {
					echo "-1"; // Código de error para indicar datos inválidos
					return;
				}
				if ($no_int == ''){
					$result = $this->insertDomicilio($idUser, $calle, $colonia, $cp, $no_ext, 0, $referencia);
				}
				else{
					// Intentar insertar los datos usando el método del trait
				$result = $this->insertDomicilio($idUser, $calle, $colonia, $cp, $no_ext, $no_int, $referencia);
				}
				
	
				// Devolver resultado
				echo $result;
			} else {
				http_response_code(405); // Método no permitido
				echo "Método no permitido";
			}


            

        } 
		public function postCard () { 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Obtener los datos del formulario
				$idUser = $_SESSION['idUser'];  // Asegúrate de recibir este dato si es necesario
				$titular = $_POST['tarjeta']['nombreTitular'] ?? '';
           		$numero = $_POST['tarjeta']['numeroTarjeta'] ?? '';
            	$exp = $_POST['tarjeta']['expiracion'] ?? ''; //fecha de expiracion de la tarjeta
            	$cvv = $_POST['tarjeta']['cvv'] ?? '';
	
				// Validar los datos recibidos
				if (empty($titular) || empty($numero) || empty($exp) || empty($cvv)) {
					echo "-1"; // ´para verificar si están vacios
					return;
				}
	
				// Intentar insertar los datos usando el método del trait
				$result = $this->insertCard($idUser, $titular, $numero, $exp, $cvv);
	
				// Devolver resultado
				echo $result;
			} else {
				http_response_code(405); // Método no permitido
				echo "Método no permitido";
			}


            

        }

	}
 ?>