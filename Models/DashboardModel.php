<?php 
    class DashboardModel extends Mysql
	{
        function getCantidadTotalProductos(){
            $sql="SELECT SUM(cantidad) AS total_productos_vendidos FROM detalles_transaccion;";
            $request=$this->select($sql);
            return $request;
        }
        public function getIngresoTotal() {
            $sql = "SELECT SUM(cantidad * precio * (1 - descuento)) AS ingreso_total FROM detalles_transaccion;";
            $request = $this->select($sql);
            return $request;
        }
    
        public function getNumeroTransacciones() {
            $sql = "SELECT COUNT(DISTINCT transaccion_idtransaccion) AS numero_transacciones FROM detalles_transaccion;";
            $request = $this->select($sql);
            return $request;
        }
    
        public function getPromedioProductosPorTransaccion() {
            $sql = "SELECT AVG(cantidad) AS promedio_transaccion FROM detalles_transaccion;";
            $request = $this->select($sql);
            return $request;
        }
    
        public function getValorPromedioVenta() {
            $sql = "SELECT AVG(precio * (1 - descuento)) AS valor_promedio_venta FROM detalles_transaccion;";
            $request = $this->select($sql);
            return $request;
        }
    
        public function getProductoMasVendido() {
            $sql = "SELECT productos_idproductos, SUM(cantidad) AS cantidad_total, nombre_productos 
            FROM detalles_transaccion inner JOIN productos on productos_idproductos=idproductos
            GROUP BY productos_idproductos 
            ORDER BY cantidad_total DESC 
            LIMIT 1;";
            $request = $this->select($sql);
            return $request;
        }
    }

?>

