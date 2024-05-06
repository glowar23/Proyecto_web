<?php 
	require_once("Models/TraitProducto.php");
    require_once("Models/TraitCategorias.php");
	class Tienda extends Controllers{
     
        use TraitProducto;
        use TraitCategoria;	
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function tienda()
		{
			$data['page_id'] = 3;
			$data['page_tag'] = "Estructura";
			$data['page_title'] = "MyPets";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			// $data["products"] = $this->getProductosT();
			$this->views->getView($this,"home",$data);
		}
        public function categoria($params ){
            if(empty($params)){
				echo $params;
                //header("Location:".base_url());
			}else{

				$arrParams = explode(",",$params);
				$idcategoria = intval($arrParams[0]);
				$pagina = 1;
				if(count($arrParams) > 1 AND is_numeric($arrParams[1])){
					$pagina = $arrParams[1];
				}

				$cantProductos = $this->cantProductos($idcategoria);
				$total_registro = $cantProductos['total_registro'];
				$desde = ($pagina-1) * PROCATEGORIA;
				$total_paginas = ceil($total_registro / PROCATEGORIA);
				$infoCategoria = $this->getProductosCategoriaT($idcategoria,$desde,PROCATEGORIA);
				$categoria = strClean($params);
				$data['page_tag'] = NOMBRE_EMPESA." - ".$infoCategoria['categoria'];
				$data['page_title'] = $infoCategoria['categoria'];
				$data['page_name'] = "categoria";
				$data['productos'] = $infoCategoria['productos'];
				$data['infoCategoria'] = $infoCategoria;
				$data['pagina'] = $pagina;
				$data['total_paginas'] = $total_paginas;
				$data['categorias'] = $this->getCategorias();
				$this->views->getView($this,"categoria",$data);
			}

        }
		public function producto($params){
			if(empty($params)){
				header("Location:".base_url());
			}else{
				$arrParams = explode(",",$params);
				$idproducto = intval($arrParams[0]);
				$ruta = strClean($arrParams[1]);
				$infoProducto = $this->getProductoT($idproducto,$ruta);
				if(empty($infoProducto)){
					header("Location:".base_url());
				}
				$data['page_tag'] = NOMBRE_EMPESA." - ".$infoProducto['nombre'];
				$data['page_title'] = $infoProducto['nombre'];
				$data['page_name'] = "producto";
				$data['producto'] = $infoProducto;
				$data['productos'] = $this->getProductosRandom($infoProducto['categoriaid'],8,"r");
				$this->views->getView($this,"producto",$data);
			}
		}
       

	}
 ?>