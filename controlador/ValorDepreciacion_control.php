<?php
    require_once "../modelo/ValorDepreciacion_model.php";

    // Verifica si existe el parámetro 'data' en la petición

    $op = $_REQUEST['data'];
    $objDepreciacion = new ValorDepreciacionModel();


   
     

    if ($op =="agregar_datos_depreciacion") {
                
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['clasificacion']) || empty($_POST['anioDepreciacion']) || empty($_POST['materialPredominante'])|| empty($_POST['muyBueno'])
            || empty($_POST['bueno'])|| empty($_POST['regular'])|| empty($_POST['malo'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strClasificacion = trim($_POST['clasificacion']); 
                $stranioDepreciacion = trim($_POST['anioDepreciacion']); 
                $strMaterialPre = trim($_POST['materialPredominante']);
                $strMuyBueno = trim($_POST['muyBueno']);
                $strBueno = trim($_POST['bueno']);
                $strRegular = trim($_POST['regular']);
                $strMalo = trim($_POST['malo']);

                // Convertir a número decimal
                $aniodepre= intval($stranioDepreciacion);
                $anioMinimo = $aniodepre-4;

                // Multiplicar
                $arrayValorDepreciacion = $objDepreciacion ->insertDepreciacion($strClasificacion,  $anioMinimo,$stranioDepreciacion,$strMaterialPre,$strMuyBueno
                    ,$strBueno,$strRegular,$strMalo );
               
                if ($arrayValorDepreciacion->status) {
                    
                    $arrayResponse = array('status' => true, 'msg' => $arrayValorDepreciacion->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayValorDepreciacion->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die();  
    }

          
    if ($op =="extraer_data_clasificacion") {
          if ($_POST) {
        if (empty($_POST['matPredominante'])) {
            $arrayResponse = array(
                'status' => false,
                'msg' => 'Error: Selecciona una Clasificacion.',
                'data' => ''
            );
        } else {
            $clasificacion = trim($_POST['matPredominante']);
            $arrayValorDrepeciacion = $objDepreciacion->GetDataPorClasificacion($clasificacion);

            if (empty($arrayValorDrepeciacion)) {
                $arrayResponse = array(
                    'status' => false,
                    'msg' => 'No se encontraron datos para este clasificacion.',
                    'data' => ''
                );
            } else {
                $arrayResponse = array(
                    'status' => true,
                    'msg' => 'Datos encontrados.',
                    'data' => $arrayValorDrepeciacion
                );
            }
        }
    } else {
        $arrayResponse = array(
            'status' => false,
            'msg' => 'Solicitud inválida (se esperaba POST).',
            'data' => ''
        );
    }

    echo json_encode($arrayResponse);
    die();
        
    }

   

?>