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
            echo("Sí se ejecutó esta función con el código: " . $codIdentificador);
          
            $arrayPropietarios = [];
            $rs = $this->conexion->query("CALL ObtenerPropietariosPorCodigo('{$codIdentificador}')");
        
            while ($obj = $rs->fetch_object()) {
                $arrayPropietarios[] = $obj;
            }
        
            return $arrayPropietarios;
        }

        public function insertPropietario( string $strCodigo,  string $strcontribuyente, string $strRsocial, string $strDni,
        string $strNombre,string $strApellidoP,string $strApellidoM,string $strDireccion,string $strDistrito,string $strProvincia,string $strDepartamento){
            $sql = "CALL insertPropietario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $this->conexion->prepare($sql);
            $query->bind_param("sssssssssss",//esto son tipos de datos para cada uno 
                $strCodigo, $strContribuyente, $strRsocial, $strDni, 
                $strNombre, $strApellidoP, $strApellidoM, 
                $strDireccion, $strDistrito, $strProvincia, $strDepartamento
            );
            if ($query->execute()) {
                $result = $query->get_result();
                if ($row = $result->fetch_assoc()) {
                    return $row['id']; // Retorna el ID del propietario insertado
                }
            }
            return false; // Retorna false en caso de error
        }
        
    }
?>