<?php
require_once "../libreria/conexion.php";

    class RusticoModel {
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        } // constructor para la conexion de base de datos 

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
            string $ValorAlta,
            string $ValorMedia,
            string $Valorbaja,
            string $GrupoTierra
        ) {
                $query = "CALL agregarArancelarioRustico(
                    '{$anioArancelarioR}',
                    '{$altitud}',
                    '{$ValorAlta}',
                    '{$ValorMedia}',
                    '{$Valorbaja}',
                    '{$GrupoTierra}'
                )";

                $result = $this->conexion->query($query);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $cod = $row['estado_operacion'];
                    
                    if ($cod == 1) {
                        return (object)[
                            "status" => true,
                            "msg" => "Se registraron correctamente los datos de edificación."
                        ];
                    } elseif ($cod == 2) {
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