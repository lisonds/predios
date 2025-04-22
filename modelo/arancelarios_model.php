<?php
// modelo/arancelarios_model.php

class ArancelariosModel {
    private $conexion;
    private $db;

    public function __construct() {
        require_once "../libreria/conexion.php";
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    // Obtener todos los años disponibles
    public function getYears() {
        $query = "SELECT DISTINCT anio FROM valores_edificacion ORDER BY anio DESC";
        $result = $this->conexion->query($query);
        $years = [];
        while ($row = $result->fetch_assoc()) {
            $years[] = $row['anio'];
        }
        return $years;
    }

    // Obtener datos de un año específico
    public function getDataByYear($year) {
        var_dump($this->db);
    try {
        $sql = "SELECT * FROM valores_edificacion WHERE anio = :anio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':anio', $year, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve los datos como un array asociativo
    } catch (PDOException $e) {
        error_log("Error al obtener datos por año: " . $e->getMessage());
        return [];
    }
    }

    // Agregar un nuevo año y sus datos
    public function addYear(
        string $year,
        string $categoria,
        float $muros_columnas,
        float $techos,
        float $pisos,
        float $puertas_ventanas,
        float $revestimientos,
        float $banos,
        float $instalaciones
    ) {
        $query = "INSERT INTO valores_edificacion (
                    anio, 
                    categoria, 
                    muros_columnas, 
                    techos, 
                    pisos, 
                    puertas_ventanas, 
                    revestimientos, 
                    banos, 
                    instalaciones
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(
            "ssddddddd",
            $year,
            $categoria,
            $muros_columnas,
            $techos,
            $pisos,
            $puertas_ventanas,
            $revestimientos,
            $banos,
            $instalaciones
        );

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Editar un año existente
    public function editYear(
        int $idArancelario,
        string $categoria,
        float $muros_columnas,
        float $techos,
        float $pisos,
        float $puertas_ventanas,
        float $revestimientos,
        float $banos,
        float $instalaciones
    ) {
        $query = "UPDATE arancelarios SET 
                    categoria = ?, 
                    muros_columnas = ?, 
                    techos = ?, 
                    pisos = ?, 
                    puertas_ventanas = ?, 
                    revestimientos = ?, 
                    banos = ?, 
                    instalaciones = ?
                  WHERE id_arancelario = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(
            "sdddddddi",
            $categoria,
            $muros_columnas,
            $techos,
            $pisos,
            $puertas_ventanas,
            $revestimientos,
            $banos,
            $instalaciones,
            $idArancelario
        );

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un año
    public function deleteYear(int $idArancelario) {
        $query = "DELETE FROM valores_edificacion WHERE id_arancelario = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $idArancelario);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}