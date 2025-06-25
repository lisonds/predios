<?php
require('./fpdf.php');
require_once("../../libreria/conexion.php");

class PDF extends FPDF {
    function Header() {
        $this->Image('../assets/img/logo-quinua.png', 10, 10, 25);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Municipalidad Distrital de Quinua'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, utf8_decode('Reporte de Propietarios'), 0, 1, 'C');
        $this->Ln(5);

        $this->SetFont('Arial', 'B', 9);
        $this->SetFillColor(200, 220, 255);
        $this->Cell(10, 7, 'ID', 1, 0, 'C', true);
        $this->Cell(50, 7, 'Nombre Completo', 1, 0, 'C', true);
        $this->Cell(25, 7, 'DNI', 1, 0, 'C', true);
        $this->Cell(50, 7, 'Razón Social', 1, 0, 'C', true);
        $this->Cell(55, 7, 'Dirección', 1, 1, 'C', true);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb} - ' . date('d/m/Y'), 0, 0, 'C');
    }
}

$conexion = Conexion::conect();

// Ejecutar consulta con MySQLi
$query = "SELECT idpropietarios, nombre_completo, dni, razon_social, direccion FROM propietarios ORDER BY nombre_completo ASC";
$resultado = $conexion->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(10, 6, $fila['idpropietarios'], 1, 0, 'C');
    $pdf->Cell(50, 6, utf8_decode($fila['nombre_completo']), 1);
    $pdf->Cell(25, 6, $fila['dni'], 1, 0, 'C');
    $pdf->Cell(50, 6, utf8_decode($fila['razon_social']), 1);
    $pdf->Cell(55, 6, utf8_decode($fila['direccion']), 1, 1);
}

$pdf->Output('I', 'Reporte_Propietarios.pdf');
?>
