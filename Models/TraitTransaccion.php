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
        public function insertDetalleTransaccion(int $idProducto, $idTransaccion , $cantidad){
            $this->conn =new Mysql();
            $sql="INSERT INTO `detalles_transaccion`(
                `productos_idproductos`,
                `transaccion_idtransaccion`,
                `cantidad`
            )
            VALUES(
                ?,
                ?,
                ?
            )";
            $result=$this->conn->insert($sql,array($idProducto, $idTransaccion , $cantidad));
            return $result;     
        }
    }
    
?>