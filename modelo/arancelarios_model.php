<?php 
require_once "../libreria/conexion.php";
    class ArancelariosModel{
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        }//este constructor esta que trae la conexion del base de datos
        public function getDataByYear($year){
            $arrayLista=array();//crear array para extraer todo los registros
            $rs=$this->conexion->query("CALL ObtenerArancelarioPorAnio('{$year}')");
            while($obj=$rs->fetch_object()){
                array_push($arrayLista,$obj);//ingresamos cada objeto a array
            };
            return $arrayLista;
        }

        public function insertArancelario(string $stranioSelect,  string $strcategoriaSelect, string $strmuros_columnas, $strtechos,
                string $strpisos,string $strpuertas_ventanas, string $strrevestimientos, string $strbanos, string $strinstalaciones) {
            $query = "CALL agregarArancelarioEdificacion(
                        '{$stranioSelect}', 
                        '{$strcategoriaSelect}', 
                        '{$strmuros_columnas}', 
                        '{$strtechos}', 
                        '{$strpisos}', 
                        '{$strpuertas_ventanas}', 
                        '{$strrevestimientos}', 
                        '{$strbanos}', 
                        '{$strinstalaciones}'
                        
                    )";
            
                    $result = $this->conexion->query($query);

                    if ($result) {
                        // Recuperar el valor del parámetro OUT (@idvalores_edificacion)
                        $queryResult = $this->conexion->query("SELECT @idvalores_edificacion AS idValores_edificacion");
                
                        if ($queryResult) {
                            $row = $queryResult->fetch_assoc();
                            $idValores_edificacion = $row['idValores_edificacion'] ?? null;
                
                            if ($idValores_edificacion) {
                                // Retornar el ID del predio y el mensaje de éxito
                                return (object) [
                                    "status" => true,
                                    "idValores_edificacion" => $idValores_edificacion,
                                    "msg" => "Se registró correctamente una lista "
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

    }

    

?>