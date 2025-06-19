<?php
    require_once "../modelo/ValorImpusitiva_model.php";

    // Verifica si existe el parámetro 'data' en la petición

    $op = $_REQUEST['data'];
    $objImpusitiva = new ValorImpusitivaModel();


   
      
    if ($op === "obtener_datos_por_anio") {
        if($_POST){
            $anio=$_POST["anio"];
            $arrayDataRustico = $objImpusitiva->getDataByYear($anio);
                     
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
                $arrayValorImpusitiva = $objImpusitiva ->insertImpusitiva($stranioImpusitivaR, $strUit, $strBaseLegal,$valorMinimoFormateado);
               
                if ($arrayValorImpusitiva->status) {
                    
                    $arrayResponse = array('status' => true, 'msg' => $arrayValorImpusitiva->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayValorImpusitiva->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die();  
    }

    if ($op =="extraer_data") {
        
            
            $arrayDataImpusitiva = $objImpusitiva->GetData();

            if(empty($arrayDataImpusitiva )){
                $arrayResponse = array('status' => false,'data'=>'', 'msg' => 'No hay Registros de Predios Con Este Codigo');
            }else{
                for ($i=0; $i <count($arrayDataImpusitiva ) ; $i++) { 
                    $idUIT=$arrayDataImpusitiva [$i]->idImpusitiva_Tributaria;//estamos sacando el id del tabla
                    $options = '<a href="#" class="btn btn-primary btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalEditarImpusitario" 
                                    data-idpredio="'.$idUIT.'"><i class="ri-file-edit-line"></i></a>
                                <a class="btn btn-danger btn-sm" onclick="DeleteImpusitario('.$idUIT.')"><i class="ri-delete-bin-6-line"></i></a>
                                ';
                    $arrayDataImpusitiva [$i]->options=$options;
    
                }
                //btn fin
                $arrayResponse['status']=true;
                $arrayResponse['data']=$arrayDataImpusitiva ;//aqui se le asigna a la data los datos de base de datos
                $arrayResponse['msg']='Datos Encontrados';
                
            }
            
        

        echo json_encode($arrayResponse);
        die();

    }


    if ($op =="extraer_anio") {
             $arrayValorImpusitiva = $objImpusitiva->getYears();
                     
            if(empty($arrayValorImpusitiva)){
                $arrayResponse = array('status' => false,'data'=>'', 'msg' => 'no hay registro de años');
            }else{
                                //btn fin
                $arrayResponse['status']=true;
                $arrayResponse['data']=$arrayValorImpusitiva;//aqui se le asigna a la data los datos de base de datos
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
            $arrayValorImpusitiva = $objImpusitiva->GetDataPorAnio($anio);

            if (empty($arrayValorImpusitiva)) {
                $arrayResponse = array(
                    'status' => false,
                    'msg' => 'No se encontraron datos para el año ingresado.',
                    'data' => ''
                );
            } else {
                $arrayResponse = array(
                    'status' => true,
                    'msg' => 'Datos encontrados.',
                    'data' => $arrayValorImpusitiva
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