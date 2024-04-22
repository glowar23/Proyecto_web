<?php 
require_once("Libraries/Core/Mysql.php");
trait TraitClientes{
	private $con;
	private $intIdUsuario;
	private $strNombre;
	private $strApellido;
	private $intTelefono;
	private $strEmail;
	private $strPassword;
	private $strToken;
	private $intTipoId;
	private $intIdTransaccion;
    public function insertPedido($idUser){
		$this->con = new Mysql();
		$query_insert  = "INSERT INTO transaccion(null, DEFAULT ,iduser) 
							  VALUES(?)";
		$arrData = array($idUser
    					);
		$request_insert = $this->con->insert($query_insert,$arrData);
	    $return = $request_insert;
	    return $return;
	}
    public function insertDetalle(int $idpedido, int $productoid, int $cantidad){
		$this->con = new Mysql();
		$query_insert  = "INSERT INTO detalles_transaccion(productos_idproductos,transaccion_idtransaccion,cantidad) 
							  VALUES(?,?,?)";
		$arrData = array($productoid,
    					$idpedido,
						$cantidad
					);
		$request_insert = $this->con->insert($query_insert,$arrData);
	    $return = $request_insert;
	    return $return;
	}
	public function insertCard(int $idUser, string $titular, string $no_tarjeta, string $exp, int $cvv){
		$this->con = new Mysql();
		$query_insert  = "INSERT INTO tarjetas(titular, no_tarjeta, expiracion, cvv, id_usuarios) 
							  VALUES(?,?,?,sha256(?),?)";
		$arrData = array($titular,
						$no_tarjeta,
						$exp,
						$cvv,
						$idUser);
		$request_insert = $this->con->insert($query_insert,$arrData);
	    $return = $request_insert;
	    return $return;
	}
	public function getCards(){
		$this->con = new Mysql();
		$idUser = $_SESSION['idUser'];
		$query = "SELECT * FROM tarjetas WHERE id_usuarios = $idUser";
		$request = $this->con->select_all($query);
		$return = $request;
		return  $return;
	}
	public function selectTarjeta(int $id_tarjeta){
		$this->con = new Mysql();
		$idUser = $_SESSION['idUser'];
		$query = "SELECT * FROM tarjetas WHERE id_tarjeta = $id_tarjeta AND id_usuarios = $idUser";
		$request = $this->con->select($query);
		$return = $request;
		return  $return;
	}
}
    
?>