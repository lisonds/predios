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
   

    if ($op =="agregar_datos_rustico") {
                
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['anioArancelarioR']) || empty($_POST['altitud']) || empty($_POST['valorAlta']) || empty($_POST['valorMedia'])
            || empty($_POST['valorBaja'])|| empty($_POST['grupoTierra'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strAnioArancelarioR = trim($_POST['anioArancelarioR']); 
                $strAltitud = trim($_POST['altitud']); 
                $strGrupoTierra = trim($_POST['grupoTierra']);
                $strValorAlta = trim($_POST['valorAlta']);
                $strValorMedia = trim($_POST['valorMedia']);
                $strValorBaja = trim($_POST['valorBaja']);
                
             
                
                $arrayRustico = $objRustico ->insertRustico($strAnioArancelarioR, $strAltitud,$strGrupoTierra, $strValorAlta, $strValorMedia,
                $strValorBaja);
               
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