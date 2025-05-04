<?php
    require_once "../modelo/RuralUrbano_model.php";
    $option=$_REQUEST['datos'];
    //creando la instancia para acceder a modelo
    $objRuralUrbano=new RuralUrbano();

    if ($option == "busca_codigo") {
        if($_POST){
            $codIdentificador=$_POST["codigo"];
            $arrayPredios = $objRuralUrbano->getCodPredios($codIdentificador);
                     
            if(empty($arrayPredios)){
                $arrayResponse = array('status' => false,'data'=>'', 'msg' => 'No hay Registros de Predios Con Este Codigo');
            }else{
                for ($i=0; $i <count($arrayPredios) ; $i++) { 
                    $idpredio=$arrayPredios[$i]->idpredios;//estamos sacando el id del tabla
                    $options = '<a href="#" class="btn btn-primary btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalEditarPredio" 
                                    data-idpredio="'.$idpredio.'"><i class="ri-file-edit-line"></i></a>
                                <a class="btn btn-danger btn-sm" onclick="DeletePredio('.$idpredio.')"><i class="ri-delete-bin-6-line"></i></a>
                                <a href="viewRuralUrbano.php?idpredio='.$idpredio.'" 
                                class="btn btn-success btn-sm" 
                                target="_blank">
                                Calcular Autovaluo
                                </a>';
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

    if ($option == "agregar_dataRuralSinPredio") {
              
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['anio']) || empty($_POST['selectRural']) ||empty($_POST['idPredio']) || empty($_POST['tipoTerreno']) || empty($_POST['usoTerreno'])
                || empty($_POST['tierrasAptas'])|| empty($_POST['altitud'])|| empty($_POST['calidad'])|| empty($_POST['hectareas'])|| $_POST['acceso'] === '') {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos en controler');
            } else {
                $strAnio = trim($_POST['anio']); 
                $strRural = $_POST['selectRural'];//idPredio
                $idPredio = $_POST['idPredio'];
                $strTipoTerreno = $_POST['tipoTerreno'];
                $strUsoTerreno = $_POST['usoTerreno'];
                $strTierrasAptas = $_POST['tierrasAptas'];
                $strAltitud = $_POST['altitud'];
                $strCalidad = $_POST['calidad'];
                $strhectareas = $_POST['hectareas'];
                $stracceso = $_POST['acceso'];
                                
                // Enviando datos al modelo
                $arrayRuralUrbano = $objRuralUrbano->insertDatoSinConstruccion($strAnio, $strRural,$idPredio, $strTipoTerreno, $strUsoTerreno,
                $strTierrasAptas,$strAltitud,$strCalidad,$strhectareas,$stracceso );
                
                if ($arrayRuralUrbano->status) {
                    $arrayResponse = array('status' => true, 'msg' => $arrayRuralUrbano->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayRuralUrbano->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die(); 
        //agregar_dataRuralConPredio
    }
    if ($option == "agregar_dataRuralConPredio") {
        if ($_POST) {
            if (
                empty($_POST['anio']) || empty($_POST['selectRural']) || empty($_POST['idPredio']) ||
                empty($_POST['tipoTerreno']) || empty($_POST['usoTerreno']) || empty($_POST['tierrasAptas']) ||
                empty($_POST['altitud']) || empty($_POST['calidad']) || empty($_POST['hectareas']) ||
                $_POST['acceso'] === '' || empty($_POST['clasPredio']) || empty($_POST['MatConstruccion']) ||
                empty($_POST['EstConservacion']) || empty($_POST['TipoUso']) 
            ) {
                $arrayResponse = array('success' => false, 'message' => 'Error: Faltan datos obligatorios');
            } else {
                  // Captura y limpieza de datos
                    $strAnio             = trim($_POST['anio']);
                    $strRural            = $_POST['selectRural'];
                    $idPredio            = $_POST['idPredio'];
                    $strTipoTerreno      = $_POST['tipoTerreno'];
                    $strUsoTerreno       = $_POST['usoTerreno'];
                    $strTierrasAptas     = $_POST['tierrasAptas'];
                    $strAltitud          = $_POST['altitud'];
                    $strCalidad          = $_POST['calidad'];
                    $strHectareas        = $_POST['hectareas'];
                    $strAcceso           = $_POST['acceso'];

                    $strClasPredio       = $_POST['clasPredio'];
                    $strMaterialCons     = $_POST['MatConstruccion'];
                    $strEstConservacion  = $_POST['EstConservacion'];
                    $strTipoUso          = $_POST['TipoUso'];
                    
                        // Procesar datos de edificaciones si existen
                    $edificaciones = [];
                    if (!empty($_POST['edificacion'])) {
                        $decoded = json_decode($_POST['edificacion'], true);
                        if (is_array($decoded)) {
                            $edificaciones = $decoded;
                        }
                    }
                    $edificaciones_json = json_encode($edificaciones, JSON_UNESCAPED_UNICODE);
                     // Enviando datos al modelo
                        $arrayRuralUrbano = $objRuralUrbano->insertDatoConConstruccion(
                            $strAnio, $strRural, $idPredio, $strTipoTerreno, $strUsoTerreno,
                            $strTierrasAptas, $strAltitud, $strCalidad, $strHectareas, $strAcceso,
                            $strClasPredio, $strMaterialCons, $strEstConservacion, $strTipoUso, $edificaciones_json
                        );

                        // Respuesta
                        if ($arrayRuralUrbano->status) {
                            $arrayResponse = array('status' => true, 'msg' => $arrayRuralUrbano->msg);
                        } else {
                            $arrayResponse = array('status' => false, 'msg' => $arrayRuralUrbano->msg);
                        }
                    }

                    echo json_encode($arrayResponse);

            }
        }


    if ($option == "verPredio") {
        if($_POST){
            $idPredio=intval($_POST["idPredio"]);
            $arrayPredio = $objRuralUrbano->VerPredioId($idPredio);
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
                $arrayPredio = $objRuralUrbano->updatePredio($strIdpredio, $strDenominado, $strSector, $strDistrito,$strProvincia, $strDepartamento, $strCodPredial,$strCodCatastral);
                
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
                $arraResponse=array('status'=>false,'msg'=>'Error de datos');
            }else{
                $idUsuario=intval($_POST["idPredios"]);
                $arrayInfo = $objRuralUrbano->EliminarPredio($idUsuario);
                
                
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