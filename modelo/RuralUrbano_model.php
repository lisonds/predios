<?php 
require_once "../libreria/conexion.php";
    class RuralUrbano{
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
         
        
        public function insertDatoSinConstruccion(string $strAnio,string  $strEsRural,string $idPredio,string  $strTipoTerreno,string  $strUsoTerreno,
            string $strTierrasAptas,string $strAltitud,string $strCalidad,string $strhectareas,string $stracceso) {
            $query = "CALL agregarRuralUrbanoSinConstruccion(
                        '{$strAnio}', 
                        '{$strEsRural}',
                        '{$idPredio}',
                        '{$strTipoTerreno}', 
                        '{$strUsoTerreno}', 
                        '{$strTierrasAptas}', 
                        '{$strAltitud}', 
                        '{$strCalidad}', 
                        '{$strhectareas}', 
                        '{$stracceso}'
                        
                    )";
            
                    $result = $this->conexion->query($query);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $cod = $row['estado_operacion'];
                        
                        if ($cod == 1) {
                            return (object)[
                                "status" => true,
                                "msg" => "Se registraron correctamente los datos del año Registrado ."
                            ];
                        } elseif ($cod == 2) {
                            return (object)[
                                "status" => true,
                                "msg" => "Los datos ingresados se actualizaron correctamente."
                            ];
                        } else {
                            return (object)[
                                "status" => false,
                                "msg" => "Operación desconocida o sin cambios."
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