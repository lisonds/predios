<?php
require('./fpdf.php');

class PDF extends FPDF
{
    // Cabecera
    function Header()
    {
        // Logo
        $this->Image('logo-quinua.png', 10, 10, 30); // Cambia la ruta si es necesario

        // Fuente
        $this->SetFont('Arial','B',14);

        // Título
        $this->Cell(0,10, 'Municipalidad Distrital de Quinua', 0, 1, 'C');
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10, 'Valores Arancelarios de Edificaciones', 0, 1, 'C');
        $this->Ln(5);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb} - Fecha: '.date('d/m/Y'),0,0,'C');
    }
}

// Recibir año y datos por POST
$anio = $_POST['anio'] ?? date("Y");
$valores = json_decode($_POST['valores'], true); // Convertir JSON a array

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

// Mostrar año seleccionado
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,6, utf8_decode('Año Seleccionado: ').$anio, 0, 1);
$pdf->Ln(5);

// Tabla de encabezado
$pdf->SetFillColor(173,216,230); // Azul claro
$pdf->SetFont('Arial','B',9);

$pdf->Cell(25,7,'CATEGORIA',1,0,'C',true);
$pdf->Cell(30,7,'MUROS Y COLUMNAS',1,0,'C',true);
$pdf->Cell(30,7,'TECHOS',1,0,'C',true);
$pdf->Cell(30,7,'PISOS',1,0,'C',true);
$pdf->Cell(35,7,'PUERTAS Y VENTANAS',1,0,'C',true);
$pdf->Cell(30,7,'REVESTIMIENTOS',1,0,'C',true);
$pdf->Cell(20,7,'BAÑOS',1,0,'C',true);
$pdf->Cell(25,7,'INSTALACIONES',1,1,'C',true);

// Llenar tabla
$pdf->SetFont('Arial','',9);
if (!empty($valores) && is_array($valores)) {
    foreach ($valores as $fila) {
        $pdf->Cell(25,6,$fila['categoria'],1,0,'C');
        $pdf->Cell(30,6,number_format($fila['muro_columna'], 2),1,0,'R');
        $pdf->Cell(30,6,number_format($fila['techos'], 2),1,0,'R');
        $pdf->Cell(30,6,number_format($fila['pisos'], 2),1,0,'R');
        $pdf->Cell(35,6,number_format($fila['puertas_ventanas'], 2),1,0,'R');
        $pdf->Cell(30,6,number_format($fila['revistimiento'], 2),1,0,'R');
        $pdf->Cell(20,6,number_format($fila['banios'], 2),1,0,'R');
        $pdf->Cell(25,6,number_format($fila['instalaciones'], 2),1,1,'R');
    }
} else {
    $pdf->Cell(0,10,'No hay registros para mostrar.',1,1,'C');
}

// Salida del PDF
$pdf->Output('Valores_Arancelarios_'.$anio.'.pdf', 'I'); // I = Ver en navegador | D = Descargar
exit;