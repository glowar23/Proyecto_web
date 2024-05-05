<?php 
    require_once("Libraries/Core/Mysql.php");
    trait TraitDomicilio
    {
        private $conn; 
        
        public function insertDomicilio(int $idUser,string $calle, string $colonia,string $cp,int $no_ext,int $no_int, string $referencia){
            $this->conn =new Mysql();
            if (empty($calle) || empty($colonia) || empty($cp) || empty($no_ext)|| empty($referencia)){   
                return "-1";
            }
            $sql="INSERT INTO `domicilio`(    
                `usuarios_id`,    
                `calle`,
                `colonia`,
                `codigo_postal`,
                `numero_exterior`,
                `numero_interior`,
                `referencia`
            )
            VALUES(?,?,?,?,?,?,?)";
            
            $result=$this->conn->insert($sql,array($idUser,$calle,$colonia, $cp, $no_ext,$no_int,$referencia));
            return $result;    
        }

        public function selectDomicilios($idU=null){
            $this->conn =new Mysql();
            $idUser = $idU==null?$_SESSION['idUser']:$idU;
            $sql="SELECT * FROM `domicilio` WHERE `usuarios_id` = $idUser";
            $result=$this->conn->select_all($sql);
            
            return $result;    
        }
        public function selectDomicilio($id_domicilio,$idU=null){
            $this->conn =new Mysql();
            $idUser = $idU==null?$_SESSION['idUser']:$idU;
            $sql="SELECT * FROM domicilio WHERE idDomicilio = $id_domicilio AND usuarios_id = $idUser";
            $result=$this->conn->select($sql);
            
            return $result;    
        }
    }
    
?>

