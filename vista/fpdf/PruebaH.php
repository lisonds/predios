<?php
require('./fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('Logo-quinua.png', 10, 10, 30); // Ajusta la ruta si es necesario

        // Título institucional
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, utf8_decode('MUNICIPALIDAD DISTRITAL DE QUINUA'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 7, utf8_decode('DECLARACION JURADA DE IMPUESTO PREDIAL'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 7, utf8_decode('T.U.O de la Ley de Tributacion Municipal (D.S. N° 156-2004-EF)'), 0, 0, 'C');
        $this->Ln(5);

        // Tipo de documento (HR)
        $this->SetFont('Arial', 'B', 10);
        $this->Image('HR.png', 160, 10, 30);
        $this->Cell(0, 6, utf8_decode(''), 0, 1, 'R');
        $this->Ln(5);
    }
        // Nuevo encabezado para la segunda página
    function HeaderSegundaPagina()
    {
        // Limpiar el encabezado anterior
        $this->SetY(10); // Reiniciar posición Y

        // Logo diferente o mismo logo
        $this->Image('logo-quinua.png', 10, 10, 30); // Mismo logo o cambia por otro si es necesario

        // Título diferente para la segunda página
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, utf8_decode('MUNICIPALIDAD DISTRITAL DE QUINUA'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 7, utf8_decode('DECLARACION JURADA DE IMPUESTO PREDIAL'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 7, utf8_decode('T.U.O de la Ley de Tributacion Municipal (D.S. N° 156-2004-EF)'), 0, 0, 'C');
        $this->Ln(5);

        // Tipo de documento (PR)
        $this->SetFont('Arial', 'B', 10);
        $this->Image('PR.png', 160, 10, 30);
        $this->Cell(0, 6, utf8_decode(''), 0, 1, 'R');
        $this->Ln(15);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');

        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $hoy = date('d/m/Y');
        $this->Cell(0, 10, utf8_decode('Fecha de emisión: ') . $hoy, 0, 0, 'R');
    }
}

// Datos recibidos por POST
/*$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$area_terreno = floatval($_POST['area_terreno']);
$area_construida = floatval($_POST['area_construida']);
$anio_construccion = intval($_POST['anio_construccion']);
$val_terreno = floatval($_POST['valor_terreno']);
$val_construccion = floatval($_POST['valor_construccion']);
$autovaluo_bruto = floatval($_POST['autovaluo_bruto']);
$factor_antiguedad = floatval($_POST['factor_antiguedad']);
$autovaluo_neto = floatval($_POST['autovaluo_neto']);*/

// Cálculos adicionales
//$impuesto_anual = round($autovaluo_neto * 0.02, 2); // Ejemplo: 2% del autovalúo neto

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("P"); // Vertical
$pdf->SetFont('Arial', '', 9);



$pdf->Cell(40, 6, utf8_decode('ACREEDOR:'), 1, 0, 'C');
$pdf->Cell(70, 6, utf8_decode('MUNICIPALIDAD DISTRITAL DE QUINUA'), 1, 0, 'L');
$pdf->Cell(30, 6, utf8_decode('CODIGO:'), 1, 0, 'C');
$pdf->Cell(40, 6, '000002', 1, 1, 'C');

$pdf->Cell(40, 6, utf8_decode('AÑO:'), 1, 0, 'C');
$pdf->Cell(50, 6, '2023', 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('FECHA:'), 1, 0, 'C');
$pdf->Cell(40, 6, '10/04/2025', 1, 1, 'C');
$pdf->Ln(5);

// DATOS DEL CONTRIBUYENTE
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('DATOS DEL CONTRIBUYENTE'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(50, 6, utf8_decode('NOMBRE O RAZON SOCIAL:'), 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('TULIO ORE ICHACCAYA'), 1, 0, 'L');
//$pdf->Cell(120, 6, utf8_decode($nombre), 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('TIPO Y N° DOC.'), 1, 0, 'C');
$pdf->Cell(40, 6, '70422589', 1, 1, 'C');
$pdf->Ln(5);

$pdf->Cell(50, 6, utf8_decode('TIPO DE CONTRIBUYENTE:'), 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('Propietario'), 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('% DE PERTENENCIA:'), 1, 0, 'C');
$pdf->Cell(40, 6, '100%', 1, 1, 'C');

$pdf->Cell(50, 6, utf8_decode('CONYUGE:'), 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('SARA SARMIENTO VARGAS'), 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('TIPO Y N° DOC.'), 1, 0, 'C');
$pdf->Cell(40, 6, '78965423', 1, 1, 'C');
$pdf->Ln(5);


// METODOS DE CONTACTO
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('METODOS DE CONTACTO'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(40, 6, utf8_decode('N° CELULAR:'), 1, 0, 'C');
$pdf->Cell(40, 6, '', 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('CORREO:'), 1, 0, 'C');
$pdf->Cell(60, 6, '', 1, 1, 'L');

//RELACION DE PREDIOS DECLARADOS
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('RELACION DE PREDIOS DECLARADOS'), 0, 1);
$pdf->SetFont('Arial', '', 9);


$pdf->Cell(70, 6, utf8_decode('UBICACION'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('AUTOVALUO'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('% DE PROPIEDAD'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('AUTOVALUO EFECTO'), 1, 1, 'C');

$pdf->Cell(70, 15, utf8_decode('Predio denominado Quillca...'), 1, 0, 'L');
$pdf->Cell(40, 15, '', 1, 0, 'C');
$pdf->Cell(35, 15, '100%', 1, 0, 'C');
$pdf->Cell(35, 15, '', 1, 1, 'C');
//$pdf->Cell(40, 6, number_format($autovaluo_neto, 2), 1, 1, 'R');

$pdf->Cell(25, 6, utf8_decode('COD PREDIAL'), 1, 0, 'C');
$pdf->Cell(20, 6, '12345666', 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('COD CATASTRAL'), 1, 0, 'C');
$pdf->Cell(40, 6, '78_144225_455', 1, 0, 'C');
$pdf->Cell(25, 10, utf8_decode('TOTAL'), 1, 0, 'C');
$pdf->Cell(35, 10, '', 1, 1, 'C');
//$pdf->Cell(40, 6, number_format($autovaluo_neto, 2), 1, 1, 'R');


//DETERMINACION DEL CALCULO DEL IMPUESTO
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('DETERMINACION DEL CALCULO DEL IMPUESTO'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(10, 6, utf8_decode('AÑO'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('V. DEL TERRENO'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('V. DE CONSTRUCCION'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('TOTAL AUTOVALUO'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('CALC DEL IMPUESTO'), 1, 0, 'C');
$pdf->Cell(30, 6, utf8_decode('IMP ANUAL'), 1, 1, 'C');

$pdf->Cell(10, 6, '2023', 1, 0, 'C');
$pdf->Cell(35, 6, number_format(102225, 2), 1, 0, 'C');
$pdf->Cell(35, 6, number_format(85265, 2), 1, 0, 'C');
$pdf->Cell(35, 6, number_format(187491, 2), 1, 0, 'C');
$pdf->Cell(35, 6, number_format(827, 2), 1, 0, 'C');
$pdf->Cell(30, 6, 'S/. ' . number_format(827, 2), 1, 1, 'C');


//ESCALA PARA DETERMINAR EL IMPUESTO PREDIAL
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('ESCALA PARA DETERMINAR EL IMPUESTO PREDIAL'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(50, 6, utf8_decode('Tramo de Autovaluo'), 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('Alícuota'), 1, 1, 'C');

$pdf->Cell(50, 6, utf8_decode('Hasta 15 UIT'), 1, 0, 'C');
$pdf->Cell(50, 6, '0.2%', 1, 1, 'C');

$pdf->Cell(50, 6, utf8_decode('Mas de 15 UIT Hasta 60 UIT'), 1, 0, 'C');
$pdf->Cell(50, 6, '0.6%', 1, 1, 'C');

$pdf->Cell(50, 6, utf8_decode('Mas de 60 UIT'), 1, 0, 'C');
$pdf->Cell(50, 6, '1.0%', 1, 1, 'C');


// OBSERVACIONES
$pdf->Ln(5);

$pdf->MultiCell(50, 7, utf8_decode('OBSERVACIONES Los presentes datos estarán sujetos de la Fiscalización Posterior -'), 1, 'J');

// TOTALES
$pdf->Ln(10);
$pdf->Cell(50, 6, utf8_decode('TOTAL IMPUESTO TRIMESTRAL:'), 1, 0, 'C');
$pdf->Cell(40, 6, 'S/. 206.9875', 1, 0, 'R');
$pdf->Cell(40, 6, utf8_decode('TOTAL IMPUESTO ANUAL:'), 1, 0, 'C');
$pdf->Cell(40, 6, 'S/. 827.95', 1, 1, 'R');
$pdf->Ln(20);


// Firmas

$pdf->Cell(95, 6, utf8_decode('_________________________'), 0, 0, 'C');
$pdf->Cell(95, 6, utf8_decode('_________________________'), 0, 1, 'C');

$pdf->Cell(95, 4, utf8_decode('Firma del Contribuyente'), 0, 0, 'C');
$pdf->Cell(95, 4, utf8_decode('Funcionario Municipal'), 0, 1, 'C');

// === SEGUNDA PÁGINA CON ENCABEZADO DIFERENTE ===
$pdf->AddPage(); // Añadir nueva página
$pdf->HeaderSegundaPagina(); // Llamar al nuevo encabezado personalizado
$pdf->SetFont('Arial', '', 9);
$pdf->SetY(50); // Bajar un poco para evitar solapamiento con el encabezado



$pdf->Cell(40, 6, utf8_decode('ACREEDOR:'), 1, 0, 'C');
$pdf->Cell(70, 6, utf8_decode('MUNICIPALIDAD DISTRITAL DE QUINUA'), 1, 0, 'L');
$pdf->Cell(30, 6, utf8_decode('CODIGO:'), 1, 0, 'C');
$pdf->Cell(40, 6, '000002', 1, 1, 'C');

$pdf->Cell(40, 6, utf8_decode('AÑO:'), 1, 0, 'C');
$pdf->Cell(50, 6, '2023', 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('FECHA:'), 1, 0, 'C');
$pdf->Cell(40, 6, '10/04/2025', 1, 1, 'C');
$pdf->Ln(5);

// DATOS DEL CONTRIBUYENTE
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('DATOS DEL CONTRIBUYENTE'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(50, 6, utf8_decode('NOMBRE O RAZON SOCIAL:'), 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('TULIO ORE ICHACCAYA'), 1, 0, 'L');
//$pdf->Cell(120, 6, utf8_decode($nombre), 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('TIPO Y N° DOC.'), 1, 0, 'C');
$pdf->Cell(40, 6, '70422589', 1, 1, 'C');
$pdf->Ln(5);

$pdf->Cell(50, 6, utf8_decode('TIPO DE CONTRIBUYENTE:'), 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('Propietario'), 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('% DE PERTENENCIA:'), 1, 0, 'C');
$pdf->Cell(40, 6, '100%', 1, 1, 'C');

$pdf->Cell(50, 6, utf8_decode('CONYUGE:'), 1, 0, 'C');
$pdf->Cell(50, 6, utf8_decode('SARA SARMIENTO VARGAS'), 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('TIPO Y N° DOC.'), 1, 0, 'C');
$pdf->Cell(40, 6, '78965423', 1, 1, 'C');
$pdf->Ln(5);


// METODOS DE CONTACTO
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('METODOS DE CONTACTO'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(40, 6, utf8_decode('N° CELULAR:'), 1, 0, 'C');
$pdf->Cell(40, 6, '', 1, 0, 'L');
$pdf->Cell(40, 6, utf8_decode('CORREO:'), 1, 0, 'C');
$pdf->Cell(60, 6, '', 1, 1, 'L');
$pdf->Ln(5);

//RELACION DE PREDIOS DECLARADOS
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('RELACION DE PREDIOS DECLARADOS'), 0, 1);
$pdf->SetFont('Arial', '', 9);


$pdf->Cell(70, 6, utf8_decode('UBICACION'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('AUTOVALUO'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('% DE PROPIEDAD'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('AUTOVALUO EFECTO'), 1, 1, 'C');

$pdf->Cell(70, 15, utf8_decode('Predio denominado Quillca...'), 1, 0, 'L');
$pdf->Cell(40, 15, '', 1, 0, 'C');
$pdf->Cell(35, 15, '100%', 1, 0, 'C');
$pdf->Cell(35, 15, '', 1, 1, 'C');
//$pdf->Cell(40, 6, number_format($autovaluo_neto, 2), 1, 1, 'R');

$pdf->Cell(25, 6, utf8_decode('COD PREDIAL'), 1, 0, 'C');
$pdf->Cell(20, 6, '12345666', 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('COD CATASTRAL'), 1, 0, 'C');
$pdf->Cell(40, 6, '78_144225_455', 1, 0, 'C');
$pdf->Cell(25, 10, utf8_decode('TOTAL'), 1, 0, 'C');
$pdf->Cell(35, 10, '', 1, 1, 'C');
//$pdf->Cell(40, 6, number_format($autovaluo_neto, 2), 1, 1, 'R');
$pdf->Ln(5);

// Datos de la construcción
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('DATOS DE LA CONSTRUCCION'), 0, 1);
$pdf->SetFont('Arial', '', 9);


$pdf->Cell(40, 6, utf8_decode('Clasificación del predio'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('Materiales de Construcción'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('Estado de Conservación'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('Tipo de Uso Familiar'), 1, 1, 'C');

$pdf->Cell(40, 6, utf8_decode('Casa habitacion'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('Ladrillo'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('Bueno'), 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('unifamiliar'), 1, 1, 'C');

//$pdf->Cell(40, 6, $clasificacion_predio, 1, 0, 'C');
//$pdf->Cell(40, 6, $materiales_construccion, 1, 0, 'C');
//$pdf->Cell(40, 6, $estado_conservacion, 1, 0, 'C');
//$pdf->Cell(40, 6, $tipo_uso_familiar, 1, 1, 'C');
$pdf->Ln(5);

// Cálculo del autovalúo del terreno
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, utf8_decode('DETERMINACION DE AUTOVALUO DEL TERRENO'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(35, 6, utf8_decode('Grupo de Tierras'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('Valor por Hect'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('Cant Hect'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('Valor Total'), 1, 0, 'C');
$pdf->Cell(35, 6, utf8_decode('Total Autovaluo'), 1, 1, 'C');

$pdf->MultiCell(35, 6, utf8_decode('Terrenos aptos para cultivo en límite con un'), 1, 0, 'C');
//$pdf->Cell(40, 6, number_format($valor_unitario_hectarea, 2), 1, 0, 'R');
//$pdf->Cell(40, 6, number_format($cantidad_hectareas, 2), 1, 0, 'R');
//$pdf->Cell(40, 6, number_format($valor_total_terreno, 2), 1, 0, 'R');
//$pdf->Cell(40, 6, number_format($valor_total_terreno, 2), 1, 1, 'R');
$pdf->Ln(25);
// Firmas
$pdf->Ln(10);
$pdf->Cell(95, 6, utf8_decode('_________________________'), 0, 0, 'C');
$pdf->Cell(95, 6, utf8_decode('_________________________'), 0, 1, 'C');

$pdf->Cell(95, 4, utf8_decode('Firma del Contribuyente'), 0, 0, 'C');
$pdf->Cell(95, 4, utf8_decode('Funcionario Municipal'), 0, 1, 'C');

$pdf->Output('Autovaluo_Predial.pdf', 'I'); // I = Mostrar | D = Descargar


?>









