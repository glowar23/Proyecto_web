<?php 
    require_once("Libraries/Core/Mysql.php");
    trait TraitProducto
    {
        private $conn; 
        private $strCategoria;
        private $intIdcategoria;
        private $intIdProducto;
        private $strProducto;
        private $cant;
        private $option;
        private $strRuta;
        private $strRutaCategoria;
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
        public function getProductosCarrito($arrProd){
            $ids="";
            foreach ($arrProd as $p) {
                $ids=$ids.$p.',';
            }
            $ids = substr($ids, 0, -1);

            $this->conn =new Mysql();
            $sql="SELECT * FROM `productos` where idproductos in($ids)";
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
        public function getProductosCategoriaT(int $idcategoria, $desde = null, $porpagina = null){
            $this->intIdcategoria = $idcategoria;
            $where = "";
            if(is_numeric($desde) AND is_numeric($porpagina)){
                $where = " LIMIT ".$desde.",".$porpagina;
            }
    
            $this->conn = new Mysql();
            $sql_cat = "SELECT idcategoria,nombre FROM categoria WHERE idcategoria = '{$this->intIdcategoria}'";
            
            $request = $this->conn->select($sql_cat);
            if(!empty($request)){
                $this->strCategoria = $request['nombre'];
                $sql = "SELECT p.idproductos,
                                p.nombre_producto,
                                p.Descripcion,
                                p.categoria_idcategoria,
                                c.nombre as categoria,
                                p.precio,
                                p.stock
                        FROM productos p 
                        INNER JOIN categoria c
                        ON p.categoria_idcategoria = c.idcategoria
                        WHERE p.categoria_idcategoria = $this->intIdcategoria
                        ORDER BY p.idproductos DESC ".$where;
                        $request = $this->conn->select_all($sql);
                        if(count($request) > 0){
                            for ($c=0; $c < count($request) ; $c++) { 
                                $intIdProducto = $request[$c]['idproductos'];
                                $sqlImg = "SELECT ruta
                                        FROM imagenes
                                        WHERE productos_idproductos = $intIdProducto";
                                $arrImg = $this->con->select_all($sqlImg);
                                if(count($arrImg) > 0){
                                    for ($i=0; $i < count($arrImg); $i++) { 
                                        $arrImg[$i]['url_image'] = media().'/images/'.$arrImg[$i]['ruta'];
                                    }
                                }
                                $request[$c]['images'] = $arrImg;
                            }
                        }
                $request = array('idcategoria' => $this->intIdcategoria,
                                    'categoria' => $this->strCategoria,
                                    'productos' => $request
                                );
    
            }
            return $request;
        }
        public function cantProductos($categoria = null){
            $where = "";
            if($categoria != null){
                $where = "where categoria_idcategoria = ".$categoria.';';
            }
            $this->con = new Mysql();
            $sql = "SELECT COUNT(*) as total_registro FROM productos ".$where;
            $result_register = $this->con->select($sql);
            $total_registro = $result_register;
            return $total_registro;
    
        }

    }
    
?>