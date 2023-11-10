<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php';

require_once 'models/WixContactsDatabase.php';

class WixContactController
{
    public function findContactByEmail()
    {
        try {
            // Obtener el parametro de email de la URL
            $email = isset($_GET['email']) ? $_GET['email'] : null;

            if (empty($email)) {
                http_response_code(400); // Solicitud incorrecta
                throw new Exception(json_encode(["Parámetro de email no proporcionado"]));
            }

            $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $wixContactsModel = new WixContactsDatabase($db);
            $response = $wixContactsModel->findContactByEmail($email);

            return $response;
        } catch (Exception $e) {
            http_response_code(500); // Error interno del servidor
            throw new Exception($e->getMessage());
        }
    }

    public function updateContactName()
    {
        try {
            // Obtener los datos del cuerpo de la solicitud POST
            $postData = $this->getJsonDataFromRequest();
            // Verificar si los parametros email y name estan presentes en los datos
            if (empty($postData['email']) || empty($postData['name'])) {
                http_response_code(400); // Solicitud incorrecta
                throw new Exception(json_encode(["Parámetros 'email' y 'name' son obligatorios"]));
            }
            $email = $postData['email'];
            $newName = $postData['name'];

            $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $wixContactsModel = new WixContactsDatabase($db);

            // Verificar si el email existe en la base de datos
            $existingContact = $wixContactsModel->findContactByEmail($email);

            if (empty($existingContact)) {
                http_response_code(404); // No encontrado
                throw new Exception(json_encode(["Email no encontrado"]));
            }

            // Verificar si el campo contact_name ya tiene un valor en la base de datos
            if (!empty($existingContact[0]['contact_name'])) {
                http_response_code(400); // Solicitud incorrecta
                throw new Exception(json_encode(["El nombre del contacto ya tiene un valor"]));
            }

            // Actualizar el nombre del contacto
            $updateResult = $wixContactsModel->updateContactName($email, $newName);

            if ($updateResult) {
                return json_encode(["message" => "Nombre actualizado con éxito"]);
            } else {
                throw new Exception(json_encode("Error al actualizar el nombre"));
            }
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
        // Verificar si el JSON es valido
        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400); // Solicitud incorrecta
            throw new Exception(json_encode('JSON incorrecto'. $jsonData));
        }else{
            $logger = new Logger();
            $logger->registrarLog("success_raw", "objRaw_updateContactName", $jsonData);
        }
        return $jsonData;
    }

}
