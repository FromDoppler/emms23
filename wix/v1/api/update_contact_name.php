<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

require_once 'controllers/WixContactController.php';
require_once 'utils/Logger.php';
$logger = new Logger();

try {
    // Verificar el metodo de solicitud
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405); // Metodo no permitido
        throw new Exception(json_encode('Metodo no permitido'));
    }
    $WixContactController = new WixContactController();
    $response = $WixContactController->updateContactName();
    $messageLogger = $logger->registrarLog("success", "updateContactName", $response);
    echo json_encode($response);
} catch (Exception $e) {
    $messageLogger = $logger->registrarLog("error", "updateContactName", json_decode($e->getMessage(), true));
    http_response_code(500); // Error interno del servidor
    echo json_encode($messageLogger);
}

