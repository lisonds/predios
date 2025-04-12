<?php
    require_once "../modelo/propietario_model.php";
    $option=$_REQUEST['propietario'];
    //creando la instancia para acceder a modelo
    $objPropietario=new Propietario();

    if ($option == "generateCodigo") {
        $arrayPropietario= $objPropietario->GenerarCodigo();
        if(empty($arrayPropietario)){
            $arrayResponse = array('status' => false, 'msg' => 'Error Al Retornar');
        }else{
            $arrayResponse = array('status' => true, 'msg' => 'Se Genero el Cod recomendado','data'=>$arrayPropietario);
        }
        echo json_encode($arrayResponse);
        die();
    }


    if ($option == "busca_codigo") {
        if($_POST){
            $codIdentificador=$_POST["codigo"];
           
            $arrayPropietarios = $objPropietario->getCodPropietario($codIdentificador);
            
            if(empty($arrayPropietarios)){
                $arrayResponse = array('status' => false,'data'=>'', 'msg' => 'No hay Registros de Propietarios Con Este Codigo');
            }else{
                for ($i=0; $i <count($arrayPropietarios) ; $i++) { 
                    $idpropietarios=$arrayPropietarios[$i]->idpropietarios;//estamos sacando el id del tabla
                     $options='<a href="#" class="btn btn-primary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEditarPredio" 
                                data-idpredio="'.$idpropietarios.'"><i class="ri-file-edit-line"></i></a>
                               <a class="btn btn-danger btn-sm" onclick="DeletePredio('.$idpropietarios.')"><i class="ri-delete-bin-6-line"></i></a>';
                    $arrayPropietarios[$i]->options=$options;
    
                }
                //btn fin
                $arrayResponse['status']=true;
                $arrayResponse['data']=$arrayPropietarios;//aqui se le asigna a la data los datos de base de datos
                $arrayResponse['msg']='Datos Encontrados';
                
            }
            echo json_encode($arrayResponse);
        }
        die();

    }


if ($option == "agregar_propietario") {
    if ($_POST) { // Validar si es un POST
        if (empty($_POST['codigoGenerado']) || empty($_POST['contribuyente']) || empty($_POST['R_social']) || empty($_POST['dni'])
        || empty($_POST['nombres'])|| empty($_POST['apellido_p'])|| empty($_POST['apellido_m'])|| empty($_POST['direccion'])
        || empty($_POST['distrito'])|| empty($_POST['provincia'])|| empty($_POST['departamento'])) {
            $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
        } else {
            $strCodigo = ucwords(trim($_POST['codigoGenerado'])); 
            $strcontribuyente= ucwords($_POST['contribuyente']); 
            $strRsocial = ucwords($_POST['R_social']);
            $strDni = ucwords($_POST['dni']);
            $strNombre = ucwords($_POST['nombres']);
            $strApellidoP = ucwords($_POST['apellido_p']);
            $strApellidoM = ucwords($_POST['apellido_m']);
            $strDireccion = ucwords($_POST['direccion']);
            $strDistrito = ucwords($_POST['distrito']);
            $strProvincia = ucwords($_POST['provincia']);
            $strDepartamento = ucwords($_POST['departamento']);
                            
            // Enviando datos al modelo
            $idPropietario = $objPropietario->insertPropietario($strCodigo, $strcontribuyente, $strRsocial, $strDni,
            $strNombre,$strApellidoP,$strApellidoM,$strDireccion,$strDistrito,$strProvincia,$strDepartamento);
            if ($idPropietario) {
                $arrayResponse = array('status' => true, 'msg' => "Se Guardo Correctamente");
            } else {
                $arrayResponse = array('status' => false, 'msg' => "Hay un error en Guardar ");
            }

           
        }
        
        // Enviar la respuesta en formato JSON
        echo json_encode($arrayResponse);
    }
    die();
}
   
?>