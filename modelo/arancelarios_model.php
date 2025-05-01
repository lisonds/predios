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
        $arrayLista = [];
        $query = "CALL ObtenerArancelarioPorAnio(?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $year);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $arrayLista[] = $row;
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
        $query = "CALL agregarArancelarioEdificacion(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        if (!$stmt) {
            return (object)["status" => false, "msg" => "Error al preparar la consulta: " . $this->conexion->error];
        }

        $stmt->bind_param(
            "sssssssss",
            $anioSelect,
            $categoriaSelect,
            $muros_columnas,
            $techos,
            $pisos,
            $puertas_ventanas,
            $revestimientos,
            $banos,
            $instalaciones
        );

        if ($stmt->execute()) {
            $idValores_edificacion = $stmt->insert_id;
            return (object)["status" => true, "idValores_edificacion" => $idValores_edificacion, "msg" => "Se registró correctamente"];
        } else {
            return (object)["status" => false, "msg" => "Error al ejecutar el procedimiento almacenado: " . $stmt->error];
        }
    }
}
?>