<?php
    require_once "../modelo/login_reg.php";
    $option=$_REQUEST['op'];
    //creando la instancia para acceder a modelo
    $objlogin=new Login();
    
    if($option=="login"){
        //como vamos recibir en formato JSON creamos Array
        $arraResponse=array('status'=>false,'data'=>"");//a qui podemos validar asignando si es que no llega ningun dato al JSON secmentos de Array
        $arrayUsuarios=$objlogin->getUsuarios();
        // a qui se ve si hay datos array que llegan
        if(!empty($arrayUsuarios)){
            //aqui se agrega lo btn borrar editar y ver si es posible
            for ($i=0; $i <count($arrayUsuarios) ; $i++) { 
                $idUsuario=$arrayUsuarios[$i]->idtb_usuario;//estamos sacando el id del tabla
                 $options='<a href="#" class="btn btn-primary btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEditarUsuario" 
                            data-idusuario="'.$idUsuario.'">Editar</a>
                           <a class="btn btn-danger btn-sm" onclick="UpdateUsuario('.$idUsuario.')">Eliminar</a>';
                $arrayUsuarios[$i]->options=$options;

            }
            //btn fin
            $arraResponse['status']=true;
            $arraResponse['data']=$arrayUsuarios;//aqui se le asigna a la data los datos de base de datos
        }
        echo json_encode($arraResponse);// a qui indicamos que imprima en json
        die();//finaliza el proceso
       
    }
    if ($option == "register") {
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['txtCodigo']) || empty($_POST['txtCorreo']) || empty($_POST['txtUsuario']) || empty($_POST['txtContrasena'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strCodigo = trim($_POST['txtCodigo']); // Eliminar espacios en blanco
                $strCorreo = strtolower(trim($_POST['txtCorreo'])); // Convertir a minúsculas
                $strUsuario = ucwords(trim($_POST['txtUsuario'])); // Poner iniciales en mayúscula
                $strContrasena = trim($_POST['txtContrasena']);
                
                // Enviando datos al modelo
                $arrayUsuarios = $objlogin->insertUsuario($strCodigo, $strCorreo, $strUsuario, $strContrasena);
                
                if ($arrayUsuarios->status) {
                    $arrayResponse = array('status' => true, 'msg' => $arrayUsuarios->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayUsuarios->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die();
    }

    if ($option == "verUsuario") {
        if($_POST){
            $idUsuario=intval($_POST["idUsuario"]);
            $arrayUsuario = $objlogin->EditUsuario($idUsuario);
            if(empty($arrayUsuario)){
                $arrayResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrayResponse = array('status' => true, 'msg' => 'Datos Encontrados','data'=>$arrayUsuario);
            }
            echo json_encode($arrayResponse);
        }
        die();

    }
    if ($option == "editar") {
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['codigo']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['password'])|| empty($_POST['id'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {/**PONER DE name=" " */
                $strCodigo = trim($_POST['codigo']); // Eliminar espacios en blanco 
                $strCorreo = strtolower(trim($_POST['correo'])); // Convertir a minúsculas
                $strUsuario = ucwords(trim($_POST['usuario'])); // Poner iniciales en mayúscula
                $strContrasena = trim($_POST['password']);
                $intId = trim($_POST['id']);
                
                // Enviando datos al modelo
                $arrayUsuarios = $objlogin->updateUsuario($strCodigo, $strCorreo, $strUsuario, $strContrasena,$intId);
                
                if ($arrayUsuarios->status) {
                    $arrayResponse = array('status' => true, 'msg' => $arrayUsuarios->msg);
                } else {
                    $arrayResponse = array('status' => false, 'msg' => $arrayUsuarios->msg);
                }
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
        die();
    }




    if ($option == "userEliminar") {
        if($_POST){
            if(empty($_POST['idUsuario'])){
                $arraResponse=array('status'=>false,msg=>'Error de datos');
            }else{
                $idUsuario=intval($_POST["idUsuario"]);
                $arrayInfo = $objlogin->EliminarUsuario($idUsuario);
                
                
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
    

    if ($option == "IngresarLogin") {
        if ($_POST) { // Validar si es un POST
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $arrayResponse = array('status' => false, 'msg' => 'Error de datos');
            } else {
                $strCodigo = trim($_POST['username']); // Eliminar espacios en blanco
                $strpassword = trim($_POST['password']); // Eliminar espacios en blanco
                
                // Enviando datos al modelo
                $arrayLogin = $objlogin->LoginUsuario($strCodigo, $strpassword);
                
                if($arrayLogin ->id_usuario){//lo que retorna en base de datos 
                    $arrayResponse = array('status' =>true, 'msg' => 'Los datos son Correctos');
                }else{
                    $arrayResponse = array('status' =>false, 'msg' => 'El Usuario o la Contraseña son Incorrectos');
                }
                
            }
            
            // Enviar la respuesta en formato JSON
            echo json_encode($arrayResponse);
        }
    }

?>