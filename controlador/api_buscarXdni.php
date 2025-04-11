<?php
// Incluir el archivo de configuración
require '../configuracion/config.php';

// Obtener el DNI desde la URL
$dni = $_GET['dni'] ?? '';

if (!preg_match('/^\d{8}$/', $dni)) {
    echo json_encode(["error" => "DNI inválido"]);
    exit;
}

// Iniciar cURL
$curl = curl_init();

// Configurar cURL para llamar a la API
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.apis.net.pe/v2/reniec/dni?numero=$dni",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER => [
        'Referer: https://apis.net.pe/consulta-dni-api',
        'Authorization: Bearer ' . $token
    ],
]);

$response = curl_exec($curl);
curl_close($curl);

// Convertir respuesta a JSON
$persona = json_decode($response, true);

// Si hay un error en la respuesta de la API
if (!$persona || isset($persona['error'])) {
    echo json_encode(["error" => "No se encontró el DNI"]);
} else {
    echo json_encode($persona);
}
?>