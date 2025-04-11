<?php
    require_once "../modelo/predio_model.php";
    $option=$_REQUEST['predio'];
    //creando la instancia para acceder a modelo
    $objPredio=new Predio();

    if ($option == "busca_codigo") {
        if($_POST){
            $codIdentificador=$_POST["codigo"];
            $arrayPredios = $objPredio->getCodPredios($codIdentificador);
                     
            if(empty($arrayPredios)){
                $arrayResponse = array('status' => false,'data'=>'', 'msg' => 'No hay Registros de Predios Con Este Codigo');
            }else{
                for ($i=0; $i <count($arrayPredios) ; $i++) { 
                    $idpredio=$arrayPredios[$i]->idpredios;//estamos sacando el id del tabla
                     $options='<a href="#" class="btn btn-primary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEditarPredio" 
                                data-idpredio="'.$idpredio.'"><i class="ri-file-edit-line"></i></a>
                               <a class="btn btn-danger btn-sm" onclick="DeletePredio('.$idpredio.')"><i class="ri-delete-bin-6-line"></i></a>';
                    $arrayPredios[$i]->options=$options;
    
                }
                //btn fin
                $arrayResponse['status']=true;
                $arrayResponse['data']=$arrayPredios;//aqui se le asigna a la data los datos de base de datos
                $arrayResponse['msg']='Datos Encontrados';
                
            }
            echo json_encode($arrayResponse);
        }
        die();

    }

    if ($option == "agregar_predio") {
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['codigoValor']) || empty($_POST['predioDenominado']) || empty($_POST['sector']) || empty($_POST['distrito'])
            || empty($_POST['provincia'])|| empty($_POST['departamento'])|| empty($_POST['codigoPredial'])|| empty($_POST['codigoCatastral'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strCodigo = ucwords(trim($_POST['codigoValor'])); 
                $strDenominado = ucwords($_POST['predioDenominado']); 
                $strSector = ucwords($_POST['sector']);
                $strDistrito = ucwords($_POST['distrito']);
                $strProvincia = ucwords($_POST['provincia']);
                $strDepartamento = ucwords($_POST['departamento']);
                $strCodigoPredial = ucwords($_POST['codigoPredial']);
                $strCodigoCatastral = ucwords($_POST['codigoCatastral']);
                                
                // Enviando datos al modelo
                $arrayPredio = $objPredio->insertPredio($strCodigo, $strDenominado, $strSector, $strDistrito,
                $strProvincia,$strDepartamento,$strCodigoPredial,$strCodigoCatastral);
                
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


    if ($option == "verPredio") {
        if($_POST){
            $idPredio=intval($_POST["idPredio"]);
            $arrayPredio = $objPredio->VerPredioId($idPredio);
            if(empty($arrayPredio)){
                $arrayResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrayResponse = array('status' => true, 'msg' => 'Datos Encontrados','data'=>$arrayPredio);
            }
            echo json_encode($arrayResponse);
        }
        die();

    }

    if ($option == "UpDate") {  
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['idpredio']) || empty($_POST['predioDenominadoEdit']) || empty($_POST['sectorEdit']) || empty($_POST['distritoEdit'])|| empty($_POST['provinciaEdit'])
            || empty($_POST['departamentoEdit'])|| empty($_POST['codigoPredialEdit'])|| empty($_POST['codigoCatastralEdit'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {/**PONER DE name=" " */
                $strIdpredio= trim($_POST['idpredio']); // Eliminar espacios en blanco 
                $strDenominado = ucwords(trim($_POST['predioDenominadoEdit']));
                $strSector = ucwords(trim($_POST['sectorEdit']));
                $strDistrito = ucwords(trim($_POST['distritoEdit']));
                $strProvincia = ucwords(trim($_POST['provinciaEdit']));
                $strDepartamento = ucwords(trim($_POST['departamentoEdit']));
                $strCodPredial = trim($_POST['codigoPredialEdit']);
                $strCodCatastral = trim($_POST['codigoCatastralEdit']);
                              
                // Enviando datos al modelo
                $arrayPredio = $objPredio->updatePredio($strIdpredio, $strDenominado, $strSector, $strDistrito,$strProvincia, $strDepartamento, $strCodPredial,$strCodCatastral);
                
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

    if ($option == "Delete") { 
        if($_POST){
            if(empty($_POST['idPredios'])){
                $arraResponse=array('status'=>false,msg=>'Error de datos');
            }else{
                $idUsuario=intval($_POST["idPredios"]);
                $arrayInfo = $objPredio->EliminarPredio($idUsuario);
                
                
                if($arrayInfo ->id_eliminado){//lo que retorna en base de datos 
                    $arrayResponse = array('status' =>true, 'msg' => 'Registro Eliminado');
                }else{
                    $arrayResponse = array('status' =>false, 'msg' => 'error al Eliminar');
                }
                echo json_encode($arrayResponse);
            }          
           
        }
        die();

    }

?>