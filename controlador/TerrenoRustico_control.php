<?php
    require_once "../modelo/arancelarios_model.php";

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
            if (empty($_POST['anioArancelarioR']) || empty($_POST['Altitud']) || empty($_POST['valorAlta']) || empty($_POST['valorMedia'])
            || empty($_POST['valorBaja'])|| empty($_POST['grupoTierra'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strAnioArancelarioR = trim($_POST['anioArancelarioR']); 
                $strAltitud = trim($_POST['altitud']); 
                $strValorAlta = trim($_POST['valorAlta']);
                $strValorMedia = trim($_POST['valorMedia']);
                $strValorBaja = trim($_POST['valorBaja']);
                $strGrupoTierra = trim($_POST['grupoTierra']);
                
                
                $arrayRustico = $objRustico ->insertRustico($strAnioArancelarioR, $strAltitud, $strValorAlta, $strValorMedia,
                $strValorBaja,$strGrupoTierra);
               
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


   

?>