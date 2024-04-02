<?php 
    require_once("Libraries/Core/Mysql.php");
    trait TraitProducto
    {
        private $conn; 
        public function getProductosT(){
            $this->conn =new Mysql();
            $sql="SELECT * FROM `productos`";
            $request = $this->conn->select_all($sql);
            return $request;   

        }
    }
    
?>