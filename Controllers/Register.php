<?php 
    class Register extends Controllers{
        public function __construct() {
             session_start();
			 if(isset($_SESSION['login']))
			 {
			 	header('Location: '.base_url());
			 	die();
			}
            parent::__construct();

        }
        public function register () {
            $data["page_tag"]="login";
            $this->views->getView ($this,"register",$data);
        }
        public function postRegister () { 
            $name =$_POST["name"]??'';
            $email = $_POST['txtEmail'] ?? '';
            $password = $_POST['txtPassword'] ?? '';
            $password2 = $_POST['txtPassword2'] ?? '';
            $mascotas=[];
            if (isset($_POST['mascotas'])) {
                $mascotas = $_POST['mascotas'];
            }
            
            $requestUser = $this->model->valUser($name,$email, $password, $password2, $mascotas);
            $captcha = $_POST["g-recaptcha-response"];
            if (empty($captcha)) {
                echo json_encode(array("success"=> 0, "error"=> "El captcha es invalido"));   
                exit;
            }
            if ($requestUser== "-1")     {
                // $secret = '6Lf8c4spAAAAAB-mnu5mTUej5cbugCbxIYe5dPA8';
                echo json_encode(array("success" => 0,"error"=> "No hay datos"));
                exit;
            }
            if ($requestUser=="-2"){
                echo json_encode(array("success" => 0,"error"=> "contraseñas distintas"));
                exit;
            }
            if ($requestUser=="-3"){
                echo json_encode(array("success" => 0,"error"=> "Email existente"));
                exit;
            }
            echo json_encode(array("success"=> 1));
            
            
            

        } 
        
    }


?>