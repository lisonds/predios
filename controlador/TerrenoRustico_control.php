<?php
require_once "../modelo/RusticoModel.php";

$rusticoModel = new RusticoModel();

if ($_GET['data'] == 'agregar_datos_rustico') {
    $anio = $_POST['anioArancelarioR'];
    $altitud = $_POST['altitud'];
    $valorAlta = $_POST['valorAlta'];
    $valorMedia = $_POST['valorMedia'];
    $valorBaja = $_POST['valorBaja'];
    $grupoTierra = $_POST['grupoTierra'];

    $result = $rusticoModel->insertRustico(
        $anio,
        $altitud,
        $valorAlta,
        $valorMedia,
        $valorBaja,
        $grupoTierra
    );

    echo json_encode($result);
    exit;
}

?>