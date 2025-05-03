<?php
require_once "../libreria/conexion.php";

class ArancelariosModel {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    // Obtener datos por año usando el procedimiento almacenado
    public function getDataByYear($year) {
        $arrayLista = array();
        $rs = $this->conexion->query("CALL ObtenerArancelarioPorAnio('$year')");
        
        while ($obj = $rs->fetch_object()) {
            array_push($arrayLista,$obj);
        }

        return $arrayLista;
    }

    // Insertar un nuevo arancelario
    public function insertArancelario(
        string $anioSelect,
        string $categoriaSelect,
        string $muros_columnas,
        string $techos,
        string $pisos,
        string $puertas_ventanas,
        string $revestimientos,
        string $banos,
        string $instalaciones
    ) {
        
         $query = "CALL agregarArancelarioEdificacion(
                '{$anioSelect}',
                '{$categoriaSelect}',
                '{$muros_columnas}',
                '{$techos}',
                '{$pisos}',
                '{$puertas_ventanas}',
                '{$revestimientos}',
                '{$banos}',
                '{$instalaciones}'
            )";

            $result = $this->conexion->query($query);

            if ($result) {
                $row = $result->fetch_assoc();
                $idEdificacacion = $row['idvalores_edificacion'] ?? null;
            
                return (object)[
                    "status" => true,
                    "idEdificacion" => $idEdificacacion,
                    "msg" => "Se registró correctamente datos de edifcicacion"
                ];
            } else {
                return (object)[
                    "status" => false,
                    "msg" => "Error al ejecutar el procedimiento almacenado: " . $this->conexion->error
                ];
            } 
    }
}
?>