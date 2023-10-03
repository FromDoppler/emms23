<?php

class WixContactsDatabase {
    private $db; // Objeto de conexión a la base de datos

    public function __construct($db) {
        $this->db = $db;
    }
    public function insertContact($contactData) {
        // Crear la consulta SQL sin escapar valores
        try{
            $query = "INSERT INTO wix_contacts (contact_id, contact_name, contact_email, paidplan_title, paidplan_startdate, paidplan_subscriptionid, paidplan_id, paidplan_orderid, paidplan_price, paidplan_paymentmethod, invited_by, `status`) VALUES (
                '{$contactData['contact_id']}',
                '{$contactData['contact_name']}',
                '{$contactData['contact_email']}',
                '{$contactData['paidplan_title']}',
                '{$contactData['paidplan_startdate']}',
                '{$contactData['paidplan_subscriptionid']}',
                '{$contactData['paidplan_id']}',
                '{$contactData['paidplan_orderid']}',
                '{$contactData['paidplan_price']}',
                '{$contactData['paidplan_paymentmethod']}',
                " . (isset($contactData['invited_by']) ? "'{$contactData['invited_by']}'" : "NULL") . ",
                '{$contactData['status']}'
            )";
            if ($this->db->query($query)) {
                return true; // Insercion exitosa
            } else {

                return false; // Error en la insercion
            }
        } catch (Exception $e) {
            $errorMessage = json_encode(["saveWixContactsTable (Guarda en la BD wix_contacts)", $e->getMessage(), ['user' => $contactData]]);
            http_response_code(500); // Error interno del servidor
            throw new Exception($errorMessage);
        }
    }


    public function getContacts() {
        $query = "SELECT * FROM wix_contacts";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $contacts = [];
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
            return $contacts; // Devuelve un array de contactos
        } else {
            return []; // No se encontraron contactos
        }
    }
}