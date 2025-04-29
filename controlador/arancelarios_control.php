<?php
    require_once "../modelo/predio_model.php";
    $option=$_REQUEST['data'];
    //creando la instancia para acceder a modelo
    $objArancelario=new ArancelariosModel();
    /*
    if ($option == "busca_codigo") {
        if($_POST){
            $codIdentificador=$_POST["codigo"];
            $arrayPredios = $objArancelario->getCodPredios($codIdentificador);
                     
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

    

    private function getDataByYear() {
    if ($_GET) {
        $year = $_GET['year'];
        $data = $this->model->getDataByYear($year);
        echo json_encode(['status' => true, 'data' => $data]);
        die();
    }
}

?>