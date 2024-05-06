<?php 
require_once("Libraries/Core/Mysql.php");
trait TraitCategoria{
	private $con;

	public function getCategoriasT(string $categorias){
		$this->con = new Mysql();
		$sql = "SELECT idcategoria, nombre, descripcion, portada, ruta
				 FROM categoria WHERE status != 0 AND idcategoria IN ($categorias)";
		$request = $this->con->select_all($sql);
		return $request;
	}

	public function getCategorias(){
		$this->con = new Mysql();
		$sql = "SELECT c.idcategoria, c.nombre, count(p.categoria_idcategoria) AS cantidad
				FROM productos p 
				INNER JOIN categoria c
				ON p.categoria_idcategoria = c.idcategoria
				GROUP BY p.categoria_idcategoria, c.idcategoria";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
		}
		return $request;
	}
}

 ?>