<?php
// modelo/arancelarios_model.php

class ArancelariosModel {
    private $data = [];

    public function __construct() {
        // Simulación de datos
        $this->data = [
            '2023' => [
                ['categoria' => 'A', 'muros_columnas' => 603.35, 'techos' => 313.72, 'pisos' => 222.60, 'puertas_ventanas' => 238.13, 'revestimiento' => 300.49, 'banos' => 106.57, 'instalaciones' => 379.76],
                ['categoria' => 'B', 'muros_columnas' => 358.95, 'techos' => 215.68, 'pisos' => 185.61, 'puertas_ventanas' => 210.72, 'revestimiento' => 240.00, 'banos' => 76.13, 'instalaciones' => 223.36],
            ],
            '2022' => [
                ['categoria' => 'A', 'muros_columnas' => 580.00, 'techos' => 300.00, 'pisos' => 210.00, 'puertas_ventanas' => 220.00, 'revestimiento' => 280.00, 'banos' => 100.00, 'instalaciones' => 350.00],
                ['categoria' => 'B', 'muros_columnas' => 340.00, 'techos' => 200.00, 'pisos' => 170.00, 'puertas_ventanas' => 190.00, 'revestimiento' => 220.00, 'banos' => 70.00, 'instalaciones' => 210.00],
            ],
        ];
    }

    // Generar un nuevo año
    public function generateYear() {
        $years = array_keys($this->data);
        $lastYear = max($years);
        return $lastYear + 1;
    }

    // Obtener datos de un año específico
    public function getDataByYear($year) {
        return $this->data[$year] ?? [];
    }

    // Agregar un nuevo año
    public function addYear($year, $categoria, $muros_columnas, $techos, $pisos, $puertas_ventanas, $revestimiento, $banos, $instalaciones) {
        if (!isset($this->data[$year])) {
            $this->data[$year] = [];
        }
        $this->data[$year][] = [
            'categoria' => $categoria,
            'muros_columnas' => $muros_columnas,
            'techos' => $techos,
            'pisos' => $pisos,
            'puertas_ventanas' => $puertas_ventanas,
            'revestimiento' => $revestimiento,
            'banos' => $banos,
            'instalaciones' => $instalaciones,
        ];
        return true;
    }

    // Editar un año existente
    public function editYear($year, $categoria, $muros_columnas, $techos, $pisos, $puertas_ventanas, $revestimiento, $banos, $instalaciones) {
        if (!isset($this->data[$year])) {
            return false;
        }
        $this->data[$year] = [
            [
                'categoria' => $categoria,
                'muros_columnas' => $muros_columnas,
                'techos' => $techos,
                'pisos' => $pisos,
                'puertas_ventanas' => $puertas_ventanas,
                'revestimiento' => $revestimiento,
                'banos' => $banos,
                'instalaciones' => $instalaciones,
            ],
        ];
        return true;
    }

    // Eliminar un año
    public function deleteYear($year) {
        if (isset($this->data[$year])) {
            unset($this->data[$year]);
            return true;
        }
        return false;
    }
}