<?php 
    
    class Categoria extends Controllers{
        public function __construct() {
            parent::__construct();
        }
        public function categoria () {
            $data["page_tag"]="login"; 
            echo $this->model->deepscan(2);  
            $this->views->getView ($this,"categoria",$data);
        }
        

    } 
    
?>