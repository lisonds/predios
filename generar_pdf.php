<?php
require('../../fpdf/fpdf.php');

// Obtener datos del POST
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$areaT = floatval($_POST['area_terreno']);
$areaC = floatval($_POST['area_construida']);
$anio = intval($_POST['anio']);
$valTerreno = floatval($_POST['valor_terreno']);
$valConstruccion = floatval($_POST['valor_construccion']);
$autovaluoBruto = floatval($_POST['autovaluo_bruto']);
$factorAntig = floatval($_POST['factor_antiguedad']);
$autovaluoNeto = floatval($_POST['autovaluo_neto']);

// Calcular antigüedad
$actual = date("Y");
$antiguedad = $actual - $anio;

// Crear nuevo documento PDF
$pdf = new FPDF('P','mm','A4');
$pdf->SetAutoPageBreak(true, 25);
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);

// Establecer fuente por defecto
$pdf->SetFont('Arial', '', 10);

// ENCABEZADO
$pdf->Image('img/predio.png', 10, 10, 30); // Asegúrate de tener el logo
$pdf->Cell(0, 6, 'MUNICIPALIDAD DISTRITAL DE QUINUA', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 6, 'DECLARACION JURADA DE IMPUESTO PREDIAL', 0, 1, 'C');
$pdf->Ln(5);

// TABLA: Datos del contribuyente
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(40, 6, 'ACREEDOR:', 1, 0, 'C');
$pdf->Cell(80, 6, 'MUNICIPALIDAD DISTRITAL DE QUINUA', 1, 0, 'C');
$pdf->Cell(30, 6, 'CODIGO:', 1, 0, 'C');
$pdf->Cell(40, 6, '000002', 1, 1, 'C');

$pdf->Cell(40, 6, 'ANO:', 1, 0, 'C');
$pdf->Cell(80, 6, '2023', 1, 0, 'C');
$pdf->Cell(30, 6, 'FECHA:', 1, 0, 'C');
$pdf->Cell(40, 6, date('d/m/Y'), 1, 1, 'C');

$pdf->Cell(40, 6, 'NOMBRE O RAZON SOCIAL:', 1, 0, 'C');
$pdf->Cell(80, 6, $nombre, 1, 0, 'C');
$pdf->Cell(30, 6, 'TIPO Y N° DOC:', 1, 0, 'C');
$pdf->Cell(40, 6, '70422589', 1, 1, 'C');

$pdf->Cell(40, 6, 'TIPO DE CONTRIBUYENTE:', 1, 0, 'C');
$pdf->Cell(80, 6, 'PROPIETARIO', 1, 0, 'C');
$pdf->Cell(30, 6, '% DE PERTENENCIA:', 1, 0, 'C');
$pdf->Cell(40, 6, '100%', 1, 1, 'C');

$pdf->Cell(40, 6, 'CONTRIBUYENTE:', 1, 0, 'C');
$pdf->Cell(80, 6, 'SARA SARMIENTO VARGAS', 1, 0, 'C');
$pdf->Cell(30, 6, 'TIPO Y N° DOC:', 1, 0, 'C');
$pdf->Cell(40, 6, '78965423', 1, 1, 'C');

$pdf->Ln(5);

// TABLA: Relación de predios declarados
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, 'RELACION DE PREDIOS DECLARADOS', 1, 1, 'C');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(60, 6, 'UBICACION', 1, 0, 'C');
$pdf->Cell(30, 6, 'AUTOVALUO', 1, 0, 'C');
$pdf->Cell(30, 6, '% DE PROPIEDAD', 1, 0, 'C');
$pdf->Cell(30, 6, 'AUTOVALUO EFECTIVO', 1, 1, 'C');

$pdf->Cell(60, 6, 'Predio denominado Quillca...', 1, 0, 'L');
$pdf->Cell(30, 6, number_format($autovaluoNeto, 2), 1, 0, 'R');
$pdf->Cell(30, 6, '100%', 1, 0, 'C');
$pdf->Cell(30, 6, number_format($autovaluoNeto, 2), 1, 1, 'R');

