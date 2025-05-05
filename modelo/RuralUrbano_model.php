<?php 
require_once "../libreria/conexion.php";
    class RuralUrbano{
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        }//este constructor esta que trae la conexion del base de datos

        public function obtener_RuralUrbano_por_anio(String $idAnio)
        {
            $query = "CALL obtener_RuralUrbano_por_anio('{$idAnio}')";
            $result = $this->conexion->query($query);

            if ($result) {
                $row = $result->fetch_assoc();

                if ($row) {
                    $arrayPredios[] = $row;
                    $arrayEdificacion = []; // ← Evita el warning si no hay construcción

                    $cons = $row['existe_construccion'] ?? 0;

                    if ($cons == 1) {
                        $idconstruccion = $row['idconstruccion'] ?? null;

                        if ($idconstruccion !== null) {
                            $this->conexion->next_result();
                            $rs2 = $this->conexion->query("CALL obtener_edificacionporidConstruccion({$idconstruccion})");

                            if ($rs2) {
                                while ($fila = $rs2->fetch_assoc()) {
                                    $arrayEdificacion[] = $fila;
                                }
                            }
                        }
                    }

                    return [
                        'predio' => $arrayPredios,
                        'edificacion' => $arrayEdificacion
                    ];
                } else {
                    return [
                        'predio' => [],
                        'edificacion' => []
                    ];
                }
            } else {
                return [
                    'predio' => [],
                    'edificacion' => []
                ];
            }
        }

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

        public function insertDatoConConstruccion(
           string $strAnio, string  $strRural, string $idPredio, string $strTipoTerreno, string $strUsoTerreno,
           string $strTierrasAptas, string $strAltitud, string $strCalidad, string $strHectareas, string $strAcceso,
           string $strClasPredio, string $strMaterialCons, string $strEstConservacion, string $strTipoUso,$edificaciones_json
        ){
            $query = "CALL INSERT_DATOS_RURAL_CONSTRUCCION(
                '{$strAnio}',
                '{$strRural}',
                '{$idPredio}',
                '{$strTipoTerreno}',
                '{$strUsoTerreno}',
                '{$strTierrasAptas}',
                '{$strAltitud}',
                '{$strCalidad}',
                '{$strHectareas}',
                '{$strAcceso}',
            
                '{$strClasPredio}',
                '{$strMaterialCons}',
                '{$strEstConservacion}',
                '{$strTipoUso}',
                '{$edificaciones_json}'
            )";
            $result = $this->conexion->query($query);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $cod = $row['estado_final'];
                        
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
                        }  elseif ($cod == 3) {
                            return (object)[
                                "status" => true,
                                "msg" => "Los no se ingresaron todos los datos."
                            ];
                        }  else {
                            return (object)[
                                "status" => false,
                                "msg" => "Operacion desconocida o sin cambios."
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