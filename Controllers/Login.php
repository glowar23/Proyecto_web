<?php 
    class Login extends Controllers{
        public function __construct() {
            session_start();
			if(isset($_SESSION['login']))
			{
				header('Location: '.base_url());
				die();
			}
            parent::__construct();

        }
        public function login () {
            $data["page_tag"]="login";
            $this->views->getView ($this,"login",$data);
        }
        public function loginUser () { 
            

            $username = $_POST['txtEmail'] ?? '';
            $password = $_POST['txtPassword'] ?? '';
            $requestUser = $this->model->loginUsers($username, $password);
            // Aquí implementarías la lógica para validar las credenciales contra una base de datos o fuente de datos.
            // A modo de ejemplo, usaremos credenciales estáticas:
            
            if (!empty($requestUser)) {  
                  
                $_SESSION['name'] = $requestUser['name'];
                $_SESSION['idUser'] = $requestUser['id'];
                $_SESSION['tipoUsuario'] = $requestUser['tipo_usuario'];
                $_SESSION['login'] = true;
                echo json_encode(array("success" => 1));

            } else {
                
                echo json_encode(array("success" => 0,"error"=> $password));
            }
        }
        
    }


?>