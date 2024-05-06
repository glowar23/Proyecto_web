<?php 

	class ProductosModel extends Mysql
	{
		private $intIdProducto;
		private $strNombre;
		private $strDescripcion;
		private $intCodigo;
		private $intCategoriaId;
		private $strPrecio;
		private $intStock;
		private $intStatus;
		private $strRuta;
		private $strImagen;

		public function __construct()
		{
			parent::__construct();
		}
        public function selectProductos(){
			$sql = "SELECT p.idproductos,
							p.SKU,
							p.nombre_producto,
							p.Descripcion,
							p.categoria_idcategoria ,
							c.nombre as categoria,
							p.precio,
							p.stock,
							p.status 
					FROM productos p 
					INNER JOIN categoria c
					ON p.categoria_idcategoria = c.idcategoria
					WHERE p.status != 0 ";
					$request = $this->select_all($sql);
			return $request;
		}	
    }
?>