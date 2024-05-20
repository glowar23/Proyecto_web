<?php 
    require_once("Libraries/Core/Mysql.php");
    trait TraitTransaccion
    {
        private $conn; 
        
        public function insertTransaccion(int $idUser, $total, $tarjeta,$domicilio){
            $this->conn =new Mysql();
            $sql="INSERT INTO `transaccion`(    
                `total`,    
                `usuarios_id`,
                `id_tarjeta`,
                `id_domicilio`
            )
            VALUES(
                ?,
                ?,
                ?,
                ?
            )";
            $result=$this->conn->insert($sql,array($total,$idUser,$tarjeta,$domicilio));
            return $result;
        }
		public function getStock(int $idProducto){
			$this->conn = new Mysql();
			$sql = "SELECT stock FROM productos WHERE idproductos =". $idProducto;
			$request = $this->conn->select($sql);
			return ($request);
		}
		public function updateStock(int $nuevoStock, int $idProducto){
			$this->conn = new Mysql();
			$sql = "UPDATE productos SET stock = ? WHERE idproductos =". $idProducto;
			$arrData = array($nuevoStock);
			$request_insert = $this->conn->update($sql,$arrData);
			return $request_insert;
		}
        public function insertDetalleTransaccion(int $idProducto, $idTransaccion , $cantidad,$precio){
            $this->conn =new Mysql();
            $sql="INSERT INTO `detalles_transaccion`(
                `productos_idproductos`,
                `transaccion_idtransaccion`,
                `cantidad`,`precio`
            )
            VALUES(
                ?,
                ?,
                ?,?
            )";
            $result=$this->conn->insert($sql,array($idProducto, $idTransaccion , $cantidad,$precio));
            return $result;     
        }
        public function selectPedidos($idpersona = null){
			$this->conn =new Mysql();
            $where = "";
			if($idpersona != null){
				$where = " WHERE p.usuarios_id = ".$idpersona;
			}
			$sql = "SELECT p.idtransaccion,
							DATE_FORMAT(p.fecha_hora, '%d/%m/%Y') as fecha,
							p.total,
							p.status 
					FROM transaccion p $where ";
			$request = $this->conn->select_all($sql);
			return $request;

		}
        public function selectPedido(int $idpedido, $idpersona = NULL){
			$this->conn =new Mysql();
            $busqueda = "";
			if($idpersona != NULL){
				$busqueda = " AND p.usuario_id =".$idpersona;
			}
			$request = array();
			$sql = "SELECT p.idtransaccion,
							p.usuarios_id,
							DATE_FORMAT(p.fecha_hora, '%d/%m/%Y') as fecha,
							p.total,
							p.status,
                            p.id_domicilio,
                            p.id_tarjeta
					FROM transaccion as p
					where p.idtransaccion =  $idpedido ".$busqueda;
			$requestPedido = $this->conn->select($sql);
			if(!empty($requestPedido)){
				$idpersona = $requestPedido['usuarios_id'];
				$sql_cliente = "SELECT id,
										name,
										email
								FROM users WHERE id = $idpersona ";
				$requestcliente = $this->conn->select($sql_cliente);
				$sql_detalle = "SELECT p.idproductos,
											p.nombre_producto as producto,
											d.precio,
											d.cantidad
									FROM detalles_transaccion d
									INNER JOIN productos p
									ON d.productos_idproductos = p.idproductos
									WHERE d.transaccion_idtransaccion = $idpedido";
				$requestProductos = $this->conn->select_all($sql_detalle);
                $sqlDireccion="SELECT * FROM domicilio WHERE idDomicilio =".$requestPedido['id_domicilio'];
				$requestDireccion = $this->conn->select($sqlDireccion);
				$request = array('cliente' => $requestcliente,
								'orden' => $requestPedido,
								'detalle' => $requestProductos,
                                'direccion'=>$requestDireccion
							);
			}
			return $request;
		}
		public function updatePedido(int $idpedido, string $estado){
			$this->conn =new Mysql();
			$query_insert  = "UPDATE transaccion SET status = ?  WHERE idtransaccion = $idpedido ";
			$arrData = array($estado);
			$request_insert = $this->conn->update($query_insert,$arrData);
			return $request_insert;
		}


    }
    
?>