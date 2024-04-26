<?php
require_once ("Models/TraitProducto.php");
require_once ("Models/TraitTransaccion.php");
require_once ("Models/TraitClientes.php");
require_once ("Models/TraitDomicilios.php");
class Carrito extends Controllers
{
	use TraitClientes, TraitProducto, TraitTransaccion, TraitDomicilio;
	public function __construct()
	{
		parent::__construct();
		session_start();
	}

	public function carrito()
	{
		$data['page_id'] = 3;
		$data['page_title'] = 'Carrito';
		if (isset($_SESSION['arrIdProductos']) && count($_SESSION['arrIdProductos'])!=0){
			
			$idsUnicos = [];
			$items=array_values($_SESSION['arrIdProductos']);
			foreach ($items as $item) {
				$idsUnicos[] = intval($item['id']);
			}
			$data['prods'] = isset($_SESSION['arrIdProductos']) ? $this->getProductosCarrito($idsUnicos) : array();	
		}
		$this->views->getView($this, "carrito", $data);
	}
	public function finT()
	{
			$domicilio = $_SESSION['iddomicilio'];
			$tarjeta = $_SESSION['idTarjeta'];
			
		$resultado1 = $this->insertTransaccion($_SESSION['idUser'], $_SESSION['pedido']['subtotal']);
		if ($resultado1 != 0) {
			foreach ($_SESSION['pedido']['productos'] as $p) {
				$resultado2 = $this->insertDetalleTransaccion($p['idproductos'], intval($resultado1), $p['cantidad']);
			}
		}
		$_SESSION['arrIdProductos'] = array();
		header("Location:" . base_url());

	}
	public function eliminarProducto($id){
		$arreglo=$_SESSION['arrIdProductos'];
		foreach ($arreglo as $indice => $elemento) {
			if ($elemento['id'] === $id) {
				unset($arreglo[$indice]);
				break; // Detener el bucle una vez que se elimine el elemento
			}
		}
		$_SESSION['arrIdProductos']=$arreglo;
		
		header('Location:'.base_url().'carrito');

	}
	public function sumarCantidad($id){
		$arreglo=$_SESSION['arrIdProductos'];
		foreach ($arreglo as $indice => $elemento) {
			if ($elemento['id'] === $id) {
				$arreglo[$indice]['cantidad']+=1;
				break; // Detener el bucle una vez que se elimine el elemento
			}
		}
		$_SESSION['arrIdProductos']=$arreglo;
		
		header('Location:'.base_url().'carrito');
	}
	public function restarCantidad($id){

		$arreglo=$_SESSION['arrIdProductos'];
		foreach ($arreglo as $indice => $elemento) {
			if ($elemento['id'] === $id) {
				if ($arreglo[$indice]['cantidad']>1)$arreglo[$indice]['cantidad']-=1;
				break; // Detener el bucle una vez que se elimine el elemento
			}
		}
		$_SESSION['arrIdProductos']=$arreglo;
		header('Location:'.base_url().'carrito');
	}
	public function agragarCarrito(){
		session_start();
		if (!isset($_SESSION['arrIdProductos'])) {
			// Si no existe, inicializarla como un arreglo vacío
			$_SESSION['arrIdProductos'] = [];
		}
		$array = $_SESSION['arrIdProductos'];
		$item =["id"=>$_POST['myData'], "cantidad"=>1];
		array_push($array, $item);
		$itemsAgrupados = [];
		foreach ($array as $item) {
			if (isset($itemsAgrupados[$item['id']])) {
				$itemsAgrupados[$item['id']]['cantidad'] += $item['cantidad'];
			} else {
				$itemsAgrupados[$item['id']] = $item;
			}
		}
		$_SESSION['arrIdProductos'] = $itemsAgrupados;

	}
	public function procesarPago()
	{
		if (!isset($_SESSION['login']))
			header("Location:" . base_url() . 'Login');
		$data['page_id'] = 4;
		$data['page_title'] = 'Realizar pedido';

		$this->views->getView($this, "procesarTransaccion", $data);
		//header("location:".base_url().'carrito/procesarPago');
	}
	public function procesarPagoo()
	{
		if(isset($_POST['id_tarjeta']) && isset($_POST['domicilio'])) {
			// Recuperar los valores de los parámetros
			$id_tarjeta = $_POST['id_tarjeta'];
			$domicilio = $_POST['domicilio'];
			// Suponiendo que estas funciones hacen consultas a la base de datos para recuperar datos
			$data['domicilio'] = $this->selectDomicilio($domicilio); // Asegúrate de que 'domiclio' es intencional y no un error tipográfico de 'domicilio'
			$data['tarjeta'] = $this->selectTarjeta($id_tarjeta);
			$data['page_id'] = 4;
			$data['page_title'] = 'Realizar pedido';
			echo json_encode($data['tarjeta']);
			echo json_encode($data['domicilio']);
			// Cargar la vista correspondiente
			$_SESSION['domicilio']=$data['domicilio'];
			$_SESSION['tarjeta']=$data['tarjeta'];
		} else {
			// Si no se recibieron los parámetros esperados, puedes devolver un error o realizar otra acción según tu lógica de negocio
			echo "Error: Parámetros faltantes en la solicitud.";
		}
}



	public function seleccionarDomicilio()
	{
		if (!isset($_SESSION['login'])) header("Location:".base_url().'login');
		$data['page_title'] = 'Seleccionar destino';
		$data['domicilios'] = $this->selectDomicilios();
		$this->views->getView($this, "domicilio", $data);

	}
	public function postDomicilio()
	{
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
			if ($no_int == '') {
				$result = $this->insertDomicilio($idUser, $calle, $colonia, $cp, $no_ext, 0, $referencia);
			} else {
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

	public function seleccionarTarjeta()
	{
		$data['page_title'] = 'Seleccionar Tarjeta';
		$data['tarjetas'] = $this->getCards();
		#echo $id_domicilio;
		$this->views->getView($this, "tarjeta", $data);

	}
	public function postCard()
	{
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