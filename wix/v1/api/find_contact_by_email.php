<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header('Content-Type: application/json');

require_once 'controllers/WixContactController.php';
require_once 'utils/Logger.php';
$logger = new Logger();

try {
    $WixContactController = new WixContactController();
    $response = $WixContactController->findContactByEmail();
    $messageLogger = $logger->registrarLog("success", "findContactByEmail", $response);
            // Verificar el metodo de solicitud (GET)
            if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
                http_response_code(405); // Metodo no permitido
                throw new Exception(json_encode('Método no permitido'));
            }

            if (!empty($response) && is_array($response) && count($response) > 0) {
                $jsonString = json_encode($response[0]);
                echo $jsonString;
            }else {
                echo "email_not_found";
            }

} catch (Exception $e) {
    $messageLogger = $logger->registrarLog("error", "findContactByEmail", json_decode($e->getMessage(),true));
    http_response_code(500); // Error interno del servidor
    echo $messageLogger;
}
