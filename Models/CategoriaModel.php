<?php 
    class CategoriaModel extends Mysql
	{
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
	}
    



?>