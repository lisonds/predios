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
            $data = $this->model->getDataByYear($year);

            echo json_encode(['status' => true, 'data' => $data]);
            die();
        }
    }

    // Agregar un nuevo año y sus datos
    private function addYear() {
        if ($_POST) {
            if (
                empty($_POST['year']) || empty($_POST['categoria']) || empty($_POST['muros_columnas']) ||
                empty($_POST['techos']) || empty($_POST['pisos']) || empty($_POST['puertas_ventanas']) ||
                empty($_POST['revestimientos']) || empty($_POST['banos']) || empty($_POST['instalaciones'])
            ) {
                echo json_encode(['status' => false, 'msg' => 'Error en los datos']);
                die();
            }

            $year = trim($_POST['year']);
            $categoria = ucwords(trim($_POST['categoria']));
            $muros_columnas = floatval($_POST['muros_columnas']);
            $techos = floatval($_POST['techos']);
            $pisos = floatval($_POST['pisos']);
            $puertas_ventanas = floatval($_POST['puertas_ventanas']);
            $revestimientos = floatval($_POST['revestimientos']);
            $banos = floatval($_POST['banos']);
            $instalaciones = floatval($_POST['instalaciones']);

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

            if ($success) {
                echo json_encode(['status' => true, 'msg' => 'Se guardó correctamente']);
            } else {
                echo json_encode(['status' => false, 'msg' => 'Error al guardar']);
            }
            die();
        }
    }

    // Editar un año existente
    private function editYear() {
        if ($_POST) {
            if (
                empty($_POST['idArancelario']) || empty($_POST['categoria']) || empty($_POST['muros_columnas']) ||
                empty($_POST['techos']) || empty($_POST['pisos']) || empty($_POST['puertas_ventanas']) ||
                empty($_POST['revestimientos']) || empty($_POST['banos']) || empty($_POST['instalaciones'])
            ) {
                echo json_encode(['status' => false, 'msg' => 'Error en los datos']);
                die();
            }

            $idArancelario = intval($_POST['idArancelario']);
            $categoria = ucwords(trim($_POST['categoria']));
            $muros_columnas = floatval($_POST['muros_columnas']);
            $techos = floatval($_POST['techos']);
            $pisos = floatval($_POST['pisos']);
            $puertas_ventanas = floatval($_POST['puertas_ventanas']);
            $revestimientos = floatval($_POST['revestimientos']);
            $banos = floatval($_POST['banos']);
            $instalaciones = floatval($_POST['instalaciones']);

            $success = $this->model->editYear(
                $idArancelario,
                $categoria,
                $muros_columnas,
                $techos,
                $pisos,
                $puertas_ventanas,
                $revestimientos,
                $banos,
                $instalaciones
            );

            if ($success) {
                echo json_encode(['status' => true, 'msg' => 'Se actualizó correctamente']);
            } else {
                echo json_encode(['status' => false, 'msg' => 'Error al actualizar']);
            }
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