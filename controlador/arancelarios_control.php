<?php
    require_once "../modelo/arancelarios_model.php";

    // Verifica si existe el parámetro 'data' en la petición

    $op = $_REQUEST['data'];
    $objArancelario = new ArancelariosModel();

    

    if ($op == "obtener_datos_por_anio") {
    if ($_POST) {
        $anioIdentificador = $_POST['anio'];
        $arrayArancelario = $objArancelario->getDataByYear($anioIdentificador);
        if (empty($arrayArancelario)) {
            $arrayResponse = array(
            'status'=>false,
            'data' => '',
            'msg'=>'No hay datos disponibles para este año'
            );

            
        }
        $arrayResponse = array(
                    'status' => true,
                    'data' => $arrayArancelario,
                    'msg' => 'Datos Encontrados'
                );

        
    }
}

    if ($op =="agregar_datos_construccion") {
                
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['anioSelect']) || empty($_POST['categoriaSelect']) || empty($_POST['muros_columnas']) || empty($_POST['techos'])
            || empty($_POST['pisos'])|| empty($_POST['puertas_ventanas'])|| empty($_POST['revestimientos'])|| empty($_POST['banos']) || empty($_POST['instalaciones'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strAnioSelect = trim($_POST['anioSelect']); 
                $strCategoriaSelect = trim($_POST['categoriaSelect']); 
                $strMuros_columnas = trim($_POST['muros_columnas']);
                $strTechos = trim($_POST['techos']);
                $strPisos = trim($_POST['pisos']);
                $strPuertas_ventanas = trim($_POST['puertas_ventanas']);
                $strRevestimientos = trim($_POST['revestimientos']);
                $strBanos = trim($_POST['banos']);
                $strInstalaciones = trim($_POST['instalaciones']);
                
                $arrayEdificacion = $objArancelario ->insertArancelario($strAnioSelect, $strCategoriaSelect, $strMuros_columnas, $strTechos,
                $strPisos,$strPuertas_ventanas, $strRevestimientos, $strBanos,$strInstalaciones);
               
                if ($arrayEdificacion->status) {
                    
                    $arrayResponse = array('status' => true, 'msg' => $arrayEdificacion->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayEdificacion->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die();  
    }


   

?>