$pdf->Cell(60, 6, 'TOTAL', 1, 0, 'C');
$pdf->Cell(30, 6, '', 1, 0, 'C');
$pdf->Cell(30, 6, '', 1, 0, 'C');
$pdf->Cell(30, 6, number_format($autovaluoNeto, 2), 1, 1, 'R');

$pdf->Ln(5);

// TABLA: Determinación del cálculo del impuesto
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, 'DETERMINACION DEL CALCULO DEL IMPUESTO', 1, 1, 'C');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(20, 6, 'ANO', 1, 0, 'C');
$pdf->Cell(30, 6, 'VALOR TERRENO', 1, 0, 'C');
$pdf->Cell(30, 6, 'VALOR CONSTRUCCION', 1, 0, 'C');
$pdf->Cell(30, 6, 'TOTAL AUTOVALUO', 1, 0, 'C');
$pdf->Cell(30, 6, 'CALCULO DEL IMPUESTO', 1, 0, 'C');
$pdf->Cell(30, 6, 'IMPUESTO ANUAL', 1, 1, 'C');

$pdf->Cell(20, 6, '2023', 1, 0, 'C');
$pdf->Cell(30, 6, number_format($valTerreno * $areaT, 2), 1, 0, 'R');
$pdf->Cell(30, 6, number_format($valConstruccion * $areaC, 2), 1, 0, 'R');
$pdf->Cell(30, 6, number_format($autovaluoBruto, 2), 1, 0, 'R');
$pdf->Cell(30, 6, 'D.S. 309-2022-EF', 1, 0, 'C');
$pdf->Cell(30, 6, 'S/. ' . number_format($autovaluoNeto * 0.02, 2), 1, 1, 'R');

$pdf->Ln(5);

// TABLA: Escala para determinar el impuesto predial
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, 'ESCALA PARA DETERMINAR EL IMPUESTO PREDIAL', 1, 1, 'C');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(100, 6, 'Tramo de Autovaluo', 1, 0, 'C');
$pdf->Cell(90, 6, 'Alícuota', 1, 1, 'C');

$pdf->Cell(100, 6, 'Hasta 15 UIT', 1, 0, 'C');
$pdf->Cell(90, 6, '0.2%', 1, 1, 'C');

$pdf->Cell(100, 6, 'Mas de 15 UIT Hasta 60 UIT', 1, 0, 'C');
$pdf->Cell(90, 6, '0.6%', 1, 1, 'C');

$pdf->Cell(100, 6, 'Mas de 60 UIT', 1, 0, 'C');
$pdf->Cell(90, 6, '1.0%', 1, 1, 'C');

$pdf->Ln(5);

// Observaciones
$pdf->SetFont('Arial', 'B', 9);
$pdf->MultiCell(0, 5, 'Observaciones: Los presentes datos estarán sujetos a la fiscalización posterior.', 1, 'L');
$pdf->Ln(5);

// Firmas y sellos
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(95, 6, 'NOTA: El valor correspondiente al impuesto predial y/o autovalúo no acredita la titularidad del predio.', 1, 0, 'L');
$pdf->Cell(95, 6, 'DECLARO BAJO JURAMENTO QUE LOS DATOS CONSIGNADOS EN ESTA DECLARACION SON VERIDICOS.', 1, 1, 'L');

$pdf->Cell(95, 6, 'QUISPE CALLANAUPA VIDAL' . "\n" . 'DNI: 70422589', 1, 0, 'L');
$pdf->Cell(95, 6, '[Sello Digital]', 1, 1, 'C');

// Salida del PDF
$pdf->Output('Declaracion_Jurada_Predial.pdf', 'I'); // I = mostrar en navegador, D = forzar descarga
exit;
?>