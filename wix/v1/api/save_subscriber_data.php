<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

require_once 'controllers/SubscriberController.php';
require_once 'utils/Logger.php';
$logger = new Logger();

try {
    $subscriberController = new SubscriberController();
    $response = $subscriberController->handleRequest();
    $messageLogger = $logger->registrarLog("success", "subscriber", $response);
    echo $messageLogger;
} catch (Exception $e) {
    $messageLogger = $logger->registrarLog("error", "subscriber", json_decode($e->getMessage(),true));
    http_response_code(500); // Error interno del servidor
    echo $messageLogger;
}
