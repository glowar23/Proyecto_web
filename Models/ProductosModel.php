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
        
		public function selectImages(int $idproducto){
			$this->intIdProducto = $idproducto;
			$sql = "SELECT productos_idproductos,ruta as img
					FROM imagenes
					WHERE productos_idproductos = $this->intIdProducto";
			$request = $this->select_all($sql);
			return $request;
		}
		public function insertImage(int $idproducto, string $imagen){
			$this->intIdProducto = $idproducto;
			$this->strImagen = $imagen;
			$query_insert  = "INSERT INTO imagenes(productos_idproductos,ruta) VALUES(?,?)";
	        $arrData = array($this->intIdProducto,
        					$this->strImagen);
	        $request_insert = $this->insert($query_insert,$arrData);
	        return $request_insert;
		}
		public function deleteImage(int $idproducto, string $imagen){
			$this->intIdProducto = $idproducto;
			$this->strImagen = $imagen;
			$query  = "DELETE FROM imagenes 
						WHERE productos_idproductos = $this->intIdProducto 
						AND ruta = '{$this->strImagen}'";
	        $request_delete = $this->delete($query);
	        return $request_delete;
		}
		
		public function insertProducto(string $nombre, string $descripcion, string $codigo, int $categoriaid, string $precio, int $stock, string $ruta, int $status){
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->intCodigo = $codigo;
			$this->intCategoriaId = $categoriaid;
			$this->strPrecio = $precio;
			$this->intStock = $stock;
			$this->strRuta = $ruta;
			$this->intStatus = $status;
			$return = 0;
			$sql = "SELECT * FROM productos WHERE SKU = '{$this->intCodigo}'";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$query_insert  = "INSERT INTO productos(categoria_idcategoria,
														SKU,
														nombre_producto,
														Descripcion,
														precio,
														stock,
														ruta,
														status) 
								  VALUES(?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->intCategoriaId,
        						$this->intCodigo,
        						$this->strNombre,
        						$this->strDescripcion,
        						$this->strPrecio,
        						$this->intStock,
        						$this->strRuta,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function updateProducto(int $idproducto, string $nombre, string $descripcion, string $codigo, int $categoriaid, string $precio, int $stock, string $ruta, int $status){
			$this->intIdProducto = $idproducto;
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->intCodigo = $codigo;
			$this->intCategoriaId = $categoriaid;
			$this->strPrecio = $precio;
			$this->intStock = $stock;
			$this->strRuta = $ruta;
			$this->intStatus = $status;
			$return = 0;
			$sql = "SELECT * FROM productos WHERE SKU = '{$this->intCodigo}' AND idproductos != $this->intIdProducto ";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE productos
						SET categoria_idcategoria=?,
							SKU=?,
							nombre_producto=?,
							Descripcion=?,
							precio=?,
							stock=?,
							ruta=?,
							status=? 
						WHERE idproductos = $this->intIdProducto ";
				$arrData = array($this->intCategoriaId,
        						$this->intCodigo,
        						$this->strNombre,
        						$this->strDescripcion,
        						$this->strPrecio,
        						$this->intStock,
        						$this->strRuta,
        						$this->intStatus);

	        	$request = $this->update($sql,$arrData);
	        	$return = $request;
			}else{
				$return = "exist";
			}
	        return $return;
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
		public function selectProducto(int $idproducto){
			$this->intIdProducto = $idproducto;
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
					WHERE idproductos = $this->intIdProducto";
			$request = $this->select($sql);
			return $request;

		}
		public function deleteProducto(int $idproducto){
			$this->intIdProducto = $idproducto;
			$sql = "UPDATE productos SET status = ? WHERE idproductos = $this->intIdProducto ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
    }
	
?>