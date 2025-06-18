<?php
    require_once "../modelo/TerrenoRustico_model.php";

    // Verifica si existe el parámetro 'data' en la petición

    $op = $_REQUEST['data'];
    $objRustico = new RusticoModel();


   
      
    if ($op === "obtener_datos_por_anio") {
        if($_POST){
            $anio=$_POST["anio"];
            $arrayDataRustico = $objRustico->getDataByYear($anio);
                     
            if(empty($arrayDataRustico)){
                $arrayResponse = array('status' => false,'data'=>'', 'msg' => 'No hay datos para este año');
            }else{
                                //btn fin
                $arrayResponse['status']=true;
                $arrayResponse['data']=$arrayDataRustico;//aqui se le asigna a la data los datos de base de datos
                $arrayResponse['msg']='Datos Encontrados';
                
            }
            echo json_encode($arrayResponse);
        }
        die();
    }
   

    if ($op =="agregar_datos_uit") {
                
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['anioImpusitivaR']) || empty($_POST['uit']) || empty($_POST['BaseLegal'])|| empty($_POST['valorstatic'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $stranioImpusitivaR = trim($_POST['anioImpusitivaR']); 
                $strUit = trim($_POST['uit']); 
                $strBaseLegal = trim($_POST['BaseLegal']);
                $strValorstatic = trim($_POST['valorstatic']);

                // Convertir a número decimal
                $uit = floatval($strUit);
                $valorStatic = floatval($strValorstatic);

                // Multiplicar
                $valorMinimo = $uit * $valorStatic;

                // (Opcional) Formatear a 2 decimales, si se desea:
                $valorMinimoFormateado = number_format($valorMinimo, 2); 
                $arrayRustico = $objRustico ->insertRustico($stranioImpusitivaR, $strUit, $strBaseLegal,$valorMinimoFormateado);
               
                if ($arrayRustico->status) {
                    
                    $arrayResponse = array('status' => true, 'msg' => $arrayRustico->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayRustico->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die();  
    }


      if ($op =="extraer_anio") {
             $arrayDataRusticoAnio = $objRustico->getYears();
                     
            if(empty($arrayDataRusticoAnio)){
                $arrayResponse = array('status' => false,'data'=>'', 'msg' => 'no hay registro de años');
            }else{
                                //btn fin
                $arrayResponse['status']=true;
                $arrayResponse['data']=$arrayDataRusticoAnio;//aqui se le asigna a la data los datos de base de datos
                $arrayResponse['msg']='Datos Encontrados';
                
            }
            echo json_encode($arrayResponse);
            die();  

      }

      
    if ($op =="extraer_data_anio") {
          if ($_POST) {
        if (empty($_POST['anio'])) {
            $arrayResponse = array(
                'status' => false,
                'msg' => 'Error: El año es obligatorio.',
                'data' => ''
            );
        } else {
            $anio = intval(trim($_POST['anio']));
            $arrayRustico = $objRustico->GetDataPorAnio($anio);

            if (empty($arrayRustico)) {
                $arrayResponse = array(
                    'status' => false,
                    'msg' => 'No se encontraron datos para el año ingresado.',
                    'data' => ''
                );
            } else {
                $arrayResponse = array(
                    'status' => true,
                    'msg' => 'Datos encontrados.',
                    'data' => $arrayRustico
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