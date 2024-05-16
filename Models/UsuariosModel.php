<?php 

	class UsuariosModel extends Mysql
	{
		private $intIdUsuario;

		private $strNombre;
		private $strEmail;
		private $strPassword;
		
		private $intTipoId;
		private $intStatus;

		public function __construct()
		{
			parent::__construct();
		}
        public function selectUsuarios()
		{
			$whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and p.id != 1 ";
			}
			$sql = "SELECT p.id,p.name,p.email,p.status,r.idRol,r.nombreRol 
					FROM users p 
					INNER JOIN rol r
					ON p.idRol = r.idRol
					WHERE p.status != 0 ".$whereAdmin;
					$request = $this->select_all($sql);
					return $request;
		}
		public function selectUsuario(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT p.id,p.name,p.email,r.idRol,r.nombreRol,p.status
					FROM users p
					INNER JOIN rol r
					ON p.idRol = r.idRol
					WHERE p.id = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}
		public function deleteUsuario(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE users SET status = ? WHERE id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function insertUsuario( string $nombre,   string $email, string $password, int $tipoid, int $status){
			$this->strNombre = $nombre;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM users WHERE 
					email = '{$this->strEmail}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO users(name,email,password,idRol,status) 
								  VALUES(?,?,?,?,?)";
	        	$arrData = array(
        						$this->strNombre,
        						$this->strEmail,
        						$this->strPassword,
        						$this->intTipoId,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}
		public function updateUsuario(int $idUsuario, string $nombre,   string $email, string $password, int $tipoid, int $status){
			$this->intIdUsuario = $idUsuario;
			$this->strNombre = $nombre;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM users WHERE (email = '{$this->strEmail}' AND id != $this->intIdUsuario)";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				if($this->strPassword  != "")
				{
					$sql = "UPDATE users set name=?,  email=?, password=?, idRol=?, status=? 
							WHERE id = $this->intIdUsuario ";
					$arrData = array(
	        						$this->strNombre,
	        						$this->strEmail,
	        						$this->strPassword,
	        						$this->intTipoId,
	        						$this->intStatus);
				}else{
					$sql = "UPDATE users SET  name=?,  email=?, idRol=?, status=? 
							WHERE id = $this->intIdUsuario ";
					$arrData = array(
	        						$this->strNombre,
	        						$this->strEmail,
	        						$this->intTipoId,
	        						$this->intStatus);
				}
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}
	
    }
?>