<?php 
    class MascotasModel extends Mysql
	{
        public $idmascota;
        public $usuario_id;
        public $nombre;
        public $tipo_animal;
        public $fecha_nacimiento;

        public function __construct()
		{
			parent::__construct();
		}
        public function insertMascota($usuario_id,$nombre,$tipo_animal,$fecha_nacimiento=null) {
            $sql="INSERT INTO `mascotas`(
                `usuarios_id`,
                `nombre`,
                `tipo_animal`,
                `fecha_nacimiento`
            )
            VALUES(
                ?,
                ?,
                ?,
                ?
            )";
            $sqlRequest= $this->insert($sql, array($usuario_id,$nombre,$tipo_animal,$fecha_nacimiento));
            if ($sqlRequest>0){
                return $sqlRequest;
            }else return $sqlRequest;
        }
        public function selectMascotas($usuario_id){
            $sql="SELECT
            `idmascota`,
            `usuarios_id`,
            `nombre`,
            `tipo_animal`,
            `fecha_nacimiento`
            FROM
                `mascotas`
            WHERE `usuarios_id`=$usuario_id
                ";
            $request=$this->select_all($sql);
            return $request;

        }
        public function selectMascota($id){
            $sql="SELECT
            `idmascota`,
            `usuarios_id`,
            `nombre`,
            `tipo_animal`,
            `fecha_nacimiento`
            FROM
                `mascotas`
            WHERE `idmascota`=$id
                ";
            $request=$this->select($sql);
            return $request;

        }
        public function updateMascota($nombre,$tipo_animal,$idmascota,$fecha_nacimiento=null){
            $sql="UPDATE
            `mascotas`
            SET
                `nombre` = ?,
                `tipo_animal` = ?,
                `fecha_nacimiento` = ?
            WHERE idmascota=?";

        $requet=$this->update($sql,array($nombre,$tipo_animal,$fecha_nacimiento,$idmascota));
        return $requet;
        }
        public function deleteMascota($id) {
            $sql="DELETE FROM `mascotas` WHERE idmascota=$id";
            $result=$this->delete($sql);
            return $result;
        }
    }