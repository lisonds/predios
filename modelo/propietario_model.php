<?php 
require_once "../libreria/conexion.php";
    class Propietario{
        private $conexion;
        function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->conect();

        }//este constructor esta que trae la conexion del base de datos
        public function GenerarCodigo(){
            $sql=$this->conexion->query("SELECT LPAD(CAST(codigo AS UNSIGNED) + 1, 6, '0') AS nuevo_codigo
                        FROM indentificador
                        ORDER BY codigo DESC
                        LIMIT 1");//en este codigo sql retorna datos del ultimo codigo aumentado +1
            $sql=$sql->fetch_object();
            return $sql;
           
        }

        public function getCodPropietario(string $codIdentificador){        
            $arrayPropietarios = array();
            $rs = $this->conexion->query("CALL ObtenerPropietariosPorCodigo('{$codIdentificador}')");
        
            while ($obj = $rs->fetch_object()) {
                array_push($arrayPropietarios,$obj);
            }
        
            return $arrayPropietarios;
        }

        public function insertPropietario(string $strCodigo,  string $strcontribuyente, string $strRsocial, string $strDni,
        string $strNombre,string $strApellidoP,string $strApellidoM,string $strDireccion,string $strDistrito,string $strProvincia,string $strDepartamento){
                        $query = "CALL insertPropietario(
                '{$strCodigo}',
                '{$strcontribuyente}',
                '{$strRsocial}',
                '{$strDni}',
                '{$strNombre}',
                '{$strApellidoP}',
                '{$strApellidoM}',
                '{$strDireccion}',
                '{$strDistrito}',
                '{$strProvincia}',
                '{$strDepartamento}',
                @idPropietarios
            )";

            $result = $this->conexion->query($query);

               if ($result) {
                        // Recuperar el valor del parámetro OUT (@idPropietarios)
                        $queryResult = $this->conexion->query("SELECT @idPropietarios AS idPropietarios");
                
                        if ($queryResult) {
                            $row = $queryResult->fetch_assoc();
                            $idPropietarios = $row['idPropietarios'] ?? null;
                
                            if ($idPropietarios) {
                                // Retornar el ID del predio y el mensaje de éxito
                                return (object) [
                                    "status" => true,
                                    "idPropietarios" => $idPropietarios,
                                    "msg" => "Se registró correctamente un Propiesatrio"
                                ];
                            } else {
                                // Manejo en caso de no obtener un ID válido
                                return (object) [
                                    "status" => false,
                                    "msg" => "El procedimiento no devolvió un ID válido"
                                ];
                            }
                        } else {
                            // Error al ejecutar la consulta de recuperación de @idpredios
                            return (object) [
                                "status" => false,
                                "msg" => "Error al recuperar el ID: " . $this->conexion->error
                            ];
                        }
                    } else {
                        // Error al ejecutar el procedimiento almacenado
                        return (object) [
                            "status" => false,
                            "msg" => "Error al ejecutar el procedimiento almacenado: " . $this->conexion->error
                        ];
                    }           

        
        }

          public function VerPropietarioId(int $idPropietario){
            $sql=$this->conexion->query("SELECT * FROM propietarios where idPropietarios='$idPropietario'");
            $sql=$sql->fetch_object();
            return $sql;
        }

        public function updatePropietario(int $strIdpropietario, string $strnombre_completo, string $strDni, string $strRsocial,
        string $strtipo,string $strdireccion,string $strdistrito,string $strprovincia,string $strdepartamento){
        $query = "UPDATE `propietarios` SET `Tipo` = '{$strnombre_completo}', `dni` = '{$strDni}',
         `tipo` = '{$strtipo}', `direccion` = '{$strdireccion}', `distrito` = '{$strdistrito}', 
         `provincia` = '{$strprovincia}', `departamento` = '{$strdepartamento}' WHERE (`idpropietarios` = '{$strIdpropietario}')";
            $result = $this->conexion->query($query);
            if ($result) {
                // Retornar un objeto con el ID del usuario insertado y el mensaje de éxito
                return (object) [
                    "status" => true,
                    "idtb_usuario" => $this->conexion->insert_id,
                    "msg" => "Usuario editado correctamente"
                ];
            } else {
                // Retornar un objeto con el error
                return (object) [
                    "status" => false,
                    "msg" => "Error al Editar usuario: " . $this->conexion->error
                ];
            }
        }

        
        
    }
?>