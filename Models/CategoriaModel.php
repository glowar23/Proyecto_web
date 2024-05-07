<?php 
    class CategoriaModel extends Mysql
	{
        public $intIdcategoria;
		public $strCategoria;
		public $strDescripcion;
		public $intStatus;
		public function __construct()
		{
			parent::__construct();
		}
        public function deepscan($id){
            $sql_2 = "SELECT idcategoria FROM categoria WHERE parent_id ='".$id."'";
            $result_2 = $this->select_all($sql_2);;
            $array=$id;
            if (!empty($result_2)){
                foreach ($result_2 as $a2) {
                    $que[] = $a2['idcategoria'];
                }
            }
            if(!empty($que)){
                $key = array_search($id,$que);
               if ($key != '') { unset($que[$key]); }
                foreach ($que as $id2){   
                //Volvemos y alimentamos la variable $array ahora con las categorias hijas de la ya encontrada y que ya esta incluida en la variable array
                    $array .= ','.$this->deepscan($id2);
                }
            }
            return $array;
        }
        public function inserCategoria(string $nombre, string $descripcion, int $status){

			$return = 0;
			$this->strCategoria = $nombre;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM categoria WHERE nombre = '{$this->strCategoria}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO categoria(nombre,descripcion,status) VALUES(?,?,?)";
	        	$arrData = array($this->strCategoria, 
								 $this->strDescripcion, 
								 $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectCategorias()
		{
			$sql = "SELECT * FROM categoria 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCategoria(int $idcategoria){
			$this->intIdcategoria = $idcategoria;
			$sql = "SELECT * FROM categoria
					WHERE idcategoria = $this->intIdcategoria";
			$request = $this->select($sql);
			return $request;
		}

		public function updateCategoria(int $idcategoria, string $categoria, int $status){
			$this->intIdcategoria = $idcategoria;
			$this->strCategoria = $categoria;
			$this->intStatus = $status;

			$sql = "SELECT * FROM categoria WHERE nombre = '{$this->strCategoria}' AND idcategoria != $this->intIdcategoria";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE categoria SET nombre = ?, status = ? WHERE idcategoria = $this->intIdcategoria ";
				$arrData = array($this->strCategoria, 
								 $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteCategoria(int $idcategoria)
		{
			$this->intIdcategoria = $idcategoria;
			$sql = "SELECT * FROM productos WHERE categoria_idcategoria = $this->intIdcategoria";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE categoria SET status = ? WHERE idcategoria = $this->intIdcategoria ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}	
	
	}
    



?>