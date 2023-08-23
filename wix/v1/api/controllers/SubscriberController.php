<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once 'models/SubscriberWix.php';
require_once 'models/SubscriberDopplerList.php';
require_once 'models/SubscriberDatabase.php';
require_once 'utils/toHex.php';
require_once 'utils/Logger.php';

class SubscriberController
{
    public function handleRequest()
    {
        try {
            // Verificar el método de solicitud
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405); // Método no permitido
                throw new Exception('Método no permitido');
            }
            $jsonData = $this->getJsonDataFromRequest();

            // Crear una instancia de la clase SubscriberWix con los datos JSON
            $subscriberWix = new SubscriberWix($jsonData);

            // Procesar y guardar suscripciones
            $resultados = $this->processAndSaveSubscriptions($subscriberWix);
            $response = ['message' => 'Subscription saved successfully', 'data'=> $resultados];
            return $response;
        } catch (Exception $e) {
            http_response_code(500); // Error interno del servidor
            throw new Exception($e->getMessage());
        }
    }

    private function getJsonDataFromRequest()
    {
        $entityBody = file_get_contents('php://input');
        $jsonData = mb_convert_encoding($entityBody, 'UTF-8');
        $jsonData = json_decode($jsonData, true);
        // Verificar si el JSON es válido
        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400); // Solicitud incorrecta
            throw new Exception('JSON incorrecto'. $jsonData);
        }else{
            $logger = new Logger();
            $logger->registrarLog("success_raw", "objRaw", $jsonData);
        }
        return $jsonData;
    }

    private function processAndSaveSubscriptions(SubscriberWix $subscriberWix)
    {
        // Obtener datos de la empresa y de los individuales
        $allUsersData = $subscriberWix->getAllUsers();
        // Procesar las suscripciones
        foreach ($allUsersData as $email) {
            //Crear el objeto User
            $user = $this->CreateUserObj($email);

            try {
                // Guardar la suscripción en Doppler
                $dopplerHandler = new SubscriberDopplerList();
                $dopplerHandler->saveSubscription($user);

                // Guardar la suscripción en la base de datos
                $subscriberDatabase = new SubscriberDatabase($user); // Pasar $user al constructor
                $subscriberDatabase->saveSubscriptionToDatabase();
            } catch (Exception $e) {
                http_response_code(500); // Error interno del servidor
                throw new Exception($e->getMessage());
            }
        }

        return $allUsersData;
    }

    private function CreateUserObj($email)
    {
        $encode_email = toHex(json_encode([
            'userEmail' => $email,
            'userEvents' => ['ecommerce', 'digital-trends']
        ]));

        return [
            'register' => date("Y-m-d h:i:s A"),
            'firstname' => null,
            'email' => $email,
            'ecommerce' => 1,
            'digital_trends' => 1,
            'encode_email' => $encode_email,
            'privacy' => true,
            'promotions' => false,
            'ip' => '',
            'country_ip' => '',
            'source_utm' => "wix",
            'medium_utm' => "wix",
            'campaign_utm' => "wix",
            'content_utm' => "wix",
            'term_utm' => "wix",
            'origin' => "wix",
            'type' => "digital-trends",
            'form_id' => "pre", //TODO:getCurrentPhase()
            'list' => LIST_LANDING_DIGITALT,
            'subject' => SUBJECT_PRE_DIGITALT //TODO: getSubjectEmail("digital-trends", $phase)
        ];
    }
}
