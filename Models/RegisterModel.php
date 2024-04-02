<?php 
    class RegisterModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }
        public function valUser (string $name, string $email, string $password, string $password2){   
            if (empty($name) || empty($email) || empty($password) || empty($password2)){   
                return "-1";
            }
            if ($password!=$password2){
                return "-2";
                
            }
            $sql = "select * from users where email='$email'; ";
            $result = $this->select($sql);
            if (!empty($result)){
                return "-3";
            }    
            else{
                $sql="INSERT INTO `users`(
                    `name`,
                    `password`,
                    `email`
                )
                VALUES(
                   ?,?,?
                )";
                $result = $this->insert($sql,array($name,$password,$email));
                
                $_SESSION['idUser'] = $result;
                $_SESSION['login'] = true;  
                
                
            }
        }

    }


?>