<?php 
    require_once("Libraries/Core/Mysql.php");
    trait TraitProducto
    {
        private $conn; 
        public function getProductosT(){
            $this->conn =new Mysql();
            $sql="SELECT * FROM `productos` LIMIT 9";
            $request = $this->conn->select_all($sql);
            if ($request>0){
                for ($c=0; $c <count($request) ; $c++) { 
                    $intIdProducto = $request[$c]["idproductos"];    
                    $sqlImg= "SELECT ruta from imagenes where productos_idproductos= $intIdProducto";
                    $arrImagenes = $this->conn->select_all($sqlImg);
                    if (count($arrImagenes)>0){
                        for ($i=0; $i < count($arrImagenes) ; $i++) { 
                            $arrImagenes[$i]['url_image']= media().'/images'.'/'.$arrImagenes[$i]['ruta'];
                            
                        }
                    }
                    $request[$c]['images']=$arrImagenes;    
                }

            }
            return $request;   

        }
    }
    
?>