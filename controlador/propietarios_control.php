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
        if ($_POST) {
            $codIdentificador = $_POST["codigo"];
            $arrayPropietarios = $objPropietario->getCodPropietario($codIdentificador);
    
            if (empty($arrayPropietarios)) {
                $arrayResponse = array(
                    'status' => false,
                    'data' => '',
                    'msg' => 'No hay Registros de Propietarios Con Este Codigo'
                );
            } else {
                for ($i = 0; $i < count($arrayPropietarios); $i++) {
                    $idpropietario = $arrayPropietarios[$i]->idpropietarios; // ✅ corregido
    
                    $options = '<a href="#" class="btn btn-primary btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalEditarPropietario" 
                                    data-idpredio="' . $idpropietario . '"><i class="ri-file-edit-line"></i></a>
                                <a class="btn btn-danger btn-sm" onclick="DeletePropietario(' . $idpropietario . ')"><i class="ri-delete-bin-6-line"></i></a>';
    
                    $arrayPropietarios[$i]->options = $options;
                }
    
                $arrayResponse = array(
                    'status' => true,
                    'data' => $arrayPropietarios,
                    'msg' => 'Datos Encontrados'
                );
            }
    
            header('Content-Type: application/json'); // Opcional pero recomendable
            echo json_encode($arrayResponse);
            die(); // Finaliza correctamente la ejecución
        }
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

 if ($option == "verPropietario") {
        if($_POST){
            $idPropietario=intval($_POST["idPropietario"]);
            $arrayPredio = $objPredio->VerPropietarioId($idPropietario);
            if(empty($arrayPropietario)){
                $arrayResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrayResponse = array('status' => true, 'msg' => 'Datos Encontrados','data'=>$arrayPropietario);
            }
            echo json_encode($arrayResponse);
        }
        die();

    }



    if ($option == "Delete") { 
        if($_POST){
            if(empty($_POST['idPropietarios'])){
                $arraResponse=array('status'=>false,'msg'=>'Error de datos');
            }else{
                $idUsuario=intval($_POST["idPropietarios"]);
                $arrayInfo = $objPropietarios->EliminarPropietario($idUsuario);
                
                
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