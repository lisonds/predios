<?php
require_once "../modelo/arancelarios_model.php";

$dataOption = $_REQUEST['data'] ?? '';
$objArancelario = new ArancelariosModel();

if ($dataOption === "agregar_datos_construccion") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $requiredFields = [
            'anioSelect', 'categoriaSelect', 'muros_columnas', 'techos',
            'pisos', 'puertas_ventanas', 'revestimientos', 'banos', 'instalaciones'
        ];

        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                echo json_encode(["status" => false, "msg" => "Todos los campos son obligatorios"]);
                exit;
            }
        }

        $response = $objArancelario->insertArancelario(
            trim($_POST['anioSelect']),
            trim($_POST['categoriaSelect']),
            trim($_POST['muros_columnas']),
            trim($_POST['techos']),
            trim($_POST['pisos']),
            trim($_POST['puertas_ventanas']),
            trim($_POST['revestimientos']),
            trim($_POST['banos']),
            trim($_POST['instalaciones'])
        );

        echo json_encode($response);
    }
} elseif ($dataOption === "busca_anio") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $year = $_POST['anio'] ?? '';
        if (empty($year)) {
            echo json_encode(["status" => false, "msg" => "El año es obligatorio"]);
            exit;
        }

        $data = $objArancelario->getDataByYear($year);
        if (!empty($data)) {
            echo json_encode(["status" => true, "data" => $data]);
        } else {
            echo json_encode(["status" => false, "msg" => "No hay datos disponibles para este año"]);
        }
    }
}
?>