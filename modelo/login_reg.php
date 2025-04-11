<?php 
require_once "../libreria/conexion.php";
    class Login{
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        }//este constructor esta que trae la conexion del base de datos
        public function getUsuarios(){
            $arrayUsuarios=array();//crear array para extraer todo los registros
            $rs=$this->conexion->query("SELECT * FROM dbpredios.tb_usuario");
            while($obj=$rs->fetch_object()){
                array_push($arrayUsuarios,$obj);//ingresamos cada objeto a array
            };
            return $arrayUsuarios;
        }
        public function insertUsuario(string $strCodigo, string $strCorreo, string $strUsuario, string $strContrasena) {
            $query = "INSERT INTO `tb_usuario` (`codigo`, `correo`, `usuario`, `password`) 
                      VALUES ('{$strCodigo}', '{$strCorreo}', '{$strUsuario}', '{$strContrasena}')";
            
            $result = $this->conexion->query($query);
            
            if ($result) {
                // Retornar un objeto con el ID del usuario insertado y el mensaje de éxito
                return (object) [
                    "status" => true,
                    "idtb_usuario" => $this->conexion->insert_id,
                    "msg" => "Usuario insertado correctamente"
                ];
            } else {
                // Retornar un objeto con el error
                return (object) [
                    "status" => false,
                    "msg" => "Error al insertar usuario: " . $this->conexion->error
                ];
            }
        }

        public function  EditUsuario(int $id){
            $sql=$this->conexion->query("SELECT * FROM tb_usuario where idtb_usuario='{$id}'");
            $sql=$sql->fetch_object();
            return $sql;
        }


        public function updateUsuario(string $strCodigo, string $strCorreo, string $strUsuario, string $strContrasena,int $id) {
                    
            $query = "UPDATE `tb_usuario` SET `codigo` = '{$strCodigo}', `correo` = '{$strCorreo}', `usuario` = '{$strUsuario}', `password` = '{$strContrasena}' WHERE (`idtb_usuario` = '{$id}');";
            $result = $this->conexion->query($query);
            
            if ($result) {
                // Retornar un objeto con el ID del usuario insertado y el mensaje de éxito
                return (object) [
                    "status" => true,
                    "idtb_usuario" => $this->conexion->insert_id,
                    "msg" => "Usuario editado correctamente"
                ];
            } else {
                // Retornar un objeto con el error
                return (object) [
                    "status" => false,
                    "msg" => "Error al Editar usuario: " . $this->conexion->error
                ];
            }
        }
        
        public function  EliminarUsuario(int $id){
            $sql=$this->conexion->query("CALL sp_eliminar_usuario('{$id}');");
            $sql=$sql->fetch_object();
            return $sql;
        }
        public function LoginUsuario(string $usuario, string $password){
            $sql=$this->conexion->query("CALL sp_loging('{$usuario}','{$password}')");
            $sql=$sql->fetch_object();
            return $sql;
        }
    }

?>