<?php
// modelo/ArancelariosModel.php

require_once "../libreria/conexion.php";

class ArancelariosModel {
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    // Obtener datos de un año específico
    public function getDataByYear(string $year) {
        $arrayData = []; // Crear array para almacenar los registros
        $rs = $this->conexion->query("CALL obtener_arancelarios_por_anio('{$year}')");

        if ($rs) {
            while ($obj = $rs->fetch_object()) {
                array_push($arrayData, $obj); // Agregar cada objeto al array
            }
        }

        return $arrayData;
    }

    // Agregar un nuevo año y sus datos
    public function addYear(
        string $year,
        string $categoria,
        float $muros_columnas,
        float $techos,
        float $pisos,
        float $puertas_ventanas,
        float $revestimiento,
        float $banos,
        float $instalaciones
    ) {
        $query = "CALL agregar_arancelario(
                    '{$year}', 
                    '{$categoria}', 
                    {$muros_columnas}, 
                    {$techos}, 
                    {$pisos}, 
                    {$puertas_ventanas}, 
                    {$revestimiento}, 
                    {$banos}, 
                    {$instalaciones}, 
                    @id_arancelario
                )";

        $result = $this->conexion->query($query);

        if ($result) {
            // Recuperar el valor del parámetro OUT (@id_arancelario)
            $queryResult = $this->conexion->query("SELECT @id_arancelario AS id_arancelario");

            if ($queryResult) {
                $row = $queryResult->fetch_assoc();
                $idArancelario = $row['id_arancelario'] ?? null;

                if ($idArancelario) {
                    // Retornar el ID del arancelario y el mensaje de éxito
                    return (object) [
                        "status" => true,
                        "id_arancelario" => $idArancelario,
                        "msg" => "Se registró correctamente el año"
                    ];
                } else {
                    // Manejo en caso de no obtener un ID válido
                    return (object) [
                        "status" => false,
                        "msg" => "El procedimiento no devolvió un ID válido"
                    ];
                }
            } else {
                // Error al ejecutar la consulta de recuperación de @id_arancelario
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

    // Editar los datos de un año existente
    public function editYear(
        int $idArancelario,
        string $categoria,
        float $muros_columnas,
        float $techos,
        float $pisos,
        float $puertas_ventanas,
        float $revestimiento,
        float $banos,
        float $instalaciones
    ) {
        $query = "UPDATE arancelarios SET 
                    categoria = '{$categoria}', 
                    muros_columnas = {$muros_columnas}, 
                    techos = {$techos}, 
                    pisos = {$pisos}, 
                    puertas_ventanas = {$puertas_ventanas}, 
                    revestimiento = {$revestimiento}, 
                    banos = {$banos}, 
                    instalaciones = {$instalaciones} 
                  WHERE id_arancelario = {$idArancelario}";

        $result = $this->conexion->query($query);

        if ($result) {
            return (object) [
                "status" => true,
                "msg" => "Datos actualizados correctamente"
            ];
        } else {
            return (object) [
                "status" => false,
                "msg" => "Error al actualizar los datos: " . $this->conexion->error
            ];
        }
    }

    // Eliminar un año
    public function deleteYear(int $idArancelario) {
        $query = "CALL eliminar_arancelario({$idArancelario})";
        $result = $this->conexion->query($query);

        if ($result) {
            return (object) [
                "status" => true,
                "msg" => "Año eliminado correctamente"
            ];
        } else {
            return (object) [
                "status" => false,
                "msg" => "Error al eliminar el año: " . $this->conexion->error
            ];
        }
    }

    // Generar un nuevo año automáticamente
    public function generateYear() {
        $query = "SELECT MAX(anio) AS ultimo_anio FROM arancelarios";
        $result = $this->conexion->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $ultimoAnio = $row['ultimo_anio'];

            if ($ultimoAnio) {
                return $ultimoAnio + 1; // Aumentar el último año en 1
            } else {
                return 2024; // Valor predeterminado si no hay años registrados
            }
        } else {
            return null; // Error al consultar el último año
        }
    }
}