<?php
require_once "../libreria/conexion.php";

    class ValorDepreciacionModel {
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        } // constructor para la conexion de base de datos 
   

 

    public function GetDataPorClasificacion(string $clasificacion){
           $arrayLista = array();
        $rs = $this->conexion->query("CALL ObtenerDataDepreciacionPorClasificacion('{$clasificacion}')");

        while ($obj = $rs->fetch_object()) {
            array_push($arrayLista, $obj);
        }

        return $arrayLista;
    }
        // Obtener datos por año usando el procedimiento almacenado
    public function getDataByYear(string $anioSelect) {
        $arrayLista = array();
        $rs = $this->conexion->query("CALL ObtenerRusticoPorAnio('{$anioSelect}')");

        while ($obj = $rs->fetch_object()) {
            array_push($arrayLista, $obj);
        }

        return $arrayLista;
    }

        
        public function insertDepreciacion(
            string $strClasificacion,
            string $stranioDepreciacion,
            string $anioMinimo,
            string $strMaterialPre,
            string $strMuyBueno,
            string $strBueno,
            string $strRegular,
            string $strMalo
                      
        ) {
                $query = "CALL agregarDepreciacion(
                   '{$strClasificacion}',
                    '{$stranioDepreciacion}',
                    '{$anioMinimo}',
                    '{$strMaterialPre}',
                    '{$strMuyBueno}',
                    '{$strBueno}',
                    '{$strRegular}',
                    '{$strMalo}'
                                      
                )"; 

                $result = $this->conexion->query($query);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $cod = $row['resultado'];
                    
                    if ($cod == 1) {
                        return (object)[
                            "status" => true,
                            "msg" => "Se registraron correctamente los datos de Depreciacion."
                        ];
                    
                    } elseif($cod == 0) {
                        return (object)[
                            "status" => true,
                            "msg" => "Se esta Actualizando la Base de Datos Por que que existe este informacion "
                        ];
                    }else{
                        return (object)[
                            "status" => false,
                            "msg" => "Hay un Error al en Query de BD"
                        ];
                    }
                
                    
                } else {
                    return (object)[
                        "status" => false,
                        "msg" => "Error al ejecutar el procedimiento almacenado: " . $this->conexion->error
                    ];
                } 
        }

        

    }


    
?>