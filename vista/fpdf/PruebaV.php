<?php
require('./fpdf.php'); // Ajusta la ruta si es necesario
require_once ("../../libreria/conexion.php");

class PDF extends FPDF
{
    // Cabecera
    function Header()
    {
        // Logo
        $this->Image('../assets/img/logo-quinua.png', 10, 10, 30); // Cambia según tu estructura

        // Título
        $this->SetFont('Arial','B',14);
        $this->Cell(0,10, 'Municipalidad Distrital de Quinua', 0, 1, 'C');
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10, 'Listado de Contribuyentes', 0, 1, 'C');
        $this->Ln(10);

        // Encabezados de tabla
        $this->SetFillColor(173, 216, 230); // Azul claro
        $this->SetFont('Arial','B',9);
        $this->Cell(10, 7, '#', 1, 0, 'C', true);
        $this->Cell(50, 7, 'Nombre Completo', 1, 0, 'C', true);
        $this->Cell(25, 7, 'Tipo Doc.', 1, 0, 'C', true);
        $this->Cell(30, 7, 'N° Documento', 1, 0, 'C', true);
        $this->Cell(40, 7, 'Dirección', 1, 0, 'C', true);
        $this->Cell(25, 7, 'Teléfono', 1, 0, 'C', true);
        $this->Cell(30, 7, 'Email', 1, 1, 'C', true);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb} - Fecha: '.date('d/m/Y'),0,0,'C');
    }
}

// Conexión a la base de datos
include '../../configuracion/config.php'; // Archivo con tu conexión PDO o mysqli

try {
    // Consulta SQL
    $stmt = $conexion->query("SELECT * FROM propietarios ORDER BY nombre_completo ASC");
    $contribuyentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Crear PDF
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',9);

    $contador = 1;

    foreach ($contribuyentes as $fila) {
        $pdf->Cell(10, 6, $contador++, 1, 0, 'C');
        $pdf->Cell(50, 6, utf8_decode($fila['nombre_completo']), 1, 0, 'L');
        $pdf->Cell(25, 6, $fila['tipo_documento'], 1, 0, 'C');
        $pdf->Cell(30, 6, $fila['numero_documento'], 1, 0, 'C');
        $pdf->Cell(40, 6, utf8_decode($fila['direccion']), 1, 0, 'L');
        $pdf->Cell(25, 6, $fila['telefono'] ?: '-', 1, 0, 'C');
        $pdf->Cell(30, 6, $fila['email'] ?: '-', 1, 1, 'L');
    }

    // Salida del PDF
    $pdf->Output('Listado_Contribuyentes_' . date("Y") . '.pdf', 'I');

} catch (PDOException $e) {
    die("Error al obtener datos: " . $e->getMessage());
}