<?php 
    class LoginModel extends Mysql{
        private $intId;
        private $strPassword;
        private $strEmail;
        private $strUsuario;
        private $strTipoUser;   
        public function __construct(){
            parent::__construct();  
        }
           public function loginUsers(string $usuario, string $password){
			$this->strEmail = $usuario;
			$this->strPassword = $password;
			$sql = "SELECT * FROM users WHERE 
					email = '$this->strEmail' and 
					password = '$this->strPassword'";
			$request = $this->select($sql);
			return $request;
        
		}
     
        
        


    }


?>