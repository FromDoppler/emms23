<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');

class SubscriberDatabase
{
    private $db;
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
        try {
            // Initialize the database connection
            $this->db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            $errorMessage = json_encode(["Error al conectar con la base de datos: ", $e->getMessage(), ['user' => $this->user]]);
            http_response_code(500); // Error interno del servidor
            throw new Exception($errorMessage);
        }
    }

    public function saveSubscriptionToDatabase()
    {
        try {
            $this->db->insertSubscriptionDoppler($this->user);
            $this->db->saveRegistered($this->user);
            $this->db->close();
        } catch (Exception $e) {
            $errorMessage = json_encode(["saveSubscriptionDopplerTable ", $e->getMessage()]);
            http_response_code(500); // Error interno del servidor
            throw new Exception($errorMessage);
        }
    }
}
