<?php 
    class RegisterModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }
        public function valUser (string $name, string $email, string $password, string $password2, $mascotas){   
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
                if (!empty($mascotas)){
                    foreach ($mascotas as $mascota) {
                        $sql= "INSERT INTO `mascotas`(
                            `usuarios_id`,
                            `tipo_animal`
                        )
                        VALUES(
                            ?,?
                        );";    
                        $result2= $this->insert($sql, array($result,$mascota));       
                    }
                     
                }
                $_SESSION['name'] = $name;
                $_SESSION['idUser'] = $result;
                $_SESSION['tipoUsuario'] = 'Cliente';
                $_SESSION['login'] = true;  
                sessionUser($result);
                
            }
        }

    }


?>