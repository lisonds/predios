<?php
require_once "../libreria/conexion.php";

    class RusticoModel {
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        } // constructor para la conexion de base de datos 
    public function getYears(){
        $arrayLista = array();
        $rs = $this->conexion->query("CALL obtener_lista_anios()");

        while ($obj = $rs->fetch_object()) {
            array_push($arrayLista, $obj);
        }

        return $arrayLista;
    }
    public function GetDataPorAnio(string $anio){
           $rs = $this->conexion->query("CALL obtener_data_Por_anios($anio)");

            $resultado = [];   // ['Laderas'=>[...], 'Valles Altos'=>[...]]
            
            while ($row = $rs->fetch_assoc()) {

                $tierra = $row['tierras'];

                // Prepara la entrada si aún no existe
                if (!isset($resultado[$tierra])) {
                    $resultado[$tierra] = [];
                }

                // Guarda la fila sin el nombre de la tierra (ya es clave)
                $resultado[$tierra][] = [
                    'altura_terreno' => $row['altura_terreno'],
                    'alta'           => $row['alta'],
                    'media'          => $row['media'],
                    'baja'           => $row['baja']
                ];
            }

            $rs->close();
            $this->conexion->next_result();

            return $resultado;
    }
        // Obtener datos por año usando el procedimiento almacenado
    public function getDataByYear(string $anioSelect) {
        $arrayLista = array();
        $rs = $this->conexion->query("CALL ObtenerRusticoPorAnio('{$anioSelect}')");

        while ($obj = $rs->fetch_object()) {
            array_push($arrayLista, $obj);
        }

        return $arrayLista;
    }

        // Insertar un nuevo dato para arancelario rustico
        public function insertRustico(
            string $anioArancelarioR,
            string $altitud,
            string $GrupoTierra,
            string $ValorAlta,
            string $ValorMedia,
            string $Valorbaja
            
        ) {
                $query = "CALL agregarArancelarioRustico(
                    '{$anioArancelarioR}',
                    '{$altitud}',
                    '{$GrupoTierra}',
                    '{$ValorAlta}',
                    '{$ValorMedia}',
                    '{$Valorbaja}'
                    
                )";

                $result = $this->conexion->query($query);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $cod = $row['resultado'];
                    
                    if ($cod == 1) {
                        return (object)[
                            "status" => true,
                            "msg" => "Se registraron correctamente los datos de edificación."
                        ];
                    } elseif ($cod == 0) {
                        return (object)[
                            "status" => true,
                            "msg" => "Los datos de edificación se actualizaron correctamente."
                        ];
                    } else {
                        return (object)[
                            "status" => false,
                            "msg" => "Operación desconocida o sin cambios."
                        ];
                    }
                
                    
                } else {
                    return (object)[
                        "status" => false,
                        "msg" => "Error al ejecutar el procedimiento almacenado: " . $this->conexion->error
                    ];
                } 
        }

        

    }


    
?>