<?php
require_once "../modelo/arancelarios_model.php";

$dataOption = $_REQUEST['data'] ?? '';
$objArancelario = new ArancelariosModel();

if ($dataOption == "obtener_datos_por_anio") {
        if ($_POST) {
            $year = $_POST["anioSelect"];
            $arrayLista = $objArancelario->getDataByYear($year);
    
            if (empty($arrayLista)) {
                $arrayResponse = array(
                    'status' => false,
                    'data' => '',
                    'msg' => 'No hay Registros para año seleccionado'
                );
            } 
            echo json_encode($arrayResponse);
    }
}
    die();

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
} 


    

?>