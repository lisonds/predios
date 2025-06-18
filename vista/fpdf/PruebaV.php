<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo-quinua.png', 185, 10, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(10); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->SetTextColor(0, 0, 102); // Azul marino en RGB (0,0,102)
      $this->SetFont('Arial', 'B', 14);
      $this->Cell(0, 10, utf8_decode('MUNICIPALIDAD DISTRITAL DE QUINUA'), 0, 1, 'C'); // 0 = ancho automático
      $this->Ln(3); // Salto de línea


      /* TELEFONO */
      $this->Cell(50);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 931 455 488 "), 0, 0, 'C', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(50);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : muni.quinua@muni.gob.pe"), 0, 0, 'C', 0);
      $this->Ln(10);

      
      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE PROPIETARIOS "), 0, 1, 'C', 0);
      $this->Ln(3);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(2, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 8);
      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('NOMBRE Y APELLIDO'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('TIPO DE PROPIETARIO'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('DNI'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('RAZON SOCIAL'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
      
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 8);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;


/* FILA 1 */
$pdf->Cell(10, 10, utf8_decode("1"), 1, 0, 'C', 0);
$pdf->Cell(70, 10, utf8_decode("TULIO LISON ORE ICHACCAYA"), 1, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode("PROPIETARIO"), 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode("77445554"), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("PERSONA NATURAL"), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("ACTIVO"), 1, 1, 'C', 0); // <--- CAMBIO AQUÍ

/* FILA 2 */
$pdf->Cell(10, 10, utf8_decode("2"), 1, 0, 'C', 0);
$pdf->Cell(70, 10, utf8_decode("JUANA MENDOZA HUAMANI"), 1, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode("PROPIETARIO"), 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode("88997744"), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("PERSONA NATURAL"), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("ACTIVO"), 1, 1, 'C', 0); // <--- TAMBIÉN AQUÍ


/* FILA 2 */
$pdf->Cell(10, 10, utf8_decode("3"), 1, 0, 'C', 0);
$pdf->Cell(70, 10, utf8_decode("ABEL LAPADULA GUERRERO"), 1, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode("PROPIETARIO"), 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode("88977744"), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("PERSONA NATURAL"), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("ACTIVO"), 1, 1, 'C', 0); // <--- TAMBIÉN AQUÍ




$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
