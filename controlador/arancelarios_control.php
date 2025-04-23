<?php
// controlador/arancelarios_control.php

require_once '../modelo/arancelarios_model.php';

class ArancelariosController {
    private $model;

    public function __construct() {
        $this->model = new ArancelariosModel();
    }

    // Manejador principal para procesar las solicitudes
    public function handleRequest() {
        $option = $_REQUEST['option'] ?? '';

        switch ($option) {
            case 'getYears':
                $this->getYears();
                break;
            case 'getDataByYear':
                $this->getDataByYear();
                break;
            case 'addYear':
                $this->addYear();
                break;
            case 'editYear':
                $this->editYear();
                break;
            case 'deleteYear':
                $this->deleteYear();
                break;
            default:
                echo json_encode(['status' => false, 'msg' => 'Acción no válida']);
                break;
        }
    }

    // Obtener todos los años disponibles
    private function getYears() {
        $years = $this->model->getYears();

        echo json_encode(['status' => true, 'data' => $years]);
        die();
    }

    // Obtener datos de un año específico
    private function getDataByYear() {
    if ($_GET) {
        $year = $_GET['year'];
        $data = $this->model->getDataByYear($year); // Obtener datos del modelo
        echo json_encode(['status' => true, 'data' => $data]);
        die();
    }
    }

    // Agregar un nuevo año y sus datos
    private function addYear() {
    if ($_POST) {
        // Validar que el año esté presente
        if (empty($_POST['nuevo_anio'])) {
            echo json_encode(['status' => false, 'msg' => 'El año es obligatorio']);
            die();
        }

        $year = trim($_POST['nuevo_anio']);
        $categorias = $_POST['muros_columnas']; // Obtiene las categorías desde los datos enviados

        foreach ($categorias as $categoria => $valor) {
            $muros_columnas = floatval($_POST['muros_columnas'][$categoria]);
            $techos = floatval($_POST['techos'][$categoria]);
            $pisos = floatval($_POST['pisos'][$categoria]);
            $puertas_ventanas = floatval($_POST['puertas_ventanas'][$categoria]);
            $revestimientos = floatval($_POST['revestimientos'][$categoria]);
            $banos = floatval($_POST['banos'][$categoria]);
            $instalaciones = floatval($_POST['instalaciones'][$categoria]);

            // Insertar los datos en la base de datos
            $success = $this->model->addYear(
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

            if (!$success) {
                echo json_encode(['status' => false, 'msg' => 'Error al guardar la categoría ' . $categoria]);
                die();
            }
        }

        echo json_encode(['status' => true, 'msg' => 'Datos guardados correctamente']);
        die();
    }
}


    // Eliminar un año
    private function deleteYear() {
        if ($_POST) {
            if (empty($_POST['idArancelario'])) {
                echo json_encode(['status' => false, 'msg' => 'Error en los datos']);
                die();
            }

            $idArancelario = intval($_POST['idArancelario']);
            $success = $this->model->deleteYear($idArancelario);

            if ($success) {
                echo json_encode(['status' => true, 'msg' => 'Registro eliminado']);
            } else {
                echo json_encode(['status' => false, 'msg' => 'Error al eliminar']);
            }
            die();
        }
    }
}

// Instanciar el controlador y manejar la solicitud
$controller = new ArancelariosController();
$controller->handleRequest();