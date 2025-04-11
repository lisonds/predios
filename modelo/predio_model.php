<?php 
require_once "../libreria/conexion.php";
    class Predio{
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        }//este constructor esta que trae la conexion del base de datos
        public function getCodPredios(string $codigo){
            $arrayUsuarios=array();//crear array para extraer todo los registros
            $rs=$this->conexion->query("CALL obtener_predios_por_codigo('{$codigo}')");
            while($obj=$rs->fetch_object()){
                array_push($arrayUsuarios,$obj);//ingresamos cada objeto a array
            };
            return $arrayUsuarios;
        }

        public function insertPredio(string $strCodigo,string  $strDenominado,string  $strSector,string  $strDistrito,
            string $strProvincia,string $strDepartamento,string $strCodigoPredial,string $strCodigoCatastral) {
            $query = "CALL agregarPredio(
                        '{$strCodigo}', 
                        '{$strDenominado}', 
                        '{$strSector}', 
                        '{$strDistrito}', 
                        '{$strProvincia}', 
                        '{$strDepartamento}', 
                        '{$strCodigoPredial}', 
                        '{$strCodigoCatastral}', 
                        @idpredios
                    )";
            
                    $result = $this->conexion->query($query);

                    if ($result) {
                        // Recuperar el valor del parámetro OUT (@idpredios)
                        $queryResult = $this->conexion->query("SELECT @idpredios AS idPredios");
                
                        if ($queryResult) {
                            $row = $queryResult->fetch_assoc();
                            $idPredios = $row['idPredios'] ?? null;
                
                            if ($idPredios) {
                                // Retornar el ID del predio y el mensaje de éxito
                                return (object) [
                                    "status" => true,
                                    "idPredios" => $idPredios,
                                    "msg" => "Se registró correctamente un predio"
                                ];
                            } else {
                                // Manejo en caso de no obtener un ID válido
                                return (object) [
                                    "status" => false,
                                    "msg" => "El procedimiento no devolvió un ID válido"
                                ];
                            }
                        } else {
                            // Error al ejecutar la consulta de recuperación de @idpredios
                            return (object) [
                                "status" => false,
                                "msg" => "Error al recuperar el ID: " . $this->conexion->error
                            ];
                        }
                    } else {
                        // Error al ejecutar el procedimiento almacenado
                        return (object) [
                            "status" => false,
                            "msg" => "Error al ejecutar el procedimiento almacenado: " . $this->conexion->error
                        ];
                    }
                
        }

        public function VerPredioId(int $idPredio){
            $sql=$this->conexion->query("SELECT * FROM predios where idpredios='{$idPredio}'");
            $sql=$sql->fetch_object();
            return $sql;
        }
        public function updatePredio(int $strIdpredio, string $strDenominado,
        string $strSector,string $strDistrito,string $strProvincia,string $strDepartamento,
        string $strCodPredial,string $strCodCatastral){
        $query = "UPDATE `predios` SET `denominado` = '{$strDenominado}', `sector` = '{$strSector}',
         `distrito` = '{$strDistrito}', `provincia` = '{$strProvincia}', `departamento` = '{$strDepartamento}', 
         `cod_predial` = '{$strCodPredial}', `cod_catastral` = '{$strCodCatastral}' WHERE (`idpredios` = '{$strIdpredio}')";
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
        public function  EliminarPredio(int $id){
            $sql=$this->conexion->query("CALL sp_eliminar_predio({$id})");
            $sql=$sql->fetch_object();
            return $sql;
        }
        
    }


?>