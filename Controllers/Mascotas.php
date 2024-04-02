<?php
    class Mascotas extends Controllers{
        public function __construct() {
            parent::__construct();  
        }
        public function mascotas($params) {
            echo "hola desde perro y desde mascotas";
        }  

    }
    

?>