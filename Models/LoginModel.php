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
            if (!empty($request)){
                $id=$request['id'];
                $sql = "UPDATE users set last_login=DEFAULT where id= ?";
                $request2 = $this->update($sql,array($id));

            }
			return $request;
        
		}
     
        
        


    }


?>