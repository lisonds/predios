<?php 
require_once "../libreria/conexion.php";
    class RuralUrbano{
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        }//este constructor esta que trae la conexion del base de datos

        private function limpiarResultadosPendientes() {
            while ($this->conexion->more_results() && $this->conexion->next_result()) {
                if ($res = $this->conexion->store_result()) {
                    $res->free();
                }
            }
        }

      public function obtener_RuralUrbano_por_anio(String $idAnio)
        {
            $arrayPredios = [];
            $arrayEdificacion = [];
            $this->limpiarResultadosPendientes(); 
            $query = "CALL obtener_RuralUrbano_por_anio('{$idAnio}')";
            $result = $this->conexion->query($query);

            if ($result) {
                $row = $result->fetch_assoc();
                $result->free(); // ✅ Siempre liberar
                $this->conexion->next_result(); // ✅ Siempre limpiar conexión

                if ($row) {
                    $arrayPredios[] = $row;
                    $cons = $row['existe_construccion'] ?? 0;

                    if ($cons == 1 && isset($row['idconstruccion'])) {
                        $idconstruccion = $row['idconstruccion'];

                        $rs2 = $this->conexion->query("CALL obtener_edificacionporidConstruccion({$idconstruccion})");

                        if ($rs2) {
                            while ($fila = $rs2->fetch_assoc()) {
                                $arrayEdificacion[] = $fila;
                            }

                            $rs2->free(); // ✅ Liberar resultado del segundo CALL
                            $this->conexion->next_result();
                        }
                    }
                }
            } else {
                // Por seguridad, forzar limpieza de resultados colgados
                while ($this->conexion->more_results() && $this->conexion->next_result()) {
                    if ($res = $this->conexion->store_result()) {
                        $res->free();
                    }
                }
            }

            return [
                'predio' => $arrayPredios,
                'edificacion' => $arrayEdificacion
            ];
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
                                "status" => false,
                                "msg" => "El Registro ".$strAnio." ya existe.. "
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
                                "status" => false,
                                "msg" => "El Registro ".$strAnio." ya existe.."
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

        public function obtener_result_categorias($anio, $muro, $techo, $pisos, $puertas, $revestimiento, $banio, $instalaciones) {
            $suma = 0;
        
            // Limpia antes por si la conexión está sucia
            while ($this->conexion->more_results() && $this->conexion->next_result()) {
                $limpia = $this->conexion->store_result();
                if ($limpia) $limpia->free();
            }
        
            $sql = "CALL Dato_suma_categoria_edificacion('$anio', '$muro', '$techo', '$pisos', '$puertas', '$revestimiento', '$banio', '$instalaciones')";
        
            if ($resultado = $this->conexion->query($sql)) {
                if ($fila = $resultado->fetch_assoc()) {
                    $suma = $fila['suma_total'];
                }
                $resultado->free();
        
                while ($this->conexion->more_results() && $this->conexion->next_result()) {
                    if ($extra = $this->conexion->store_result()) {
                        $extra->free();
                    }
                }
            } else {
                error_log("Error MySQLi: " . $this->conexion->error);
            }
        
            return ['suma_total' => $suma];
        }
       public function obtener_Resultado_DAta_Terrenos_REsticos($anio, $tierras_aptas, $altitud, $calidad_agrologica) {
        $this->limpiarResultadosPendientes(); 
        $query = "CALL mapeo_resultado_terrenos_rustico(
            '{$anio}',
            '{$tierras_aptas}',
            '{$altitud}',
            '{$calidad_agrologica}'
        )";

        $result = $this->conexion->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            // ✅ Aun si no hay fila, liberar y limpiar
            $result->free();
            $this->conexion->next_result();

            if ($row && isset($row['resultado'])) {
                $cod = $row['resultado'];

                return (object)[
                    "status" => $cod != 0,
                    "resultado" => $cod
                ];
            } else {
                // No se encontró ningún resultado válido
                return (object)[
                    "status" => false,
                    "resultado" => 0
                ];
            }

        } else {
            // 🔁 Limpieza por seguridad si el CALL falló
            while ($this->conexion->more_results() && $this->conexion->next_result()) {
                if ($res = $this->conexion->store_result()) {
                    $res->free();
                }
            }

            return (object)[
                "status" => false,
                "msg" => "Error al ejecutar el procedimiento almacenado: " . $this->conexion->error
            ];
        }
    }

    }
    

?>