<?php

require('./fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('Logo-quinua.png', 20, 10, 30); // Ajusta la ruta si es necesario

        // Título institucional
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, utf8_decode('MUNICIPALIDAD DISTRITAL DE QUINUA'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 7, utf8_decode('DECLARACIÓN JURADA DE IMPUESTO PREDIAL'), 0, 1, 'C');
        $this->Ln(5);

        // Línea separadora
        $this->SetDrawColor(0, 0, 0);
        $this->Line(10, 35, 270, 35); // Separador
        $this->Ln(5);
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
//$nombre = $_POST['nombre'];
//$direccion = $_POST['direccion'];
//$area_terreno = floatval($_POST['area_terreno']);
//$area_construida = floatval($_POST['area_construida']);
//$anio_construccion = intval($_POST['anio_construccion']);
//$val_terreno = floatval($_POST['valor_terreno']);
//$val_construccion = floatval($_POST['valor_construccion']);
//$autovaluo_bruto = floatval($_POST['autovaluo_bruto']);
//$factor_antiguedad = floatval($_POST['factor_antiguedad']);
//$autovaluo_neto = floatval($_POST['autovaluo_neto']);

// Cálculos adicionales
//$impuesto_anual = round($autovaluo_neto * 0.02, 2); // Ejemplo: 2% del autovalúo neto

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("P"); // Vertical
$pdf->SetFont('Arial', '', 10);

// DATOS DEL CONTRIBUYENTE
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, utf8_decode('Datos del Contribuyente'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(40, 6, utf8_decode('Nombre o Razón Social:'), 1, 0, 'L');
$pdf->Cell(140, 6, utf8_decode($nombre), 1, 1, 'L');

$pdf->Cell(40, 6, utf8_decode('Dirección:'), 1, 0, 'L');
$pdf->Cell(140, 6, utf8_decode($direccion), 1, 1, 'L');

$pdf->Cell(40, 6, utf8_decode('Área del Terreno (m²):'), 1, 0, 'L');
$pdf->Cell(40, 6, number_format($area_terreno, 2), 1, 0, 'R');
$pdf->Cell(40, 6, utf8_decode('Área Construida (m²):'), 1, 0, 'L');
$pdf->Cell(60, 6, number_format($area_construida, 2), 1, 1, 'R');

$pdf->Cell(40, 6, utf8_decode('Año de Construcción:'), 1, 0, 'L');
$pdf->Cell(40, 6, $anio_construccion, 1, 0, 'C');
$pdf->Cell(40, 6, utf8_decode('Antigüedad (años):'), 1, 0, 'L');
$pdf->Cell(60, 6, date("Y") - $anio_construccion, 1, 1, 'C');

$pdf->Ln(5);

// TABLA: VALORES Y AUTOVALUO
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, utf8_decode('Valores y Autovalúo'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->SetFillColor(230, 230, 230);
$pdf->Cell(60, 6, utf8_decode('Concepto'), 1, 0, 'C', true);
$pdf->Cell(60, 6, utf8_decode('Valor Unitario (S/)'), 1, 0, 'C', true);
$pdf->Cell(60, 6, utf8_decode('Área (m²)'), 1, 0, 'C', true);
$pdf->Cell(60, 6, utf8_decode('Total (S/)'), 1, 1, 'C', true);

$pdf->Cell(60, 6, utf8_decode('Terreno'), 1, 0, 'L');
$pdf->Cell(60, 6, number_format($val_terreno, 2), 1, 0, 'R');
$pdf->Cell(60, 6, number_format($area_terreno, 2), 1, 0, 'R');
$pdf->Cell(60, 6, number_format($area_terreno * $val_terreno, 2), 1, 1, 'R');

$pdf->Cell(60, 6, utf8_decode('Construcción'), 1, 0, 'L');
$pdf->Cell(60, 6, number_format($val_construccion, 2), 1, 0, 'R');
$pdf->Cell(60, 6, number_format($area_construida, 2), 1, 0, 'R');
$pdf->Cell(60, 6, number_format($area_construida * $val_construccion, 2), 1, 1, 'R');

$pdf->Cell(60, 6, utf8_decode('Factor Antigüedad'), 1, 0, 'L');
$pdf->Cell(60, 6, number_format($factor_antiguedad, 2), 1, 0, 'C');
$pdf->Cell(60, 6, '', 1, 0, 'C');
$pdf->Cell(60, 6, '', 1, 1, 'C');

$pdf->Cell(60, 6, utf8_decode('Autovalúo Neto'), 1, 0, 'L');
$pdf->Cell(60, 6, '', 1, 0, 'C');
$pdf->Cell(60, 6, '', 1, 0, 'C');
$pdf->Cell(60, 6, number_format($autovaluo_neto, 2), 1, 1, 'R');

$pdf->Ln(5);

// IMPUESTO PREDIAL
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, utf8_decode('Impuesto Predial'), 0, 1);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(120, 6, utf8_decode('Base Imponible (Autovalúo Neto)'), 1, 0, 'L');
$pdf->Cell(60, 6, number_format($autovaluo_neto, 2), 1, 0, 'R');
$pdf->Cell(60, 6, '', 1, 1, 'C');

$pdf->Cell(120, 6, utf8_decode('Tasa Aplicable (2%)'), 1, 0, 'L');
$pdf->Cell(60, 6, '2%', 1, 0, 'C');
$pdf->Cell(60, 6, '', 1, 1, 'C');

$pdf->Cell(120, 6, utf8_decode('Impuesto Anual'), 1, 0, 'L');
$pdf->Cell(60, 6, number_format($impuesto_anual, 2), 1, 0, 'R');
$pdf->Cell(60, 6, '', 1, 1, 'C');

$pdf->Ln(10);

// OBSERVACIONES
$pdf->SetFont('Arial', 'I', 9);
$pdf->MultiCell(0, 5, utf8_decode('* Los valores mostrados son referenciales y están sujetos a revisión técnica y fiscalización municipal.'), 0, 'L');

// Firmas
$pdf->Ln(15);
$pdf->Cell(95, 6, utf8_decode('_________________________'), 0, 0, 'C');
$pdf->Cell(95, 6, utf8_decode('_________________________'), 0, 1, 'C');

$pdf->Cell(95, 4, utf8_decode('Firma del Contribuyente'), 0, 0, 'C');
$pdf->Cell(95, 4, utf8_decode('Funcionario Municipal'), 0, 1, 'C');

$pdf->Output('Autovaluo_Predial.pdf', 'I'); // I = Mostrar | D = Descargar