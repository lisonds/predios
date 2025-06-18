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










