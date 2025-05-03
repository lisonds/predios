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

if ($option == "agregar_datos_construccion") {
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['anioSelect']) || empty($_POST['categoriaSelect']) || empty($_POST['muros_columnas']) || empty($_POST['techos'])
            || empty($_POST['pisos'])|| empty($_POST['puertas_ventanas'])|| empty($_POST['revestimientos'])|| empty($_POST['banos']) || empty($_POST['instalaciones'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strAnioSelect = ucwords(trim($_POST['anioSelect'])); 
                $strCategoriaSelect = ucwords($_POST['categoriaSelect']); 
                $strMuros_columnas = ucwords($_POST['muros_columnas']);
                $strTechos = ucwords($_POST['techos']);
                $strPisos = ucwords($_POST['pisos']);
                $strPuertas_ventanas = ucwords($_POST['puertas_ventanas']);
                $strRevestimientos = ucwords($_POST['revestimientos']);
                $strBanos = ucwords($_POST['banos']);
                $strInstalaciones = ucwords($_POST['instalaciones']);
                                
                // Enviando datos al modelo
                $arrayEdificacion = $objPredio->insertPredio($strAnioSelect, $strCategoriaSelect, $strMuros_columnas, $strTechos,
                $strPisos,$strPuertas_ventanas, $strRevestimientos, $strBanos,$strInstalaciones);
                
                if ($arrayPredio->status) {
                    $arrayResponse = array('status' => true, 'msg' => $arrayPredio->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayPredio->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die();
    }


   

?>